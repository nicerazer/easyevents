@extends('layouts.app')

@section('content')
<section id="section--home--hero">
    <!-- Overlay must be on front most -->
    <!-- Backgorund must be at the back -->
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/girl-social-media.png') }}" alt="Home page banner">
            <div class="d-flex align-items-center justify-content-center flex-column">
                <h3>Booking products has never been this easy</h3>
                <a class="btn btn-primary btn-default" href="#">Let's get started! <span><i class="fa fa-caret-down"></i></span></a>
            </div>
        </div>
    </div>
</section>
<hr>
<section id="section--home--search-customer" style="padding: 200px 0;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <div class="float-left">
                <h3 class="mb-5">Search for your name to start booking!</h3>
                <input type="text" class="form-control w-100" placeholder="E.g: John Doe">
                <a href="{{ route('customers.create') }}">or click here to become a new customer</a>
            </div>
        </div>
    </div>
</section>
@endsection
