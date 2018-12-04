<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'token', 'jumlah','harga','user_id','product_id','addres','curir', 'note','city_id','pay_id','total',
    ];

    public function product()
	{
	return $this->belongsTo('App\Product');
	}
	public function user()
	{
	return $this->belongsTo('App\User');
	}
	public function method()
	{
	return $this->belongsTo('App\Method');
	}
}
