<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatAgama extends Model
{
    protected $fillable = [
        'statistik', 'pria', 'perempuan', 'jumlah', 'status'
        ];
}
