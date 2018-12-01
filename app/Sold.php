<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    protected $fillable = ['product_id', 'sold',];

	public function product()
	{
	return $this->belongsTo('App\Product');
	}
}
