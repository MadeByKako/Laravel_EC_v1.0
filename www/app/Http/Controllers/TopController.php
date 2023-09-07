<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ParentCategory;
use App\Models\Category;
use App\Http\Requests\TopSearchRequest;

class TopController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10);
        $parent_categories = ParentCategory::all();

        return view('top.index', ['items' => $items, 'parent_categories' => $parent_categories]);
    }

    public function search(TopSearchRequest $request)
    {
        $items = Item::query();
        if ($request->input('category_id')) {
            $items->where('category_id', $request->input('category_id'));
        }
        switch ($request->input('sort_id')) {
            case 1:
                $items->orderBy('price', 'desc');
                break;
            case 2:
                $items->orderBy('price', 'asc');
                break;
        }
        $items = $items->paginate(10);

        $parent_categories = ParentCategory::all();
        $categories = null;
        if ($request->input('parent_category_id')) {
            $categories = Category::where('parent_category_id', $request->input('parent_category_id'))->get();
        }

        return view('top.index', compact('items', 'parent_categories', 'categories'));
    }

    public function get_category(Int $id)
    {
        $category = Category::select('id', 'category_name')->where('parent_category_id', $id)->orderBy('id', 'asc')->get();
        return response()->json($category);
    }
}
