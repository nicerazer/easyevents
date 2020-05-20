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
        <button class="btn btn-outline-primary">Submit Booking</button>
    </form>
</div>
@endsection
