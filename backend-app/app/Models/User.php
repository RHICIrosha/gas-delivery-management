<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nic',
        'address',
        'user_type',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];



    // Role checking methods
    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }

    public function isOutletManager()
    {
        return $this->user_type === 'outlet_manager';
    }

    public function isCustomer()
    {
        return $this->user_type === 'customer';
    }
        public function isBusinessr()
    {
        return $this->user_type === 'business';
    }
}
