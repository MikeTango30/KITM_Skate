<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProductResource::collection(Product::with('category')->paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return ProductResource::collection(Product::with('category')->paginate(10));

    }

    public function showById(Product $product)
    {
        return new ProductResource(Product::with('category')->find($product->id));

    }

    public function showByCategory(Category $category) {

        return ProductResource::collection(Product::with('category')->where('category_id', '=', $category->id)->paginate(10));
    }


}
