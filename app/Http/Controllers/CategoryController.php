<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function show() {

        $categories = Category::all();

        return view('pages.categories', compact('categories'));
    }

    public function showAddForm()
    {

        $categories = Category::all();

        return view('pages.add_category', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_title' => 'required',
        ]);

        $category = Category::create([
            'category_title' => request('category_title')
            ]);

        return redirect('/categories');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return redirect('/categories');

    }
}
