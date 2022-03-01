<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class PaymentDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transection_id',
        'price',
    ];

    public function getProgramDetail($id){
    $program = CoachProgram::where("id", $id)->where("user_id", Auth::id())->first();
    return $program;

    }
    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
