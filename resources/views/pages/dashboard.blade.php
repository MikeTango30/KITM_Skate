@extends('layouts.main')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 add-button">
                    <div class="btn btn-primary"><a href="{{ url('/product/add') }}">New product</a></div>
                </div>
                <div class="col-md-6 mb-3 add-button">
                    <div class="btn btn-primary"><a href="{{ url('/category/add') }}">New category</a></div>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped table-hover table-sm table-responsive">
                    <thead class="thead-dark">
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
                    <tr>
                        @foreach($products as $product)
                            <td>{{$product->category_title}}</td>
                            <td>{{$product->product_title}}</td>
                            <td>{{$product->img}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->total}}</td>
                            <th><a href="/product/update/form/{{$product->productId}}" class="btn btn-warning">Edit</a></th>
                            <th><a href="/product/delete/{{$product->productId}}" class="btn btn-danger">Remove</a></th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@stop
