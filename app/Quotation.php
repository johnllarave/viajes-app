<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    public function requests() {
		return $this->belongsTo(Requests::class);
	}
}
