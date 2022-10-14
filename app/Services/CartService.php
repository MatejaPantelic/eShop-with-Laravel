<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName='cart';

    public function getFromCookieOrCreate()
    {
        $cart_id=Cookie::get($this->cookieName);
        $cart=Cart::find($cart_id);
        return $cart ?? Cart::create();
    }

    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }
}
