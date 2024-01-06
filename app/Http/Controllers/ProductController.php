<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }
    
    public function modify(){
        return view('products.modify');
    }

    public function save(Request $request){
        dd($request->name);
        $data = $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required|decimal',
            'category' => 'required',
            'description' => 'required',
        ]);

        $newProduct = Product::create($data);

        return view('products.index');
    }
}
