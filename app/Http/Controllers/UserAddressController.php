<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\UserAddress;

class UserAddressController extends Controller
{


    /**
     * Handle the request to modify the user's address.
     *
     * @throws ValidationException
     */
    public function update(Request $request)
{
    // Check if the user is authenticated

    if (Auth::check()) {

        // Fetch the authenticated user

        $user = auth()->user();
 
        $request->validate([
            'account_id' => ['required', 'exists:users,id'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:10'],
        ]);

        // Assuming the user has a relationship with an address, you can update it directly
        $user->address->update([
            'account_id' => $user->id,
            'street' => $request->street,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
        ]);

        // Redirect back or to a specific page after successful update
        return redirect()->route('user.address.edit')->with('success', 'Address updated successfully');
        }
    }

}
