<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

       //status const

     const STATUS_ACTIVE = 'A';

     const STATUS_INACTIVE = 'I';

     const TYPE_COACH = 'C';

     const TYPE_PROGRAM = 'P';

    public static function getStatusOptions()
    {
    return
     [
          self::STATUS_ACTIVE =>  'Active',
          self::STATUS_INACTIVE =>  'Inactive',
    ];
    }

    public static function getStatusbadges()
    {
    return
     [
          self::STATUS_ACTIVE =>  'success',
          self::STATUS_INACTIVE =>  'danger'
    ];
    }

     public function getStatus()
     {
          $list=self::getStatusOptions();
          $badges = self::getStatusbadges();
          return isset($list[$this->status]) ? "<span class='label label-".$badges[$this->status]."'>".$list[$this->status]."</span>" : "Not Defined";
     }

    public static function getTypeOptions()
    {
    return
     [
          self::TYPE_COACH =>  'Coach',
          self::TYPE_PROGRAM =>  'Program',
    ];
    }

    public function getType()
    {
          $list=self::getTypeOptions();
          return isset($list[$this->type]) ? $list[$this->type]: "Not Defined";
    }

    public function isTypeCoach()
    {
        return WishList::TYPE_COACH;
    }

    public function isTypeProgram()
    {
        return WishList::TYPE_PROGRAM;
    }


    public function users(){
        return $this->hasOne(User::class, 'id', 'coach_id');
    }
    public function coach_program(){
        return $this->hasOne('App\Models\CoachProgram','id','program_id');
        }
}
