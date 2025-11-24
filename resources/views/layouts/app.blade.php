<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Scripts 
    @vite(['resources/js/app.js'])-->
</head>

<body id="page-top">

    <div id="wrapper">

        {{-- Sidebar --}}
        @include('partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                {{-- Topbar --}}
                @include('partials.topbar')

                <main class="container-fluid pt-4">
                    {{ $slot ?? '' }}
                    @yield('content')
                </main>

            </div>

        </div>

    </div>

    <!-- SB Admin 2 JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>
