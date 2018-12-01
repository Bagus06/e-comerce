<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imagePath', 'title', 'description', 'type_id', 'user_id', 'price',];

	public function checkout()
	{
		return $this->hasMany('App\Checkout');
	}
	public function type()
	{
	return $this->belongsTo('App\Type');
	}
	public function user()
	{
	return $this->belongsTo('App\User');
	}
}
