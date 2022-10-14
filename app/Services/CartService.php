<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName='cart';

    public function getFromCookie()
    {
        $cart_id=Cookie::get($this->cookieName);
        return Cart::find($cart_id);
    }

    public function getFromCookieOrCreate()
    {
        $cart=$this->getFromCookie();
        return $cart ?? Cart::create();
    }

    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
    }

    public function countProducts()
    {
        $cart=$this->getFromCookieOrCreate();
        if($cart!=null){
            return $cart->products->pluck('pivot.quantity')->sum();
        }
        return 0;
    }
}
