<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Shoppingcart extends Model
{
    use HasFactory;

    protected $table = 'shoppingcart';

    public static function get_cart($user_id)
    {
        $carts = DB::table('shoppingcart')->where("instance", "{$user_id}")->orderBy('number', 'desc')->get();

        $arry_cart_data = [];
        foreach ($carts as $cart) {
            $arry_cart_data[] = [
                'id' => $cart->number,
                'created_at' => $cart->updated_at,
                'user_name' => User::find($cart->instance)->name,
            ];
        }

        return $arry_cart_data;
    }
}
