<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programImage extends Model
{
    protected $table='user_coach_program_images';
    use HasFactory;
    protected $fillable = ['id', 'image_file', 'title', 'coach_program_id', 'created_at', 'updated_at'];
}
