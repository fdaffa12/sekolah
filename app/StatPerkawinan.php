<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatPerkawinan extends Model
{
    protected $fillable = [
        'statistik', 'pria', 'perempuan', 'jumlah', 'status'
        ];
}
