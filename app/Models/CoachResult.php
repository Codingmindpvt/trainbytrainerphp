<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachResult extends Model
{
    use HasFactory;

    protected $table='users_coach_results';
    protected $fillable = ['id', 'title', 'description', 'star', 'image_file', 'coach_detail_id', 'created_at', 'updated_at'];
}
