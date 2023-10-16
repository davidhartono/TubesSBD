<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'image',
        'title',
        'description',
        'portion',
        'time',
        'ingredient',
        'step',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function comments()
    {
        return $this->hasMany(RecipeComment::class, 'recipe_id');
    }
}