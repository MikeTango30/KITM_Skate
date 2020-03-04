@extends('layouts.main')
@section('header')
    @component('_partials/header')
        @slot('title')
            <h3>Products</h3>
        @endslot
    @endcomponent
@stop
@section('content')
    <div class="container my-5">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col my-4">
                        <a class="bg-primary text-center p-3 text-white" href="{{ url('/product/add') }}">New product</a>
                        <a class="bg-primary text-center p-3 text-white" href="{{ url('/categories') }}">Categories</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ ucfirst($product->category_title)}}</td>
                            <td>{{ucfirst($product->product_title)}}</td>
                            <td>
                                <div class="img-fluid product-image">
                                    <img src="{{asset('storage/'.$product->img)}}" alt="skateboard">
                                </div>
                            </td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->total}}</td>
                            <td><a href="/product/update/form/{{$product->productId}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <button class="btn btn-danger rm-btn" data-title="{{ $product->product_title }}"
                                        data-id="{{ $product->productId }}" data-toggle="modal" data-target="#deleteModal">
                                    Remove
                                </button>
                            </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            {{ $products->links() }}
        </div>
    </div>
    <!-- Really Delete Modal -->
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger modal-confirm">Remove</a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(function () {
            $(".rm-btn").on('click', function () {
                let id = $(this).data('id');
                let title = $(this).data('title');
                let value = 'Remove Product: ' + title + '?';
                $("#deleteModal .modal-body").text(value);
                $('.modal-confirm').attr('href', '/product/delete/' + id);
            });
        });
    </script>
@stop
