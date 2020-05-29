@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.staff.index') }}">Staff</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <form action="{{ route('dashboard.staff.store') }}" method="POST">
        @csrf
        <div class="d-flex align-items-baseline justify-content-between">
            <h5><span class="text-muted">Add a new</span> <strong>staff</strong></h5>
            <div class="d-flex">
                <button class="btn btn-primary btn-sm px-5">Save Staff</button>
            </div>
        </div>
        <hr>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Username</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>First Name</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="first_name" type="text" class="form-control" placeholder="First Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Last Name</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="last_name" type="text" class="form-control" placeholder="Last Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Email</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="email" type="email" class="form-control" placeholder="example@youremail.com">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Phone Number</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="phone_number" type="text" class="form-control" placeholder="Phone Number">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Password</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required pattern="{7,}" name="password" class="form-control" type="password" title="Minimum of 7 characters" placeholder="Minimum of 7 characters">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
