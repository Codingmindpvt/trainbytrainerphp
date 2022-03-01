<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    //status const

     const STATUS_ACTIVE = 'A';

     const STATUS_INACTIVE = 'I';

     const TERM_AND_CONDITION_OF_USER = 'TU';

     const TERM_AND_CONDITION_OF_COACH = 'TC';
     
     const PRIVACY_POLICY = 'P';
     
     const ABOUT_US = 'A';

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
        self::TERM_AND_CONDITION_OF_USER =>  'Terms & Conditions of User',
        self::TERM_AND_CONDITION_OF_COACH =>  'Terms & Conditions of Coach',
        self::PRIVACY_POLICY =>  'Privacy Policy',
        self::ABOUT_US =>  'About Us'
    ];
    }
    
    public function getType()
    {
        $list=self::getTypeOptions();
        return isset($list[$this->type]) ? $list[$this->type] : "Not Defined";
        
    }

    public function isUserTerms()
    {
        return Page::TERM_AND_CONDITION_OF_USER;
    }

    public function isCoachTerms()
    {
        return Page::TERM_AND_CONDITION_OF_COACH;
    }

    public function isPrivacy()
    {
        return Page::PRIVACY_POLICY;
    }

    public function isAbout()
    {
        return Page::ABOUT_US;
    }
}
