<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if(Auth::id()) {
            $usertype=Auth()->user()->is_admin;
            if($usertype==0) 
            {
                return view('home');
            } 
            else if ($usertype==1) 
            {
                return view('admin');
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
