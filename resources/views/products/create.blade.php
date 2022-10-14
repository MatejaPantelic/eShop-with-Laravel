@extends('layouts.app')
@section('content')
    <h1>Create product</h1>
    <form method="POST" action="{{ route('products.store') }}" >
        @csrf
        <div class="form-row">
            <label for="">Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-row">
            <label for="">Descrtiption</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input class="form-control" type="number" name="price" min="1.00" step="0.01" value="{{ old('price') }}" required>
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input class="form-control" type="number" name="stock" min="0" value="{{ old('stock') }}" required>
        </div>
        <div class="form-row">
            <label for="">Status</label>
            <select class="custom-select" type="status" required>
                <option value="" selected>Select..</option>
                <option value="available" {{ old('status')=='available' ? 'selected' : ''}} >Available</option>
                <option value="unavailable" {{ old('status')=='unavailable' ? 'selected' : ''}}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button class="btn btn-primary btn-lg" type="submit">Create product</button>
        </div>

    </form>
@endsection
