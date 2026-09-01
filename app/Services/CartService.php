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
    public static function add(Product $product, int $quantity = 1, ?\App\Models\ProductVariant $variant = null): void
    {
        $cart = self::getItems();
        $id = $product->id . ($variant ? '_' . $variant->id : '');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'cart_id' => $id,
                'id' => $product->id,
                'variant_id' => $variant ? $variant->id : null,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $variant ? (float) $variant->active_price : (float) $product->active_price,
                'original_price' => $variant ? (float) $variant->price : (float) $product->price,
                'unit_size' => $variant ? $variant->unit_size : $product->unit_size,
                'featured_image' => $product->featured_image,
                'quantity' => $quantity,
            ];
        }

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Remove a product from the cart.
     */
    public static function remove(string $cartId): void
    {
        $cart = self::getItems();

        if (isset($cart[$cartId])) {
            unset($cart[$cartId]);
        }

        Session::put(self::SESSION_KEY, $cart);
    }

    /**
     * Update quantity of a product in the cart.
     */
    public static function update(string $cartId, int $quantity): void
    {
        $cart = self::getItems();

        if (isset($cart[$cartId])) {
            if ($quantity <= 0) {
                unset($cart[$cartId]);
            } else {
                $cart[$cartId]['quantity'] = $quantity;
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

    /**
     * Get WhatsApp recipient phone number.
     */
    public static function getWhatsAppNumber(): string
    {
        $admin = config('services.whatsapp.admin_number');
        if (!empty($admin)) {
            $admin = preg_replace('/[^0-9]/', '', $admin);
            if (strlen($admin) === 10) {
                $admin = '91' . $admin;
            }
            return $admin;
        }
        return '917736609299';
    }

    /**
     * Generate a WhatsApp order URL for current cart items.
     */
    public static function getWhatsAppOrderUrl(): string
    {
        $items = self::getItems();
        $phone = self::getWhatsAppNumber();

        if (empty($items)) {
            return "https://wa.me/{$phone}";
        }

        $lines = [];
        $lines[] = "🌿 *YUVANN WELLNESS - CART ORDER*";
        $lines[] = "Hello Dr. Sajeev Dev, I would like to place an order for the items in my cart:";
        $lines[] = "";

        $i = 1;
        foreach ($items as $item) {
            $unit = !empty($item['unit_size']) ? " (" . $item['unit_size'] . ")" : "";
            $itemTotal = number_format($item['price'] * $item['quantity'], 2);
            $lines[] = "{$i}. *{$item['name']}*{$unit}";
            $lines[] = "   Qty: {$item['quantity']} × ₹" . number_format($item['price'], 2) . " = ₹{$itemTotal}";
            $i++;
        }

        $lines[] = "";
        $lines[] = "💰 *Subtotal: ₹" . number_format(self::getSubtotal(), 2) . "*";
        $lines[] = "";
        $lines[] = "Please guide me with the delivery and payment/UPI details.";

        return "https://wa.me/{$phone}?text=" . urlencode(implode("\n", $lines));
    }
}
