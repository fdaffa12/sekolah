<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public function categoryitem()
    {
        return $this->hasMany('App\CategoryItem');
    }
}
