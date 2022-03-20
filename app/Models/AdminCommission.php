<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCommission extends Model
{
    use HasFactory;
    /*****************************************/

    /* STATUS CONST */

    /* [C = Class, P = Program] */

    /****************************************/


     const STATUS_CLASS = 'C';

    const STATUS_PROGRAM = 'P';

    public static function getStatusOptions()
    {
    return
     [
        self::STATUS_CLASS  =>  'class',
       self::STATUS_PROGRAM =>  'Program',
    ];
    }
   public function getStatus()
     {
          $list=self::getStatusOptions();
          //$badges = self::getStatusbadges();
          return isset($list[$this->status]) ? "<span class='label label-'>".$list[$this->status]."</span>" : "Not Defined";
     }
}
