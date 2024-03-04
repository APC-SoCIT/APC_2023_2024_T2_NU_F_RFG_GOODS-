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
    // public function index(){
    //     $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
    //     ->select('products.id','products.image','products.sku','products.name','products.price','product_categories.category','products.desc','products.min_qty',
    //     'products.max_qty','products.reorder_pt')
    //     ->get();
    //     $categoryList = ProductCategory::select('id','category')->get();
    //     return view('admin.products', ['products' => $products,'categoryList' => $categoryList]);
    // }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
            ->leftJoin('ratings', 'products.id', '=', 'ratings.product_id')
            ->select(
                'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt',
                DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity'),
                DB::raw('ROUND(AVG(ratings.rating_score), 2) as avg_rating')
            )
            ->groupBy( 'products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt'
            );

        
            // if ($search) {
        //     $products = $products->where('products.name', 'LIKE', '%' . $search . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($search) . '%']);
        // }
    
        $products = $products->paginate(10);
        
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

    public function ajaxSearch(Request $request)
    {
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

    // public function index(){
    //     $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
    //         ->leftJoin('inventories', 'products.id', '=', 'inventories.product_id')
    //         ->select(
    //             'products.id',
    //             'products.image',
    //             'products.sku',
    //             'products.name',
    //             'products.price',
    //             'product_categories.category',
    //             'products.desc',
    //             'products.min_qty',
    //             'products.max_qty',
    //             'products.reorder_pt',
    //             DB::raw('SUM(CASE WHEN inventories.is_received = 1 THEN inventories.quantity ELSE -inventories.quantity END) as computed_quantity')
    //         )
    //         ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt')
    //         ->paginate(10);

    //     $categoryList = ProductCategory::select('id', 'category')->get();

    //     return view('admin.products', ['products' => $products, 'categoryList' => $categoryList]);
    // }

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

            return view('admin.products-table', ['products' => $products, 'categoryList' => $categoryList])->render();
        }

        return view('admin.products', ['products' => $products, 'categoryList' => $categoryList]);
    }

    public function newSearch(Request $request) {
        if($request->ajax()) {
            $query = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
                ->groupBy('products.id', 'products.image', 'products.sku', 'products.name', 'products.price', 'product_categories.category', 'products.desc', 'products.min_qty', 'products.max_qty', 'products.reorder_pt');

            if ($request->has('min_price')) {
                $query->where('products.price', '>=', $request->min_price);
            }
    
            if ($request->has('max_price')) {
                $query->where('products.price', '<=', $request->max_price);
            }
    
            if ($request->has('in_stock')) {
                $query->havingRaw('computed_quantity > 0');
            }
    
            if ($request->has('category')) {
                $query->where('product_categories.category', 'like', '%' . $request->category . '%');
            }
    
            $products = $query
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%')
                ->orWhere('desc', 'like', '%' . $request->search . '%')
                ->get();
    
            $output = '';

            if (count($products) > 0) {
                $output = '';
                foreach ($products as $product) {
                    $output .= '
                        <div class="bg-white w-60 h-[23rem] flex flex-col drop-shadow-md">
                            <a href="' . route('product.get', ['product' => $product]) . '" class="flex flex-col h-full border-2 border-transparent hover:border-rfg-accent transition-colors duration-200">
                                <img src="' . asset('./products/vinegar.chg.22043.png') . '" 
                                    class="flex-shrink-0 object-center object-contain w-full max-h-[15rem]"';
            
                    if ($product->computed_quantity == 0 || $product->computed_quantity == null) {
                        $output .= 'style="opacity: 0;"';
                    }
            
                    $output .= 'alt="">
                                <div class="p-2 flex flex-col flex-grow justify-between">
                                    <div class="pt-3">
                                        <p class="text-s line-clamp-2">' . Str::ucfirst($product->name) . '</p>
                                        <p class="text-xs line-clamp-1">' . $product->category . '</p>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        @php
                                            $avgRating = $product->avg_rating;
                                            $maxRating = 5;
                                            $filledStars = min(round($avgRating), $maxRating);
                                            $emptyStars = $maxRating - $filledStars;
                                        @endphp
                                        <ul class="flex mr-2 place-items-center">';
            
                    for ($i = 0; $i < $filledStars; $i++) {
                        $output .= '
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star-fill " viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            </li>';
                    }
            
                    for ($i = 0; $i < $emptyStars; $i++) {
                        $output .= '
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            </li>';
                    }
            
                    $output .= '
                                        </ul>
                                        <p class="relative pl-4">
                                            @if ($product->avg_rating == null) 
                                                No reviews
                                            @else
                                                ' . $product->avg_rating . '
                                            @endif
                                        </p>
                                        <p class="font-bold">₱' . $product->price . '</p>
                                        <form id="addToCartForm' . $product->id . '" action="' . route('product.addtocart') . '" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="@if(Auth::user() != null)' . Auth::user()->id . '@else @endif">
                                            <input type="hidden" name="product_id" value="' . $product->id . '">
                                            <button id="addtocartsubmit' . $product->id . '" type="submit" class="bg-orange-400 w-28 text-white font-semibold rounded-xl hover:bg-white hover:text-orange-400">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>';
                }
            } else {
                $output = 'No Results';
            }

            return response()->json(['html' => $output]);
        }
        return abort(404);
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
        ->paginate(12);
        $categoryList = ProductCategory::select('id', 'category')->get();

        if ($existingCart && $product) {
            // If the row exists, update the quantity
            $existingCart->quantity += $request->filled('quantity') ? $request->quantity : 1;
            $existingCart->save();
        } else {
            // If the row doesn't exist, create a new one
            $newCart = new Cart;
            $newCart->user_id = Auth::user()->id;
            $newCart->product_id = $request->product_id;
            $newCart->quantity = $request->filled('quantity') ? $request->quantity : 1;
            $newCart->save();
        }

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
            'min_qty' => 'required',
            'max_qty' => 'required',
            'reorder_pt' => 'required',
        ]);

        // Get the current image path and name
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
