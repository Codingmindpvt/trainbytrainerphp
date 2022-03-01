<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['schedule_id', 'class_id', 'user_id', 'status', 'booking_date'];


    //status const
    const STATUS_REQUEST_SEND = 1;

    const STATUS_ACCEPT = 2;

    const STATUS_REJECT = 0;

   public static function getStatusOptions()
   {
   return
    [
        self::STATUS_REQUEST_SEND =>  'Pending', //Request Send
        self::STATUS_ACCEPT =>  'Accept',
        self::STATUS_REJECT =>  'Reject',
   ];
   }

   public static function getStatusbadges()
   {
   return
    [
        self::STATUS_REQUEST_SEND =>  'warning',
        self::STATUS_ACCEPT =>  'success',
        self::STATUS_REJECT =>  'danger',
   ];
   }

    public function getStatus()
    {
         $list=self::getStatusOptions();
         $badges = self::getStatusbadges();
         return isset($list[$this->status]) ? "<span class='label label-".$badges[$this->status]."'>".$list[$this->status]."</span>" : "Not Defined";
    }

    public function user()
    {
         return $this->hasOne(User::class,'id','user_id');
    }

    public function schedule()
    {
         return $this->hasOne(Schedule::class,'id','schedule_id');
    }

    public function coach_class()
    {
         return $this->hasOne(CoachClass::class,'id','class_id');
    }

}
