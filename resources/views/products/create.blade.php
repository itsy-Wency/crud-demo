@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Add Product</h1>

<div class="card shadow p-4">

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Product Name</label>
            <input name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group mb-3">
            <label>Price</label>
            <input name="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="form-group mb-3">
            <label>Quantity</label>
            <input name="quantity" class="form-control" value="{{ old('quantity') }}">
        </div>

        <button class="btn btn-primary">Save Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>

@endsection
