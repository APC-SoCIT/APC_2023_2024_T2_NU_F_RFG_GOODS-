<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Rating;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function getProduct($id){

        $product = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
            'products.stock',
            'products.status'
        )
        ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 
        'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt',
        'products.stock',
        'products.status')
        ->find($id);
        $categoryList = ProductCategory::select('id', 'category')->get();

        return response()->json(['product' => $product,'categoryList' => $categoryList]);

    }

    public function search(Request $request) {   
        $search = $request->input('search');

        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
            'products.stock',
            'products.status',
            'products.rating'
        )
        ->where('products.status','!=','archived')
        ->when($request->input('search'), function($q)use($request){
            $q->where('products.name', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->input('search')) . '%'])
            ->where('products.status','!=','archived');
        })
        ->paginate(12);
        $categoryList = ProductCategory::select('id', 'category')->get();

        if($request->ajax()){
            $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
                            'products.stock',
                            'products.status',
                            'products.rating',
                            'products.created_at'
                        )
                        ->whereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%'])
                        ->where('products.status','!=','archived')
                        ->when($request->sort_by, function($q)use($request){
                            if ($request->sort_by != "default") {
                                if ($request->sort_by == 'sort_by_name_asc') {
                                    $q->orderBy('name','asc');
                                } else if ($request->sort_by == 'sort_by_name_desc') {
                                    $q->orderBy('name','desc');
                                } else if ($request->sort_by == 'sort_by_price_asc') {
                                    $q->orderBy('price','asc');
                                } else if ($request->sort_by == 'sort_by_price_desc') {
                                    $q->orderBy('price','desc');
                                } else if ($request->sort_by == 'sort_by_stock_asc') {
                                    $q->orderBy('stock','asc');
                                } else if ($request->sort_by == 'sort_by_stock_desc') {
                                    $q->orderBy('stock','desc');
                                } else if ($request->sort_by == 'sort_by_rating_asc') {
                                    $q->orderBy('rating','asc');
                                } else if ($request->sort_by == 'sort_by_rating_desc') {
                                    $q->orderBy('rating','desc');
                                } else if ($request->sort_by == 'sort_by_date_asc') {
                                    $q->orderBy('created_at','asc');
                                } else if ($request->sort_by == 'sort_by_date_desc') {
                                    $q->orderBy('created_at','desc');
                                } 
                            }
                        })
                        ->when($request->selectedCategories !== null && is_array($request->selectedCategories), function($q) use ($request) {
                            if (!in_array("default", $request->selectedCategories)) {
                                $q->whereIn('category_id', $request->selectedCategories);
                            }
                        })
                        ->when($request->filter_status, function($q)use($request){
                            if ($request->filter_status != "default") {
                                $q->where('products.status', 'LIKE', '%' . $request->filter_status . '%');
                            }
                        })
                        ->when($request->filter_stock, function($q)use($request){
                            if ($request->filter_stock != "default") {
                                if ($request->filter_stock == "belowmin") {
                                    $q->where('stock', '<', DB::raw('min_qty'));
                                } else if ($request->filter_stock == "belowrop") {
                                    $q->where('stock', '<', DB::raw('reorder_pt'));
                                } else if ($request->filter_stock == "healthy") {
                                    $q->where('stock', '>=', DB::raw('reorder_pt'))
                                    ->where('stock', '<=', DB::raw('max_qty'));
                                } else if ($request->filter_stock == "abovemax") {
                                    $q->where('stock', '>', DB::raw('max_qty'));
                                }
                            }
                        })
                        
                        ->when(in_array('5', $request->selectedRatings), function($q) {
                            $q->where('rating', '=', 5);
                        })
                        ->when(in_array('4', $request->selectedRatings), function($q) {
                            $q->where('rating', '=', 4);
                        })
                        ->when(in_array('3', $request->selectedRatings), function($q) {
                            $q->where('rating', '=', 3);
                        })
                        ->when(in_array('2', $request->selectedRatings), function($q) {
                            $q->where('rating', '=', 2);
                        })
                        ->when(in_array('1', $request->selectedRatings), function($q) {
                            $q->where('rating', '=', 1);
                        })
                        ->when(in_array('0', $request->selectedRatings), function($q) {
                            return $q;
                        })
                        
                        
                        ->paginate(12);

            return view('search-grid', ['products' => $products, 'categoryList' => $categoryList])->render();
        }

        return view('search', ['products' => $products, 'categoryList' => $categoryList]);

    }

    public function sortProducts(Request $request)
    {
        $sortBy = $request->input('sort_by');
        $orderBy = $sortBy == 'asc' ? 'asc' : 'desc';
        
        // Query to get products sorted by price
        $products = Product::orderBy('price', $orderBy)->paginate(12);

        return view('partials.products', compact('products'))->render();
    }

    public function index(Request $request) {   
        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
            'products.stock',
            'products.status',
            'products.rating'
        )
        ->paginate(12);
        $categoryList = ProductCategory::select('id', 'category')->get();

        if($request->ajax()){
            $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
                            'products.stock',
                            'products.status',
                            'products.rating',
                            'products.created_at'
                        )
                        ->when($request->search_term, function($q)use($request){
                            $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
                        })
                        ->when($request->sort_by, function($q)use($request){
                            if ($request->sort_by != "default") {
                                if ($request->sort_by == 'sort_by_name_asc') {
                                    $q->orderBy('name','asc');
                                } else if ($request->sort_by == 'sort_by_name_desc') {
                                    $q->orderBy('name','desc');
                                } else if ($request->sort_by == 'sort_by_price_asc') {
                                    $q->orderBy('price','asc');
                                } else if ($request->sort_by == 'sort_by_price_desc') {
                                    $q->orderBy('price','desc');
                                } else if ($request->sort_by == 'sort_by_stock_asc') {
                                    $q->orderBy('stock','asc');
                                } else if ($request->sort_by == 'sort_by_stock_desc') {
                                    $q->orderBy('stock','desc');
                                } else if ($request->sort_by == 'sort_by_rating_asc') {
                                    $q->orderBy('rating','asc');
                                } else if ($request->sort_by == 'sort_by_rating_desc') {
                                    $q->orderBy('rating','desc');
                                } else if ($request->sort_by == 'sort_by_date_asc') {
                                    $q->orderBy('created_at','asc');
                                } else if ($request->sort_by == 'sort_by_date_desc') {
                                    $q->orderBy('created_at','desc');
                                } 
                            }
                            
                        })
                        ->when($request->filter_category, function($q)use($request){
                            if ($request->filter_category != "default") {
                                $q->where('category_id',$request->filter_category);
                            }
                        })
                        ->when($request->filter_status, function($q)use($request){
                            if ($request->filter_status != "default") {
                                $q->where('products.status', 'LIKE', '%' . $request->filter_status . '%');
                            }
                        })
                        ->when($request->filter_stock, function($q)use($request){
                            if ($request->filter_stock != "default") {
                                if ($request->filter_stock == "belowmin") {
                                    $q->where('stock', '<', DB::raw('min_qty'));
                                } else if ($request->filter_stock == "belowrop") {
                                    $q->where('stock', '<', DB::raw('reorder_pt'));
                                } else if ($request->filter_stock == "healthy") {
                                    $q->where('stock', '>=', DB::raw('reorder_pt'))
                                    ->where('stock', '<=', DB::raw('max_qty'));
                                } else if ($request->filter_stock == "abovemax") {
                                    $q->where('stock', '>', DB::raw('max_qty'));
                                }
                            }
                        })
                        ->when($request->rating5, function($q)use($request){
                            $q->where('rating', '==', 5);
                        })
                        ->when($request->rating4, function($q)use($request){
                            $q->where('rating', '==', 4);
                        })
                        ->when($request->rating3, function($q)use($request){
                            $q->where('rating', '==', 3);
                        })
                        ->when($request->rating2, function($q)use($request){
                            $q->where('rating', '==', 2);
                        })
                        ->when($request->rating1, function($q)use($request){
                            $q->where('rating', '==', 1);
                        })
                        ->when($request->rating0, function($q)use($request){
                            $q->where('rating', '==', 0);
                        })
                        ->when($request->selected_categories, function($q)use($request){
                            $q->where('rating', '==', 0);
                        })
                        ->paginate(12);

            return view('admin.products-table', ['products' => $products, 'categoryList' => $categoryList])->render();
        }

        return view('admin.products', ['products' => $products, 'categoryList' => $categoryList]);
    }


    public function save(Request $request){
        
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:20000',
            'sku' => 'required',
            'name' => 'required',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => 'required',
            'desc' => 'required',
            'min_qty' => 'required',
            'max_qty' => 'required',
            'reorder_pt' => 'required',
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
        $product->min_qty = $request->min_qty;
        $product->max_qty = $request->max_qty;
        $product->reorder_pt = $request->reorder_pt;
        $product->stock = 0;
        $product->status = "active";
        $product->rating = 0;

        $product->save();

        return redirect(route('product.index'))->withSuccess('Product Successfully Added');
    }

    public function update(Request $request){

        $productID = $request->input('product_id');
        $product = Product::find($productID);

        $request->validate([
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000',
            'sku' => 'required',
            'name' => 'required',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => 'required',
            'desc' => 'required',
            'min_qty' => 'required',
            'max_qty' => 'required',
            'reorder_pt' => 'required',
        ]);

        $currentImage = public_path('products') . '/' . $product->image;

        if ($request->sku !== $product->sku && file_exists($currentImage) ) {
            $newImageName = $request->sku . '.' . pathinfo($product->image, PATHINFO_EXTENSION);
            rename($currentImage, public_path('products') . '/' . $newImageName);
            $product->image = $newImageName;
        }

        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->desc = $request->desc;
        $product->min_qty = $request->min_qty;
        $product->max_qty = $request->max_qty;
        $product->reorder_pt = $request->reorder_pt;

        if ($request->hasFile('image')) {
            $imageName = $request->sku . '.' . $request->image->extension();

            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;

            if (file_exists($currentImage) && $product->image !== $imageName) {
                unlink($currentImage);
            }
        }

        $product->update();

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    public function archive(Request $request) {
        $product = Product::where('id',$request->product_id)->first();
        $product->status = 'archived';
        $product->update();
        return redirect(route('product.index'))->with('success', 'Product Archived Successfully');
    }

    public function activate(Request $request) {
        $product = Product::where('id',$request->product_id)->first();
        $product->status = 'active';
        $product->update();
        return redirect(route('product.index'))->with('success', 'Product Activated Successfully');
    }

    public function get(Product $product){
        $productInfo = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
        ->where('products.id', $product->id)
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
            'products.stock','products.status'
        )
        ->first();

        return view('product', ['product' => $productInfo]);
    }

    
}
