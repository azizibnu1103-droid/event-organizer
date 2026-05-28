<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with([
            'order.user',
            'order.event'
        ])->latest()->get();

        return view(
            'admin.payments.index',
            compact('payments')
        );
    }

    public function upload(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $order = Order::findOrFail(
            $request->order_id
        );

        $path = $request->file('proof')
            ->store('payments', 'public');

        Payment::create([
            'order_id' => $order->id,
            'proof' => $path,
            'amount' => $order->total_price,
            'status' => 'pending',
        ]);

        return back()->with(
            'success',
            'Bukti pembayaran berhasil dikirim'
        );
    }

    public function approve($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => 'approved'
        ]);

        $payment->order->update([
            'status' => 'paid',
            'ticket_code' =>
                'TKT-' . strtoupper(substr(md5(time()), 0, 10))
        ]);

        return back()->with(
            'success',
            'Pembayaran berhasil disetujui'
        );
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'status' => 'rejected'
        ]);

        return back()->with(
            'success',
            'Pembayaran ditolak'
        );
    }
}