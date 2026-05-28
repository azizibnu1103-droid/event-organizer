<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Event;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::with('event')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'orders.index',
            compact('orders')
        );
    }

    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);

        Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'quantity' => 1,
            'total_price' => $event->price,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Tiket berhasil dipesan.');
    }
}