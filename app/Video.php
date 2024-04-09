<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
		'title', 'slug', 'link', 'image', 'status'
	];
}
