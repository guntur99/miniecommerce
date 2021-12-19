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

    public function search(){

        request()->validate([
            'search' => ['required', 'string'],
        ]);

        $search = request()->search;
        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->where('products.name','like',"%".$search."%")
                        ->get();

        $categories = Category::get();

        return view('layouts.dashboard.roles.seller.products.index', [
            'products'      => $products,
            'categories'    => $categories,
        ]);

    }

    public function filter(){

        request()->validate([
            'category' => ['required', 'integer'],
        ]);

        $filter = request()->category;
        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->where('products.category', $filter)
                        ->get();

        $categories = Category::get();

        return view('layouts.dashboard.roles.seller.products.index', [
            'products'      => $products,
            'categories'    => $categories,
        ]);

    }
}
