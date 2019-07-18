<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];


	public function profileImage(){
		return ($this->img_path) ? "/{$this->img_path}" : "/images/no-image.jpg";
	}
    public function users() {
    	return $this->hasOne("App\User");
    }

    
}
