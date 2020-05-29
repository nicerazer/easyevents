@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('dashboard.bookings.index') }}" class="btn btn-outline-secondary btn-lg btn-block p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column align-items-start">
                        <h5>Booking</h5>
                        <small>{{ $bookings_counts }} items</small>
                    </div>
                    <div>
                        <i class="fa fa-plus-square"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('dashboard.items.index') }}" class="btn btn-outline-secondary btn-lg btn-block p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column align-items-start">
                        <h5>Item</h5>
                        <small>{{ $items_counts }} items</small>
                    </div>
                    <div>
                        <i class="fa fa-plus-square"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('dashboard.customers.index') }}" class="btn btn-outline-secondary btn-lg btn-block p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column align-items-start">
                        <h5>Customer</h5>
                        <small>{{ $customers_counts }} items</small>
                    </div>
                    <div>
                        <i class="fa fa-plus-square"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('dashboard.staff.index') }}" class="btn btn-outline-secondary btn-lg btn-block p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column align-items-start">
                        <h5>Staff</h5>
                        <small>{{ $staff_counts }} items</small>
                    </div>
                    <div>
                        <i class="fa fa-plus-square"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <p class="text-muted lead">Select a model to do something!</p>
</div>
@endsection
