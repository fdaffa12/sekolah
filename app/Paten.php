<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paten extends Model
{
    protected $fillable = [
		'judul', 'judul_slug', 'description', 'status'
	];
}
