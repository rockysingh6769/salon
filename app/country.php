<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function state()
    {
    	return  $this->hasMany(state::class);
    }
}
