<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipComment extends Model
{
    protected $table = "tipscomments";
    protected $fillable = [
        'user_id',
        'tips_id',
        'comment',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tip()
    {
        return $this->belongsTo(Tip::class, 'tips_id');
    }
}

