<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Delivery;
use Carbon\Carbon;
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

                $yesterdayOrders = Order::whereDate('created_at', Carbon::yesterday())->count();
                $todayOrders = Order::whereDate('created_at', Carbon::today())->count();

                if ($yesterdayOrders > 0) {
                    $percentageOrders = (($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100;
                    $percentageOrders = number_format($percentageOrders, 2);
                } else {
                    $percentageOrders = 0;
                }
                
                $products = Product::all();
                $totalRating = Product::sum('totalusersRating');

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

                $deliveries = Delivery::with(['order.user'])
                ->select('deliveries.*')
                ->join('orders', 'orders.id', '=', 'deliveries.order_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->select('users.id', 'users.last_name', 'users.first_name', 'orders.status', 'orders.payment_method', 'orders.payment_reference_id')
                ->get();

                $orderItems = OrderItem::
                select('order_items.*', 'orders.*')
                ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
                ->get();

                $startOfLastWeek = Carbon::now()->startOfWeek()->subWeek()->format('Y-m-d H:i:s');
                $endOfLastWeek = Carbon::now()->endOfWeek()->subWeek()->format('Y-m-d H:i:s');

                $startOfThisWeek = Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
                $endOfThisWeek = Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');

                $ordersLastWeek = Order::whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])->get();
                $ordersThisWeek = Order::whereBetween('created_at', [$startOfThisWeek, $endOfThisWeek])->get();

                $totalPriceLastWeek = $ordersLastWeek->sum('price');
                $totalPriceThisWeek = $ordersThisWeek->sum('price');

                if ($totalPriceLastWeek > 0) {
                    $percentageRevenue = (($totalPriceThisWeek - $totalPriceLastWeek) / $totalPriceLastWeek) * 100;
                } else {
                    $percentageRevenue = 0;
                }







                return view('admin', [
                    'orderItems' => $orders,
                    'deliveries' => $deliveries, 
                    'products' => $products, 
                    'percentageOrders' => $percentageOrders, 
                    'todayOrders' => $todayOrders, 
                    'percentageRevenue'=> $percentageRevenue,
                    'totalRating' => $totalRating,]);
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
