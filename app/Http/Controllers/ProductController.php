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
            DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
        )
        ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
        ->find($id);
        $categoryList = ProductCategory::select('id', 'category')->get();

        return response()->json(['product' => $product,'categoryList' => $categoryList]);

    }

    public function search(Request $request) {
        // $search = $request->input('search');

        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
            ->leftJoin('ratings', 'products.id', '=', 'ratings.product_id')
            ->select(
                'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt',
                DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity'),
                DB::raw('ROUND(AVG(ratings.rating_score), 2) as avg_rating')
            )
            ->groupBy( 'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt'
            )->paginate(12);

        
            // if ($search) {
        //     $products = $products->where('products.name', 'LIKE', '%' . $search . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($search) . '%']);
        // }
        
        $categoryList = ProductCategory::select('id', 'category')->get();
        if($request->ajax()){
            $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
            ->leftJoin('ratings', 'products.id', '=', 'ratings.product_id')
            ->select(
                'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt',
                DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity'),
                DB::raw('ROUND(AVG(ratings.rating_score), 2) as avg_rating')
            )
            ->groupBy( 'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt'
                        )->when($request->search_term, function($q) use ($request){
                            $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
                        })
                        ->when($request->rating, function($q) use ($request){
                            $q->where('avg_rating',$request->rating);
                        })
                        ->when($request->stock, function($q) use ($request){
                            $q->where('computed_quantity',$request->stock);
                        })
                        ->when($request->categories, function ($q) use ($request) {
                            $q->whereIn('category', $request->categories);
                        })
                        ->paginate(12);

            return view('search-table', ['products' => $products, 'categoryList' => $categoryList])->render();
        }

        return view('search', ['products' => $products, 'categoryList' => $categoryList]);
    }

    public function ajaxSearch(Request $request) {
        if($request->ajax()) {
            $search = $request->input('search');

            $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
                ->leftJoin('ratings', 'products.id', '=', 'ratings.product_id')
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
                    DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity'),
                    DB::raw('ROUND(AVG(ratings.rating_score), 2) as avg_rating')
                )
                ->groupBy(
                    'products.id',
                    'products.image',
                    'products.sku',
                    'products.name',
                    'products.price',
                    'product_categories.category',
                    'products.desc',
                    'products.min_qty',
                    'products.max_qty',
                    'products.reorder_pt'
                );

            $products = $products->where('products.name', 'LIKE', '%' . $request->search . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($search) . '%']);
    
            $products = $products->paginate(10);

            $categoryList = ProductCategory::select('id', 'category')->get();

            if($products) {
                foreach ($products as $key => $product) {
                    $output.=
                        '<tr>'.
                        '<td>'.$product->id.'</td>'.
                        '<td>'.$product->name.'</td>'.
                        '<td>'.$product->desc.'</td>'.
                        '<td>'.$product->price.'</td>'.
                        '</tr>';
                }

                return Response($output);
            }
        
        
        }

    }

    public function userCart() {
        $userId = Auth::user()->id;
    
        $usercart = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
            ->select(
                'carts.id',
                'carts.user_id',
                'carts.quantity',
                'products.id as product_id',
                'products.image',
                'products.sku',
                'products.name',
                'products.price',
                'products.desc',
                'products.min_qty',
                'products.max_qty',
                'products.reorder_pt',
                DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
            )
            ->where('carts.user_id', '=', $userId)
            ->groupBy('carts.id', 'carts.user_id', 'carts.quantity', 'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
            ->get();

        $usercartnostock = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
            ->select(
                'carts.id',
                'carts.user_id',
                'carts.quantity',
                'products.id as product_id',
                'products.image',
                'products.sku',
                'products.name',
                'products.price',
                'products.desc',
                'products.min_qty',
                'products.max_qty',
                'products.reorder_pt',
                DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
            )
            ->where('carts.user_id', '=', $userId)
            ->groupBy('carts.id', 'carts.user_id', 'carts.quantity', 'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
            ->havingRaw('computed_quantity IS NULL OR computed_quantity = 0')
            ->get();
    
        return view('cart', ['usercart' => $usercart, 'usercartnostock' => $usercartnostock]);
    }

    public function index(Request $request) {   
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

            return view('admin.products-table', ['products' => $products, 'categoryList' => $categoryList])->render();
        }

        return view('admin.products', ['products' => $products, 'categoryList' => $categoryList]);
    }

    public function create(){
        $categoryList = ProductCategory::select('id','category')->get();
        return view('products.create')->with('categoryList', $categoryList);
    }

    public function addtocart(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'nullable',
        ]);

        $existingCart = Cart::where('user_id', Auth::user()->id)
        ->where('product_id', $request->product_id)
        ->first();

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
        ->where('products.id','=',$existingCart->product_id)
        ->first();
        $categoryList = ProductCategory::select('id', 'category')->get();

        // Get the existing cart item if it exists
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        // Use a transaction for database operations
        DB::transaction(function () use ($request, $existingCart) {
            if ($existingCart) {
                // If the row exists, update the quantity
                $existingCart->quantity += $request->filled('quantity') ? $request->quantity : 1;
                $existingCart->save();
            } else {
                // If the row doesn't exist, create a new one
                $newCart = new Cart;
                $newCart->user_id = Auth::id();
                $newCart->product_id = $request->product_id;
                $newCart->quantity = $request->filled('quantity') ? $request->quantity : 1;
                $newCart->save();
            }
        });

        return 'Success!';
    }

    public function updatecart(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'nullable',
        ]);

        $existingCart = Cart::where('user_id', Auth::user()->id)
        ->where('product_id', $request->product_id)
        ->first();

        if ($existingCart) {
            $existingCart->quantity = $request->quantity;
            $existingCart->save();
        }

        return 'Success!';
    }

    public function deletecart(Request $request) {
        
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

    public function destroy(Request $request) {
        $product = Product::where('id',$product->id)->first();
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
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
            DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
        )
        ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
        ->first();

        return view('product', ['product' => $productInfo]);
    }
}
