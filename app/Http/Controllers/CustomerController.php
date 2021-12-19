<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
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

        return view('layouts.dashboard.roles.customer.index', [
            'products' => $products,
        ]);
    }

    public function create(){

        return view('layouts.dashboard.roles.customer.create');
    }

    public function checkout(){

        return view('layouts.dashboard.roles.customer.checkout');
    }

    public function orderList(){

        return view('layouts.dashboard.roles.customer.show');
    }
}
