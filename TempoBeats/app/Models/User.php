<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'Age',
        'Gender',
        'password',
        'role',
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

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'playlistusers','user_id','playlist_id');
    }
    
    public function artist()
    {
        return $this->hasOne(Artist::class);
    }

    public function LikedPlaylist()
    {
        return $this->hasOne(likedPlaylist::class);
    }

    public function Subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function getRole(){
        return $this->belongsToMany(role::class,'userroles','user_id','role_id');
    }

    public function hasRole($roleName)
    {
        return $this->getRole()->where('name', $roleName)->exists();
    }

    public function getHistorySong(){
        return $this->hasMany(history::class)->with('getSong')->orderByDesc('created_at');
    }
}
