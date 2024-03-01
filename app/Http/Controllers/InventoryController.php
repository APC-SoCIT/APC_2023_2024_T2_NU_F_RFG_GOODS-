<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index() {
        $inventoryList = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
        ->select('inventories.id','products.sku','products.name','inventories.is_received','inventories.quantity','inventories.created_at','inventories.updated_at')
        ->paginate(10);
        $productList = Product::all();
        return view('admin.inventories', ['inventoryList' => $inventoryList,'productList' => $productList]);
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
