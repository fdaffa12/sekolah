<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $guarded = [];
    
    public function child()
    {
        return $this->hasMany(Coment::class, 'parent_id');
    }
}
