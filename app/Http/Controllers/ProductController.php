<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index(){
        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->select('products.id','products.image','products.sku','products.name','products.price','product_categories.category','products.desc')
        ->get();
        return view('products.index', ['products' => $products]);
    }
    
    public function create(){
        $categoryList = ProductCategory::select('id','category')->get();
        return view('products.create')->with('categoryList', $categoryList);
    }

    public function save(Request $request){

        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required|decimal:2',
            'category_id' => 'required',
            'desc' => 'required',
        ]);

        $imageName = $request->sku.'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->desc = $request->desc;

        $product->save();

        return redirect(route('product.index'))->withSuccess('Product Successfully Added');
    }

    public function edit(Product $product){
        $categoryList = ProductCategory::select('id','category')->get();
        return view('products.edit', compact('product', 'categoryList'));
    }
            // return view('products.edit', ['product' => $product])->with('categoryList', $categoryList);

    public function update(Product $product, Request $request){

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required|decimal:2',
            'category_id' => 'required',
            'desc' => 'required',
        ]);

        if(isset($request->image)){
            $imageName = $request->sku.'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->desc = $request->desc;

        $product->update();

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product) {
        $product = Product::where('id',$product->id)->first();
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
