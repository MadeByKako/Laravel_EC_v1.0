<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Review;

class ItemController extends Controller
{
    public function show(Item $item)
    {
        $reviews = Review::where('item_id', $item->id)->orderBy('created_at', 'desc')->get();

        $total_star = 0;
        foreach ($reviews as $review) {
            $total_star +=  $review->star;
        }
        $average_star = 0;
        if ($total_star > 0) {
            $average_star = round($total_star / $reviews->count());
        }

        return view('item.show', compact('item', 'reviews', 'average_star'));
    }
}
