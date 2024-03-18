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
use App\Models\Product;

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
            throw ValidationException::withMessages(['order_id' => 'test']);
        }

        $rating = new Rating();
        $rating->product_id = $request->product_id;
        $rating->order_id = $request->order_id;
        $rating->user_id = $user->id;
        $rating->rating_score = $request->ratingStar;
        $rating->rating_comment = $request->reviewText;
        $rating->save();
        $product = Product::find($request->product_id);
        $product->totalusersRating += 1;
        $product->save();
        $currentAverageRating = $product->rating;
        $totalNumberOfRatings = $product->totalusersRating;
        $yourRating = $request->ratingStar;
        $sumOfRatings = $currentAverageRating * $totalNumberOfRatings;
        $newSumOfRatings = $sumOfRatings + $yourRating;
        $newTotalNumberOfRatings = $totalNumberOfRatings + 1;
        $newAverageRating = $newSumOfRatings / $newTotalNumberOfRatings;
        $product->rating = $newAverageRating;
        $product->save();
        $rating->rating_score = $request->ratingStar;
        $rating->rating_comment = $request->reviewText;
        $rating->save();

        return redirect()->back()->with('success', 'Rating added successfully!');
    }
}
