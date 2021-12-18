<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now('Asia/Jakarta');
    }

    public function index(){

        return view('layouts.dashboard.roles.customer.index');
    }

    public function create(){

        return view('layouts.dashboard.roles.customer.create');
    }

    // public function checkout(){

    //     return view('layouts.dashboard.roles.customer.checkout');
    // }

    public function orderList(){

        return view('layouts.dashboard.roles.customer.show');
    }
}
