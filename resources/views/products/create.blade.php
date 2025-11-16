@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Add Product</h1>

<div class="card shadow p-4">
    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
