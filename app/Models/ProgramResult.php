<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramResult extends Model
{
    use HasFactory;
    protected $table='user_coach_program_results';
    protected $fillable = [
        'id',
        'title',
        'description',
        'certificate',
        'image_file',
        'coach_program_id',
        'created_at',
        'updated_at'
    ];
}
