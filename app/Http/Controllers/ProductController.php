<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function show() {

        $products = Product::select('*', \DB::raw("products.id as productId"))
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('active', '=', true)
            ->simplePaginate(10);

        return view('pages.dashboard', compact('products'));
    }

    public function showAddForm()
    {

        $categories = Category::all();

        return view('pages.add_product', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'catId' => 'required',
            'title' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'price' => 'required',
            'img' => 'mimes:jpeg, jpg, png, gif|max:10000'
        ]);
        $filename = null;
        if ($request->file('img')) {
            $path = $request->file('img')->store('public/images');
            $filename = str_replace('public/', "", $path);
        }

        $listing = Product::create([
            'category_id' => request('catId'),
            'product_title' => request('title'),
            'description' => request('description'),
            'img' => $filename,
            'price' => request('price'),
            'total' => request('quantity'),
        ]);

        return redirect('/');
    }

    public function showUpdateForm(Product $product)
    {

        $categories = Category::all();
        $categoryId = $product->getAttribute('category_id');
        $currentCategory = Category::select('category_title')->find($categoryId);

        return view('pages.update_product', compact('product', 'categories', 'currentCategory'));
    }

    public function update(Request $request,Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'product_title' => 'required',
            'total' => 'required',
            'description' => 'required',
            'price' => 'required',
            'img' => 'mimes:jpeg, jpg, png, gif|max:10000'
        ]);

        Product::where('id', $product->getAttribute('id'))->update($request->except(['_token']));

        return redirect('/');
    }

    public function remove(Request $request,Product $product)
    {

        Product::where('id', $product->getAttribute('id'))->update(['active' => false]);

        return redirect('/');

    }
}
