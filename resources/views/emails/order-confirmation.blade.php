<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - {{ $order->order_number }}</title>
    <style>
        body, table, td, p, a, li, blockquote {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            background-color: #f4f6f3;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #26382b;
            line-height: 1.6;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f3;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f4f6f3; padding: 30px 10px;">
        <tr>
            <td align="center">
                <!-- Main Container -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 620px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8e0;">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background: linear-gradient(135deg, #133926 0%, #1c4d34 100%); padding: 32px 24px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 26px; font-weight: 700; letter-spacing: 0.5px; font-family: Georgia, serif;">
                                Yuvann Wellness
                            </h1>
                            <p style="margin: 6px 0 0 0; color: #e2cb92; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase;">
                                Authentic Herbal & Wellness Concepts
                            </p>
                        </td>
                    </tr>

                    <!-- Order Confirmed Banner -->
                    <tr>
                        <td style="padding: 28px 32px 16px 32px; background-color: #fdfbf7; border-bottom: 1px solid #eedec3;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <div style="display: inline-block; background-color: #eaf5ee; color: #1c6b3e; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px;">
                                            ✓ Order Confirmed
                                        </div>
                                        <h2 style="margin: 0 0 8px 0; color: #133926; font-size: 20px; font-weight: 700;">
                                            Thank you for your order, {{ $order->customer_name }}!
                                        </h2>
                                        <p style="margin: 0; color: #4a6352; font-size: 14px; line-height: 1.5;">
                                            We have received your order and are preparing your natural formulations for dispatch. Below is your complete order receipt and delivery summary.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Order Meta Card -->
                    <tr>
                        <td style="padding: 24px 32px 8px 32px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f9fbf9; border: 1px solid #e1eade; border-radius: 10px; padding: 16px;">
                                <tr>
                                    <td width="50%" style="padding: 6px 10px; vertical-align: top;">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #728c7b; font-weight: 700; display: block; margin-bottom: 3px;">Order Number</span>
                                        <strong style="font-size: 15px; color: #133926; font-family: Courier, monospace;">{{ $order->order_number }}</strong>
                                    </td>
                                    <td width="50%" style="padding: 6px 10px; vertical-align: top;">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #728c7b; font-weight: 700; display: block; margin-bottom: 3px;">Order Date</span>
                                        <strong style="font-size: 13px; color: #133926;">{{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : date('d M Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding: 6px 10px; vertical-align: top;">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #728c7b; font-weight: 700; display: block; margin-bottom: 3px;">Payment Method</span>
                                        <strong style="font-size: 13px; color: #133926;">
                                            @if($order->payment_method === 'razorpay')
                                                Online Payment (Razorpay)
                                            @elseif($order->payment_method === 'whatsapp')
                                                WhatsApp Direct Order
                                            @else
                                                {{ strtoupper($order->payment_method) }}
                                            @endif
                                        </strong>
                                    </td>
                                    <td width="50%" style="padding: 6px 10px; vertical-align: top;">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #728c7b; font-weight: 700; display: block; margin-bottom: 3px;">Payment Status</span>
                                        <strong style="font-size: 13px; color: #1c6b3e;">{{ ucfirst($order->status) }}</strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Order Items Summary -->
                    <tr>
                        <td style="padding: 16px 32px;">
                            <h3 style="margin: 0 0 12px 0; color: #133926; font-size: 16px; font-weight: 700; border-bottom: 2px solid #e1eade; padding-bottom: 8px;">
                                Items in Your Order
                            </h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                <thead>
                                    <tr style="border-bottom: 1px solid #e1eade; background-color: #f7faf7;">
                                        <th align="left" style="padding: 10px 8px; font-size: 12px; color: #506958; text-transform: uppercase; font-weight: 700;">Item</th>
                                        <th align="center" style="padding: 10px 8px; font-size: 12px; color: #506958; text-transform: uppercase; font-weight: 700;">Qty</th>
                                        <th align="right" style="padding: 10px 8px; font-size: 12px; color: #506958; text-transform: uppercase; font-weight: 700;">Price</th>
                                        <th align="right" style="padding: 10px 8px; font-size: 12px; color: #506958; text-transform: uppercase; font-weight: 700;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotalCalc = 0;
                                    @endphp
                                    @foreach($order->items as $item)
                                        @php
                                            $lineTotal = $item->price * $item->quantity;
                                            $subtotalCalc += $lineTotal;
                                        @endphp
                                        <tr style="border-bottom: 1px solid #f0f4ef;">
                                            <td style="padding: 12px 8px; vertical-align: middle;">
                                                <div style="font-size: 14px; font-weight: 600; color: #133926;">
                                                    {{ $item->product_name }}
                                                </div>
                                                @if(!empty($item->unit_size))
                                                    <span style="display: inline-block; font-size: 11px; background-color: #edf3ed; color: #345c41; padding: 2px 6px; border-radius: 4px; margin-top: 3px;">
                                                        {{ $item->unit_size }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td align="center" style="padding: 12px 8px; font-size: 13px; color: #2d4535; vertical-align: middle;">
                                                {{ $item->quantity }}
                                            </td>
                                            <td align="right" style="padding: 12px 8px; font-size: 13px; color: #2d4535; vertical-align: middle;">
                                                ₹{{ number_format($item->price, 2) }}
                                            </td>
                                            <td align="right" style="padding: 12px 8px; font-size: 14px; font-weight: 600; color: #133926; vertical-align: middle;">
                                                ₹{{ number_format($lineTotal, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Pricing Breakdown -->
                    <tr>
                        <td style="padding: 0 32px 20px 32px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #fdfbf7; border-radius: 8px; border: 1px solid #eee4d1; padding: 14px 18px;">
                                <tr>
                                    <td align="right" style="padding: 4px 0; font-size: 13px; color: #6b6354;">Subtotal:</td>
                                    <td align="right" width="120" style="padding: 4px 0; font-size: 13px; font-weight: 600; color: #133926;">₹{{ number_format($subtotalCalc, 2) }}</td>
                                </tr>
                                <tr>
                                    <td align="right" style="padding: 4px 0; font-size: 13px; color: #6b6354;">Shipping & Handling:</td>
                                    <td align="right" width="120" style="padding: 4px 0; font-size: 13px; font-weight: 600; color: {{ $order->shipping_amount > 0 ? '#133926' : '#1c6b3e' }};">
                                        {{ $order->shipping_amount > 0 ? '₹' . number_format($order->shipping_amount, 2) : 'FREE' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border-top: 1px solid #e4d8c0; padding-top: 8px; margin-top: 6px;"></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-size: 16px; font-weight: 700; color: #133926;">Grand Total:</td>
                                    <td align="right" width="120" style="font-size: 18px; font-weight: 700; color: #996e1b;">₹{{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Delivery & Customer Information -->
                    <tr>
                        <td style="padding: 0 32px 28px 32px;">
                            <h3 style="margin: 0 0 12px 0; color: #133926; font-size: 16px; font-weight: 700; border-bottom: 2px solid #e1eade; padding-bottom: 8px;">
                                Delivery Address
                            </h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f9fbf9; border: 1px solid #e1eade; border-radius: 10px; padding: 16px;">
                                <tr>
                                    <td>
                                        <p style="margin: 0 0 6px 0; font-size: 14px; font-weight: 700; color: #133926;">
                                            {{ $order->customer_name }}
                                        </p>
                                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #435e4d; line-height: 1.5;">
                                            {!! nl2br(e($order->shipping_address)) !!}
                                        </p>
                                        @if($order->landmark)
                                            <p style="margin: 0 0 6px 0; font-size: 12px; color: #688271;">
                                                <strong>Landmark:</strong> {{ $order->landmark }}
                                            </p>
                                        @endif
                                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #133926;">
                                            <strong>PIN Code:</strong> {{ $order->pincode }}
                                        </p>
                                        <p style="margin: 0; font-size: 13px; color: #133926;">
                                            <strong>Phone:</strong> {{ $order->customer_phone }}
                                            @if($order->alternate_phone)
                                                | <strong>Alt:</strong> {{ $order->alternate_phone }}
                                            @endif
                                        </p>
                                        @if($order->notes)
                                            <div style="margin-top: 10px; padding-top: 8px; border-top: 1px dashed #dbe6d7; font-size: 12px; color: #587361;">
                                                <strong>Order Notes:</strong> {{ $order->notes }}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Support & Help -->
                    <tr>
                        <td style="padding: 24px 32px; background-color: #edf5ef; border-top: 1px solid #d5e5d8; text-align: center;">
                            <h4 style="margin: 0 0 6px 0; color: #133926; font-size: 15px; font-weight: 700;">Need assistance with your order?</h4>
                            <p style="margin: 0 0 14px 0; font-size: 13px; color: #405e4c;">
                                Feel free to reply directly to this email or reach out to our dedicated support channels.
                            </p>
                            <table border="0" cellpadding="0" cellspacing="0" align="center">
                                <tr>
                                    <td style="padding: 0 8px;">
                                        <a href="mailto:info@yuvann.com" style="display: inline-block; background-color: #133926; color: #ffffff; padding: 8px 18px; border-radius: 6px; font-size: 13px; text-decoration: none; font-weight: 600;">
                                            ✉️ info@yuvann.com
                                        </a>
                                    </td>
                                    <td style="padding: 0 8px;">
                                        <a href="https://wa.me/917736609299" style="display: inline-block; background-color: #25D366; color: #ffffff; padding: 8px 18px; border-radius: 6px; font-size: 13px; text-decoration: none; font-weight: 600;">
                                            💬 WhatsApp Support
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #133926; padding: 24px 32px; text-align: center; color: #b7cebf; font-size: 12px; line-height: 1.6;">
                            <p style="margin: 0 0 8px 0; font-weight: 600; color: #e2cb92;">
                                Yuvann Wellness Concepts
                            </p>
                            <p style="margin: 0 0 10px 0;">
                                Wayanad, Kerala, India &bull; Phone: +91 7736609299
                            </p>
                            <p style="margin: 0; font-size: 11px; color: #87a692;">
                                &copy; {{ date('Y') }} Yuvann Wellness. All rights reserved. &bull; <a href="https://yuvann.com" style="color: #e2cb92; text-decoration: none;">yuvann.com</a>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
