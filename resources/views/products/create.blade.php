<x-app-layout>

    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    </x-slot>

    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-body">

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
        </div>

    </div>

</x-app-layout>
