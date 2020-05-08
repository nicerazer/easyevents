<?php

use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Home page
Route::get('/', function () { return view('/pages/home'); })->name('home');

// Booking indexing, creating, store
Route::resource('booking', 'BookingController')->only(['index', 'create', 'store']);

// Booking indexing, show
// Route::resource('/search', 'SearchController')->only(['index', 'show']);
Route::get('/search/booking', 'BookingSearchController@search');
Route::get('/search/booking/{id}', 'BookingSearchController@show');

// Dashboard Resourceful Routes; Item, Booking
// Routes: index, show, edit, update, destroy
Route::resource('dashboard/items', 'DashboardItemController')->except(['create','store'])->middleware('auth');
Route::resource('dashboard/bookings', 'DashboardBookingController')->except(['create','store'])->middleware('auth');

// Dashboard Resourceful Routes; User
// Routes: all CRUD related operation
Route::get('/dashboard/users', function() {
    return view('pages.dashboard.user.index', [
        'customers' => Customer::paginate(15),
        'staffs' => Staff::paginate(15),
    ]);
})->name('dashboard.user.index');
Route::resource('dashboard/customers', 'DashboardCustomerController')->except('index')->middleware('auth');
Route::resource('dashboard/staffs', 'DashboardStaffController')->except('index')->middleware('auth');
