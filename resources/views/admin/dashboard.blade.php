@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>

<div class="row">
  <!-- Total Products -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Products</div>
        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
      </div>
    </div>
  </div>

  <!-- Total Quantity -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Quantity</div>
        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalQuantity }}</div>
      </div>
    </div>
  </div>

  <!-- Total Price -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Price</div>
        <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $totalPrice }}</div>
      </div>
    </div>
  </div>
</div>

<!-- Product Chart -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Product Quantities</h6>
  </div>
  <div class="card-body">
    <canvas id="productChart"></canvas>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('productChart').getContext('2d');
const productChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: {!! json_encode($products->pluck('name')) !!},
    datasets: [{
      label: 'Quantity',
      data: {!! json_encode($products->pluck('quantity')) !!},
      backgroundColor: 'rgba(78, 115, 223, 0.7)',
      borderColor: 'rgba(78, 115, 223, 1)',
      borderWidth: 1
    }]
  },
  options: { responsive: true, scales: { y: { beginAtZero: true } } }
});
</script>
@endpush
