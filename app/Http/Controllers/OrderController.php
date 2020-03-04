<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderState;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function show()
    {

        $orders = Order::select('*', \DB::raw("orders.id as orderId"))
            ->join('order_states', 'orders.state_id', '=', 'order_states.id')
            ->where('active', '=', true)
            ->simplePaginate(10);

        return view('pages.orders', compact('orders'));
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

        $states = OrderState::all();
        $stateId = $order->getAttribute('id');
        $currentState = OrderState::select('state')->find($stateId);

        return view('pages.update_order_state', compact('order', 'states', 'currentState'));
    }

    public function updateState(Request $request,Order $order)
    {
        $validateData = $request->validate([
           'state_id' => 'required'
        ]);

        Order::where('id', $order->getAttribute('id'))->update(['state_id' => $request->get('state_id')]);

        return redirect('/orders');
    }

    public function remove(Order $order)
    {
        Order::where('id', $order->getAttribute('id'))->update(['active' => false]);

        return redirect('/orders');
    }
}
