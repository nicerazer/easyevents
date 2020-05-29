@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.hub') }}">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.customers.index') }}">Customer</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $customer->customer_id }}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <div class="d-flex align-items-baseline justify-content-between">
        <h5>Edit Model</h5>
        <div class="d-flex">
            <button class="btn btn-primary btn-sm px-5 mr-2" form="form-edit">Save Changes</button>
            <form action="{{ route('dashboard.customers.destroy', $customer) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm px-5">Delete</button>
            </form>
        </div>
    </div>
    <hr>
    <form action="{{ route('dashboard.customers.update', $customer) }}" id="form-edit" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">First Name</span>
                </div>
            </div>
            <div class="col-4">
                <input name="first_name" class="form-control" type="text" value="{{ $customer->first_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Last Name</span>
                </div>
            </div>
            <div class="col-4">
                <input name="last_name" class="form-control" type="text" value="{{ $customer->last_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Phone Number</span>
                </div>
            </div>
            <div class="col-4">
                <input name="phone_number" class="form-control" type="text" value="{{ $customer->phone_number }}">
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-3">
            <p class="m-0 text-muted">Created At</p>
            <p>{{ $customer->created_at->toDateString() }}</p>
        </div>
        <div class="col-3">
            <p class="m-0 text-muted">Updated At</p>
            <p>{{ $customer->updated_at->toDateString() }}</p>
        </div>
    </div>
</div>
@endsection
