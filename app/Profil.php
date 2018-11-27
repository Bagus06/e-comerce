<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
	protected $fillable = ['phone', 'imagePath', 'facebook', 'instagram', 'websita', 'user_id',];

    public function user()
	{
	return $this->belongsTo('App\User');
	}
}
