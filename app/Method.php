<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
     protected $fillable = [
        'method','pay','description',
    ];
    public function checkout()
	{
		return $this->hasMany('App\Checkout');
	}
}
