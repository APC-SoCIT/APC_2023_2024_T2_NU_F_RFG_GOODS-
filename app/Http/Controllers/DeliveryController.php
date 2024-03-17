<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function adminIndex(Request $request) {
        $deliveries = Delivery::all();

        return view('admin.deliveries', ['deliveries' => $deliveries]);
    }
}
