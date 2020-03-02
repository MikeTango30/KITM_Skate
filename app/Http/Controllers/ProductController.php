<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function show() {

        $products = Product::select('*', \DB::raw("products.id as productsId"))
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->simplePaginate(10);

        return view('pages.dashboard', compact('products'));
    }
}
