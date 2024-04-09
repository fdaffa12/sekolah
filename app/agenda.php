<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    protected $fillable = [
        'nama', 'slug', 'agenda', 'tanggal', 'time', 'lokasi', 'status'
        ];
}
