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
<section id="section--home--search-customer" style="padding: 200px 0;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <div class="float-left">
                <h3 class="mb-4"><strong>Search for your name to start booking!</strong></h3>
                <form action="{{ route('customers.index') }}" method="GET">
                    <div class="input-group m-0">
                        <input name="first_name" type="text" class="form-control" placeholder="E.g: John Doe">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
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
