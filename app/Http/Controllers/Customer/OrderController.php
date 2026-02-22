<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('orderItems.product', 'address');
        return view('customer.orders.show', compact('order'));
    }
}
