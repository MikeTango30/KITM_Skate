@extends('layouts/main')
@section('header')
    @component('_partials/header')
        @slot('title')
            <h3>Add new category</h3>
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
        <div class="row add-category">
            <div class="my-3">Today: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
            <form method="post" action="/category/store" class="p-5 bg-white w-100">
                @csrf
                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="catName">Category title</label>
                        <input type="text" id="catName" class="form-control" name="category_title">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="submit" value="Add"
                               class="btn btn-primary py-2 px-4 text-white">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
