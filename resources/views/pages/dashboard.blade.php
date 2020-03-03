@extends('layouts.main')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col mb-4">
                <a class="bg-primary text-center p-3 text-white" href="{{ url('/product/add') }}">New product</a>
                <a class="bg-primary text-center p-3 text-white" href="{{ url('/categories') }}">Categories</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-hover table-sm table-responsive">
                <thead class="thead-light">
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
                        <th><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        Remove
                                    </button>
                        </th>
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
                                        Remove task?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="/product/delete/{{$product->productId}}" class="btn btn-danger">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@stop
