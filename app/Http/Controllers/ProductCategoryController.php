<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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

    // public function update(ProductCategory $category, Request $request){

    //     $request->validate([
    //         'category' => 'required',
    //     ]);

    //     $category->category = $request->category;

    //     $category->update();

    //     return redirect(route('category.index'))->with('success', 'Product Updated Successfully');
    // }


    public function update(ProductCategory $category, Request $request){

        $request->validate([
            'category' => 'required',
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Step 1: Update the product category
            $category->category = $request->category;
            $category->update();    

            // Step 2: Update the foreign key in the products table
            $oldCategoryId = $category->getOriginal('id');
            $newCategoryId = $category->id;

            $products = Product::where('category_id', $oldCategoryId)->get();

            foreach ($products as $product) {
                $product->category_id = $newCategoryId;
                $product->save();
            }

            // Commit the transaction if all steps are successful
            DB::commit();

            return redirect(route('category.index'))->with('success', 'Category Updated Successfully');
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();

            return redirect(route('category.index'))->with('error', 'Failed to update category. ' . $e->getMessage());
        }
    }


    public function destroy(ProductCategory $category) {
        $product = ProductCategory::where('id',$product->id)->first();
        $product->delete();
        return redirect(route('category.index'))->with('success', 'Product Deleted Successfully');
    }
}
