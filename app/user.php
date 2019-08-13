<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public function login($detail)
    {
       return $detail;
    }
}
