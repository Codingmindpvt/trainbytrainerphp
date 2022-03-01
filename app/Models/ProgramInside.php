<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramInside extends Model
{

    protected $table='user_coach_program_insides';
    use HasFactory;
    protected $fillable = [
        'id',
        'coach_program_id',
        'title',
        'description',
        'created_at',
        'updated_at'
    ];
}
