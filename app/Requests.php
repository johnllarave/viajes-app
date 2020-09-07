<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    public function users() {
		return $this->belongsTo(Users::class);
	}

	public function quotation() {
		return $this->hasMany(Quotation::class);
	}

	public function state() {
		return $this->belongsTo(State::class);
	}
}
