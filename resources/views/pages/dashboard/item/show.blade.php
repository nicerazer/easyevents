@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.items.index') }}">Item</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $item->item_id }}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container">
    <div class="d-flex align-items-baseline justify-content-between">
        <h5>Edit Model</h5>
        <div class="d-flex">
            <button class="btn btn-primary btn-sm px-5 mr-2" form="form-edit">Save Changes</button>
            <form action="{{ route('dashboard.items.destroy', $item) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm px-5">Delete</button>
            </form>
        </div>
    </div>
    <hr>
    <form action="{{ route('dashboard.items.update', $item) }}" id="form-edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Name</span>
                </div>
            </div>
            <div class="col-4">
                <input required name="name" class="form-control" type="text" value="{{ $item->name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Description</span>
                </div>
            </div>
            <div class="col-4">
                <textarea required name="description" class="form-control" rows="10" placeholder="Description">{{ $item->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Price</span>
                </div>
            </div>
            <div class="col-4">
                <input required name="price" class="form-control" type="number" min="0" value="{{ $item->price }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="offset-3 col-4">
                @php ($img_placeholder = asset('storage/img/placeholder_600x600.jpg'))
                <div class="d-flex">
                    <img id="item-img" src="{{ $item->img_path ? Storage::url($item->img_path) : $img_placeholder }}" alt="Item Image" class="img-fluid img-thumbnail">
                </div>
            </div>
            <div class="col-5"></div>
            <div class="col-3">
                <div class="d-flex align-items-center w-100 h-100">
                    <span class="text-muted">Upload Image</span>
                </div>
            </div>
            <div class="col-4">
                <div class="custom-file">
                    <input name="img" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="col-5"></div>
            <div class="offset-3 col-4">
                <small class="text-muted">*Image size must not bigger than 1mb</small>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-3">
            <p class="m-0 text-muted">Created At</p>
            <p>{{ $item->created_at->toDateString() }}</p>
        </div>
        <div class="col-3">
            <p class="m-0 text-muted">Updated At</p>
            <p>{{ $item->updated_at->toDateString() }}</p>
        </div>
    </div>
</div>
@endsection

@section('script')
$(function() {
    $("#customFile:file").change(function (){
        var fileName = $(this).val();
        $("#item-img").fadeTo("slow", 0.3);
        $('label[for="customFile"]').text(fileName);
    });
});
@endsection
