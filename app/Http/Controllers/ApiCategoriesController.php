<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryResource;

class ApiCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());

    }

}
