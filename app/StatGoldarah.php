<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatGoldarah extends Model
{
    protected $fillable = [
        'statistik', 'pria', 'perempuan', 'jumlah', 'status'
        ];
}
