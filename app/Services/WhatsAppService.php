<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Send an order notification via WhatsApp Cloud API.
     *
     * @param string $toNumber The recipient phone number (with country code, no +)
     * @param \App\Models\Order $order The order instance
     * @param bool $isAdmin Whether this message is for the admin or the customer
     * @return bool
     */
    public static function sendOrderNotification($toNumber, $order, $isAdmin = false)
    {
        $phoneNumberId = config('services.whatsapp.phone_number_id');
        $token = config('services.whatsapp.token');
        $templateName = config('services.whatsapp.template_name');

        if (!$phoneNumberId || !$token || !$toNumber) {
            Log::warning('WhatsApp credentials or recipient number missing.');
            return false;
        }

        // Clean phone number (remove +, spaces, etc)
        $toNumber = preg_replace('/[^0-9]/', '', $toNumber);

        // If the number starts with 0, remove it
        if (str_starts_with($toNumber, '0')) {
            $toNumber = substr($toNumber, 1);
        }

        // If the number doesn't start with a country code (e.g. 10 digits in India), prepend 91
        if (strlen($toNumber) === 10) {
            $toNumber = '91' . $toNumber;
        }

        $url = "https://graph.facebook.com/v17.0/{$phoneNumberId}/messages";

        // Assuming a generic template that takes parameters:
        // 1: Name (Admin name or Customer name)
        // 2: Order Number
        // 3: Total Amount
        $name = $isAdmin ? 'Admin' : $order->customer_name;

        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $toNumber,
            'type' => 'template',
            'template' => [
                'name' => $templateName,
                'language' => [
                    'code' => 'en'
                ],
                'components' => [
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $name,
                            ],
                            [
                                'type' => 'text',
                                'text' => $order->order_number,
                            ],
                            [
                                'type' => 'text',
                                'text' => '₹' . number_format($order->total_amount, 2),
                            ]
                        ]
                    ]
                ]
            ]
        ];

        try {
            $response = Http::withToken($token)
                ->post($url, $payload);

            if ($response->successful()) {
                Log::info("WhatsApp message sent to {$toNumber} for order {$order->order_number}");
                return true;
            } else {
                Log::error("WhatsApp API Error: " . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error("WhatsApp Exception: " . $e->getMessage());
            return false;
        }
    }
}
