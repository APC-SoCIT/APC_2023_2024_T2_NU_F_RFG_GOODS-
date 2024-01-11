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
            'category' => 'required',
        ]);

        $category->category = $request->category;

        $category->update();

        return redirect(route('category.index'))->with('success', 'Product Updated Successfully');
    }

    public function destroy(ProductCategory $category) {
        $product = ProductCategory::where('id',$product->id)->first();
        $product->delete();
        return redirect(route('category.index'))->with('success', 'Product Deleted Successfully');
    }
}
