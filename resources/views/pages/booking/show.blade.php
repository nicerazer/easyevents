@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <div class="d-flex justify-content-between align-items-baseline mb-3">
        <h2><strong>Booking Details</strong></h2>
        <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger px-5">Delete</button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h4>Item Details</h4>
            <p>{{ $booking->item->name }}</p>
        </div>
        <div class="col-md-6">
            <h4>Quantity</h4>
            <p>{{ $booking->quantity }}</p>
        </div>
        <div class="col-md-4">
            <h4>Date Booked</h4>
            <p>{{ $booking->date->toDateString() }}</p>
        </div>
    </div>
    <small class="text-muted">*Items cannot be modified once booked. Please delete, and create a new one to change the details</small>
</div>
@endsection
