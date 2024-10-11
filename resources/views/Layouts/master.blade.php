<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>@yield('title', 'BlogDekhen')</title>

</head>

<body class="flex flex-col min-h-screen">
    <!-- Header -->
    @include('partials.header')

    <!-- Main Content Area -->
    <div class="container max-w-full flex-grow">
        @yield('content')
    </div>

    <!-- Footer (Visible only if authenticated) -->
    @if (Auth::user())
        @include('partials.footer')
    @endif
    @yield('scripts')
</body>

</html>
