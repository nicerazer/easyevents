<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    public function bookings() {
        return $this->hasMany('App\Models\Booking', 'item_id', 'item_id');
    }

    public function getPriceFormattedAttribute() {
        return number_format($this->price, 2, '.', ',');
    }

    protected $fillable = ['name', 'description', 'price'];
}
