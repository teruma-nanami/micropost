<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Tweet;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
    public function likes()
    {
        return $this->belongsToMany(Tweet::class, 'likes')->withTimestamps();
    }
    public function follows()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_user_id')->withTimestamps();
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_user_id', 'user_id')->withTimestamps();
    }
}