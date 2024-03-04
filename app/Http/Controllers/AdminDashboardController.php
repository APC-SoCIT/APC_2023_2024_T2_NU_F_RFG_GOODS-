<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request) {
        $orders = Order::join('users', 'users.id', '=', 'orders.user_id')
        ->select('users.id','users.last_name','users.first_name','orders.status','orders.payment_method','orders.payment_reference_id')
        ->paginate(12);

        return view('admin', ['orders' => $orders]);
    }

}
