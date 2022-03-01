<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachClassSchedule extends Model
{
    protected $fillable = ['schedule_id', 'from_time', 'to_time'];

    use HasFactory;
}
