<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingStyle extends Model
{
    use HasFactory;

    //status const

     const STATUS_ACTIVE = 'A';

     const STATUS_INACTIVE = 'I';

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
}
