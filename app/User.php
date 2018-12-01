<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function checkout()
    {
        return $this->hasMany('App\Checkout');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function profil()
    {
        return $this->hasMany('App\Profil');
    }

    public function chat()
    {
        return $this->hasMany('App\Chat');
    }
}
