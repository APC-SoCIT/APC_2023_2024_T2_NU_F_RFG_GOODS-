<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;

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

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/item', function () {
    return view('products.item');
});

Route::get('/order-page', function () {
    return view('order-page');
});

Route::get('/product/{product}', [ProductController::class, 'get'])->name('product.get');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/ph-json/region.json', function () {
    $jsonFilePath = public_path('/ph-json/region.json');
    if (File::exists($jsonFilePath)) {
        $jsonContent = File::get($jsonFilePath);
        $jsonData = json_decode($jsonContent);
        return response()->json($jsonData);
    } else {
        // Return a 404 response if the file doesn't exist
        return response()->json(['error' => 'File not found'], 404);
    }
})->name('address.region');

Route::get('/profile/ph-json/region.json', function () {
    $jsonFilePath = public_path('/ph-json/region.json');
    if (File::exists($jsonFilePath)) {
        $jsonContent = File::get($jsonFilePath);
        $jsonData = json_decode($jsonContent);
        return response()->json($jsonData);
    } else {
        // Return a 404 response if the file doesn't exist
        return response()->json(['error' => 'File not found'], 404);
    }
})->name('address.region');

Route::get('/profile/ph-json/region.json', [AddressController::class, 'region'])->name('address.region');
Route::get('/profile/ph-json/province.json', [AddressController::class, 'province'])->name('address.province');
Route::get('/profile/ph-json/city.json', [AddressController::class, 'city'])->name('address.city');
Route::get('/profile/ph-json/barangay.json', [AddressController::class, 'barangay'])->name('address.barangay');

Route::post('/addtocart', [CartController::class, 'addtocart'])->name('product.addtocart');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::put('user/address/update', [UserAddressController::class, 'update'])->name('user.address.update');
    Route::patch('user/address/update', [AddressController::class, 'addressupdate'])->name('profile.addressUpdate');
    Route::post('/updatecart', [CartController::class, 'updatecart'])->name('product.updatecart');
    Route::get('/cart', [CartController::class, 'userCart'])->name('product.userCart');
    Route::get('/profile/orders/history', [OrderController::class, 'getOrderItems'])->name('orders.orderHistory');
    Route::get('/profile/address', [AddressController::class, 'viewList'])->name('address.viewList');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/admin/product/save', [ProductController::class, 'save'])->name('product.save');
    Route::put('/admin/product/update', [ProductController::class, 'update'])->name('product.update');
    Route::put('/admin/product/archive', [ProductController::class, 'archive'])->name('product.archive');
    Route::put('/admin/product/activate', [ProductController::class, 'activate'])->name('product.activate');
    
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

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/admin/orders/save', [OrderController::class, 'save'])->name('orders.save');
    Route::get('/admin/orders/{orders}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/admin/orders/{orders}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/admin/orders/{orders}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
});

require __DIR__.'/auth.php';
    /* auth template end */

Route::get('/footer', function () {
    return view('footer.footer');
});

Route::get('/admin/delivery', function () {
    return view('admin.delivery');
})->name('admin.delivery');

Route::get('/', function () {
    if(Auth::id() && Auth()->user()!=null) {
        $usertype=Auth()->user()->is_admin;
        if($usertype==0) 
        {
            return view('home');
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

Route::get('/product', function () {
    return view('product');
});

Route::get('/search', [ProductController::class, 'search'])->name('search');

