<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function sender_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'sender_id')->select(['id', 'first_name','last_name']);
    }
    public function receiver_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'receiver_id')->select(['id', 'first_name','last_name','profile_image']);
    }

    public function chat_messages()
    {
        return $this->hasMany('App\Models\Chat_message', 'chat_id', 'id');
    }

    public function last_message()
    {
        return $this->hasOne('App\Models\Chat_message', 'chat_id', 'id')->where('chat_status','0')->orderBy('id','desc');
    }

    public function getCreatedAtAttribute($created_at){
        // return $created_at;
        return date('d-m-Y   H:i', strtotime($created_at));
    }
}
