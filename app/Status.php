<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function journals() {
    	return $this->belongsTo("App\Journal");
    }
}
