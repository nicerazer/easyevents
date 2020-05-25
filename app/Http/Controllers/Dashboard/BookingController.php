<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;

class BookingController extends AbstractDashboardClass {
    protected function getModels($paginate_value, $query, $order) {
        return Booking::orderBy($query, $order)->paginate($paginate_value);
    }
    protected $model_alias = "booking";
    protected $model_attribute_aliases = [
        // 'customer\'s name', 'item', 'quantity', 'date', 'created at'
        'quantity', 'date', 'created at'
    ];
}
