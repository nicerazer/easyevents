<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'customer_id');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item', 'item_id', 'item_id');
    }

    protected $casts = ['date' => 'datetime:Y-m-d'];

    protected $fillable = ['customer_id', 'item_id', 'quantity', 'date'];
}
