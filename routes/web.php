<?php

use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Home page
Route::get('/', function () { return view('/pages/home'); })->name('home');

/**
 * CRUDful customer routings
 */
Route::get('/customers', 'CustomerController@index')->name('customers.index');
Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
Route::post('/customers/store', 'CustomerController@store')->name('customers.store');
Route::get('/customers/{id}', 'CustomerController@show')->name('customers.show');
Route::get('/customers/{id}/edit', 'CustomerController@edit')->name('customers.edit');
Route::put('/customers/{id}/update', 'CustomerController@update')->name('customers.update');

/**
 * CRUDful booking routings
 *
 * Notes:
 * - Model 'customer' cannot be deleted here
 * - No booking 'index', model 'booking' can only be retrieved through
 *   the model 'customer' as a collection
 */
Route::get('/customers/{id}/bookings/create', 'BookingController@create')->name('bookings.create');
Route::post('/customers/{id}/bookings', 'BookingController@store')->name('bookings.store');
Route::get('/bookings/{id_booking}', 'BookingController@show')->name('bookings.show');
Route::get('/bookings/{id_booking}/edit', 'BookingController@edit')->name('bookings.edit');
Route::put('/bookings/{id_booking}/update', 'BookingController@update')->name('bookings.update');
Route::delete('/bookings/{id_booking}/destroy', 'BookingController@destroy')->name('bookings.destroy');

// Booking indexing, creating, store
// Route::resource('booking', 'BookingController')->only(['index', 'create', 'store']);

// Booking indexing, show
// Route::resource('/search', 'SearchController')->only(['index', 'show']);
// Route::get('/search/booking', 'BookingSearchController@search');
// Route::get('/search/booking/{id}', 'BookingSearchController@show');




///////////////////////////////////////////////
/**
 * Dashboard Resourceful Routes; Item, Booking
 */
///////////////////////////////////////////////
/*
Route::get('dashboard', function() { return view('/pages/dashboard'); })->name('dashboard');
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
*/
