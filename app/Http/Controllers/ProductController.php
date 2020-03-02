<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

    public function showAddForm()
    {

        $categories = Category::all();

        return view('pages.add_product', compact('categories'));
    }

    public function store()
    {
        //TODO
    }

    public function showUpdateForm()
    {
        //TODO
    }

    public function update()
    {
        //TODO
    }

    public function destroy(Product $product)
    {

        $product->delete();

        return redirect('/');

    }
}
