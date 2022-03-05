<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['class_id', 'day_id', 'category_id', 'from_time', 'to_time', 'status', 'user_id'];
    use HasFactory;

    function class ()
    {
        return $this->hasOne(CoachClass::class, 'id', 'class_id');
    }

    public function day()
    {
        return $this->hasOne(Day::class, 'id', 'day_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function booking()
    {
        return $this->hasOne(Booking::class, 'schedule_id', 'id');
    }
}