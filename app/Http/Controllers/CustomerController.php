<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now('Asia/Jakarta');
    }

    public function index(){

        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->get();

        $categories = Category::get();

        return view('layouts.dashboard.roles.customer.index', [
            'products'      => $products,
            'categories'    => $categories,
            'filter'        => 0,
        ]);
    }

    public function create(){

        return view('layouts.dashboard.roles.customer.create');
    }

    public function checkout($id){

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

    public function createCheckout(){

        $items      = explode(',', request()->items);
        $products   = Product::whereIn('id', $items)->get();
        $code       = "TRANS-".date_format($this->now, 'YmdHis')."-".Auth::user()->id;

        $transactions                    = new Transaction;
        $transactions->customer_id       = Auth::user()->id;
        $transactions->status            = 1;
        $transactions->transaction_code  = $code;
        $transactions->save();

        foreach ($products as $key => $product) {
            $transaction_details                    = new TransactionDetail;
            $transaction_details->product_id        = $product->id;
            $transaction_details->price             = $product->price;
            $transaction_details->quantity          = rand(1,10);
            $transaction_details->transaction_id    = $transactions->id;
            $transaction_details->save();
        }

        return redirect()->route('checkout.single.transaction.customer', ['transaction_id' => $transactions->id]);
    }

    public function updateTransaction(){

        $transaction            = Transaction::find((int)request()->transaction_id);
        $transaction->amount    = request()->amount;
        $transaction->status    = 2;
        $transaction->save();

        return redirect()->route('orderList.customer');
    }

    public function checkoutList(){

        $transactions = Transaction::join('users', 'transactions.customer_id', '=', 'users.id')
                            ->join('transaction_status', 'transactions.status', '=', 'transaction_status.id')
                            ->select(array('transactions.*', 'users.name as customer_name', 'transaction_status.name as status_name'))
                            ->where('transactions.status', 1)
                            ->get();

        return view('layouts.dashboard.roles.customer.checkout-list', [
            'transactions' => $transactions,
        ]);
    }

    public function orderList(){

        $transactions = Transaction::join('users', 'transactions.customer_id', '=', 'users.id')
                            ->join('transaction_status', 'transactions.status', '=', 'transaction_status.id')
                            ->select(array('transactions.*', 'users.name as customer_name', 'transaction_status.name as status_name'))
                            ->get();
        // dd($transactions);
        return view('layouts.dashboard.roles.customer.show', [
            'transactions' => $transactions,
        ]);
    }
}
