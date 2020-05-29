@extends('layouts.app')

@section('content')
<section id="section--home--hero">
    <!-- Overlay must be on front most -->
    <!-- Backgorund must be at the back -->
    <div class="container-fluid mt-5">
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="d-flex align-items-start justify-content-center flex-column">
                <h1 class="mb-4"><strong>EasyEvents</strong>, book items<br>for events with ease</h1>
                <h4 class="mb-5 text-muted">No more nitty gritty of using 3rd part links<br>to book items. With a few simple click<br>your item is booked in no time!</h4>
                <a class="btn btn-outline-primary btn-default px-5" href="#section--home--search-customer">Let's get started!</a>
            </div>
            <img class="w-25 p-5" src="{{ asset('img/girl-social-media.png') }}" alt="Home page banner">
        </div>
    </div>
</section>
<hr>
<section id="section--home--search-customer" style="padding: 100px 0;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <h3 class="mb-4"><strong>Search for your exact credentials to start booking!</strong></h3>
            <div class="float-left">
                <form action="{{ route('customers.find') }}" method="GET">
                    <div class="row">
                        @if ($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="first_name" type="text" class="form-control" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="last_name" type="text" class="form-control" placeholder="Doe">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-block btn-sm px-5"><i class="fa fa-search"></i> Search</button>
                </form>
                <a href="{{ route('customers.create') }}">or click here to become a new customer</a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
var $root = $('html, body');

$('a[href^="#"]').click(function() {
    var href = $.attr(this, 'href');

    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
        window.location.hash = href;
    });

    return false;
});
@endsection
