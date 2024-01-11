<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index() {
        $inventory = Inventory::join('')->select('')->get();
        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.id','products.image','products.sku','products.name','products.price','product_categories.category','products.desc')
        ->get();
        $categoryList = ProductCategory::select('id','category')->get();
        return view('admin.inventory', ['products' => $products,'categoryList' => $categoryList]);
    }
}
