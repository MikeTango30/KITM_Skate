@extends('layouts/main')
@section('header')
    @component('_partials/header')
        @slot('title')
            <h3>Update Order</h3>
        @endslot
    @endcomponent
@stop
@section('content')
    <div class="container">
        <div class="row errors">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row add-new">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title text-fiord-blue">
                            Order information:
                        </h5>
                        <ul class="card-text d-inline-block mb-3">
                            <li>Order ID: {{ $order->id }}</li>
                            <li>Customer: {{ json_decode($order->user_info)->name }}</li>
                            <li>Items: {{ json_decode($order->items)->item }}</li>
                            <li>Total: {{ $order->total }}</li>
                            <li>Current state: {{ ucfirst($currentState->state) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <form method="post" action="/order/update/{{ $order->id }}" class="p-5 bg-white w-100">
                @csrf
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="stateName">Order State</label>
                        <select id="stateName" name="state_id" class="form-control">
                            <option selected value="{{ $order->state_id }}">{{ ucfirst($currentState->state) }}</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id}}">{{ ucfirst($state->state) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6">
                        <input type="submit" value="Update" class="btn btn-primary py-2 px-4 text-white">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
