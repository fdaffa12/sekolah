<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatPekerjaan extends Model
{
    protected $fillable = [
        'statistik', 'pria', 'perempuan', 'jumlah', 'status'
        ];
}
