@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <h2 class="mb-3"><strong>Edit customer's information</strong></h2>
    <h5 class="mb-3">Personal information</h5>
    <form action="{{ route('customers.update', $customer) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>First Name</label>
                    <input name="first_name" value="{{ $customer->first_name }}" type="text" class="form-control" placeholder="John" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input name="last_name" value="{{ $customer->last_name }}" type="text" class="form-control" placeholder="Doe" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input name="phone_number" value="{{ $customer->phone_number }}" type="text" class="form-control" placeholder="e.g: +6 012 345 6789" required>
        </div>
        <button class="btn btn-outline-primary px-4">Submit Form!</button>
    </form>
</div>
@endsection
