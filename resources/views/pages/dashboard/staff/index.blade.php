@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Staff</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex align-items-baseline justify-content-between mb-3">
        <h4 class="d-flex flex-row align-items-baseline">
            {{ $model_count }}&nbsp;<strong>staff</strong>&nbsp;<span class="text-muted">sorted by</span>&nbsp;
            <x-sorter-component model-alias="staff" :query-title="$query_title" :stuffs="$sorting_details" />
        </h4>
        <a href="{{ route('dashboard.staff.create') }}" class="btn btn-sm btn-outline-primary px-5">Add new staff</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Full Name</th>
                <th class="text-right">Phone Number</th>
                <th >Email</th>
                <th class="text-right">Created At</th>
                <th class="text-right">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $model)
            <tr>
                <td><a href="{{ route('dashboard.staff.show', $model->staff_id) }}">{{ $model->staff_id }}</a></td>
                <td>{{ $model->username }}</td>
                <td>{{ $model->full_name }}</td>
                <td class="text-right">{{ $model->phone_number }}</td>
                <td>{{ $model->email }}</td>
                <td class="text-right">{{ $model->created_at->toDateString() }}</td>
                <td class="text-right">{{ $model->updated_at->toDateString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $staff->withQueryString()->links() }}
</div>
@endsection
