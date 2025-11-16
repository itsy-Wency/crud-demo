@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Products</h1>

<!-- Add Product Button -->
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
    Add Product
</a>

<!-- Global Search Form -->
<form method="GET" action="{{ route('products.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search products..."
               value="{{ $query ?? '' }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
    @if($query)
        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm mt-2">Clear Search</a>
    @endif
</form>

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Products Table -->
<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No products found.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection
