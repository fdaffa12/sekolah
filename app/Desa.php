<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = [
		'nama_desa', 'nama_slug', 'description', 'image', 'status'
	];
}
