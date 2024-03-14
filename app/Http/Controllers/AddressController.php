<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class AddressController extends Controller
{
    public function viewList() {
        $userID = Auth::user()->id;
        $userAddress = User::select('first_name','last_name','phone_number','region','state/province',
        'city/municipality','barangay','addressline',
        'address_lat','address_long')
        ->where('id','=',$userID)
        ->first();

        if (!$userAddress) {
            echo "User not found";
            return;
        }

        return view('profile.address', ['userAddress' => $userAddress]);

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

    public function addressupdate(Request $request) {
        $user = Auth::user();

        $request->validate([
            'phone' => 'required',
            'region_text' => 'required',
            'province_text' => 'required',
            'city_text' => 'required',
            'barangay_text' => 'required',
            'address_specific' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $user->phone_number = $request->phone;
        $user->region = $request->region_text;
        $user['state/province'] = $request->province_text;
        $user['city/municipality'] = $request->city_text;
        $user->barangay = $request->barangay_text;
        $user->addressline = $request->address_specific;
        $user->address_lat = $request->latitude;
        $user->address_long = $request->longitude;
        $user->update();

        return redirect(route('address.viewList'))->with('success','Address Updated Successfully');
    }
}
