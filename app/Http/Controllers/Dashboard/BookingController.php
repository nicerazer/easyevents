<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Booking;

class BookingController extends AbstractDashboardClass {
    protected function getModels($paginate_value) {
        return Booking::paginate($paginate_value);
    }
    protected $model_alias = "booking";
    protected $model_attribute_aliases = [
        'customer\'s name', 'item', 'quantity', 'date', 'created at'
    ];
}
