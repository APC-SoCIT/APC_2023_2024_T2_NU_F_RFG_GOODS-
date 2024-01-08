<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/footer', function () {
    return view('footer.footer');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    if (request('search')) {
        return view('search');
    } else {
        return view('home');
    }
})->name('home');

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/search', function () {
    if (request('search')) {
        $products = Product::where('name','like','%' . request('search'). '%')->get();
    } else {
        $products = Product::all();
    }
    return view('search')->with('products', $products);
})->name('search');

Route::get('/admin/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/admin/product/modify', [ProductController::class, 'modify'])->name('product.modify');
Route::post('/admin/product', [ProductController::class, 'save'])->name('product.save');