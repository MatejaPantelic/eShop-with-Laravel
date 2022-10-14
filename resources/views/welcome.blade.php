@extends('layouts.app')
@php
use App\Models;
@endphp
@section('content')
    @empty($products)
        <div class="alert alert-warning">
            The list of products is empty.
        </div>
        {{-- {{dd($products)}} --}}
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection
