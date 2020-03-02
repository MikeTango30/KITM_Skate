@extends('layouts.main')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 add-button">
                    <div class="btn btn-primary"><a href="{{ url('/add-listing') }}">Naujas skelbimas</a></div>
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
                        @foreach($listings as $listing)
                            <td>{{$listing->category_name}}</td>
                            <td>{{$listing->listing_title}}</td>
                            <td>{{$listing->description}}</td>
                            <td>{{$listing->price}}</td>
                            <td>{{$listing->location}}</td>
                            <th><a href="/listing/update/form/{{$listing->listingId}}" class="btn btn-warning">Koreguoti</a></th>
                            <th><a href="/listing/delete/{{$listing->listingId}}" class="btn btn-danger">Šalinti</a></th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $listings->links() }}
            </div>
        </div>
    </div>
@stop
