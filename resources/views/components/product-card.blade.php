<div class="card">
    <img src="{{ asset($product->images->first()->path) }}" class="card-img-top" height="500">
    <div class="body">
        <h4 class="text-right"><strong> ${{ $product->price }} </strong></h4>
        <h5 class="card-title"> {{ $product->title }} </h5>
        <p class="card-text"> {{ $product->description }} </p>
        <p class="card-text"> <strong> {{ $product->stock }} left </strong></p>

        @if (isset($cart))
            <p class="card-text"> {{ $product->pivot->quantity }} in your cart <strong> {{ $product->total }} left </strong></p>

            <form action="{{ route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart->id]) }}"
                method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning" type="submit">Remove From Cart</button>
            </form>
        @else
            <form action="{{ route('products.carts.store', ['product' => $product->id]) }}" method="post"
                class="d-inline">
                @csrf
                <button class="btn btn-success" type="submit">Add to Cart</button>
            </form>
        @endif
    </div>
</div>
