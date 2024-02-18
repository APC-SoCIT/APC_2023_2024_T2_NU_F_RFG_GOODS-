<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;

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
    if (request('search')) {
        return view('search');
    } else {
        return view('home');
    }
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/item', function () {
    return view('products.item');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('user/address/update', [UserAddressController::class, 'update'])->name('user.address.update');
    Route::get('/product/{product}', [ProductController::class, 'get'])->name('product.get');
    Route::get('/addtocart/{product}', [ProductController::class, 'addtocart'])->name('product.addtocart');
    Route::get('/cart', function () {
        return view('cart');
    });
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/admin/product/save', [ProductController::class, 'save'])->name('product.save');
    Route::get('/admin/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('/admin/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    
    Route::get('/admin/categories', [ProductCategoryController::class, 'index'])->name('category.index');
    Route::post('/admin/category/save', [ProductCategoryController::class, 'save'])->name('category.save');
    Route::get('/admin/category/{category}/edit', [ProductCategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/category/{category}/update', [ProductCategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/{category}/destroy', [ProductCategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/admin/inventory/save', [InventoryController::class, 'save'])->name('inventory.save');
    Route::get('/admin/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('/admin/inventory/{inventory}/update', [InventoryController::class, 'update'])->name('inventory.update');
    Route::get('/admin/inventory/{inventory}/destroy', [InventoryController::class, 'destroy'])->name('inventory.destroy');
});

require __DIR__.'/auth.php';
    /* auth template end */

Route::get('/footer', function () {
    return view('footer.footer');
});

Route::get('/', function () {
    if(Auth::id()) {
        $usertype=Auth()->user()->is_admin;
        if($usertype==0) 
        {
            return view('dashboard');
        } 
        else if ($usertype==1) 
        {
            return redirect()->to('/dashboard');
        }
        else
        {
            return redirect()->back();
        }
    } else {
        return view('home');
    }
});

Route::get('/login2', function () {
    return view('login.login');
});

Route::get('/product', function () {
    return view('product');
});

// Route::get('/search', function () {
//     if (request('search')) {
//         $products = Product::where('name','like','%' . request('search'). '%')->get();
//     } else {
//         $products = Product::all();
//     }
//     return view('search')->with('products', $products);
// })->name('search');

Route::get('/search/{search?}', [ProductController::class, 'search'])->name('search');

