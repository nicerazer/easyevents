@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <h2>Book an item</h2>
    <form action="{{ route('bookings.store', ['id'=>$customer_id]) }}" method="POST">
        @csrf
        <label>Select an item from the list</label>
        <div class="form-group">
            <select name="item_id" class="form-control" size="8" required>
                @foreach ($items as $item)
                <option value="{{ $item->item_id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input name="quantity" class="form-control w-25" type="number" default="1" min="1" max="20" required>
        </div>
        {{-- ADD DATE --}}
        <div class="form-group">
            <label>Date</label>
            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                <input required name="date" type="text" class="form-control" value="{{ today()->toDateString() }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-th"></i></button>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-primary">Submit Booking</button>
    </form>
</div>
@endsection
