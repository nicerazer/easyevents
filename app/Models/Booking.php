<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }
}
