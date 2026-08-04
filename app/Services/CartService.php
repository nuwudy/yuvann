<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected const SESSION_KEY = 'yuvann_cart';

    /**
     * Get all items in the cart.
     */
    public static function getItems(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * Add a product to the cart.
     */
    public static function add(Product $product, int $quantity = 1): void
    {
        $cart = self::getItems();
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) $product->active_price,
                'original_price' => (float) $product->price,
                'unit_size' => $product->unit_size,
                'featured_image' => $product->featured_image,
                'quantity' => $quantity,
            ];
        }

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Remove a product from the cart.
     */
    public static function remove(int $productId): void
    {
        $cart = self::getItems();

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Update quantity of a product in the cart.
     */
    public static function update(int $productId, int $quantity): void
    {
        $cart = self::getItems();

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Clear the cart.
     */
    public static function clear(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    /**
     * Get total quantity of items in the cart.
     */
    public static function getTotalQuantity(): int
    {
        $total = 0;
        foreach (self::getItems() as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }

    /**
     * Get subtotal of items in the cart.
     */
    public static function getSubtotal(): float
    {
        $subtotal = 0.0;
        foreach (self::getItems() as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    /**
     * Get formatted subtotal.
     */
    public static function getFormattedSubtotal(): string
    {
        return '₹' . number_format(self::getSubtotal(), 2);
    }
}
