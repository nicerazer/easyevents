@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.staff.index') }}">Staff</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $staff->staff_id }}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <div class="d-flex align-items-baseline justify-content-between">
        <h5>Edit Model</h5>
        <div class="d-flex">
            <button class="btn btn-primary btn-sm px-5 mr-2" form="form-edit">Save Changes</button>
            <form action="{{ route('dashboard.staff.destroy', $staff) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm px-5">Delete</button>
            </form>
        </div>
    </div>
    <hr>
    <form action="{{ route('dashboard.staff.update', $staff) }}" id="form-edit" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Username</span>
                </div>
            </div>
            <div class="col-4">
                <input required name="username" class="form-control" type="text" value="{{ $staff->username }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Email</span>
                </div>
            </div>
            <div class="col-4">
                <span>{{ $staff->email }}</span>
                {{-- <input required name="email" class="form-control" type="text" value="{{ $staff->phone_number }}"> --}}
            </div>
            <div class="col-5"></div>
            <div class="offset-3 col-4">
                <small class="text-muted">Email cannot be changed</small>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">First Name</span>
                </div>
            </div>
            <div class="col-4">
                <input required name="first_name" class="form-control" type="text" value="{{ $staff->first_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Last Name</span>
                </div>
            </div>
            <div class="col-4">
                <input required name="last_name" class="form-control" type="text" value="{{ $staff->last_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Phone Number</span>
                </div>
            </div>
            <div class="col-4">
                <input required name="phone_number" class="form-control" type="text" value="{{ $staff->phone_number }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Edit Password</span>
                </div>
            </div>
            <div class="col-4">
                <input pattern="{7,}" name="password" class="form-control" type="password" title="Minimum of 7 characters" placeholder="Leave blank if not changing">
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-3">
            <p class="m-0 text-muted">Created At</p>
            <p>{{ $staff->created_at->toDateString() }}</p>
        </div>
        <div class="col-3">
            <p class="m-0 text-muted">Updated At</p>
            <p>{{ $staff->updated_at->toDateString() }}</p>
        </div>
    </div>
</div>
@endsection
