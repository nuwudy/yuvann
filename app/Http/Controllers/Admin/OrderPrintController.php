<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderPrintController extends Controller
{
    /**
     * Show a clean, browser-printable shipping slip and invoice.
     */
    public function print(Order $order)
    {
        $order->loadMissing('items');

        return view('admin.orders.print', [
            'order' => $order,
        ]);
    }

    /**
     * Generate and stream/download a PDF shipping slip and invoice.
     */
    public function pdf(Order $order)
    {
        $order->loadMissing('items');

        $pdf = Pdf::loadView('admin.orders.pdf', [
            'order' => $order,
        ])->setPaper('a4', 'portrait');

        $filename = "Yuvann-Order-{$order->order_number}.pdf";

        return $pdf->stream($filename);
    }
}
