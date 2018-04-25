<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            @include('layouts.nav')
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>