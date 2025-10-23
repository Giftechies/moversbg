

@extends('layouts.admin') 
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container">
                        <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
<br> <br>


            <div class="row">

                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                            <a href="{{ route('zones.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total on Route Order</p>
                                            <h4 class="mb-0">{{ $totalOnRouteOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                                <span class="avatar-title">
                                                   <i class="fa-solid fa-person-skiing-nordic fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                  </div>
                
               </div>
                <div class="col-md-3"><div class="card mini-stats-wid">
                             <a href="{{ route('categories.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Process Order</p>
                                            <h4 class="mb-0">{{ $totalProcessOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle  mini-stat-icon">
                                                <span class="avatar-title rounded-circle ">
                                                    <i class="fa fa-list font-size-24 fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                </div>

                 <div class="col-md-3">
                    <div class="card mini-stats-wid">
                            <a href="{{ route('zones.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Pending Order</p>
                                            <h4 class="mb-0">{{$totalPendingOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle">
                                                <span class="avatar-title">
                                                   <i class="fa-solid fa-hourglass-start fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                  </div>
                
               </div>
                <div class="col-md-3"><div class="card mini-stats-wid">
                             <a href="{{ route('categories.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Category</p>
                                            <h4 class="mb-0">{{ $totalCategories }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle mini-stat-icon">
                                                <span class="avatar-title rounded-circle ">
                                                    <i class="fa fa-list font-size-24 fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                </div>

            
        
            
        

        
        </div>
          <div class="row">

                <div class="col-md-3">
                    <div class="card mini-stats-wid">
                            <a href="{{ route('zones.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Complete Order</p>
                                            <h4 class="mb-0">{{ $totalCompletedOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle ">
                                                <span class="avatar-title">
                                                   <i class="fa-solid fa-square-check fa-lg"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                  </div>
                
               </div>
                <div class="col-md-3"><div class="card mini-stats-wid">
                             <a href="{{ route('categories.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Cancelled Order</p>
                                            <h4 class="mb-0">{{ $totalCancelledOrders }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle  mini-stat-icon">
                                                <span class="avatar-title rounded-circle">
                                                   <i class="fa-solid fa-xmark fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                </div>

                 <div class="col-md-3">
                    <div class="card mini-stats-wid">
                            <a href="{{ route('zones.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Sales</p>
                                            <h4 class="mb-0">{{ number_format($totalSales, 2) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle ">
                                                <span class="avatar-title">
                                                    <i class="fa-solid fa-wallet fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                  </div>
                
               </div>
                <div class="col-md-3"><div class="card mini-stats-wid">
                             <a href="{{ route('categories.index') }}">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Total Earning(Rider)</p>
                                            <h4 class="mb-0">{{ number_format($totalEarnings, 2) }}</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle  mini-stat-icon">
                                                <span class="avatar-title rounded-circle ">
                                                <i class="fa fa-motorcycle font-size-24 fa-lg"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                </div>

            
        
            
        

        
        </div>


    </div>
</div>
@endsection