<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::with('items.details');

        if ($request->has('pending_only') === TRUE) {
            $data = $data->whereIn('status', ['pending', 'confirmed']);
        }

        $data = $data->latest()->get();

        return response($data);
    }

    public function show(Request $request, Order $order)
    {
        $order->load(['client.company', 'client.finishedOrders.items']);
        $order->load('items.details');
        $order->load('payment.histories');

        return response($order);
    }
}
