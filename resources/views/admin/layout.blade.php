<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Spa — Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fafcfb; }
        .navbar-spa { background: #4e8775; }
        .btn-spa { background: #4e8775; color: #fff; border: none; }
        .btn-spa:hover { background: #1e463c; color: #fff; }
        
        .btn-success, .btn-primary, [href*="create"], .btn-spa { 
            background-color: #4e8775 !important; 
            border-color: #4e8775 !important; 
            color: white !important;
        }
        .btn-success:hover, .btn-primary:hover, [href*="create"]:hover, .btn-spa:hover { 
            background-color: #1e463c !important; 
            border-color: #1e463c !important; 
        }

        .btn-warning, [class*="btn-outline-warning"], [href*="edit"] {
            background-color: #4e8775 !important;
            border-color: #4e8775 !important;
            color: white !important;
        }
        .btn-warning:hover, [href*="edit"]:hover {
            background-color: #1e463c !important;
            border-color: #1e463c !important;
        }

        .btn-danger, [type="submit"].btn-danger {
            background-color: #7a938a !important;
            border-color: #7a938a !important;
            color: white !important;
        }
        .btn-danger:hover {
            background-color: #556b62 !important;
            border-color: #556b62 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark navbar-spa px-4 mb-4">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Beauty Spa — Dashboard</a>
        <div class="navbar-nav">
            <a class="nav-link {{ request()->routeIs('admin.produits.*') ? 'active fw-bold' : '' }}" href="{{ route('admin.produits.index') }}">Produits</a>
            <a class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active fw-bold' : '' }}" href="{{ route('admin.articles.index') }}">Blog</a>
            <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active fw-bold' : '' }}" href="{{ route('admin.messages.index') }}">Messages</a>
        </div>
        <div class="ms-auto d-flex align-items-center gap-3">
            <a class="nav-link text-white" href="{{ route('home') }}" target="_blank">Voir le site</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">Déconnexion</button>
            </form>
        </div>
    </nav>

    <div class="container pb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>