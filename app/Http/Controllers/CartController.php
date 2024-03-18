<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function userCart() {

        $userId = Auth::user()->id;

        $user = User::find($userId);

        $usercart = Cart::join('products', 'carts.product_id', '=', 'products.id')
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
                'products.stock',
                'products.status',
            )
            ->where('carts.user_id', '=', $userId)
            ->where('products.status', '=', 'active')
            ->whereRaw('stock IS NOT NULL OR stock > 0')
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
                'products.stock',
                'products.status',
            )
            ->where('carts.user_id', '=', $userId)
            ->where('products.status', '=', 'active')
            ->whereRaw('stock IS NULL OR stock = 0')
            ->get();
    
        return view('cart', ['usercart' => $usercart, 'usercartnostock' => $usercartnostock, 'user' => $user]);
    }

    public function addtocart(Request $request) {
        $product = null;

        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'nullable',
        ]);

        $categoryList = ProductCategory::select('id', 'category')->get();

        $existingCart = Cart::where('user_id', Auth::user()->id)
        ->where('product_id', $request->product_id)
        ->first();

        if ($existingCart) {

            $product = Product::find($existingCart->product_id);

            if ($existingCart->quantity < $product->stock) {
                $existingCart->quantity += $request->filled('quantity') ? $request->quantity : 1;
                $existingCart->save();
                return 'Added 1';
            } else {
                return 'Max reached';
            }

        } else {

            $newCart = new Cart;
            $newCart->user_id = Auth::id();
            $newCart->product_id = $request->product_id;
            $newCart->quantity = $request->filled('quantity') ? $request->quantity : 1;
            $newCart->save();
            return 'Success!';
        }

        // DB::transaction(function () use ($request, $existingCart) {

        // });

        return 'Success!';

    }

    public function deletecart(Request $request) {
    }

    public function updatecart(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'nullable',
        ]);

        dd($request);

        $existingCart = Cart::where('user_id', Auth::user()->id)
        ->where('product_id', $request->product_id)
        ->first();

        if ($existingCart && $existingCart->quantity <= $product->stock) {
            $existingCart->quantity = $request->quantity;
            $existingCart->save();
            return 'Success';
        } else {
            return 'Invalid Number: Less stock than quantity';
        }
    }


    public function paywithMaya() {
        $url = 'https://pg-sandbox.paymaya.com/payby/v2/paymaya/payments';
    }
}
