<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\PhAddress;

class AddressController extends Controller
{
    public function viewList() {
        $userID = Auth::user()->id;
        $userAddresses = Address::where('user_id','=',$userID)->get();

        return view('profile.address', ['userAddresses' => $userAddresses]);
    }

    // public function find(Request $request) {
    //     $phAddress = new PhAddress();
    //     $addressFinder = $phAddress->useSqlite();
    //     $addresses = $addressFinder->find($request->barangay);

    //     return response()->json($addresses);
    // }
}
