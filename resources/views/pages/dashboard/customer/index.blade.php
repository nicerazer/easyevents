@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Customer</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex align-items-baseline justify-content-between mb-3">
        <h4 class="d-flex flex-row align-items-baseline">
            {{ $model_count }}&nbsp;<strong>customers</strong>&nbsp;<span class="text-muted">sorted by</span>&nbsp;
            <x-sorter-component model-alias="customer" :query-title="$query_title" :stuffs="$sorting_details" />
        </h4>
        <a href="{{ route('dashboard.customers.create') }}" class="btn btn-sm btn-outline-primary px-5">Add new customer</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th class="text-right">Phone Number</th>
                <th class="text-right">Created At</th>
                <th class="text-right">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td><a href="{{ route('dashboard.customers.show', $customer->customer_id) }}">{{ $customer->customer_id }}</a></td>
                <td>{{ $customer->full_name }}</td>
                <td class="text-right">{{ $customer->phone_number }}</td>
                <td class="text-right">{{ $customer->created_at->toDateString() }}</td>
                <td class="text-right">{{ $customer->updated_at->toDateString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->withQueryString()->links() }}
</div>
@endsection
