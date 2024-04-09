<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    
    public function child()
    {
        return $this->hasMany(Contact::class, 'parent_id');
    }
}
