@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3"><strong>Customer Info</strong></h2>
    <div class="d-flex justify-content-between align-items-baseline mb-2">
        <h4>{{ "$customer->full_name" }} <span class='text-muted'>ID : {{ "$customer->customer_id" }}</span></h4>
        <h5><span class="text-muted">Phone Number</span> {{ $customer->phone_number }}</h5>
        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-outline-primary px-5">Edit</a>
    </div>

    <hr>

    <div class="d-flex justify-content-between align-items-baseline mb-1">
        <h5>List of previous bookings</h5>
        <a href="{{ route('bookings.create', $customer) }}" class="btn btn-sm btn-outline-primary px-5">New booking <span><i class="fa fa-plus"></i></span></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Booked Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->bookings as $booking)
            <tr>
                <td>{{ $booking->booking_id }}</td>
                <td><a href="{{ route('bookings.show', $booking) }}">{{ $booking->item->name }}</a></td>
                <td class="text-right">{{ $booking->quantity }}</td>
                <td class="text-right">{{ $booking->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $bookings->links() }} --}}
</div>
@endsection
