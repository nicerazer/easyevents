@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.hub') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard.items.index') }}">Item</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <form action="{{ route('dashboard.items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex align-items-baseline justify-content-between">
            <h5><span class="text-muted">Add a new</span> <strong>item</strong></h5>
            <div class="d-flex">
                <button class="btn btn-primary btn-sm px-5">Save Item</button>
            </div>
        </div>
        <hr>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Name</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="name" type="text" class="form-control" placeholder="First Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Description</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <textarea class="form-control" name="description" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Price</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input required name="price" type="number" class="form-control" placeholder="Price">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center w-100 h-100 text-muted">
                        <label>Upload Image</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="custom-file">
                        <input name="img" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
