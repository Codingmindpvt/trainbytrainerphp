<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationDetail extends Model
{
    use HasFactory;

    protected $table='user_coach_verification_details';

    /*****************************************/

    /* QUALIFICATION CONST */

    /* [Y = Yes, N = No] */

    /****************************************/
    const QUALIFICATION_YES = 'Y';

    const QUALIFICATION_NO = 'N';


    public static function getQualificationOptions()
    {
        return
         [
              self::QUALIFICATION_YES =>  'Yes',
              self::QUALIFICATION_NO =>  'No'
        ];
    }

    public static function getQualificationBadges()
    {
        return
         [
              self::QUALIFICATION_YES =>  'success',
              self::QUALIFICATION_NO =>  'danger'
        ];
    }

     public function getQualification()
     {
          $list=self::getQualificationOptions();
          $badges = self::getQualificationBadges();
          return isset($list[$this->qualified_fitness_coach]) ? "<span class='badge badge-".$badges[$this->qualified_fitness_coach]."'>".$list[$this->qualified_fitness_coach]."</span>" : "Not Defined";
     }

    public function isQualificationYes()
    {
        return VerificationDetail::QUALIFICATION_YES;
    }

    public function isQualificationNo()
    {
        return VerificationDetail::QUALIFICATION_NO;
    }

     /*****************************************/

    /* INSURANCE CONST */

    /* [Y = Yes, N = No] */

    /****************************************/
    const INSURANCE_YES = 'Y';

    const INSURANCE_NO = 'N';


    public static function getInsuranceOptions()
    {
        return
         [
              self::INSURANCE_YES =>  'Yes',
              self::INSURANCE_NO =>  'No'
        ];
    }

    public static function getInsuranceBadges()
    {
        return
         [
              self::INSURANCE_YES =>  'success',
              self::INSURANCE_NO =>  'danger'
        ];
    }

     public function getInsurance()
     {
          $list=self::getInsuranceOptions();
          $badges = self::getInsuranceBadges();
          return isset($list[$this->currently_insured]) ? "<span class='badge badge-".$badges[$this->currently_insured]."'>".$list[$this->currently_insured]."</span>" : "Not Defined";
     }

    public function isInsuranceYes()
    {
        return VerificationDetail::INSURANCE_YES;
    }

    public function isInsuranceNo()
    {
        return VerificationDetail::INSURANCE_NO;
    }

    /*****************************************/

    /* AGREE COACH VERIFICATION CONST */

    /* [A = Agree, N = Not Agree] */

    /****************************************/
    const COACH_AGREE = 'A';

    const COACH_NOT_AGREE = 'N';

    public static function getAgreeOptions()
    {
        return
         [
              self::COACH_AGREE =>  'Agree',
              self::COACH_NOT_AGREE =>  'Disagree'
        ];
    }

    public static function getAgreeBadges()
    {
        return
         [
              self::COACH_AGREE =>  'success',
              self::COACH_NOT_AGREE =>  'danger'
        ];
    }

    public function getAgree()
     {
          $list=self::getAgreeOptions();
          $badges = self::getAgreeBadges();
          return isset($list[$this->agree_as_a_coach]) ? "<span class='badge badge-".$badges[$this->agree_as_a_coach]."'>".$list[$this->agree_as_a_coach]."</span>" : "Not Defined";
     }



    /*****************************************/

    /* COACH PROFILE BADGE STATUS CONST */

    /* [C = Certify, P = Pending(not submitted), S = Suspend] */

    /****************************************/

    const STATUS_PENDING = 'P';

    const STATUS_CERTIFIED = 'C';

    const STATUS_SUSPEND = 'S';

   

    public static function getBadgeStatusOptions()
    {
        return
            [
                self::STATUS_PENDING =>  'Not Submitted',
                self::STATUS_CERTIFIED =>  'Verify',
                self::STATUS_SUSPEND =>  'Reject',
            ];
    }


    public function getBadgeStatus()
    {
        $list = self::getBadgeStatusOptions();
        return isset($list[$this->badge_status]) ? $list[$this->badge_status]: "Not Defined";
    }


    public function verification_document(){
        return $this->hasMany('App\Models\VerificationDocument','verification_detail_id','id');
    }
}
