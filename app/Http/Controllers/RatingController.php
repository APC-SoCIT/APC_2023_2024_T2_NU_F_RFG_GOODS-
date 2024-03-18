<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\AddRatingRequest;
use App\Models\Rating;
use Illuminate\Validation\ValidationException;

class RatingController extends Controller
{
    public function add(AddRatingRequest $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        $existingRating = Rating::where('user_id', $user->id)
                        ->where('order_id', $request->order_id)
                        ->where('product_id', $request->product_id)
                        ->exists();

        if ($existingRating) {
            throw ValidationException::withMessages(['order_id' => 'testNO']);
        }

        $rating = new Rating();
        $rating->product_id = $request->product_id;
        $rating->order_id = $request->order_id;

        $rating->user_id = $user->id;

        $rating->rating_score = $request->ratingStar;
        $rating->rating_comment = $request->reviewText;
        $rating->save();

        return redirect()->back()->with('success', 'Rating added successfully!');
    }
}
