<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
	protected $fillable = [
        'chat','imagePath','product_id','user_id',
    ];

    public function user()
	{
	return $this->belongsTo('App\User');
	}

    public function product()
	{
	return $this->belongsTo('App\Product');
	}
}
