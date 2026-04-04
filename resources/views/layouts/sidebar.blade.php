<ul class="nav nav-pills flex-column mb-auto">

    @can('dashboard.list')
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link text-white active">
            <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
    </li>
    @endcan

    @can('profile.list')
    <li class="nav-item">
        <a href="{{ route('profile.edit') }}" class="nav-link text-white">
            <i class="bi bi-person me-2"></i> Profile
        </a>
    </li>
    @endcan

    @can('orders.list')
    <li class="nav-item">
        <a href="{{ route('orders') }}" class="nav-link text-white">
            <i class="bi bi-grid me-2"></i> Orders
        </a>
    </li>
    @endcan

    @can('services.list')
    <li class="nav-item">
        <a href="{{ route('services.index') }}" class="nav-link text-white">
            <i class="bi bi-gear me-2"></i> Services
        </a>
    </li>
    @endcan

    @can('roles.list')
    <li class="nav-item">
        <a href="{{ route('roles.index') }}" class="nav-link text-white">
            <i class="bi bi-gear me-2"></i> Roles
        </a>
    </li>
    @endcan

    @can('business.list')
    <li class="nav-item">
        <a href="{{ route('business.index') }}" class="nav-link text-white">
            <i class="bi bi-person me-2"></i> Business
        </a>
    </li>
    @endcan

    @can('business-docs.create')
    <li class="nav-item">
        <a href="{{ route('business-docs.create') }}" class="nav-link text-white">
            <i class="bi bi-person me-2"></i> Business Documents
        </a>
    </li>
    @endcan

    @can('pages.list')
    <li class="nav-item">
        <a href="{{ route('pages.index') }}" class="nav-link text-white">
            <i class="bi bi-file me-2"></i> Pages
        </a>
    </li>
    @endcan

    @can('product-categories.list')
    <li class="nav-item">
        <a href="{{ route('pcats.index') }}" class="nav-link text-white">
            <i class="bi bi-grid me-2"></i> Product Categories
        </a>
    </li>
    @endcan

    @can('products.list')
    <li class="nav-item">
        <a href="{{ route('products.index') }}" class="nav-link text-white">
            <i class="bi bi-box me-2"></i> Products
        </a>
    </li>
    @endcan

    @canany(['riders.list','vehicle-types.list','vehicles.list'])

<li class="nav-item">
    <a class="nav-link text-white d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#transportMenu"
       role="button"
       aria-expanded="false"
       aria-controls="transportMenu">

        <span>
            <i class="bi bi-truck me-2"></i> Transport
        </span>
        <i class="bi bi-chevron-down"></i>
    </a>

    <div class="collapse" id="transportMenu">
        <ul class="nav flex-column ms-3">

            @can('riders.list')
            <li class="nav-item">
                <a href="{{ route('riders.index') }}" class="nav-link text-white">
                    <i class="bi bi-person me-2"></i> Riders
                </a>
            </li>
            @endcan

            @can('vehicle-types.list')
            <li class="nav-item">
                <a href="{{ route('vehicleTypes.index') }}" class="nav-link text-white">
                    <i class="bi bi-truck me-2"></i> Vehicle Types
                </a>
            </li>
            @endcan

            @can('vehicles.list')
            <li class="nav-item">
                <a href="{{ route('vehicles.index') }}" class="nav-link text-white">
                    <i class="bi bi-truck me-2"></i> Vehicles
                </a>
            </li>
            @endcan

        </ul>
    </div>
</li>

@endcanany

    @can('banners.list')
    <li class="nav-item">
        <a href="{{ route('banners.index') }}" class="nav-link text-white">
            <i class="bi bi-image me-2"></i> Banners
        </a>
    </li>
    @endcan

    @can('payment-gateways.list')
    <li class="nav-item">
        <a href="{{ route('paymentlists.index') }}" class="nav-link text-white">
            <i class="bi bi-credit-card me-2"></i> Payment Gateways
        </a>
    </li>
    @endcan

   @canany([
    'settings.list',
    'variations.list',
    'variation-rates.list',
    'move-types.list',
    'property-types.list',
    'extra-charges.list',
    'faqs.list'
])

<li class="nav-item">
    <a class="nav-link text-white d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse"
       href="#settingsMenu"
       role="button"
       aria-expanded="false"
       aria-controls="settingsMenu">
       
        <span>
            <i class="bi bi-gear me-2"></i> Settings
        </span>
        <i class="bi bi-chevron-down"></i>
    </a>

    <div class="collapse" id="settingsMenu">
        <ul class="nav flex-column ms-3">

            @can('variations.list')
            <li class="nav-item">
                <a href="{{ route('variations.index') }}" class="nav-link text-white">
                    Variations
                </a>
            </li>
            @endcan

            @can('variation-rates.list')
            <li class="nav-item">
                <a href="{{ route('variations_rates.index')}}" class="nav-link text-white">
                    Variation Rates
                </a>
            </li>
            @endcan

            @can('move-types.list')
            <li class="nav-item">
                <a href="{{ route('move_types.index') }}" class="nav-link text-white">
                    Move Types
                </a>
            </li>
            @endcan

            @can('property-types.list')
            <li class="nav-item">
                <a href="{{ route('property_types.index') }}" class="nav-link text-white">
                    Property Types
                </a>
            </li>
            @endcan

            @can('extra-charges.list')
            <li class="nav-item">
                <a href="{{ route('extra-charges.index') }}" class="nav-link text-white">
                    Extra Charges
                </a>
            </li>
            @endcan

            @can('faqs.list')
            <li class="nav-item">
                <a href="{{ route('faqs.index') }}" class="nav-link text-white">
                    FAQ
                </a>
            </li>
            @endcan

        </ul>
    </div>
</li>

@endcanany

</ul>