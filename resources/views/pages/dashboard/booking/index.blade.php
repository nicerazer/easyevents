@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.hub') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Booking</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex align-items-baseline justify-content-between mb-3">
        <h4 class="d-flex flex-row align-items-baseline">
            {{ $model_count }}&nbsp;<strong>bookings</strong>&nbsp;<span class="text-muted">sorted by</span>&nbsp;
            <x-sorter-component model-alias="booking" :query-title="$query_title" :stuffs="$sorting_details" />
        </h4>
        <a href="{{ route('dashboard.bookings.create') }}" class="btn btn-sm btn-outline-primary px-5">Add new booking</a>
    </div>
    {{-- <form action="{{ route('dashboard.bookings.index') }}" method="GET">
        <div class="input-group input-group-md mb-3">
            <input placeholder="Search using {{ $query_title }}" type="text" class="form-control flex-shrink-1">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form> --}}
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer's Name</th>
                <th>Item</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Date</th>
                <th class="text-right">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td><a href="{{ route('dashboard.bookings.show', $booking->booking_id) }}">{{ $booking->booking_id }}</a></td>
                <td><a href="{{ route('dashboard.customers.show', $booking->customer->customer_id) }}">{{ $booking->customer->full_name }}</a></td>
                <td><a href="{{ route('dashboard.items.show', $booking->item->item_id) }}">{{ $booking->item->name }}</a></td>
                <td class="text-right">{{ $booking->quantity }}</td>
                <td class="text-right">{{ $booking->date }}</td>
                <td class="text-right">{{ $booking->created_at->toDateString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $bookings->withQueryString()->links() }}
</div>
@endsection
