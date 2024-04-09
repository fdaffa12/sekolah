<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
		'judul', 'title_slug', 'description', 'status'
	];
}
