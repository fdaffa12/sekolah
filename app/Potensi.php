<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $fillable = [
		'potensi', 'potensi_slug', 'description', 'image', 'status'
	];
}
