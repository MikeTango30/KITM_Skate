@extends('layouts/main')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="row mt-5 my-2">
                        <div class="col-md-6 mb-3 add-button">
                            <a class="bg-primary text-center p-3 text-white" href="{{ url('/category/add') }}">New Category</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Category ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ ucfirst($category->category_title) }}</td>
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
                                                <a href="{{ url('/category/delete/'.$category->id) }}" class="btn btn-danger">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@stop