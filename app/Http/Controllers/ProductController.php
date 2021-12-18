<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function create(){

        return view('layouts.dashboard.roles.seller.products.create');
    }
}
