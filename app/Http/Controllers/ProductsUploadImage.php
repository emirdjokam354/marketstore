<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProductGalleryRequest;
use App\ProductGallery;
use Illuminate\Http\Request;

class ProductsUploadImage extends Controller
{
    public function uploadGallery(ProductGalleryRequest $request){
        $data = $request->all();
        $data['photos'] = $request->file('photos')->store('assets/product','public');

        ProductGallery::create($data);
        return redirect()->route('dashboard-products-details', $request->products_id);
    }
    //
}
