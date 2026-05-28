<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();

        $totalOrders = Order::count();

        $totalParticipants = Order::where(
            'status',
            'paid'
        )->count();

        $revenue = Order::where(
            'status',
            'paid'
        )->sum('total_price');

        return view('dashboard', compact(
            'totalEvents',
            'totalOrders',
            'totalParticipants',
            'revenue'
        ));
    }
}