<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
        ->select('users.id','users.last_name','users.first_name','orders.status','orders.payment_method','orders.payment_reference_id')
        ->paginate(10);
        $productList = Product::all();
        return view('admin.orders', ['orders' => $orders]);
    
    }

    public function save(Request $request){
        $request->validate([
            'product_id' => 'required',
            'is_received' => 'required|boolean',
            'quantity' => 'required|integer',
        ]);

        $inventory = new Inventory;
        $inventory->product_id = $request->product_id;
        $inventory->is_received = $request->is_received;
        $inventory->quantity = $request->quantity;

        $inventory->save();

        return redirect(route('inventory.index'))->withSuccess('Inventory Successfully Added');
    }

    public function update(Inventory $inventory, Request $request){

        $request->validate([
            'product_id' => 'required',
            'is_received' => 'required|boolean',
            'quantity' => 'required|integer',
        ]);

        $inventory = new Inventory;
        $inventory->product_id = $request->product_id;
        $inventory->is_received = $request->is_received;
        $inventory->quantity = $request->quantity;

        $inventory->update();

        return redirect(route('inventory.index'))->with('success', 'Inventory Updated Successfully');
    }

    public function destroy(Inventory $inventory) {
        $inventory = Inventory::where('id',$inventory->id)->first();
        $inventory->delete();
        return redirect(route('inventory.index'))->with('success', 'Inventory Deleted Successfully');
    }
}
