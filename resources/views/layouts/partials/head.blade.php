<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Scripts -->
    @if (Request::is('admin*'))
        <script src="{{ asset('js/admin.js') }}" defer></script>
    @else
        <script src="{{ asset('js/front.js') }}" defer></script>
    @endif

    @hasSection('scripts')
        @yield('scripts')
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @hasSection('styles')
        @yield('styles')
    @endif
</head>
