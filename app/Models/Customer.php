<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    // public function booking() {
    //     return $this->hasOne('App\Models\Booking');
    // }
    public function bookings() {
        return $this->hasMany('App\Models\Booking','customer_id','customer_id');
    }

    public function getFullNameAttribute() {
        return "$this->first_name $this->last_name";
    }

    protected $fillable = ['first_name', 'last_name', 'phone_number'];
}
