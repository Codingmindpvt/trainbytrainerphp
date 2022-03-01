<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowItWorkContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type_id',
        'description',
        'image_file',
        'type',
    ];
    public function how_it_work_type(){
        return $this->hasOne(HowItWorkType::class,'id','type_id');
    }
}
