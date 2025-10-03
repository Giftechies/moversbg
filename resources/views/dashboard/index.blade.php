@extends('layouts.app')


@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href="{{ route('zones.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Delivery Zones</p>
                                            <h4 class="mb-0">{{ $totalZones }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="fa fa-motorcycle font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href="{{ route('categories.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Category</p>
                                            <h4 class="mb-0">{{ $totalCategories }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="fa fa-list font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Coupon</p>
                                            <h4 class="mb-0">{{ $totalCoupons }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fa fa-percent font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Country Code</p>
                                            <h4 class="mb-0">{{ $totalCountryCodes }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fa fa-flag font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href="{{ route('vehicles.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Vehicle Type</p>
                                            <h4 class="mb-0">{{ $totalVehicles }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fa fa-motorcycle font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href="{{ route('riders.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Delivery Boy</p>
                                            <h4 class="mb-0">{{ $totalRiders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fa fa-motorcycle font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total User List</p>
                                            <h4 class="mb-0">{{ $totalUsers }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fa fa-users font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Payment Gateway</p>
                                            <h4 class="mb-0">{{ $totalPaymentGateways }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fas fa-bullseye font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Pending Order</p>
                                            <h4 class="mb-0">{{ $totalPendingOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fas fa-shopping-cart font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Process Order</p>
                                            <h4 class="mb-0">{{ $totalProcessOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="fas fa-cart-arrow-down font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <a href=" ">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total On Route Order</p>
                                            <h4 class="mb-0">{{ $totalOnRouteOrders }}</h4>
</div>
<div class="flex-shrink-0 align-self-center">
    <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
        <span class="avatar-title rounded-circle bg-warning">
            <i class="fas fa-route font-size-24"></i>
        </span>
    </div>
</div>
</div>
</div>
</a>
</div>
</div>
<div class="col-md-2">
    <div class="card mini-stats-wid">
        <a href=" ">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Total Complete Order</p>
                        <h4 class="mb-0">{{ $totalCompletedOrders }}</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <div class="avatar-sm rounded-circle bg-success mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-success">
                                <i class="fas fa-check font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-md-2">
    <div class="card mini-stats-wid">
        <a href=" ">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Total Cancelled Order</p>
                        <h4 class="mb-0">{{ $totalCancelledOrders }}</h4>
                    </div>
                    <div class="flex-shrink-0 align-self-center">
                        <div class="avatar-sm rounded-circle bg-danger mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-danger">
                                <i class="fa fa-times font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-md-2">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium">Total Sales</p>
                    <h4 class="mb-0">{{ number_format($totalSales, 2) }}</h4>
                </div>
                <div class="flex-shrink-0 align-self-center">
                    <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                        <span class="avatar-title rounded-circle bg-info font-size-24">
                            
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-muted fw-medium">Total Earning(Rider)</p>
                    <h4 class="mb-0">{{ number_format($totalEarnings, 2) }}</h4>
                </div>
                <div class="flex-shrink-0 align-self-center">
                    <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                        <span class="avatar-title rounded-circle bg-info font-size-24">
                            
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection