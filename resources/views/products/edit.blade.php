@extends('layouts.app')
@section('content')
    <h1>Create product</h1>
    <form method="POST" action="{{ route('products.update', ['product'=>$product->id]) }}" >
        @csrf
        @method('PUT') {{-- da bismo promenili metod na put jer je tako u ruti --}}
        <div class="form-row">
            <label for="">Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') ?? $product->title}}" required>
        </div>
        <div class="form-row">
            <label for="">Descrtiption</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') ?? $product->description}}" required>
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input class="form-control" type="number" name="price" min="1.00" step="0.01" value="{{ old('price') ?? $product->price}}" required>
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input class="form-control" type="number" name="stock" min="0" value="{{ old('stock') ?? $product->stock}}" required>
        </div>
        <div class="form-row">
            <label for="">Status</label>
            <select class="custom-select" type="status" required>
                <option value="available" {{ old('status') =='available' ? 'selected' : ($product->status=='available' ? 'selected' : '')}}>Available</option>
                <option value="unavailable" {{ old('status') =='unavailable' ? 'selected' : ( $product->status=='unavailable' ? 'selected' : '')}} >Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg" type="submit">Update product</button>
        </div>

    </form>
@endsection
