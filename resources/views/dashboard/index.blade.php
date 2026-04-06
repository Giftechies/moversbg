@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <!-- Header -->
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title heading">Dashboard</h2>
            </div>
             <div class="row ms-2 me-2">

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('zones.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total on Route Order</p>
                                <h4>{{ $totalOnRouteOrders }}</h4>
                            </div>
                            <i class="fa-solid fa-person-skiing-nordic fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('categories.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Process Order</p>
                                <h4>{{ $totalProcessOrders }}</h4>
                            </div>
                            <i class="fa fa-list fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('zones.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Pending Order</p>
                                <h4>{{ $totalPendingOrders }}</h4>
                            </div>
                            <i class="fa-solid fa-hourglass-start fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('categories.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Category</p>
                                <h4>{{ $totalCategories }}</h4>
                            </div>
                            <i class="fa fa-list fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!-- Stats Row 2 -->
        <div class="row ms-2 me-2">

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('zones.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Complete Order</p>
                                <h4>{{ $totalCompletedOrders }}</h4>
                            </div>
                            <i class="fa-solid fa-square-check fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('categories.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Cancelled Order</p>
                                <h4>{{ $totalCancelledOrders }}</h4>
                            </div>
                            <i class="fa-solid fa-xmark fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('zones.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Sales</p>
                                <h4>{{ number_format($totalSales, 2) }}</h4>
                            </div>
                            <i class="fa-solid fa-wallet fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <a href="{{ route('categories.index') }}">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <p class="text-muted">Total Earning (Rider)</p>
                                <h4>{{ number_format($totalEarnings, 2) }}</h4>
                            </div>
                            <i class="fa fa-motorcycle fa-lg"></i>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        </div>

        <!-- Stats Row 1 -->
       
    </div>
</div>
@endsection