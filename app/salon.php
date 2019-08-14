<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salon extends Model
{
    public $timestamps = false;
   
    public function user()
    {
    	return $this->belongsTo(user::class);
    }

}
