<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BillingAddress extends Model
{
    use HasFactory;

    public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}

