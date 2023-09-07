<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoppingcart;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class MyPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order_history()
    {
        $carts = Shoppingcart::get_cart(Auth::user()->id);

        return view('mypage.order_history', compact('carts'));
    }

    public function order_history_show($id)
    {
        if (!is_numeric($id)) {
            return redirect('/mypage/order_history/');
        }
        $shoppingcart_id = $id;
        $user_id = Auth::user()->id;
        $cart_info = DB::table('shoppingcart')->where('instance', $user_id)->where('number', $shoppingcart_id)->get()->first();
        Cart::instance($user_id)->restore($cart_info->identifier);
        $cart_contents = Cart::content();
        Cart::instance($user_id)->store($cart_info->identifier);
        Cart::destroy();

        DB::table('shoppingcart')->where('instance', $user_id)->where('number', null)
            ->update(
                [
                    'number' => $shoppingcart_id,
                    'updated_at' => $cart_info->updated_at
                ]
            );

        return view('mypage.order_history_show', compact('cart_contents'));
    }
}
