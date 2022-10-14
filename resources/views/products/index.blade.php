@extends('layouts.app')
@section('content')
    <h1>List of product</h1>
    <a class="bt btn-success mb-3" href="{{ route('products.create') }}">Create product</a>

    @empty($products)
    <div class="alert alert-warning">
         The list of products is empty.
    </div>
    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Store</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pr)
                    <tr>
                        <td>{{ $pr->id }}</td>
                        <td>{{ $pr->title }}</td>
                        <td>{{ $pr->description }}</td>
                        <td>{{ $pr->price }}</td>
                        <td>{{ $pr->stock }}</td>
                        <td>{{ $pr->status }}</td>
                        <td>
                            <a href="{{ route('products.show', ['product' => $pr->id]) }}">Show</a>
                            <a href="{{ route('products.edit', ['product' => $pr->id]) }}">Edit</a>
                            <form class="d-inline" action="{{ route('products.destroy', ['product' => $pr->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty

@endsection
