<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachEducation extends Model
{
    use HasFactory;

    protected $table = 'users_coach_education';
    protected $fillable = ['id', 'title', 'completion_year', 'institute', 'coach_detail_id', 'created_at', 'updated_at'];
}
