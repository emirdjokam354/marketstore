<?php

namespace App\Http\Controllers;

use App\TransactionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardTransactionController extends Controller
{
    public function index()
    {
        $sellTransactions = TransactionDetails::with(['transaction.user','product.galleries'])
                        ->whereHas('product', function($product){
                            $product->where('users_id',Auth::user()->id);
                        });
        $buyTransaction = TransactionDetails::with(['transaction.user','product.galleries'])
                        ->whereHas('transaction', function($transaction){
                            $transaction->where('users_id',Auth::user()->id);
                        });
        return view('pages.dashboard-transactions',[
            'sell_transaksi' => $sellTransactions->get(),
            'buy_transaksi'  => $buyTransaction->get(),
        ]);
    }
    public function details(Request $request, $id)
    {
        $transaction = TransactionDetails::with(['transaction.user','product.galleries'])
                        ->findOrFail($id);
        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction
        ]);
    }
    public function update(Request $request, $id){
        $data = $request->all();
        $item = TransactionDetails::findOrFail($id);

        $item->update($data);
        return redirect()->route('dashboard-transaction-details',$id);
    }
}
