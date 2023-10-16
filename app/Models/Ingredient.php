<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = "ingredients";
    protected $fillable = [
        'author_id',
        'title',
        'description',
        'image',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
