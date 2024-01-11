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
        $categoryList = ProductCategory::select('id','category')->get();
        return view('admin.products', ['products' => $products,'categoryList' => $categoryList]);
    }
    
    public function create(){
        $categoryList = ProductCategory::select('id','category')->get();
        return view('products.create')->with('categoryList', $categoryList);
    }

    public function save(Request $request){

        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:20000',
            'sku' => 'required',
            'name' => 'required',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
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

    public function update(Product $product, Request $request){

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000',
            'sku' => 'required',
            'name' => 'required',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => 'required',
            'desc' => 'required',
        ]);

        // Get the current image path and name
        $currentImage = public_path('products') . '/' . $product->image;

        if ($request->sku !== $product->sku) {
            // If the SKU is updated, rename the existing image file to match the new SKU
            $newImageName = $request->sku . '.' . pathinfo($product->image, PATHINFO_EXTENSION);
            rename($currentImage, public_path('products') . '/' . $newImageName);
            $product->image = $newImageName;
        }

        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->desc = $request->desc;

        if ($request->hasFile('image')) {
            // Check if an image is present in the request
            $imageName = $request->sku . '.' . $request->image->extension();

            // Move the new image and update the product's image attribute
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;

            // Remove the old image file if it exists
            if (file_exists($currentImage) && $product->image !== $imageName) {
                unlink($currentImage);
            }
        }

        $product->update();

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product) {
        $product = Product::where('id',$product->id)->first();
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }

    public function addtocart(Product $product){
        return redirect(route('product.index'));
    }
}
