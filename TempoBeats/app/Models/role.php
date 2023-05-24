<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public function getUsers(){
        return $this->belongsToMany(User::class,'userroles','role_id','user_id');
    }
}
