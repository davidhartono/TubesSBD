<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->username = 'user_' . strval(User::count());
        });
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; 
    }

    use Notifiable;

    public function tipComments()
    {
        return $this->hasMany(TipComment::class);
    }
    public function recipeComments()
    {
        return $this->hasMany(RecipeComment::class);
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}