<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    public function program(){
        return $this->hasOne(CoachProgram::class, 'id', 'program_id');
    }

    public function class(){
        return $this->hasOne(CoachClass::class, 'id', 'class_id');
    }

    public function payment(){
        return $this->hasOne(SepaPayment::class, 'id', 'sepa_payment_id');
    }
}