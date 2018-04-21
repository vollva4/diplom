<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['category_id', 'question', 'answer', 'author', 'authors_email', 'published','description'];
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
     public function scopeUnanswered($query)
    {
        return $query->where('answer', NULL)->orderBy('created_at');
    }
    public function scopePublished($query)
    {
        return $query->where('hidden', false);
    }


}