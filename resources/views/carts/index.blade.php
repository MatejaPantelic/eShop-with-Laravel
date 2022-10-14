@extends('layouts.app')
@php
use App\Models;
@endphp
@section('content')
    <h1>Your Cart</h1>
    @if($cart->products->isEmpty())
        <div class="alert alert-warning">
            The list of products is empty.
        </div>
        {{-- {{dd($products)}} --}}
    @else
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif
@endsection
