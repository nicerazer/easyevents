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

/**
 * Dashboard routes
 *
 * A generic, crud-ful implementation for every model that exists. The controller
 * implementation utilizes manage all the models using a generic template.
 */
Route::resource('dashboard/bookings', 'Dashboard\BookingController')->names([
    // These are added for 'dashboard' prefix purposes
    'index' => 'dashboard.bookings.index',
    'create' => 'dashboard.bookings.create',
    'store' => 'dashboard.bookings.store',
    'show' => 'dashboard.bookings.show',
    'update' => 'dashboard.bookings.update',
    'destroy' => 'dashboard.bookings.destroy',
]);
