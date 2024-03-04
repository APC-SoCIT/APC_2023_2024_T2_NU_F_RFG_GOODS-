<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class TutorialController extends Controller
{
    public function index(Request $request)
    {   
        $products = Product::
        join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
        ->select(
            'products.id',
            'products.image',
            'products.sku',
            'products.name',
            'products.price',
            'product_categories.category',
            'products.desc',
            'products.min_qty',
            'products.max_qty',
            'products.reorder_pt',
            DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
        )
        ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
        ->paginate(12);
        $categoryList = ProductCategory::select('id', 'category')->get();

        if($request->ajax()){
            $products = Product::
                        join('product_categories', 'products.category_id', '=', 'product_categories.id')
                        ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
                        ->select(
                            'products.id',
                            'products.image',
                            'products.sku',
                            'products.name',
                            'products.price',
                            'product_categories.category',
                            'products.desc',
                            'products.min_qty',
                            'products.max_qty',
                            'products.reorder_pt',
                            DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
                        )
                        ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
                        ->when($request->search_term, function($q)use($request){
                            $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
                        })
                        ->when($request->rating, function($q)use($request){
                            $q->where('avg_rating',$request->rating);
                        })
                        ->when($request->stock, function($q)use($request){
                            $q->where('computed_quantity',$request->stock);
                        })
                        ->when($request->category, function($q)use($request){
                            $q->where('category',$request->category);
                        })
                        ->paginate(12);

            return view('foreach', ['products' => $products, 'categoryList' => $categoryList])->render();
        }

        return view('tutorialView', ['products' => $products, 'categoryList' => $categoryList]);
    }

}
