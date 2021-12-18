<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function indexProduct(){

        return view('layouts.dashboard.roles.seller.products.index');
    }

    public function indexTransaction(){

        return view('layouts.dashboard.roles.seller.transactions.index');
    }

    public function createTransaction(){

        return view('layouts.dashboard.roles.seller.transactions.create');
    }

    public function report(){

        return view('layouts.dashboard.roles.seller.report');
    }
}
