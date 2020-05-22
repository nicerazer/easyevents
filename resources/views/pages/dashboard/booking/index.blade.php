@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                @foreach ($table_fields as $table_field=>$table_field_type)
                <th {{ $table_field_type == "int" ? 'class=text-right' : '' }}>{{ $table_field }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                @foreach ($booking->getAttributes() as $column)
                <td {{ is_int($column) ? 'class=text-right' : '' }}>{{ $column }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
