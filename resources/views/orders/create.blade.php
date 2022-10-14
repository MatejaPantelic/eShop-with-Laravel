@extends('layouts.app')
@section('content')
    <h1>Order Details</h1>

    <h4 class="text-center"><strong>Grand Total: </strong>${{ $cart->total }}</h4>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $pr)
                    <tr>
                        <td>
                            <img src="{{ asset($pr->images->first()->path) }}" width="100" alt="slicica">
                            {{ $pr->title }}
                        </td>
                        <td>{{ $pr->price }}</td>
                        <td>{{ $pr->pivot->quantity }}</td>
                        <td>{{ $pr->total}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
