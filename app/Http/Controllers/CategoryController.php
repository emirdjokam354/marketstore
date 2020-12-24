<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        $products = Product::with('galleries')->paginate(32);
        return view('pages.category', [
            'category' => $category,
            'products'  => $products
        ]);
    }
    public function detail(Request $request, $slug)
    {
        $category = Category::all();
        $categories = Category::where('slug',$slug)->firstOrFail();
        $products = Product::with('galleries')->where('categories_id',$categories->id)->paginate(32);
        return view('pages.category', [
            'category' => $category,
            'products'  => $products
        ]);
    }
    //
}
