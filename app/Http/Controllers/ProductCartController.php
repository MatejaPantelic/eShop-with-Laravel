<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductCartController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $cart=$this->cartService->getFromCookieOrCreate();

        $quantity=$cart->products()
            ->find($product->id)
            ->pivot
            ->quantity ?? 0;
        $cart->products()->syncWithoutDetaching([
            $product->id=>['quantity'=>$quantity + 1],
        ]);
        $cookie=$this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        $cart->products()->detach($product->id);

        $cookie=Cookie::make('cart',$cart->id,7 * 24 * 60);
        return redirect()->back()->cookie($cookie);
    }

    public function getFromCookieOrCreate()
    {
        $cart_id=Cookie::get('cart');
        $cart=Cart::find($cart_id);
        return $cart ?? Cart::create();
    }
}
