<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    // public function index() {
    //     $inventoryList = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
    //     ->select('inventories.id','products.sku','products.name','inventories.is_received','inventories.quantity','inventories.created_at','inventories.updated_at')
    //     ->paginate(10);
    //     $productList = Product::all();
    //     return view('admin.inventories', ['inventoryList' => $inventoryList,'productList' => $productList]);
    // }

    public function index(Request $request) {   
        Log::info('Fmonth:', ['filter_month' => $request->filter_month]);
        $inventories = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
        ->select(
        'inventories.id',
	    'products.sku',
	    'products.name',
        'inventories.is_received',
	    'inventories.quantity',
	    'inventories.created_at',
	    'inventories.updated_at'
        )
        ->paginate(12);
        $products = Product::all();

        if($request->ajax()){
            $inventories = Inventory::join('products', 'inventories.product_id', '=', 'products.id')
                        ->select(
                'inventories.id',
			    'products.sku',
			    'products.name',
   	       	    'inventories.is_received',
			    'inventories.quantity',
			    'inventories.created_at',
			    'inventories.updated_at'
                        )
                        ->when($request->search_term, function($q)use($request){
                            $q->where('products.name', 'LIKE', '%' . $request->search_term . '%')->orWhereRaw('LOWER(products.name) LIKE ?', ['%' . strtolower($request->search_term) . '%']);
                        })
                        
                        ->when($request->filter_year, function($q) use ($request) {
                            if ($request->filter_year != "default") {
                                $q->whereYear('inventories.created_at', $request->filter_year);
                            }
                        })
                        ->when($request->filter_month, function ($q) use ($request) {
                            if ($request->filter_month != "default") {
                                $q->whereMonth('inventories.created_at', $request->filter_month);
                            }
                        })
                        ->when($request->filter_day, function ($q) use ($request) {
                            if ($request->filter_day != "default") {
                                $q->whereDay('inventories.created_at', $request->filter_day);
                            }
                        })


                        ->when($request->sort_by, function($q)use($request){
                            if ($request->sort_by != "default") {
                                if ($request->sort_by == 'sort_by_name_asc') {
                                    $q->orderBy('name','asc');
                                } else if ($request->sort_by == 'sort_by_name_desc') {
                                    $q->orderBy('name','desc');
                                } else if ($request->sort_by == 'sort_by_quantity_asc') {
                                    $q->orderBy('quantity','asc');
                                } else if ($request->sort_by == 'sort_by_quantity_desc') {
                                    $q->orderBy('quantity','desc');
                                }
                            }
                            
                        })
                        ->when($request->filter_transaction, function($q)use($request){
                            if ($request->filter_transaction != "default") {
                                $q->where('inventories.transaction', 'LIKE', '%' . $request->filter_transaction . '%');
                            }
                        })
                        ->paginate(12);

            return view('admin.inventories-table', ['inventories' => $inventories, 'products' => $products])->render();
        }
        return view('admin.inventories', ['inventories' => $inventories, 'products' => $products]);
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