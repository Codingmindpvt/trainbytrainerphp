<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachImage extends Model
{
    use HasFactory;
    protected $table='users_coach_images';
    protected $fillable = ['id', 'image_file', 'coach_detail_id', 'created_at', 'updated_at'];
}
