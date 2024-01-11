<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index() {
        $inventoryList = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
        ->select('inventories.id','products.sku','products.name','inventories.is_received','inventories.quantity','inventories.created_at','inventories.updated_at')
        ->get();
        // $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
        // ->select('products.id','products.image','products.sku','products.name','products.price','product_categories.category','products.desc')
        // ->get();
        $productList = Product::select('id','sku','name')->get();
        return view('admin.inventories', ['inventoryList' => $inventoryList,'productList' => $productList]);
    }
}
