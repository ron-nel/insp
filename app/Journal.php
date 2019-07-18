<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    public function status() {
        return $this->belongsTo("\App\Status");
    }
}
