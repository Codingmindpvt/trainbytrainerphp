<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'star',
        'title',
        'description',
     //    'trained_date',
    ];

    //status const

    const STATUS_ACTIVE = 'A';

    const STATUS_INACTIVE = 'D';

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

    //REVIEW TYPE const

    const REVIEW_TYPE_COACH = 'C';
    const REVIEW_TYPE_PROGRAM = 'P';
    const REVIEW_TYPE_CLASS = 'CL';

   public static function getReviewTypeOptions()
   {
   return
    [
         self::REVIEW_TYPE_COACH =>  'Coach',
         self::REVIEW_TYPE_CLASS =>  'Class',
         self::REVIEW_TYPE_PROGRAM =>  'Program',
   ];
   }

   public static function getReviewTypebadges()
   {
   return
    [
         self::REVIEW_TYPE_COACH =>  'warning',
         self::REVIEW_TYPE_CLASS =>  'warning',
         self::REVIEW_TYPE_PROGRAM =>  'info'
   ];
   }

    public function getReviewType()
    {
         $list=self::getReviewTypeOptions();
         $badges = self::getReviewTypebadges();
         return isset($list[$this->review_type]) ? "<span class='label label-".$badges[$this->review_type]."'>".$list[$this->review_type]."</span>" : "Not Defined";
    }

    public function users()
    {
         return $this->hasOne(User::class,'id','rated_by');
    }
    public function coach()
    {
         return $this->hasOne(User::class,'id','rate_for');
    }
    public function reviewpanel()
    {
     return $this->belogsTo(User::class);
    }
    public function program()
    {
         return $this->hasOne(CoachProgram::class,'id','rate_for_program_id');
    }
    public function class()
    {
         return $this->hasOne(CoachClass::class,'id','rate_for_class_id');
    }
  

}
