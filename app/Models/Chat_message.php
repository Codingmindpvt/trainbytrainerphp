<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_message extends Model
{
    use HasFactory;
    public function getCreatedAtAttribute($created_at){
        // return $created_at;
        return date('d-m-Y   H:i', strtotime($created_at));
    }
    public function receiver_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'receiver_id')->select(['id', 'first_name','last_name']);
    }

    public function chat()
    {
        return $this->hasOne('App\Models\Chat', 'id', 'chat_id');
    }

}
