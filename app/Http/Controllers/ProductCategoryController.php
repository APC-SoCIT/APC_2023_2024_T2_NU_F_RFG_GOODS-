<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index(){
        $categoryList = ProductCategory::select('id','category')->get();
        return view('admin.categories', ['categoryList' => $categoryList]);
    }
    
    public function create(){
        $categoryList = ProductCategory::select('id','category')->get();
        return view('categories.create')->with('categoryList', $categoryList);
    }

    public function save(Request $request){
        $request->validate([
            'category' => 'required',
        ]);

        $category = new ProductCategory;
        $category->category = $request->category;

        $category->save();

        return redirect(route('category.index'))->withSuccess('Product Successfully Added');
    }

    public function update(ProductCategory $category, Request $request){

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000',
            'sku' => 'required',

        ]);

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
