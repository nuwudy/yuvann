<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductSearchService
{
    /**
     * Common transliteration substitutions for Indian and Ayurvedic words.
     */
    protected static array $transliterationMap = [
        'sh' => 's',
        'th' => 't',
        'ph' => 'p',
        'dh' => 'd',
        'bh' => 'b',
        'kh' => 'k',
        'gh' => 'g',
        'ch' => 'c',
        'ee' => 'i',
        'oo' => 'u',
        'w'  => 'v',
    ];

    /**
     * Normalize a string for phonetic and typo-tolerant comparison.
     */
    public static function normalize(string $text): string
    {
        $text = strtolower(trim($text));
        // Replace non-alphanumeric with spaces
        $text = preg_replace('/[^a-z0-9\s]/', ' ', $text);
        // Replace phonetic variants
        $text = strtr($text, self::$transliterationMap);
        // Collapse repeating duplicate letters: e.g. 'ss' -> 's', 'tt' -> 't'
        $text = preg_replace('/([a-z])\1+/', '$1', $text);
        // Normalize multiple spaces into single space
        $text = preg_replace('/\s+/', ' ', $text);
        return trim($text);
    }

    /**
     * Generate common query variations for a given word or phrase
     * (e.g., 'susupthi' -> ['susupthi', 'sushupti', 'sushupthi', 'susupti'])
     */
    public static function generateVariants(string $query): array
    {
        $raw = strtolower(trim($query));
        $variants = [$raw];

        // Also add without spaces if query contains spaces (e.g. "skin rich" -> "skinrich", "vea choc" -> "veachoc")
        if (str_contains($raw, ' ')) {
            $variants[] = str_replace(' ', '', $raw);
        }

        // Token variants
        $tokens = array_filter(explode(' ', $raw), fn($t) => strlen($t) >= 2);
        foreach ($tokens as $token) {
            $variants[] = $token;

            // 's' <-> 'sh'
            if (str_contains($token, 'sh')) {
                $variants[] = str_replace('sh', 's', $token);
            } elseif (str_contains($token, 's')) {
                $variants[] = str_replace('s', 'sh', $token);
            }

            // 't' <-> 'th'
            if (str_contains($token, 'th')) {
                $variants[] = str_replace('th', 't', $token);
            } elseif (str_contains($token, 't')) {
                $variants[] = str_replace('t', 'th', $token);
            }

            // 'p' <-> 'ph' or 'f'
            if (str_contains($token, 'ph')) {
                $variants[] = str_replace('ph', 'p', $token);
                $variants[] = str_replace('ph', 'f', $token);
            } elseif (str_contains($token, 'p')) {
                $variants[] = str_replace('p', 'ph', $token);
            }

            // 'i' <-> 'ee', 'u' <-> 'oo'
            if (str_contains($token, 'ee')) $variants[] = str_replace('ee', 'i', $token);
            if (str_contains($token, 'i'))  $variants[] = str_replace('i', 'ee', $token);
            if (str_contains($token, 'oo')) $variants[] = str_replace('oo', 'u', $token);
            if (str_contains($token, 'u'))  $variants[] = str_replace('u', 'oo', $token);
        }

        return array_values(array_unique(array_filter($variants, fn($v) => strlen($v) >= 2)));
    }

    /**
     * Compute a relevance match score (0 to 1000+) between a query and a product.
     */
    public static function calculateScore(string $query, $product): float
    {
        $qRaw = strtolower(trim($query));
        $qNorm = self::normalize($query);

        $nameRaw = strtolower($product->name ?? '');
        $nameNorm = self::normalize($product->name ?? '');

        $descRaw = strtolower(($product->short_description ?? '') . ' ' . ($product->description ?? ''));
        $descNorm = self::normalize($descRaw);

        $sku = strtolower($product->sku ?? '');

        // 1. Exact Name match or Direct Substring match
        if ($nameRaw === $qRaw) return 1000.0;
        if (str_contains($nameRaw, $qRaw)) return 500.0;
        if ($sku === $qRaw || str_contains($sku, $qRaw)) return 450.0;

        // 2. Normalized full string match (catches 'susupthi plus' -> 'sushupti plus', 'rutu santi' -> 'ruthu santhi')
        if ($nameNorm === $qNorm) return 400.0;
        if (str_contains($nameNorm, $qNorm) || str_contains($qNorm, $nameNorm)) return 350.0;

        // Check if query without spaces matches name without spaces (e.g. 'monkfruit' -> 'monk fruit')
        $qNoSpace = str_replace(' ', '', $qNorm);
        $nameNoSpace = str_replace(' ', '', $nameNorm);
        if ($qNoSpace === $nameNoSpace) return 380.0;
        if (strlen($qNoSpace) >= 4 && str_contains($nameNoSpace, $qNoSpace)) return 320.0;

        // 3. Token-level analysis on Name (Levenshtein & Metaphone per word)
        $qWords = array_filter(explode(' ', $qNorm), fn($w) => strlen($w) >= 2);
        $nameWords = array_filter(explode(' ', $nameNorm), fn($w) => strlen($w) >= 2);

        if (empty($qWords)) return 0.0;

        $matchedWordsCount = 0;
        $totalWordScore = 0;

        foreach ($qWords as $qw) {
            $bestWordMatch = 0;

            foreach ($nameWords as $nw) {
                // Exact token
                if ($qw === $nw) {
                    $bestWordMatch = max($bestWordMatch, 100);
                    break;
                }

                // Substring inside token (e.g. 'moringa' in 'moringaleaves')
                if (str_contains($nw, $qw) || str_contains($qw, $nw)) {
                    $bestWordMatch = max($bestWordMatch, 85);
                    continue;
                }

                // Levenshtein distance on individual words
                $lev = levenshtein($qw, $nw);
                $maxLen = max(strlen($qw), strlen($nw));

                if ($maxLen >= 4 && $lev <= 1) {
                    $bestWordMatch = max($bestWordMatch, 80);
                } elseif ($maxLen >= 6 && $lev <= 2) {
                    $bestWordMatch = max($bestWordMatch, 70);
                } elseif ($maxLen >= 8 && $lev <= 3) {
                    $bestWordMatch = max($bestWordMatch, 60);
                }

                // Metaphone comparison (phonetic similarity)
                if ($bestWordMatch < 60 && metaphone($qw) === metaphone($nw)) {
                    $bestWordMatch = max($bestWordMatch, 65);
                }
            }

            if ($bestWordMatch > 0) {
                $matchedWordsCount++;
                $totalWordScore += $bestWordMatch;
            }
        }

        if ($matchedWordsCount > 0) {
            $wordCoverageRatio = $matchedWordsCount / count($qWords);
            if ($wordCoverageRatio >= 0.5) {
                return 100.0 + ($totalWordScore * $wordCoverageRatio);
            }
        }

        // 4. Overall fuzzy similarity between whole normalized names
        similar_text($qNorm, $nameNorm, $similarity);
        if ($similarity >= 65) {
            return $similarity;
        }

        // 5. Description token matching
        $descWords = array_filter(explode(' ', $descNorm), fn($w) => strlen($w) >= 3);
        $matchedDescWords = 0;
        foreach ($qWords as $qw) {
            if (strlen($qw) < 3) continue;
            foreach ($descWords as $dw) {
                if ($qw === $dw || str_contains($dw, $qw)) {
                    $matchedDescWords++;
                    break;
                }
            }
        }

        if ($matchedDescWords > 0) {
            return 40.0 + ($matchedDescWords * 20.0);
        }

        return 0.0;
    }

    /**
     * Apply smart, typo-tolerant search to an Eloquent Product query.
     */
    public static function apply(Builder $query, string $search): Builder
    {
        $term = trim($search);
        if (empty($term)) {
            return $query;
        }

        // 1. Fetch active candidate products for fast scoring & fuzzy evaluation
        // (Cached or quick in-memory evaluation across catalog)
        $candidates = Product::query()
            ->where('is_active', true)
            ->with(['bodyParts'])
            ->get(['id', 'name', 'short_description', 'sku']);

        $scored = [];
        foreach ($candidates as $product) {
            $score = self::calculateScore($term, $product);

            // Also check tagged body parts if any
            if ($score === 0.0 && $product->relationLoaded('bodyParts')) {
                foreach ($product->bodyParts as $bp) {
                    $bpScore = self::calculateScore($term, (object)['name' => $bp->name]);
                    if ($bpScore > 0) {
                        $score = max($score, $bpScore * 0.8);
                    }
                }
            }

            if ($score > 0.0) {
                $scored[$product->id] = $score;
            }
        }

        // If fuzzy scoring found matches, order by relevance score!
        if (!empty($scored)) {
            arsort($scored); // Highest scores first
            $matchingIds = array_keys($scored);

            $query->whereIn('products.id', $matchingIds);

            // Maintain relevance sorting in standard SQL (compatible with MySQL & SQLite)
            $caseParts = [];
            foreach ($matchingIds as $rank => $id) {
                $caseParts[] = "WHEN " . (int)$id . " THEN " . (int)$rank;
            }
            $orderByCase = "CASE products.id " . implode(' ', $caseParts) . " ELSE 9999 END";

            $query->orderByRaw($orderByCase);
            return $query;
        }

        // 2. Fallback: If no high-confidence fuzzy matches found, use tokenized SQL LIKE with phonetic variants
        $variants = self::generateVariants($term);

        $query->where(function (Builder $sub) use ($term, $variants) {
            $sub->where('name', 'like', '%' . $term . '%')
                ->orWhere('short_description', 'like', '%' . $term . '%')
                ->orWhere('sku', 'like', '%' . $term . '%');

            foreach ($variants as $variant) {
                $sub->orWhere('name', 'like', '%' . $variant . '%');
            }

            $sub->orWhereHas('bodyParts', function ($bp) use ($variants) {
                foreach ($variants as $variant) {
                    $bp->orWhere('name', 'like', '%' . $variant . '%');
                }
            });
        });

        return $query;
    }
}
