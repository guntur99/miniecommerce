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
Route::post('/customer/create-checkout', [App\Http\Controllers\CustomerController::class, 'createCheckout'])->name('create.checkout.customer')
    ->middleware(['customer']);
Route::get('/customer/checkout/{transaction_id}', [App\Http\Controllers\CustomerController::class, 'checkout'])->name('checkout.single.transaction.customer')
    ->middleware(['customer']);
Route::get('/customer/checkout', [App\Http\Controllers\CustomerController::class, 'checkoutList'])->name('checkout.transaction.customer')
    ->middleware(['customer']);
Route::post('/customer/update-transaction', [App\Http\Controllers\CustomerController::class, 'updateTransaction'])->name('update.transaction.customer')
    ->middleware(['customer']);
Route::get('/customer/history', [App\Http\Controllers\CustomerController::class, 'history'])->name('history.customer')
    ->middleware(['customer']);
Route::get('/customer/transactions/filter', [App\Http\Controllers\CustomerController::class, 'filterTransactions'])->name('filter.transactions')
    ->middleware(['customer']);


// Seller
Route::get('/seller/products', [App\Http\Controllers\SellerController::class, 'indexProduct'])->name('index.product.seller')
    ->middleware(['seller']);
Route::get('/seller/transaction', [App\Http\Controllers\SellerController::class, 'indexTransaction'])->name('index.transaction.seller')
    ->middleware(['seller']);
Route::post('/seller/transaction/create-checkout', [App\Http\Controllers\SellerController::class, 'createCheckout'])->name('create.checkout.seller')
    ->middleware(['seller']);
Route::get('/seller/transaction/{transaction_id}', [App\Http\Controllers\SellerController::class, 'detailTransaction'])->name('view.single.transaction.seller')
    ->middleware(['seller']);
Route::post('/seller/transaction/accept-transaction', [App\Http\Controllers\SellerController::class, 'acceptTransaction'])->name('accept.transaction.seller')
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


// Products
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create.products')
    ->middleware(['seller']);
Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store.products')
    ->middleware(['seller']);
Route::post('/products/update', [App\Http\Controllers\ProductController::class, 'update'])->name('update.products')
    ->middleware(['seller']);
Route::post('/products/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete.products')
    ->middleware(['seller']);
Route::get('/products/show', [App\Http\Controllers\ProductController::class, 'show'])->name('show.products')
    ->middleware(['seller']);
Route::get('/products/datatable', [App\Http\Controllers\ProductController::class, 'datatable'])->name('datatable.products')
    ->middleware(['seller']);
Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search.products')
    ->middleware(['auth']);
Route::get('/products/filter', [App\Http\Controllers\ProductController::class, 'filter'])->name('filter.products')
    ->middleware(['auth']);


require __DIR__.'/auth.php';
