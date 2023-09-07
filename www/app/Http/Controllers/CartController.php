<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::instance(Auth::user()->id)->content();

        $total = Cart::total(Auth::user()->id);
        $subtotal = Cart::subtotal(Auth::user()->id);

        return view('cart.index', compact('cart', 'total', 'subtotal'));
    }

    public function update(CartUpdateRequest $request)
    {
        $cart = Cart::instance(Auth::user()->id)->content();
        $count = 0;
        foreach ($cart as $c) {
            if ($c->rowId == $request->input('rowId')[$count]) {
                Cart::update($c->rowId, array(
                    'qty' => $request->input('qty')[$count],
                ));
            }
            $count++;
        }

        return redirect('/cart/');
    }

    public function store(CartStoreRequest $request)
    {
        $item = Item::find($request->input('item_id'));
        if ($item != null) {
            Cart::instance(Auth::user()->id)->add(
                [
                    'id' => $request->input('item_id'),
                    'name' => $item->name,
                    'qty' => $request->input('count'),
                    'price' => $item->price,
                    'weight' => 0,
                ]
            );
        }
        $message = "カートへ追加致しました。";

        return to_route('item.show', $request->input('item_id'))->with('message', $message);
    }

    public function destroy(Request $request)
    {
        if (Cart::instance(Auth::user()->id)->content()->count() == 0) {
            return redirect('/cart/');
        }
        $shoppingcart = DB::table('shoppingcart')->where('instance', Auth::user()->id)->get();
        $count = $shoppingcart->count() + 1;

        Cart::instance(Auth::user()->id)->store($count);
        DB::table('shoppingcart')->where('instance', Auth::user()->id)->where('number', null)
            ->update(['number' => $count]);

        Cart::instance(Auth::user()->id)->destroy();

        return view('cart.end');
    }

    public function delete($id)
    {
        $cart = Cart::instance(Auth::user()->id)->content();
        foreach ($cart as $c) {
            if ($c->rowId == $id) {
                Cart::remove($c->rowId);
            }
        }

        return redirect('/cart/');
    }
}
