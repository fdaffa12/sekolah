<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    protected $fillable = [
		'nama', 'nip', 'tempat_lahir', 'tanggal_lahir', 'image', 'pendidikan', 'jabatan', 'status'
	];
}
