@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Add Product
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
    </div>

    <div class="card-body">

        {{-- Search --}}
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="query" class="form-control"
                       placeholder="Search products…" value="{{ $query ?? '' }}">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            @if($query)
                <a href="{{ route('products.index') }}"
                   class="btn btn-secondary btn-sm mt-2">Clear Search</a>
            @endif
        </form>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th width="180">Actions</th>
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
                                <a href="{{ route('products.edit', $p->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('products.destroy', $p->id) }}"
                                      method="POST" style="display:inline;">
                                    @csrf @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No products found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
