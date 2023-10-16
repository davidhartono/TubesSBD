<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeComment extends Model
{
    use HasFactory;
    protected $table = "recipecomments";
    protected $fillable = [
        'user_id',
        'recipe_id',
        'comment',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
