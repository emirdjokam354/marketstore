<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::take(6)->get();
        $products = Product::with('galleries')->take(8)->get();
        return view('pages.home', [
            'category' => $category,
            'products'  => $products
        ]);
    }
}
