<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Services\CartService;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=$this->cartService->getFromCookieOrCreate();
        return view('carts.index')->with([
            'cart'=>$cart,
        ]);
    }

}
