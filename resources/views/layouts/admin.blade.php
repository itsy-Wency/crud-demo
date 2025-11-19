<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Admin Dashboard' }}</title>
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

  <div id="wrapper">
    @include('partials.sidebar') <!-- Sidebar menu -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('partials.topbar') <!-- Top navigation bar -->
        <div class="container-fluid">
          @yield('content') <!-- Main content -->
        </div>
      </div>
      @include('partials.footer') <!-- Optional footer -->
    </div>
  </div>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
