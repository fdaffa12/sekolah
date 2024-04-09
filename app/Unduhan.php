<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unduhan extends Model
{
    protected $fillable = [
		'judul', 'judul_slug', 'file', 'status'
	];
}
