<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['user_id', 'total_all', 'token', 'mthod', 'curir',];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
