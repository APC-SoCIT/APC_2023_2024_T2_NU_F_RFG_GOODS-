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
            ->leftJoin('ratings', 'products.id', '=', 'ratings.product_id') // Add this line
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
                DB::raw('AVG(ratings.rating_score) as avg_rating') // Include the average rating
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

        if ($search) {
            $products = $products->where('products.name', 'LIKE', '%' . $search . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($search) . '%']);
        }
    
        $products = $products->paginate(10);
        
        $categoryList = ProductCategory::select('id', 'category')->get();
    
        return view('search', ['products' => $products, 'categoryList' => $categoryList]);
    }

    public function indexCart() {
        $usercart = Cart::join('products', 'cart.product_id', '=', 'products.id')
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->select(
                'carts.id',
                'carts.quantity',
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
            ->where('user_id','=', Auth::user()->id)
            ->get();
    }

    public function index(){
        $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
            ->paginate(10);

        $categoryList = ProductCategory::select('id', 'category')->get();

        return view('admin.products', ['products' => $products, 'categoryList' => $categoryList]);
    }

    public function livesearch(Request $request) {
        if($request->ajax()) {
            $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
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
            ->where('id','like','%'.$request->search. '%')
            ->orwhere('sku','like','%'.$request->search. '%')
            ->orwhere('name','like','%'.$request->search. '%')
            ->orwhere('category','like','%'.$request->search. '%')
            ->orwhere('desc','like','%'.$request->search. '%')
            ->orwhere('min_qty','like','%'.$request->search. '%')
            ->orwhere('max_qty','like','%'.$request->search. '%')
            ->orwhere('reorder_pt','like','%'.$request->search. '%')
            ->get();

            $output = '';

            if(count($products) > 0){
                
            } else {

            }
        }
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

        if ($existingCart) {
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

        return redirect()->back();
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
