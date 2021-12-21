<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function __construct(){
        $this->now = Carbon::now('Asia/Jakarta');
    }

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

        return redirect()->route('show.products');

    }

    public function datatable(){

        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->get();

        return datatables()->of($products)->toJson();

    }

    public function show(){

        $categories = Category::get();

        return view('layouts.dashboard.roles.seller.products.show', [
            'categories' => $categories,
        ]);

    }

    public function update(){

        $product               = Product::find((int)request()->id);
        $product->name         = request()->name;
        $product->price        = request()->price;
        $product->stock        = request()->stock;
        $product->weight       = request()->weight;
        $product->category     = request()->category;
        $product->description  = request()->description;

        if(request()->thumbnail != null){
            $product->thumbnail  = request()->thumbnail;
        }
        $product->save();

        return response('Update Success', 200);

    }

    public function delete(){

        Product::find(request()->id)->delete();

        return response('Delete Success', 200);
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
            'filter'        => 0,
        ]);

    }

    public function filter(){

        request()->validate([
            'category' => ['required', 'integer'],
        ]);

        $filter = request()->category;
        $products = Product::join('categories', 'products.category', '=', 'categories.id')
                        ->select(array('products.*', 'categories.name as category_name'))
                        ->orWhere(function($query) use($filter) {
                            if($filter != 0)
                                $query->where('products.category', $filter);
                        })
                        ->get();

        $categories = Category::get();

        return view('layouts.dashboard.roles.seller.products.index', [
            'products'      => $products,
            'categories'    => $categories,
            'filter'        => $filter,
        ]);

    }
}
