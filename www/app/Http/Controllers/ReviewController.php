<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
    public function store(ReviewStoreRequest $request)
    {
        $review = new Review();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->star = $request->input('star');
        $review->text = $request->input('text');
        $review->item_id = $request->input('item_id');
        $review->save();

        return redirect('/show/' . $request->input('item_id'));
    }
}
