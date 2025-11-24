@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

<div class="card shadow p-4">
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control"
                   value="{{ $product->price }}">
        </div>

        <div class="form-group mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control"
                   value="{{ $product->quantity }}">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection
