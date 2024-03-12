<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Support\Facades\File;

class AddressController extends Controller
{
    public function viewList() {
        $userID = Auth::user()->id;
        $userAddresses = Address::where('user_id','=',$userID)->get();

        return view('profile.address', ['userAddresses' => $userAddresses]);
    }

    public function region() {
        $jsonFilePath = public_path('/ph-json/region.json');
        if (File::exists($jsonFilePath)) {
            $jsonContent = File::get($jsonFilePath);
            $jsonData = json_decode($jsonContent);
            return response()->json($jsonData);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function province() {
        $jsonFilePath = public_path('/ph-json/province.json');
        if (File::exists($jsonFilePath)) {
            $jsonContent = File::get($jsonFilePath);
            $jsonData = json_decode($jsonContent);
            return response()->json($jsonData);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function city() {
        $jsonFilePath = public_path('/ph-json/city.json');
        if (File::exists($jsonFilePath)) {
            $jsonContent = File::get($jsonFilePath);
            $jsonData = json_decode($jsonContent);
            return response()->json($jsonData);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function barangay() {
        $jsonFilePath = public_path('/ph-json/barangay.json');
        if (File::exists($jsonFilePath)) {
            $jsonContent = File::get($jsonFilePath);
            $jsonData = json_decode($jsonContent);
            return response()->json($jsonData);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
