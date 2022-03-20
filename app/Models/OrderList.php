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
 /*****************************************/

    /* STATUS CONST */

    /* [A = Active, S = Suspend] */

    /****************************************/
    const STATUS_PAID = 'P';

    const STATUS_UNPAID = 'U';



    public static function getStatusOptions()
    {
        return
            [
                self::STATUS_PAID =>  'Paid',
                self::STATUS_UNPAID =>  'Unpaid',
            ];
    }

    public static function getStatusbadges()
    {
        return
            [
                self::STATUS_PAID =>  'success',
                self::STATUS_UNPAID =>  'danger',
            ];
    }

    public function getStatus()
    {
        $list = self::getStatusOptions();
        $badges = self::getStatusbadges();
        return isset($list[$this->status]) ? "<span class='label label-" . $badges[$this->status] . "'>" . $list[$this->status] . "</span>" : "Not Defined";
    }
     public function getStatusText()
    {
        $list = self::getStatusOptions();
        return isset($list[$this->status]) ? $list[$this->status] : "Paid";
    }

}
