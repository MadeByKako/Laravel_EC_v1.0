<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function parent_category()
    {
        return $this->belongsTo('App\Models\ParentCategory');
    }
}
