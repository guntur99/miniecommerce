<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class SellerController extends Controller
{
    public function indexProduct(){

        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->get();

        $categories = Category::get();

        return view('layouts.dashboard.roles.seller.products.index', [
            'products'      => $products,
            'categories'    => $categories,
        ]);
    }

    public function indexTransaction(){

        $transactions = Transaction::join('users', 'transactions.customer_id', '=', 'users.id')
                            ->join('transaction_status', 'transactions.status', '=', 'transaction_status.id')
                            ->select(array('transactions.*', 'users.name as customer_name', 'transaction_status.name as status_name'))
                            ->where('transactions.status', 2)
                            ->get();

        return view('layouts.dashboard.roles.seller.transactions.index', [
            'transactions' => $transactions,
        ]);
    }

    public function detailTransaction($id){

        $transactions   = Transaction::join('users', 'transactions.customer_id', '=', 'users.id')
                            ->select(array('transactions.*', 'users.name as customer_name'))
                            ->where('transactions.id', $id)
                            ->first();
        $transDetails   = TransactionDetail::where('transaction_id', $transactions->id)
                            ->join('products', 'transaction_details.product_id', '=', 'products.id')
                            ->select(array('transaction_details.*', 'products.name as product_name', 'products.description as product_description'))
                            ->get();

        return view('layouts.dashboard.roles.customer.checkout', [
            'transactions'  => $transactions,
            'transDetails'  => $transDetails,
        ]);
    }

    public function acceptTransaction(){

        $transaction            = Transaction::find((int)request()->transaction_id);
        $transaction->status    = 3;
        $transaction->save();

        return redirect()->route('report.seller');
    }

    public function checkout(){

        return view('layouts.dashboard.roles.seller.transactions.create');
    }

    public function report(){

        return view('layouts.dashboard.roles.seller.report');
    }
}
