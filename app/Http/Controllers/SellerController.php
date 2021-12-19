<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SellerController extends Controller
{
    public function indexProduct(){

        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->get();

        return view('layouts.dashboard.roles.seller.products.index', [
            'products' => $products,
        ]);
    }

    public function checkout(){

        return view('layouts.dashboard.roles.seller.transactions.index');
    }

    public function createTransaction(){

        return view('layouts.dashboard.roles.seller.transactions.create');
    }

    public function report(){

        return view('layouts.dashboard.roles.seller.report');
    }
}
