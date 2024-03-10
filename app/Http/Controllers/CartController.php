<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
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
                'products.stock',
                'products.status',
            )
            ->where('carts.user_id', '=', $userId)
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
            ->havingRaw('stock IS NULL OR stock = 0')
            ->get();
    
        return view('cart', ['usercart' => $usercart, 'usercartnostock' => $usercartnostock]);
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

        $product = Product::
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
            'products.reorder_pt', 'products.stock', 'products.status'
        )
        ->where('products.id','=',$existingCart->product_id)
        ->first();

        $categoryList = ProductCategory::select('id', 'category')->get();

        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        DB::transaction(function () use ($request, $existingCart) {
            if ($existingCart && $existingCart->quantity <= $product->stock) {
                $existingCart->quantity += $request->filled('quantity') ? $request->quantity : 1;
                $existingCart->save();
                return 'Added 1';
            } else {
                $newCart = new Cart;
                $newCart->user_id = Auth::id();
                $newCart->product_id = $request->product_id;
                $newCart->quantity = $request->filled('quantity') ? $request->quantity : 1;
                $newCart->save();
                return 'Success!';
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

        if ($existingCart && $existingCart->quantity <= $product->stock) {
            $existingCart->quantity = $request->quantity;
            $existingCart->save();
            return 'Success';
        } else {
            return 'Invalid Number: Less stock than quantity';
        }
    }

    public function deletecart(Request $request) {
        
    }
}
