<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name'];

    public function question()
    {
        return $this->hasMany('App\Question');
    }
    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }   
}

