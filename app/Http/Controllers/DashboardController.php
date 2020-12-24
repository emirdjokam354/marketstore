<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\TransactionDetails;
class DashboardController extends Controller
{
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = TransactionDetails::with(['transaction.user','product.galleries'])
                        ->whereHas('product', function($product){
                            $product->where('users_id',Auth::user()->id);
                        });

        $revenue = $transaction->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });

        $customer = User::count();
        return view('pages.dashboard', [
            'transactions_count' => $transaction->count(),
            'transactions_data' => $transaction->get(),
            'revenue' => $revenue,
            'customer' => $customer
        ]);
    }
    //
}
