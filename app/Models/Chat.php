<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function getCreatedAtAttribute($created_at){
        // return $created_at;
        return date('Y-m-d H:i:s', strtotime($created_at));
    }
}
