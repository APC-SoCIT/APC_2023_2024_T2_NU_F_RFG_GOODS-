<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

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

    /* auth template start */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
    /* auth template end */


Route::get('/footer', function () {
    return view('footer.footer');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/admin/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/admin/product/save', [ProductController::class, 'save'])->name('product.save');
Route::get('/admin/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/admin/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/admin/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/home', function () {
    if (request('search')) {
        return view('search');
    } else {
        return view('home');
    }
})->name('home');

// Route::get('/login', function () {
//     return view('login.login');
// })->name('login');

Route::get('/search', function () {
    if (request('search')) {
        $products = Product::where('name','like','%' . request('search'). '%')->get();
    } else {
        $products = Product::all();
    }
    return view('search')->with('products', $products);
})->name('search');

