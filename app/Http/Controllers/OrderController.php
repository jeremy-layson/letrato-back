<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::with('items.details')
            ->latest()->get();

        return response($data);
    }
}
