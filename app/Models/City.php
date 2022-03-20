<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function state()
    {
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
}