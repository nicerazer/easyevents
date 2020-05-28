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

    public function getPriceFormattedAttribute() {
        return number_format($this->price, 2, '.', ',');
    }

    protected $fillable = ['name', 'description', 'price'];
}
