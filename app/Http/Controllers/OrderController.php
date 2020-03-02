<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function show() {

        $orders = Order::select('*')->simplePaginate(10);

        return view('pages.dashboard', compact('orders'));
    }
}
