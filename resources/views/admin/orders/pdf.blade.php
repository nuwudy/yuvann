<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice #{{ $order->order_number }}</title>
    <style>
        @page {
            margin: 20mm 15mm 20mm 15mm;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #1a2e26;
            line-height: 1.4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .header-table td {
            vertical-align: top;
        }
        .brand-title {
            font-size: 20px;
            font-weight: bold;
            color: #0f3d2e;
        }
        .brand-subtitle {
            font-size: 9px;
            color: #4a6b5e;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 2px;
        }
        .brand-contact {
            font-size: 9px;
            color: #555;
            margin-top: 4px;
            line-height: 1.4;
        }
        .invoice-title {
            font-size: 15px;
            font-weight: bold;
            color: #0f3d2e;
            text-align: right;
            text-transform: uppercase;
        }
        .order-id {
            font-size: 13px;
            font-weight: bold;
            color: #0f3d2e;
            text-align: right;
            margin-top: 2px;
        }
        .order-meta {
            font-size: 9px;
            color: #555;
            text-align: right;
            margin-top: 2px;
        }
        .divider {
            border-bottom: 2px solid #0f3d2e;
            margin: 12px 0 16px 0;
        }
        .section-box {
            border: 1px solid #c8d8d1;
            padding: 10px;
            background: #fafcfb;
            margin-bottom: 14px;
        }
        .section-box.highlight {
            border: 2px solid #0f3d2e;
            background: #ffffff;
        }
        .section-title {
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            color: #0f3d2e;
            border-bottom: 1px solid #dce6e1;
            padding-bottom: 4px;
            margin-bottom: 6px;
        }
        .customer-name {
            font-size: 13px;
            font-weight: bold;
            color: #0f3d2e;
            margin-bottom: 2px;
        }
        .phone-line {
            font-size: 10px;
            font-weight: bold;
            color: #222;
        }
        .address-text {
            font-size: 10px;
            color: #333;
            margin-top: 4px;
        }
        .pincode-box {
            display: inline-block;
            background: #0f3d2e;
            color: #ffffff;
            font-weight: bold;
            font-size: 11px;
            padding: 3px 8px;
            margin-top: 6px;
        }
        .landmark-box {
            font-size: 10px;
            color: #555;
            margin-top: 4px;
        }
        .items-table {
            margin-top: 10px;
            margin-bottom: 14px;
        }
        .items-table th {
            background: #0f3d2e;
            color: #ffffff;
            font-size: 9px;
            text-transform: uppercase;
            padding: 6px 8px;
            text-align: left;
        }
        .items-table td {
            padding: 6px 8px;
            border-bottom: 1px solid #e1e9e5;
            font-size: 10px;
        }
        .items-table tr:nth-child(even) td {
            background: #fbfdfc;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .calc-table {
            width: 260px;
            float: right;
            margin-bottom: 14px;
        }
        .calc-table td {
            padding: 4px 6px;
            font-size: 10px;
        }
        .total-row td {
            border-top: 2px solid #0f3d2e;
            font-size: 12px;
            font-weight: bold;
            color: #0f3d2e;
            padding-top: 6px;
        }
        .clearfix {
            clear: both;
        }
        .notes-box {
            border: 1px dashed #c49b29;
            background: #fffdf5;
            padding: 8px 10px;
            font-size: 9px;
            margin-bottom: 14px;
        }
        .checklist-table td {
            border: 1px solid #c8d8d1;
            padding: 6px 8px;
            font-size: 9px;
            background: #fbfdfc;
        }
        .footer {
            border-top: 1px solid #dce6e1;
            padding-top: 10px;
            text-align: center;
            font-size: 9px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header Table -->
    <table class="header-table">
        <tr>
            <td style="width: 60%;">
                <div class="brand-title">YUVANN WELLNESS</div>
                <div class="brand-subtitle">Natural Healing & Wellness Concepts</div>
                <div class="brand-contact">
                    Dr. Sajeev Dev, Wayanad & Calicut, Kerala, India<br>
                    Customer Care / WhatsApp: +91 94473 65545<br>
                    FSSAI Lic. No: 21325185000809 | Website: https://yuvann.com
                </div>
            </td>
            <td style="width: 40%; text-align: right;">
                <div class="invoice-title">Shipping Slip & Invoice</div>
                <div class="order-id">#{{ $order->order_number }}</div>
                <div class="order-meta">Date: {{ $order->created_at->format('d-M-Y h:i A') }}</div>
                <div class="order-meta">Mode: {{ $order->payment_method === 'whatsapp' ? 'WhatsApp Order' : 'Online (Razorpay)' }}</div>
                <div class="order-meta">Status: <strong>{{ strtoupper($order->status) }}</strong></div>
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <!-- Address Table -->
    <table>
        <tr>
            <!-- Deliver To (Customer Shipping Address) -->
            <td style="width: 62%; vertical-align: top; padding-right: 12px;">
                <div class="section-box highlight">
                    <div class="section-title">DELIVER TO (SHIPPING DESTINATION)</div>
                    <div class="customer-name">{{ $order->customer_name }}</div>
                    <div class="phone-line">Primary Phone: {{ $order->customer_phone }}</div>
                    @if($order->alternate_phone)
                        <div class="phone-line">Alternate Phone: {{ $order->alternate_phone }}</div>
                    @endif
                    @if($order->customer_email)
                        <div style="font-size: 9px; color: #555;">Email: {{ $order->customer_email }}</div>
                    @endif

                    <div class="address-text">{{ $order->shipping_address }}</div>

                    @if($order->landmark)
                        <div class="landmark-box"><strong>Landmark:</strong> {{ $order->landmark }}</div>
                    @endif

                    @if($order->pincode)
                        <div style="margin-top: 6px;">
                            <span class="pincode-box">PIN CODE: {{ $order->pincode }}</span>
                        </div>
                    @endif
                </div>
            </td>

            <!-- Order / Dispatch Meta -->
            <td style="width: 38%; vertical-align: top;">
                <div class="section-box">
                    <div class="section-title">ORDER SUMMARY</div>
                    <div style="font-size: 10px; margin-bottom: 4px;"><strong>Order ID:</strong> {{ $order->order_number }}</div>
                    <div style="font-size: 10px; margin-bottom: 4px;"><strong>Payment:</strong> {{ $order->payment_method === 'whatsapp' ? 'WhatsApp / Direct' : 'Online (Razorpay)' }}</div>
                    @if($order->razorpay_payment_id)
                        <div style="font-size: 9px; margin-bottom: 4px; color: #555;"><strong>Ref ID:</strong> {{ $order->razorpay_payment_id }}</div>
                    @endif
                    <div style="font-size: 10px; margin-bottom: 4px;"><strong>Order Date:</strong> {{ $order->created_at->format('d/m/Y') }}</div>
                    <div style="font-size: 10px;"><strong>Status:</strong> {{ strtoupper($order->status) }}</div>
                </div>
            </td>
        </tr>
    </table>

    <!-- Items Table -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 30px;" class="text-center">#</th>
                <th>Item Description</th>
                <th style="width: 70px;" class="text-center">Unit</th>
                <th style="width: 70px;" class="text-right">Price</th>
                <th style="width: 45px;" class="text-center">Qty</th>
                <th style="width: 80px;" class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $item->product_name }}</strong></td>
                    <td class="text-center">{{ $item->unit_size ?? '-' }}</td>
                    <td class="text-right">Rs. {{ number_format($item->price, 2) }}</td>
                    <td class="text-center"><strong>{{ $item->quantity }}</strong></td>
                    <td class="text-right"><strong>Rs. {{ number_format($item->price * $item->quantity, 2) }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Calculations -->
    <div class="clearfix">
        <table class="calc-table">
            <tr>
                <td style="color: #555;">Items Subtotal:</td>
                <td class="text-right"><strong>Rs. {{ number_format($order->total_amount - ($order->shipping_amount ?? 0), 2) }}</strong></td>
            </tr>
            <tr>
                <td style="color: #555;">Shipping Fee:</td>
                <td class="text-right">
                    @if(($order->shipping_amount ?? 0) > 0)
                        Rs. {{ number_format($order->shipping_amount, 2) }}
                    @else
                        FREE
                    @endif
                </td>
            </tr>
            <tr class="total-row">
                <td>Total Payable:</td>
                <td class="text-right">Rs. {{ number_format($order->total_amount, 2) }}</td>
            </tr>
        </table>
    </div>

    @if($order->notes)
        <div class="notes-box">
            <strong>Customer Instructions:</strong> {{ $order->notes }}
        </div>
    @endif

    <!-- Checklist Table -->
    <table class="checklist-table" style="margin-top: 10px;">
        <tr>
            <td style="width: 25%;"><strong>Courier Partner:</strong><br>&nbsp;</td>
            <td style="width: 25%;"><strong>Tracking / AWB No:</strong><br>&nbsp;</td>
            <td style="width: 25%;"><strong>Packed By:</strong><br>&nbsp;</td>
            <td style="width: 25%;"><strong>Dispatch Date:</strong><br>&nbsp;</td>
        </tr>
    </table>

    <!-- Footer -->
    <div class="footer">
        Thank you for choosing Yuvann Wellness Concepts!<br>
        For inquiries or reorders: WhatsApp <strong>+91 94473 65545</strong> | Website: <strong>yuvann.com</strong>
    </div>

</body>
</html>
