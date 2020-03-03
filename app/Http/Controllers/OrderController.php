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

    public function show()
    {

        $orders = Order::select('*')->simplePaginate(10);

        return view('pages.dashboard', compact('orders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_info' => 'required',
            'items' => 'required',
            'total' => 'required',
        ]);

        $order = Order::create([
            'user_info' => request('user_info'),
            'items' => request('items'),
            'total' => request('total'),
        ]);

        return response([
            'validatedData' => $validatedData
        ]);

    }

    public function showUpdateStateForm(Order $order)
    {

        return view('pages.update_order_state', compact('order'));
    }

    public function updateState(Order $order)
    {

        Order::where('id', $order->getAttribute('id'))->update(['state' => $order->getAttribute('state')]);

        return redirect('/orders');
    }

    public function remove(Order $order)
    {
        Order::where('id', $order->getAttribute('id'))->update(['active' => false]);

        return redirect('/orders');
    }
}
