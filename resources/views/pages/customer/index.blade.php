@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="mb-3">
        <h2>Select your customer information</h2>
        <form action="{{ route('customers.index') }}" method="GET">
            <div class="input-group">
                <input value="{{ $filter_customer_name }}" name="customer%name" type="text" placeholder="Search for a name" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-right">Phone No.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->customer_id }}</td>
                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->full_name }}</a></td>
                <td class="text-right">{{ $customer->phone_number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}

    <a href="{{ route('customers.create') }}">Couldn’t find your information? Join us now as a new customer!</a>
</div>
@endsection
