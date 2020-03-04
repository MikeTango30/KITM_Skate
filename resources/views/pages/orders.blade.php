@extends('layouts.main')
@section('header')
    @component('_partials/header')
        @slot('title')
            <h3>Orders</h3>
        @endslot
    @endcomponent
@stop
@section('content')
    <div class="container my-5">
        <div class="card card-small mb-4">
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">User info</th>
                        <th scope="col">Items</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->orderId }}</td>
                            <td>{{ json_decode($order->user_info)->name }}</td>
                            <td>{{ json_decode($order->items)->item }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->created_at }}</td>
                            <th><a href="/order/update/form/{{$order->orderId}}" class="btn btn-warning">Edit</a></th>
                            <th>
                                <button class="btn btn-danger rm-btn" data-id="{{ $order->orderId }}" data-toggle="modal" data-target="#deleteModal">
                                    Remove
                                </button>
                            </th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            {{ $orders->links() }}
        </div>
    </div>
{{--    Modal--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm remove</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                    </button>
                    <a class="modal-confirm btn btn-danger" href="#">Remove</a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(function () {
            $(".rm-btn").on('click', function () {
                let orderId = $(this).data('id');
                let value = 'Remove ORDER ID: ' + orderId + '?';
                $("#deleteModal .modal-body").text(value);
                $('.modal-confirm').attr('href', '/order/delete/' + orderId);
            });
        });
    </script>
@stop
