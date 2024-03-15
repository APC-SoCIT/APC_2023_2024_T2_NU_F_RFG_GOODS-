<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function getUserOrder() {
        $orders = Order::where('user_id','=', Auth::user()->id)->get();
        $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
        ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
        ->get();

        foreach ($orders as $order) {
            $items = OrderItem::where('order_id', $order->id)
                ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
                ->get();
            $orderItems[$order->id] = $items;
        }

        return view('orderhistory', ['orders' => $orders, 'orderItems' => $orderItems]);
    }

    public function viewUserOrderDetails(Request $request) {
        $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
        ->leftjoin('products', 'products.id', '=', 'orders.product_id')
        ->paginate(12);

        if($request->ajax()){
            $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->sortByDesc('orders.created_at')
            ->when($request->search_term, function($q)use($request){
                $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')
                ->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
            })
            ->when($request->status, function($q)use($request){
                $q->where('orders.status',$request->status);
            })
            ->paginate(12);
            return view('admin.order-items-table', ['orders' => $orderItems]);
        }

        return view('admin.ordersitems', ['orders' => $orderItems]);
    }

    public function getOrderItems(Request $request) {
        $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
        ->leftjoin('products', 'products.id', '=', 'orders.product_id')
        ->paginate(12);

        if($request->ajax()){
            $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->sortByDesc('orders.created_at')
            ->when($request->search_term, function($q)use($request){
                $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')
                ->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
            })
            ->when($request->status, function($q)use($request){
                $q->where('orders.status',$request->status);
            })
            ->paginate(12);
            return view('admin.order-items-table', ['orders' => $orderItems]);
        }

        return view('admin.ordersitems', ['orders' => $orderItems]);
    }

    public function ordersadd(Request $request) {
        $userId = $request->input('user_id');
        $status = $request->input('status');
        $paymentMethod = $request->input('payment_method');
        $cartItems = $request->input('cartItems');

        $order = new Order;
        $order->user_id = $userId;
        $order->status = $status;
        $order->payment_method = $paymentMethod;
        $order->save();

        foreach($cartItems as $cartItem) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id; 
            $orderItem->product_id = $cartItem['product_id']; 
            $orderItem->quantity = $cartItem['quantity']; 
            $orderItem->price = $cartItem['price']; 
            $orderItem->status = "processing"; 
            $orderItem->save();
            //clearcart
            $cartItem = Cart::find($cartItem['id']);
            $cartItem->delete();
        }

        return redirect()->route('orders.success', ['orderId' => $order->id]);

    }

    public function orderssuccess(Request $request) {
        $orderId = $request->input('orderId');
        $order = Order::find($orderId);
    
        return view('order-success', ['order' => $order]);
    }

    public function index(Request $request) {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
        ->select('users.id','users.last_name','users.first_name','orders.status','orders.payment_method','orders.payment_reference_id')
        ->paginate(12);
        
        if($request->ajax()){
            $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.id','users.last_name','users.first_name','orders.status','orders.payment_method','orders.payment_reference_id')
            ->when($request->search_term, function($q)use($request){
                $q->where('users.last_name', 'LIKE', '%' . $request->search_term . '%')
                ->orWhereRaw('LOWER(users.last_name) LIKE ?', ['%' . strtolower($request->search_term) . '%'])
                ->orWhereRaw('LOWER(users.first_name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
            })
            ->when($request->status, function($q)use($request){
                $q->where('status',$request->status);
            })
            ->when($request->payment_method, function($q)use($request){
                $q->where('status',$request->payment_method);
            })
            ->when($request->payment_reference_id, function($q)use($request){
                $q->where('orders.payment_reference_id', 'LIKE', '%' . $request->payment_reference_id . '%')
                ->orWhereRaw('LOWER(orders.payment_reference_id) LIKE ?', ['%' . strtolower($request->payment_reference_id) . '%']);
            })
            ->paginate(12);
            return view('admin.orders-table', ['orders' => $orders]);
        }
        return view('admin.orders', ['orders' => $orders]);
    }

    // public function index(Request $request)
    // {   
    //     $inventories = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
    //     ->select('inventories.id','products.sku','products.name','inventories.is_received','inventories.quantity','inventories.created_at','inventories.updated_at')
    //     ->paginate(10);
    //     $products = Product::all();

    //     if($request->ajax()){
    //         $inventories = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
    //                     ->select('inventories.id','products.sku','products.name','inventories.is_received','inventories.quantity','inventories.created_at','inventories.updated_at')
    //                     ->when($request->search_term, function($q)use($request){
    //                         $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
    //                     })
    //                     ->when($request->is_received, function($q)use($request){
    //                         $q->where('is_received',$request->is_received);
    //                     })
    //                     ->paginate(10);
    //         return view('admin.inventories-table', ['inventories' => $inventories, 'products' => $products])->render();
    //     }

    //     return view('admin.inventories', ['inventories' => $inventories, 'products' => $products]);
    // }

    public function save(Request $request){
        $request->validate([
            'status' => 'required',
            'payment_method' => 'required',
            'payment_reference_id' => 'required',
        ]);

        $order = new Order;
        $order->id = $request->id;
        $order->status = $request->status;
        $order->payment_method = $request->payment_method;
        $order->payment_reference_id = $request->payment_reference_id;

        $order->save();

        return redirect(route('orders.index'))->withSuccess('Inventory Successfully Added');
    }

    public function update(Order $order, Request $request){

        $request->validate([
            'status' => 'required',
            'payment_method' => 'required',
            'payment_reference_id' => 'required',
        ]);

        $order = new Order;
        $order->status = $request->status;
        $order->payment_method = $request->payment_method;
        $order->payment_reference_id = $request->payment_reference_id;

        $order->update();

        return redirect(route('inventory.index'))->with('success', 'Inventory Updated Successfully');
    }

    public function destroy(Order $order) {
        $order = Order::where('id', $order->id)->first();
        $order->delete();
        return redirect(route('inventory.index'))->with('success', 'Inventory Deleted Successfully');
    }

}
