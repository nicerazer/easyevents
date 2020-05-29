@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.hub') }}">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.bookings.index') }}">Booking</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $booking->booking_id }}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <div class="d-flex align-items-baseline justify-content-between">
        <h5>Edit Model</h5>
        <div class="d-flex">
            <button class="btn btn-primary btn-sm px-5 mr-2" form="form-edit">Save Changes</button>
            <form action="{{ route('dashboard.bookings.destroy', $booking) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm px-5">Delete</button>
            </form>
        </div>
        </div>
    <hr>
    <form action="{{ route('dashboard.bookings.update', $booking) }}" id="form-edit" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-4">
            <div class="col-3">
                <span class="text-muted">Customer's Name</span>
            </div>
            <div class="col-9">
                <a href="{{ route('dashboard.customers.show', $booking->customer->customer_id) }}">{{ $booking->customer->full_name }}</a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-3">
                <span class="text-muted">Item</span>
            </div>
            <div class="col-9">
                <a href="{{ route('dashboard.items.show', $booking->item->item_id) }}">{{ $booking->item->name }}</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Quantity</span>
                </div>
            </div>
            <div class="col-4">
                <input name="quantity" class="form-control" type="number" min="1" value="{{ $booking->quantity }}">
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Booking Date</span>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <input name="date" type="text" class="form-control" value="{{ $booking->date }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-th"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-3">
            <p class="m-0 text-muted">Created At</p>
            <p>{{ $booking->created_at->toDateString() }}</p>
        </div>
        <div class="col-3">
            <p class="m-0 text-muted">Updated At</p>
            <p>{{ $booking->updated_at->toDateString() }}</p>
        </div>
    </div>
</div>
@endsection
