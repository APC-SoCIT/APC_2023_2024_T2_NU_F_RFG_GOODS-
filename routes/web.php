<?php

use Illuminate\Support\Facades\Route;



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
    return view('search');
});
Route::get('/login', function () {
    return view('login.login');
})->name('login');

use App\Http\Controllers\ProductController;
Route::get('/admin/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/admin/product/modify', [ProductController::class, 'modify'])->name('product.modify');
Route::post('/admin/product', [ProductController::class, 'save'])->name('product.save');