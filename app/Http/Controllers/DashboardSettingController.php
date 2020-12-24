<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        if (Auth::user()->categories_id == null) {
            $kategori = '';
        }else{
            $kategori = User::with('category')->where('id',Auth::user()->id)->first();
        }
        return view('pages/dashboard-settings', [
            'user' => $user,
            'categories' => $categories,
            'kategori' => $kategori,
        ]);
    }
    public function account()
    {
        $user = Auth::user();
        return view('pages/dashboard-account',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);

        return redirect()->route($redirect);
    }
    //
}
