<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $table = 'staff';
    protected $primaryKey = 'staff_id';

    protected $fillable = ['username', 'first_name', 'last_name', 'phone_number', 'email'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function getFullNameAttribute() {
        return "$this->first_name $this->last_name";
    }

    protected $attributes = [
        'password' => '',
    ];

}
