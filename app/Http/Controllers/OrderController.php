<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\User;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function getOrderDetails(Order $order) {
        $orderInfo = Order::where('orders.id', $order->id)
                        ->where('user_id','=', Auth::user()->id)
                        ->first();
                        
        $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
        ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
        ->join('product_categories', 'product_categories.id', '=', 'products.category_id')
        ->where('order_id','=',$order->id)
        ->get();

        $user = Auth::user();
        $userAddress = $user->addressline . ', ' . $user->{'city/municipality'} . ', ' . $user->{'state/province'} . ', ' . $user->barangay . ', ' . $user->region;

        $orderReferenceId = $orderInfo->order_reference_id;
        $orderStatus = $orderInfo->status;

        return view('order-page', [
            'order' => $orderInfo,
            'orderItems' => $orderItems,
            'userFirstName' => $user->first_name,
            'userLastName' => $user->last_name,
            'userPhoneNumber' => $user->phone_number,
            'userAddress' => $userAddress, 
            'orderReferenceId' => $orderReferenceId,
            'orderStatus' => $orderStatus,
        ]);

        return view('order-page', ['order' => $orderInfo, 'orderItems' => $orderItems]);
    }

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
        $paymentMethod = $request->input('input_payment');
        $cartItems = $request->input('cartItems');
        
    
        $order = new Order;
        $order->user_id = $userId;
        $order->status = $status;
        $order->payment_method = $paymentMethod;
        $order->order_reference_id = strtoupper(Str::random(20));
        $order->priority = $request->input('input_deliv');
        $order->save();
    
        foreach($cartItems as $cartItem) {
            //create new order item
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id; 
            $orderItem->product_id = $cartItem['product_id']; 
            $orderItem->quantity = $cartItem['quantity']; 
            $orderItem->price = $cartItem['price']; 
            $orderItem->status = "processing"; 
            $orderItem->save();
            //clear cart
            $cartItem = Cart::find($cartItem['id']);
            $cartItem->delete();
            //add negative inventory
            $inventory = new Inventory;
            $inventory->product_id = $cartItem['product_id']; 
            $inventory->quantity = $cartItem['quantity']; 
            $inventory->is_received = 0;
            $inventory->save();
            //update product stock
            $product = Product::find($cartItem['product_id']);
            $product->stock -= $cartItem['quantity'];
            $product->save();
        }
        return back()->with('success', 'Order successfully placed.');
    }

    public function orderssuccess(Request $request) {
        $orderId = $request->input('orderId');
        $order = Order::find($orderId);
    
        return view('order-success', ['order' => $order]);
    }

    // public function getUserOrder() {
    //     $orders = Order::where('user_id','=', Auth::user()->id)->get();
    //     $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
    //     ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
    //     ->get();

    //     foreach ($orders as $order) {
    //         $items = OrderItem::where('order_id', $order->id)
    //             ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
    //             ->get();
    //         $orderItems[$order->id] = $items;
    //     }

    //     return view('orderhistory', ['orders' => $orders, 'orderItems' => $orderItems]);
    // }

    public function index(Request $request) {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.*') 
            ->selectRaw('orders.id as order_id_alias, users.id as user_id_alias') 
            ->paginate(12);
        $orderItems = OrderItem::leftjoin('orders', 'order_items.order_id', '=', 'orders.id')
            ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
            ->get();

        foreach ($orders as $order) {
            $items = OrderItem::where('order_id', $order->order_id_alias)
                ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
                ->select('products.*','order_items.*')
                ->selectRaw('products.id as products_id_alias, order_items.id as order_items_id_alias')
                ->get();
            $orderItems[$order->order_id_alias] = $items;
        }

        if($request->ajax()){
            $type = $request->input('type');
            if ($type == 'filters') {
                $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
                ->select('orders.*', 'users.*') 
                ->selectRaw('orders.id as order_id_alias, users.id as user_id_alias')
                ->when($request->search_term, function($q)use($request){
                    $q->where('users.last_name', 'LIKE', '%' . $request->search_term . '%')
                    ->orWhereRaw('LOWER(users.last_name) LIKE ?', ['%' . strtolower($request->search_term) . '%'])
                    ->orWhereRaw('LOWER(users.first_name) LIKE ?', ['%' . strtolower($request->search_term) . '%'])
                    ->orWhere('orders.id','LIKE', '%' . $request->search_term . '%');
                })
                ->when($request->sort_by, function($q)use($request){
                    if ($request->sort_by == 'sort_by_last_name_asc') {
                        $q->orderBy('last_name','asc');
                    } else if ($request->sort_by == 'sort_by_last_name_desc') {
                        $q->orderBy('last_name','desc');
                    } else if ($request->sort_by == 'sort_by_first_name_asc') {
                        $q->orderBy('first_name','asc');
                    } else if ($request->sort_by == 'sort_by_first_name_desc') {
                        $q->orderBy('first_name','desc');
                    } else if ($request->sort_by == 'sort_by_price_asc') {
                        $q->orderBy('price','asc');
                    } else if ($request->sort_by == 'sort_by_price_desc') {
                        $q->orderBy('price','desc');
                    } else if ($request->sort_by == 'sort_by_date_upd_asc') {
                        $q->orderBy('orders.updated_at','asc');
                    } else if ($request->sort_by == 'sort_by_date_upd_desc') {
                        $q->orderBy('orders.updated_at','desc');
                    } else if ($request->sort_by == 'sort_by_date_asc') {
                        $q->orderBy('orders.created_at','asc');
                    } else if ($request->sort_by == 'sort_by_date_desc') {
                        $q->orderBy('orders.created_at','desc');
                    } 
                })
                ->when($request->payment_method, function($q)use($request){
                    if ($request->payment_method != 'default') {
                        $q->where('payment_method', strtolower($request->payment_method));
                    }
                    
                })
                ->when($request->filter_status, function($q)use($request){
                    if ($request->filter_status != 'default') {
                        $q->where('status', $request->filter_status);
                        // dd($request->filter_status);
                    }
                })
                ->when($request->payment_reference_id, function($q)use($request){
                    $q->where('orders.payment_reference_id', 'LIKE', '%' . $request->payment_reference_id . '%')
                    ->orWhereRaw('LOWER(orders.payment_reference_id) LIKE ?', ['%' . strtolower($request->payment_reference_id) . '%']);
                })
                ->paginate(12);
                return view('admin.orders-table', ['orders' => $orders]);

            }
            elseif ($type == 'view') {
                $order = Order::find($request->orderid, 'id');
                $orderItems = OrderItem::where('order_id', $request->orderid)
                ->leftjoin('products', 'products.id', '=', 'order_items.product_id')->paginate(12);
                
                return view('admin.order-items-table', ['order' => $order, 'orderItems' => $orderItems]);
            }
            elseif ($type == 'update') {
                $order = Order::find($request->orderid);
                $order->status = $request->newStatus;
                $order->save();

                return view('admin.orders', ['orders' => $orders, 'orderItems' => $orderItems]);
            }
            
        }

        return view('admin.orders', ['orders' => $orders, 'orderItems' => $orderItems]);
    }

    public function updateStatus(Request $request) {

        if($request->ajax()){
            $type = $request->input('type');
            if ($type == 'update') {
                $order = Order::find($request->orderid);
                $order->status = $request->newstatus;
                $order->save();

                return $request->newstatus;
            }
        }
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

    public function adddelivery(Request $request) {
        $order = Order::find($request->orderid);
        $user = User::find($order->user_id);
        $delivery = new Delivery;
        $delivery->order_id = $order->id;
        $delivery->phone_number = $user->phone_number;
        $delivery->region = $user->region;
        $delivery['state/province'] = $user['state/province'];
        $delivery['city/municipality'] = $user['city/municipality'];
        $delivery->barangay = $user->barangay;
        $delivery->addressline = $user->addressline;
        $delivery->address_lat = $user->address_lat;
        $delivery->address_long = $user->address_long;
        if($order->priority == 'sameday') {
            $delivery->eta = Carbon::now()->endOfDay();
            $delivery->shipping_service = 'rfg';
        } else if ($order->priority == 'nextday') {
            $delivery->eta = Carbon::now()->addDay()->endOfDay();
            $delivery->shipping_service = 'rfg';
        } else if ($order->priority == 'express') {
            $delivery->eta = Carbon::now()->addDays(3);
            $delivery->shipping_service = '3rdparty';
        }
        $delivery->save();

        return "done";
    }

}
