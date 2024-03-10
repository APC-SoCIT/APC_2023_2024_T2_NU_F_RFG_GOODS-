<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request) {
        if(Auth::id()) {
            $usertype=Auth()->user()->is_admin;
            if($usertype==0) 
            {
                return view('dashboard');
            } 
            else if ($usertype==1) 
            {
                $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
                ->select('users.id','users.last_name','users.first_name','orders.status','orders.payment_method','orders.payment_reference_id')
                ->paginate(12);

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
                    'products.stock',
                    'products.status'
                )->get();
                $categoryList = ProductCategory::select('id', 'category')->get();

                $orders = DB::table('orders')
                ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                ->select('orders.id', 'orders.user_id', 'orders.status', DB::raw('SUM(order_items.price) as total_price'))
                ->groupBy('orders.id', 'orders.user_id', 'orders.status')
                ->get();

                $orderItems = OrderItem::
                select('order_items.*', 'orders.*')
                ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
                ->get();

                $sumByOrder = $orderItems->groupBy('order_id')->map(function ($group) {
                    return $group->sum('price');
                });

                return view('admin', ['orderItems' => $orders, 'products' => $products, '']);
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function adminproducts() 
    {
        $categoryList = ProductCategory::select('id','category')->get();
        return view("admin.products")->with('categoryList', $categoryList);
    }
}
