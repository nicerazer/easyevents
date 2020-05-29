<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Staff;
use Illuminate\Http\Request;

class Hub extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('pages.dashboard.hub', [
            'bookings_counts' => Booking::count(),
            'items_counts' => Item::count(),
            'customers_counts' => Customer::count(),
            'staff_counts' => Staff::count(),
        ]);
    }
}
