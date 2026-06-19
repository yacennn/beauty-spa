<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Link Beauty Services')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <div class="container">
        <header class="navbar">
            <a class="brand" href="{{ route('home') }}">Beauty Spa</a>
            <nav>
                <a href="{{ route('site.produits') }}" class="{{ request()->routeIs('site.produits') || request()->routeIs('home') ? 'active' : '' }}">Products</a>
                <a href="{{ route('site.blog') }}" class="{{ request()->routeIs('site.blog') ? 'active' : '' }}">Blog</a>
                <a href="{{ route('site.contact') }}" class="{{ request()->routeIs('site.contact') ? 'active' : '' }}">Contact</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Admin</a>
                @endauth
            </nav>
        </header>

        @yield('content')
    </div>
</body>
</html>
