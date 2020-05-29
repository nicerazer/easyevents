@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb mt-0 bg-dark">
    <ol class="breadcrumb px-5">
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.hub') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Item</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex align-items-baseline justify-content-between mb-3">
        <h4 class="d-flex flex-row align-items-baseline">
            {{ $model_count }}&nbsp;<strong>items</strong>&nbsp;<span class="text-muted">sorted by</span>&nbsp;
            <x-sorter-component model-alias="item" :query-title="$query_title" :stuffs="$sorting_details" />
        </h4>
        <a href="{{ route('dashboard.items.create') }}" class="btn btn-sm btn-outline-primary px-5">Add new item</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th class="text-right">Price (RM)</th>
                <th>Image</th>
                <th class="text-right">Created At</th>
                <th class="text-right">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @php ($img_placeholder = asset('storage/img/placeholder_600x600.jpg'))
            @foreach ($items as $item)
            <tr>
                <td><a href="{{ route('dashboard.items.show', $item->item_id) }}">{{ $item->item_id }}</a></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td class="text-right">{{ $item->price_formatted }}</td>
                <td>
                    <img width="50" src="{{ $item->img_path ? Storage::url($item->img_path) : $img_placeholder }}" alt="Item Image">
                </td>
                <td class="text-right">{{ $item->created_at->toDateString() }}</td>
                <td class="text-right">{{ $item->updated_at->toDateString() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->withQueryString()->links() }}
</div>
@endsection
