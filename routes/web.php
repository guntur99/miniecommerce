<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Customer
Route::get('/customer/products', [App\Http\Controllers\CustomerController::class, 'index'])->name('index.product.customer')
    ->middleware(['customer']);
Route::get('/customer/products/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('create.product.customer')
    ->middleware(['customer']);
Route::post('/customer/create-new-order', [App\Http\Controllers\CustomerController::class, 'createOrder'])->name('createOrder.customer')
    ->middleware(['customer']);
// Route::get('/customer/checkout', [App\Http\Controllers\CustomerController::class, 'checkout'])->name('checkout.customer')
//     ->middleware(['customer']);
Route::get('/customer/order-list', [App\Http\Controllers\CustomerController::class, 'orderList'])->name('orderList.customer')
    ->middleware(['customer']);
Route::get('/customer/products-datatable', [App\Http\Controllers\CustomerController::class, 'productsDatatable'])->name('products.datatable.customer')
    ->middleware(['customer']);
Route::get('/customer/search-products', [App\Http\Controllers\CustomerController::class, 'searchProducts'])->name('searchProducts.customer')
    ->middleware(['customer']);
Route::get('/customer/filter-products', [App\Http\Controllers\CustomerController::class, 'filterProducts'])->name('filterProducts.customer')
    ->middleware(['customer']);


// Seller
Route::get('/seller/products', [App\Http\Controllers\SellerController::class, 'indexProduct'])->name('index.product.seller')
    ->middleware(['seller']);
Route::get('/seller/products/create', [App\Http\Controllers\SellerController::class, 'createProduct'])->name('create.product.seller')
    ->middleware(['seller']);
Route::post('/seller/products/create-new-product', [App\Http\Controllers\SellerController::class, 'createNewProduct'])->name('create.new.product.seller')
    ->middleware(['seller']);
Route::get('/seller/products/products-datatable', [App\Http\Controllers\SellerController::class, 'productsDatatable'])->name('products.datatable.seller')
    ->middleware(['seller']);
Route::post('/seller/products/update-product', [App\Http\Controllers\SellerController::class, 'update'])->name('update.product.seller')
    ->middleware(['seller']);
Route::post('/seller/products/delete-product', [App\Http\Controllers\SellerController::class, 'delete'])->name('delete.product.seller')
    ->middleware(['seller']);
Route::get('/seller/products/search-products', [App\Http\Controllers\SellerController::class, 'searchProducts'])->name('searchProducts.seller')
    ->middleware(['seller']);
Route::get('/seller/products/filter-products', [App\Http\Controllers\SellerController::class, 'filterProducts'])->name('filterProducts.seller')
    ->middleware(['seller']);

Route::get('/seller/transaction', [App\Http\Controllers\SellerController::class, 'indexTransaction'])->name('index.transaction.seller')
    ->middleware(['seller']);
Route::get('/seller/transaction/create', [App\Http\Controllers\SellerController::class, 'createTransaction'])->name('create.transaction.seller')
    ->middleware(['seller']);
Route::post('/seller/transaction/create-new-transaction', [App\Http\Controllers\SellerController::class, 'createNewTransaction'])->name('create.new.transaction.seller')
    ->middleware(['seller']);
Route::get('/seller/transaction/transactions-datatable', [App\Http\Controllers\SellerController::class, 'transactionsDatatable'])->name('transactions.datatable.seller')
    ->middleware(['seller']);
Route::post('/seller/transaction/update-transaction', [App\Http\Controllers\SellerController::class, 'update'])->name('update.transaction.seller')
    ->middleware(['seller']);
Route::post('/seller/transaction/delete-transaction', [App\Http\Controllers\SellerController::class, 'delete'])->name('delete.transaction.seller')
    ->middleware(['seller']);

Route::get('/seller/report', [App\Http\Controllers\SellerController::class, 'report'])->name('report.seller')
    ->middleware(['seller']);
Route::get('/seller/report/filter-by', [App\Http\Controllers\SellerController::class, 'filterReports'])->name('filterReports.seller')
    ->middleware(['seller']);



require __DIR__.'/auth.php';
