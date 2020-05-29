@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.hub') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.bookings.index') }}">Booking</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <form action="{{ route('dashboard.bookings.store') }}" method="POST">
        @csrf
        <div class="d-flex align-items-baseline justify-content-between">
            <h5><span class="text-muted">Add a new</span> <strong>booking</strong></h5>
            <div class="d-flex">
                <button class="btn btn-primary btn-sm px-5">Save Booking</button>
            </div>
        </div>
        <hr>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Customer</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <select required class="form-control" name="customer_id">
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->customer_id }}">{{ $customer->full_name }}</option>
                            @endforeach
                        </select>
                        {{ $customers->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Item</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <select required class="form-control" name="item_id">
                            @foreach ($items as $item)
                            <option value="{{ $item->item_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        {{ $items->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Quantity</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="quantity" type="number" class="form-control" min="0" placeholder="Item Quantity">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <label class="text-muted">Booking Date</label>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <input required name="date" type="text" class="form-control" value="{{ today()->toDateString() }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-th"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
