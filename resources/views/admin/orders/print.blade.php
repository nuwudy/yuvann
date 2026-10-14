<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Slip & Invoice #{{ $order->order_number }} - Yuvann</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #1a2e26;
            background: #f4f6f5;
            font-size: 13px;
            line-height: 1.5;
            padding: 20px;
        }
        .no-print {
            max-width: 800px;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 14px 20px;
            border-radius: 12px;
            border: 1px solid #d4dfda;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        .btn-primary {
            background: #0f3d2e;
            color: #ffffff;
        }
        .btn-primary:hover {
            background: #0a2b20;
        }
        .btn-secondary {
            background: #edf3f0;
            color: #0f3d2e;
            border: 1px solid #c8d8d1;
        }
        .btn-secondary:hover {
            background: #e2ede8;
        }
        .slip-container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            padding: 36px 40px;
            border-radius: 12px;
            border: 1px solid #d4dfda;
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        }

        /* Header */
        .slip-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #0f3d2e;
            padding-bottom: 18px;
            margin-bottom: 24px;
        }
        .brand-title {
            font-size: 26px;
            font-weight: 800;
            color: #0f3d2e;
            letter-spacing: -0.5px;
        }
        .brand-subtitle {
            font-size: 11px;
            color: #4a6b5e;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 2px;
        }
        .brand-contact {
            font-size: 11px;
            color: #555;
            margin-top: 4px;
            line-height: 1.4;
        }
        .invoice-meta {
            text-align: right;
        }
        .invoice-badge {
            display: inline-block;
            background: #edf3f0;
            color: #0f3d2e;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 4px 10px;
            border-radius: 6px;
            margin-bottom: 6px;
            border: 1px solid #c8d8d1;
        }
        .order-id {
            font-size: 18px;
            font-weight: 800;
            color: #0f3d2e;
            font-family: monospace;
        }
        .order-date {
            font-size: 11px;
            color: #666;
            margin-top: 2px;
        }

        /* Two columns for Dispatch & Billing */
        .address-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }
        .info-card {
            background: #fbfdfc;
            border: 1px solid #dce6e1;
            border-radius: 10px;
            padding: 16px 18px;
        }
        .info-card.highlight {
            border: 2px solid #0f3d2e;
            background: #ffffff;
        }
        .card-header {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #0f3d2e;
            border-bottom: 1px solid #e5ece9;
            padding-bottom: 6px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .customer-name {
            font-size: 15px;
            font-weight: 800;
            color: #0f3d2e;
            margin-bottom: 4px;
        }
        .phone-line {
            font-size: 13px;
            font-weight: 700;
            color: #111;
            margin-bottom: 3px;
        }
        .address-text {
            font-size: 13px;
            color: #222;
            line-height: 1.45;
            margin-top: 6px;
            white-space: pre-line;
        }
        .pincode-badge {
            display: inline-block;
            background: #0f3d2e;
            color: #ffffff;
            font-size: 14px;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: 6px;
            margin-top: 8px;
            font-family: monospace;
            letter-spacing: 1px;
        }
        .landmark-badge {
            display: block;
            margin-top: 6px;
            font-size: 12px;
            color: #444;
            background: #f0f5f2;
            padding: 4px 8px;
            border-radius: 6px;
            border-left: 3px solid #b8860b;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .items-table th {
            background: #0f3d2e;
            color: #ffffff;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.6px;
            padding: 10px 12px;
            text-align: left;
        }
        .items-table th.text-center, .items-table td.text-center { text-align: center; }
        .items-table th.text-right, .items-table td.text-right { text-align: right; }
        .items-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e1e9e5;
            color: #222;
        }
        .items-table tr:nth-child(even) td {
            background: #fafcfb;
        }
        .product-name {
            font-weight: 700;
            color: #0f3d2e;
        }
        .product-unit {
            font-size: 11px;
            color: #666;
            margin-top: 1px;
        }

        /* Calculation block */
        .calc-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 24px;
        }
        .calc-table {
            width: 320px;
            border-collapse: collapse;
        }
        .calc-table td {
            padding: 6px 10px;
            font-size: 12px;
        }
        .calc-table td.label {
            color: #555;
            text-align: left;
        }
        .calc-table td.value {
            text-align: right;
            font-weight: 700;
            color: #111;
        }
        .calc-table tr.total-row td {
            border-top: 2px solid #0f3d2e;
            padding-top: 10px;
            font-size: 15px;
            font-weight: 800;
            color: #0f3d2e;
        }

        /* Notes & Verification Box */
        .notes-box {
            background: #fffdf5;
            border: 1px dashed #d4af37;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .notes-title {
            font-weight: 800;
            color: #8c6b00;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }
        .checklist-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            border: 1px solid #d4dfda;
            border-radius: 8px;
            padding: 12px 14px;
            background: #fafcfb;
            margin-bottom: 20px;
        }
        .check-box {
            font-size: 11px;
            color: #444;
        }
        .check-line {
            border-bottom: 1px dotted #888;
            height: 22px;
            margin-top: 4px;
        }

        /* Footer */
        .slip-footer {
            border-top: 1px solid #e1e9e5;
            padding-top: 14px;
            text-align: center;
            font-size: 11px;
            color: #666;
            line-height: 1.5;
        }

        @media print {
            body {
                background: #ffffff;
                padding: 0;
                font-size: 12px;
            }
            .no-print {
                display: none !important;
            }
            .slip-container {
                border: none;
                box-shadow: none;
                padding: 10px;
                max-width: 100%;
            }
            .pincode-badge {
                border: 2px solid #000;
                color: #000;
                background: #fff;
            }
            .items-table th {
                background: #eef3f0 !important;
                color: #000 !important;
                border-bottom: 2px solid #000;
            }
        }
    </style>
</head>
<body>

    <!-- Controls (Hidden on Print) -->
    <div class="no-print">
        <div style="font-weight: 700; color: #0f3d2e;">
            📦 Dispatch & Shipping Slip #{{ $order->order_number }}
        </div>
        <div style="display: flex; gap: 10px;">
            <button onclick="window.print()" class="btn btn-primary">
                🖨️ Print Slip / Invoice
            </button>
            <a href="{{ route('admin.orders.pdf', $order->id) }}" class="btn btn-secondary">
                📥 Download PDF
            </a>
            <button onclick="window.close()" class="btn btn-secondary">
                ✕ Close
            </button>
        </div>
    </div>

    <!-- Main Printable Slip / Invoice -->
    <div class="slip-container">
        
        <!-- Header -->
        <div class="slip-header">
            <div>
                <div class="brand-title">🌿 YUVANN WELLNESS</div>
                <div class="brand-subtitle">Natural Healing & Wellness Concepts</div>
                <div class="brand-contact">
                    Dr. Sajeev Dev, Wayanad & Calicut, Kerala, India<br>
                    Customer Care / WhatsApp: +91 94473 65545 | Email: info@yuvann.com<br>
                    FSSAI Lic. No: 21325185000809 | Website: https://yuvann.com
                </div>
            </div>
            <div class="invoice-meta">
                <span class="invoice-badge">Shipping & Tax Invoice</span>
                <div class="order-id">#{{ $order->order_number }}</div>
                <div class="order-date">Date: {{ $order->created_at->format('d-M-Y h:i A') }}</div>
                <div style="font-size: 11px; margin-top: 4px; font-weight: 700; color: #0f3d2e;">
                    Status: <span style="text-transform: uppercase;">{{ $order->status }}</span>
                </div>
                <div style="font-size: 10px; color: #666; margin-top: 2px;">
                    Mode: {{ $order->payment_method === 'whatsapp' ? 'WhatsApp / Direct UPI' : 'Online (Razorpay)' }}
                </div>
            </div>
        </div>

        <!-- Address Grid -->
        <div class="address-grid">
            <!-- Deliver To (Customer Shipping Address) -->
            <div class="info-card highlight">
                <div class="card-header">
                    <span>📍 Deliver To / Shipping Destination</span>
                    <span style="font-size: 9px; color: #0f3d2e;">COURIER DISPATCH</span>
                </div>
                <div class="customer-name">{{ $order->customer_name }}</div>
                <div class="phone-line">📞 Primary Phone: {{ $order->customer_phone }}</div>
                @if($order->alternate_phone)
                    <div class="phone-line" style="color: #2b5d49;">📱 Alternate Contact: {{ $order->alternate_phone }}</div>
                @endif
                @if($order->customer_email)
                    <div style="font-size: 11px; color: #555; margin-bottom: 4px;">✉️ {{ $order->customer_email }}</div>
                @endif
                
                <div class="address-text">{{ $order->shipping_address }}</div>

                @if($order->landmark)
                    <div class="landmark-badge">
                        <strong>🏷️ Landmark:</strong> {{ $order->landmark }}
                    </div>
                @endif

                @if($order->pincode)
                    <div style="margin-top: 10px;">
                        <span class="pincode-badge">📮 PIN CODE: {{ $order->pincode }}</span>
                    </div>
                @endif
            </div>

            <!-- Order & Payment Info -->
            <div class="info-card">
                <div class="card-header">
                    <span>Order & Payment Summary</span>
                </div>
                <div style="font-size: 12px; margin-bottom: 8px;">
                    <strong>Order Number:</strong> <span style="font-family: monospace;">{{ $order->order_number }}</span>
                </div>
                <div style="font-size: 12px; margin-bottom: 8px;">
                    <strong>Payment Method:</strong> 
                    @if($order->payment_method === 'whatsapp')
                        <span style="color: #0f766e; font-weight: 700;">WhatsApp / Direct Pay</span>
                    @else
                        <span style="color: #1d4ed8; font-weight: 700;">Online (Razorpay)</span>
                    @endif
                </div>
                @if($order->razorpay_payment_id)
                    <div style="font-size: 11px; margin-bottom: 8px; color: #555;">
                        <strong>Payment ID:</strong> <span style="font-family: monospace;">{{ $order->razorpay_payment_id }}</span>
                    </div>
                @endif
                <div style="font-size: 12px; margin-bottom: 8px;">
                    <strong>Order Placed:</strong> {{ $order->created_at->format('d/m/Y h:i A') }}
                </div>
                <div style="font-size: 12px; margin-bottom: 8px;">
                    <strong>Fulfillment Status:</strong> 
                    <span style="font-weight: 800; text-transform: uppercase; color: #0f3d2e;">{{ $order->status }}</span>
                </div>
            </div>
        </div>

        <!-- Order Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 40px;" class="text-center">#</th>
                    <th>Product Description</th>
                    <th style="width: 90px;" class="text-center">Unit Size</th>
                    <th style="width: 90px;" class="text-right">Price</th>
                    <th style="width: 60px;" class="text-center">Qty</th>
                    <th style="width: 100px;" class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <div class="product-name">{{ $item->product_name }}</div>
                        </td>
                        <td class="text-center text-muted">{{ $item->unit_size ?? '-' }}</td>
                        <td class="text-right">₹{{ number_format($item->price, 2) }}</td>
                        <td class="text-center" style="font-weight: 700;">{{ $item->quantity }}</td>
                        <td class="text-right" style="font-weight: 700;">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Calculations -->
        <div class="calc-wrapper">
            <table class="calc-table">
                <tr>
                    <td class="label">Items Subtotal:</td>
                    <td class="value">₹{{ number_format($order->total_amount - ($order->shipping_amount ?? 0), 2) }}</td>
                </tr>
                <tr>
                    <td class="label">Shipping Charge:</td>
                    <td class="value">
                        @if(($order->shipping_amount ?? 0) > 0)
                            ₹{{ number_format($order->shipping_amount, 2) }}
                        @else
                            <span style="color: #0f766e;">FREE Shipping</span>
                        @endif
                    </td>
                </tr>
                <tr class="total-row">
                    <td class="label">Grand Total:</td>
                    <td class="value">₹{{ number_format($order->total_amount, 2) }}</td>
                </tr>
            </table>
        </div>

        <!-- Notes if present -->
        @if($order->notes)
            <div class="notes-box">
                <div class="notes-title">Customer Instructions / Doctor Consult Request</div>
                <div>{{ $order->notes }}</div>
            </div>
        @endif

        <!-- Dispatch Checklist -->
        <div class="checklist-grid">
            <div class="check-box">
                <strong>Courier Partner:</strong>
                <div class="check-line"></div>
            </div>
            <div class="check-box">
                <strong>Tracking / AWB No:</strong>
                <div class="check-line"></div>
            </div>
            <div class="check-box">
                <strong>Packed By:</strong>
                <div class="check-line"></div>
            </div>
            <div class="check-box">
                <strong>Dispatch Date:</strong>
                <div class="check-line"></div>
            </div>
        </div>

        <!-- Footer -->
        <div class="slip-footer">
            Thank you for trusting Yuvann Wellness Concepts with your health and wellbeing!<br>
            For support or reorders: WhatsApp <strong>+91 94473 65545</strong> | Visit <strong>yuvann.com</strong>
        </div>

    </div>

</body>
</html>
