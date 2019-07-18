<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function collections() {
    	return $this->hasMany("App\Collection");
    }

    public function profiles() {
    	return $this->hasMany("App\Profile");
    }
}
