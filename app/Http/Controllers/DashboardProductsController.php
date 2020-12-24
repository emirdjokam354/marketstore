<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Admin\ProductGalleryRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries','category'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        return view('pages.dashboard-products', [
            'products'  => $products
        ]);
    }

    public function details(Request $request, $id)
    {
        $products = Product::with(['galleries','user','category'])->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard-products-details',[
            'products'  => $products,
            'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request){
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-products-details', $request->products_id);
    }

    public function deleteGallery($id){
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-products-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request){
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $galleries = [
            'products_id' => $product->id,
            'photos'      => $request->file('photo')->store('assets/product','public'),
        ];

        ProductGallery::create($galleries);

        return redirect()->route('dashboard-products');
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);
        
        return redirect()->route('dashboard-products');
    }

}
