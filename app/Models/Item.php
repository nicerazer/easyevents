<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    public function booking() {
        return $this->hasOne('App\Models\Booking');
    }
}
