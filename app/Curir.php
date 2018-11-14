<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curir extends Model
{
     protected $fillable = [
        'curir','delivery',
    ];
    public function checkout()
	{
		return $this->hasMany('App\Checkout');
	}
}
