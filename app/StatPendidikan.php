<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatPendidikan extends Model
{
    protected $fillable = [
        'statistik', 'pria', 'perempuan', 'jumlah', 'status'
        ];
}
