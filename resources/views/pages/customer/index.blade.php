@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <h3>Select your customer information</h3>
        <form action="{{ route('customers.index') }}" method="GET">
            <div class="input-group">
                <input value="{{ $filter_customer_name }}" name="customer%name" type="text" placeholder="enter name to search" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
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
