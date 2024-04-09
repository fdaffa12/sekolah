<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
		'address', 'phone', 'fax', 'email', 'social', 'about', 'image'
	];
}
