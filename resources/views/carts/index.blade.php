@extends('layouts.app')
@php
use App\Models;
@endphp
@section('content')
    <h1>Your Cart</h1>
    @if(! isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            The list of products is empty.
        </div>
        {{-- {{dd($products)}} --}}
    @else
    <h4 class="text-center"><strong>Your Cart Total: </strong>${{ $cart->total }}</h4>

        <a class="btn btn-success mb-3" href="{{ route('orders.create') }}">Start Order</a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif
@endsection
