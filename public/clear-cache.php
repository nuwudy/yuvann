<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

try {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    \Illuminate\Support\Facades\Artisan::call('view:cache');
    echo "<h1>Cache Cleared & Views Pre-Compiled Successfully!</h1>";
} catch (\Exception $e) {
    echo "<h1>Error clearing cache:</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}

try {
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    $migrateOutput = \Illuminate\Support\Facades\Artisan::output();
    echo "<h3>Database Migration:</h3><pre style='background:#eef;padding:8px;font-size:12px;'>" . htmlspecialchars($migrateOutput ?: 'Nothing to migrate.') . "</pre>";
} catch (\Exception $e) {
    echo "<h3>Migration Error:</h3><p style='color:red'>" . $e->getMessage() . "</p>";
}

// Blog Seeding Actions
if (isset($_GET['wipe_and_seed_blog'])) {
    try {
        \Illuminate\Support\Facades\DB::table('blog_post_product')->truncate();
        \App\Models\BlogPost::query()->delete();
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'BlogSeeder', '--force' => true]);
        echo "<h3 style='color:green'>All Previous Blog Posts Deleted & Fresh Articles Seeded Successfully!</h3>";
        echo "<pre style='background:#efe;padding:8px;font-size:12px;'>" . htmlspecialchars(\Illuminate\Support\Facades\Artisan::output()) . "</pre>";
    } catch (\Exception $e) {
        echo "<h3 style='color:red'>Blog Seeding Error:</h3><p style='color:red'>" . $e->getMessage() . "</p>";
    }
} elseif (isset($_GET['seed_blog'])) {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'BlogSeeder', '--force' => true]);
        echo "<h3 style='color:green'>Blog Seeder Executed Successfully (Updated / Inserted)!</h3>";
        echo "<pre style='background:#efe;padding:8px;font-size:12px;'>" . htmlspecialchars(\Illuminate\Support\Facades\Artisan::output()) . "</pre>";
    } catch (\Exception $e) {
        echo "<h3 style='color:red'>Blog Seeding Error:</h3><p style='color:red'>" . $e->getMessage() . "</p>";
    }
}

echo "<div style='margin:20px 0;padding:15px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;'>";
echo "<h3 style='margin-top:0;color:#166534;'>Blog Management Actions:</h3>";
echo "<a href='?seed_blog=1' style='display:inline-block;margin-right:10px;padding:8px 16px;background:#15803d;color:#fff;text-decoration:none;border-radius:6px;font-weight:bold;'>🌿 Seed / Update Local Articles</a>";
echo "<a href='?wipe_and_seed_blog=1' onclick=\"return confirm('Are you sure you want to delete existing articles on the website and reseed fresh?');\" style='display:inline-block;padding:8px 16px;background:#b91c1c;color:#fff;text-decoration:none;border-radius:6px;font-weight:bold;'>⚠️ Delete All & Fresh Seed Articles</a>";
echo "</div>";

echo "<h2>Diagnostic Check:</h2><ul>";
$tables = ['products', 'categories', 'category_product', 'body_parts', 'body_part_product', 'shops'];
foreach ($tables as $t) {
    $exists = \Illuminate\Support\Facades\Schema::hasTable($t);
    echo "<li>Table <code>$t</code>: " . ($exists ? "<strong style='color:green'>EXISTS</strong>" : "<strong style='color:red'>MISSING</strong>") . "</li>";
}
if (\Illuminate\Support\Facades\Schema::hasTable('products')) {
    $cols = ['category_id', 'shop_id', 'is_free_shipping', 'featured_order'];
    foreach ($cols as $col) {
        $hasCol = \Illuminate\Support\Facades\Schema::hasColumn('products', $col);
        echo "<li>Column <code>products.$col</code>: " . ($hasCol ? "<strong style='color:green'>EXISTS</strong>" : "<strong style='color:red'>MISSING</strong>") . "</li>";
    }
}
echo "</ul>";

echo "<h2>Recent Laravel Log Errors:</h2>";
$logPath = storage_path('logs/laravel.log');
if (file_exists($logPath)) {
    $lines = file($logPath);
    $lastLines = array_slice($lines, -100);
    echo "<pre style='background:#f4f4f4;padding:10px;max-height:400px;overflow:auto;font-size:11px;'>" . htmlspecialchars(implode("", $lastLines)) . "</pre>";
} else {
    echo "<p>No log file found at $logPath</p>";
}

