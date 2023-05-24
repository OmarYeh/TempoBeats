<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function getSong(){
        return $this->belongsTo(song::class,'song_id','id');
    }
}
