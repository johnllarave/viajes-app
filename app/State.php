<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function requests() {
		return $this->hasMany(Requests::class);
	}
}
