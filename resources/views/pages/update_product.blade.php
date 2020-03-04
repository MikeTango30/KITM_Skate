@extends('layouts/main')
@section('header')
    @component('_partials/header')
        @slot('title')
            <h3>Update Product</h3>
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
            <div class="my-3">Today: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
            <form method="post" action="/product/update/{{ $product->id }}" class="p-5 bg-white w-100" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="catName">Category Name</label>
                        <select id="catName" name="category_id" class="form-control">
                            <option selected value="{{ $product->category_id }}">{{ ucfirst($currentCategory->category_title) }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id}}">{{ ucfirst($category->category_title) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="productTitle">Product title</label>
                        <input type="text" id="productTitle" class="form-control" name="product_title" value="{{ $product->product_title }}">
                    </div>
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="productDescription">Description</label>
                        <input type="text" id="productDescription" class="form-control" name="description" value="{{ $product->description }}">
                    </div>
                    <div class="form-group custom-file offset-md-3 col-md-6 mb-3 mb-md-0 my-2">
                        <input type="file" class="custom-file-input text-black" name="img" id="productImage" lang="lt">
                        <label class="custom-file-label text-black" for="productImage">Choose file</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="offset-md-3 col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="quantity">Quantity</label>
                        <input type="text" id="quantity" name="total" class="form-control" value="{{ $product->total }}">
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
