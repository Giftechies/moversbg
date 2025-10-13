<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Optional custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="css/custom.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="d-flex">
        <!-- Sidebar (visible on large screens) -->
        <nav class="d-none d-md-block sidebar bg-dark text-white" style="width: 250px; min-height: 100vh;">
            <div class="p-3">
                <h4 class="text-white">Menu</h4>
                <hr class="border-light">
               <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white active">
                            <i class="bi bi-house-door me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}" class="nav-link text-white">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link text-white">
                            <i class="bi bi-grid me-2"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.create') }}" class="nav-link text-white">
                            <i class="bi bi-plus me-2"></i> Create Category
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('codes.index') }}" class="nav-link text-white">
                            <i class="bi bi-code me-2"></i> Codes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('scoupons.index') }}" class="nav-link text-white">
                            <i class="bi bi-tag me-2"></i> Coupons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('managers.index') }}" class="nav-link text-white">
                            <i class="bi bi-person me-2"></i> Managers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('zones.index') }}" class="nav-link text-white">
                            <i class="bi bi-geo-alt me-2"></i> Zones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.index') }}" class="nav-link text-white">
                            <i class="bi bi-file me-2"></i> Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pcats.index') }}" class="nav-link text-white">
                            <i class="bi bi-grid me-2"></i> Product Categories
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('subcategories.index') }}" class="nav-link text-white">
                            <i class="bi bi-grid me-2"></i> Sub Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subcategories.create') }}" class="nav-link text-white">
                            <i class="bi bi-plus me-2"></i> Create Sub Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link text-white">
                            <i class="bi bi-box me-2"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('riders.index') }}" class="nav-link text-white">
                            <i class="bi bi-person me-2"></i> Riders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('vehicles.index') }}" class="nav-link text-white">
                            <i class="bi bi-truck me-2"></i> Vehicles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banners.index') }}" class="nav-link text-white">
                            <i class="bi bi-image me-2"></i> Banners
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paymentlists.index') }}" class="nav-link text-white">
                            <i class="bi bi-credit-card me-2"></i> Payment Gateways
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.edit') }}" class="nav-link text-white">
                            <i class="bi bi-gear me-2"></i> Settings
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('variations.index') }}" class="nav-link text-white">
                            <i class="bi bi-gear me-2"></i> variations 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('variations_rates.index')}}" class="nav-link text-white">
                            <i class="bi bi-gear me-2"></i> variations  Rates
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('move_types.index') }}" class="nav-link text-white">
                            <i class="bi bi-gear me-2"></i> Move Types
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('property_types.index') }}" class="nav-link text-white">
                            <i class="bi bi-gear me-2"></i> Property Types
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Offcanvas for small screens (burger menu) -->
        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMobile" aria-labelledby="sidebarMobileLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarMobileLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"> 
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active">
                            <i class="bi bi-house-door me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}" class="nav-link text-dark">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link text-dark">
                            <i class="bi bi-grid me-2"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.create') }}" class="nav-link text-dark">
                            <i class="bi bi-plus me-2"></i> Create Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subcategories.index') }}" class="nav-link text-dark">
                            <i class="bi bi-grid me-2"></i> Sub Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subcategories.create') }}" class="nav-link text-dark">
                            <i class="bi bi-plus me-2"></i> Create Sub Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('codes.index') }}" class="nav-link text-dark">
                            <i class="bi bi-code me-2"></i> Codes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('scoupons.index') }}" class="nav-link text-dark">
                            <i class="bi bi-tag me-2"></i> Coupons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('managers.index') }}" class="nav-link text-dark">
                            <i class="bi bi-person me-2"></i> Managers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('zones.index') }}" class="nav-link text-dark">
                            <i class="bi bi-geo-alt me-2"></i> Zones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.index') }}" class="nav-link text-dark">
                            <i class="bi bi-file me-2"></i> Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pcats.index') }}" class="nav-link text-dark">
                            <i class="bi bi-grid me-2"></i> Product Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link text-dark">
                            <i class="bi bi-box me-2"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('riders.index') }}" class="nav-link text-dark">
                            <i class="bi bi-person me-2"></i> Riders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('vehicles.index') }}" class="nav-link text-dark">
                            <i class="bi bi-truck me-2"></i> Vehicles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banners.index') }}" class="nav-link text-dark">
                            <i class="bi bi-image me-2"></i> Banners
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paymentlists.index') }}" class="nav-link text-dark">
                            <i class="bi bi-credit-card me-2"></i> Payment Gateways
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.edit') }}" class="nav-link text-dark">
                            <i class="bi bi-gear me-2"></i> Settings
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('variations.index') }}" class="nav-link text-dark">
                            <i class="bi bi-gear me-2"></i>variation
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="bi bi-gear me-2"></i> variations Rates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('move_types.index') }}" class="nav-link text-dark">
                            <i class="bi bi-gear me-2"></i> Move Types
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('property_types.index') }}" class="nav-link text-dark">
                            <i class="bi bi-gear me-2"></i> Property Types
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 bg-gray-100">
            <!-- Top Navbar with burger menu on small screens -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile">
                        <i class="bi bi-list"></i>
                    </button>
                    <span class="ms-3">Dashboard</span>
                    @include('layouts.navigation')
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white shadow m-3">
                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <!-- Page Content -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Optional custom JS -->
    <script src="js/custom.js"></script>
</body>
</html>

