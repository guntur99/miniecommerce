<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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

        return view('layouts.dashboard.roles.seller.transactions.index');
    }

    public function checkout(){

        return view('layouts.dashboard.roles.seller.transactions.create');
    }

    public function report(){

        return view('layouts.dashboard.roles.seller.report');
    }
}
