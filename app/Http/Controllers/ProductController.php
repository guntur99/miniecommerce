<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function create(){

        $categories = Category::get();

        return view('layouts.dashboard.roles.seller.products.create', [
            'categories' => $categories,
        ]);
    }

    public function store(){

        $user = Auth::id() == 1 ? 'customer' : 'seller';

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
        ]);

        $product                = new Product;
        $product->name          = request()->name;
        $product->category      = request()->category;
        $product->price         = request()->price;
        $product->stock         = request()->stock;
        $product->weight        = request()->weight;
        $product->description   = request()->description;

        if (request()->hasFile('thumbnail')) {
            $fileName           = time().'_'.request()->thumbnail->getClientOriginalName();
            $filePath           = request()->thumbnail->storeAs('thumbnails', $fileName, 'public');
            $product->thumbnail = $fileName;
        }

        $product->save();

        return redirect()->route('index.product.' . $user);

    }
}
