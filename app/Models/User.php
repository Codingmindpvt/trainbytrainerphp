<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ProgramResult;
use Auth, Hash;
use Session;
use Stripe;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'google_id',
        'facebook_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*****************************************/

    /* STATUS CONST */

    /* [A = Active, S = Suspend] */

    /****************************************/
    const STATUS_ACTIVE = 'A';

    const STATUS_SUSPEND = 'S';



    public static function getStatusOptions()
    {
        return
            [
                self::STATUS_ACTIVE =>  'Active',
                self::STATUS_SUSPEND =>  'Suspend',
            ];
    }

    public static function getStatusbadges()
    {
        return
            [
                self::STATUS_ACTIVE =>  'success',
                self::STATUS_SUSPEND =>  'danger',
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
        return isset($list[$this->status]) ? $list[$this->status] : "Not Defined";
    }



     /*****************************************/

    /* CERTIFIED BADGE STATUS CONST */

    /* [C = Certified, P = Pending(not submitted), R = Reject] */

    /****************************************/

    const BADGE_STATUS_PENDING = 'P';

    const BADGE_STATUS_CERTIFIED = 'C';

    const BADGE_STATUS_REJECT = 'R';



    public static function getCoachBadgeStatusOptions()
    {
        return
            [
                self::BADGE_STATUS_PENDING =>  'Not Submitted',
                self::BADGE_STATUS_CERTIFIED =>  'Certified',
                self::BADGE_STATUS_REJECT =>  'Rejected Request',
            ];
    }

    public static function getCoachBadgeStatusbadges()
    {
        return
            [
                self::BADGE_STATUS_PENDING =>  'warning',
                self::BADGE_STATUS_CERTIFIED =>  'success',
                self::BADGE_STATUS_REJECT =>  'danger',
            ];
    }

    public function getCoachBadgeStatus()
    {
        $list = self::getCoachBadgeStatusOptions();
        $badges = self::getCoachBadgeStatusbadges();
        return isset($list[$this->coach_badge_status]) ? "<span class='label label-" . $badges[$this->coach_badge_status] . "'>" . $list[$this->coach_badge_status] . "</span>" : "Not Defined";
    }


    /*****************************************/

    /* COACH PROFILE VERIFICATION STATUS CONST */

    /* [V = Verify, P = Pending(not submitted), R = Reject] */

    /****************************************/

    const COACH_PROFILE_STATUS_PENDING = 'P';

    const COACH_PROFILE_STATUS_VERIFY = 'V';

    const COACH_PROFILE_STATUS_REJECT = 'R';



    public static function getCoachProfileStatusOptions()
    {
        return
            [
                self::COACH_PROFILE_STATUS_PENDING =>  'Not Submitted',
                self::COACH_PROFILE_STATUS_VERIFY =>  'Verify',
                self::COACH_PROFILE_STATUS_REJECT =>  'Reject',
            ];
    }

    public static function getCoachProfileStatusbadges()
    {
        return
            [
                self::COACH_PROFILE_STATUS_PENDING =>  'warning',
                self::COACH_PROFILE_STATUS_VERIFY =>  'success',
                self::COACH_PROFILE_STATUS_REJECT =>  'danger',
            ];
    }

    public function getCoachProfileStatus()
    {
        $list = self::getCoachProfileStatusOptions();
        $badges = self::getCoachProfileStatusbadges();
        return isset($list[$this->coach_profile_verification_status]) ? "<span class='label label-" . $badges[$this->coach_profile_verification_status] . "'>" . $list[$this->coach_profile_verification_status] . "</span>" : "Not Defined";
    }




    /*****************************************/

    /* ROLE TYPE CONST */

    /* [A = Admin, C = Coach, U = User] */

    /****************************************/
    const ROLE_ADMIN = 'A';

    const ROLE_COACH = 'C';

    const ROLE_USER = 'U';

    public static function getRoleOptions()
    {
        return
            [
                self::ROLE_ADMIN =>  'Admin',
                self::ROLE_COACH =>  'Coach',
                self::ROLE_USER =>  'User',
            ];
    }

    public function getRole()
    {
        $list = self::getRoleOptions();
        return isset($list[$this->role_type]) ? $list[$this->role_type] : "Not Defined";
    }

    public function isRoleAdmin()
    {
        return User::ROLE_ADMIN;
    }

    public function isRoleUser()
    {
        return User::ROLE_USER;
    }

    public function isRoleCoach()
    {
        return User::ROLE_COACH;
    }


    /*****************************************/

    /* USER TYPE CONST */

    /* [P = Personal, B = Business] */

    /****************************************/

    const TYPE_PERSONAL = 'P';

    const TYPE_BUSINESS = 'B';


    public static function getTypeOptions()
    {
        return
            [
                self::TYPE_PERSONAL =>  'Personal',
                self::TYPE_BUSINESS =>  'Business',
            ];
    }

    public function getType()
    {
        $list = self::getTypeOptions();
        return isset($list[$this->user_type]) ? $list[$this->user_type] : "-----";
    }

    public function userTypePersonal()
    {
        return User::TYPE_PERSONAL;
    }

    public function userTypeBusiness()
    {
        return User::TYPE_BUSINESS;
    }

/*****************************************/

    /* ACCOUNT LINK CONST */

    /* [0 = Not Linked, 1 = Linked] */

    /****************************************/
    const ACCOUNT_NOT_LINKED = '0';

    const ACCOUNT_LINKED = '1';



    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function country_view()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function state_view()
    {
        return $this->hasOne(Country::class,'id','state_id');
    }


    /*****************************************/

    /* CREATE PROFILE STATUS CONST */

    /* [0 = not-complete, 1 = Complete] */

    /****************************************/
    const PROFILE_NOT_COMPLETE = 0;

    const PROFILE_COMPLETE = 1;




    /*****************************************/

    /* EMAIL VARIFICATION CONST */

    /* [V = Verify, N = Not Verify] */

    /****************************************/
    const EMAIL_VERIFIED = 'V';

    const EMAIL_NOT_VERIFIED = 'N';

    public static function getEmailVerificationOptions()
    {
        return
            [
                self::EMAIL_VERIFIED =>  'Verified',
                self::EMAIL_NOT_VERIFIED =>  ' NotVerified',
            ];
    }

    public static function getEmailVerificationbadges()
    {
        return
            [
                self::EMAIL_VERIFIED =>  'success',
                self::EMAIL_NOT_VERIFIED =>  'danger'
            ];
    }

    public function getEmailVerification()
    {
        $list = self::getEmailVerificationOptions();
        $badges = self::getEmailVerificationbadges();
        return isset($list[$this->is_verification]) ? "<span class='label label-" . $badges[$this->is_verification] . "'>" . $list[$this->is_verification] . "</span>" : "-----";
    }



    /*****************************************/

    /* create user (signup) */

    /****************************************/

    public static function createUser($data)
    {

        $user                   = new User();

        $user->email            = $data['email'];

        $user->password         = Hash::make($data['password']);

        $user->role_type        = $data['role_type'];

        @$user->user_type       = @$data['user_type'];

        $user->agree_terms      = $data['agree_terms'];

        if ($user->save()) {

            return $user;
        }
        return false;
    }


    /*****************************************/

    /* create profile (after signup)*/

    /****************************************/

    public static function createprofile($data)
    {

        $user                 = User::find(Auth::id());

        $user->first_name     = $data['first_name'];

        $user->last_name      = $data['last_name'];

        $user->address_lat    = @$data['address_lat'];

        $user->address_long   = @$data['address_long'];

        $user->address        = $data['address'];

        $user->postal_code    = $data['postal_code'];

        $user->contact_no     = $data['contact_no'];

        $user->country_id     = $data['country'];

        $user->state_id       = $data['state'];

        $user->city        = $data['city'];

        $user->hash_token = strtotime("now") . uniqid();

        $user->account_complete  = User::PROFILE_COMPLETE;

        $user->profile_image  = @$data['profile_image'];

        //stripe customer id create

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create();
        $user->customer_id = $customer['id'];

        if ($user->save()) {

            return $user;
        }

        return false;
    }

    /*****************************************/

    /* update profile */

    /****************************************/

    public static function updateprofile($data)
    {

        $user = User::find($data['user_id']);

        $user->first_name    =  $data['first_name'];

        $user->last_name     =  $data['last_name'];

        $user->postal_code   =  $data['postal_code'];

        $user->contact_no    =  $data['contact_no'];

        $user->address_lat   = @$data['address_lat'];

        $user->address_long  = @$data['address_long'];

        $user->address       =  $data['address'];

        $user->country_id     = $data['country'];

        $user->state_id       = $data['state_id'];

        $user->city        = $data['city'];

        $user->profile_image =  !empty($data['profile_image']) ? $data['profile_image'] : @$user->profile_image;


        if ($user->save()) {
            return $user;
        }

        return false;
    }

    public function coach_detail(){
        return $this->hasOne('App\Models\CoachDetail','user_id','id');
    }
    public function verification_detail(){
        return $this->hasOne('App\Models\VerificationDetail','user_id','id');
    }
    

    public function getCategoryName($id)
    {

        $category = Category::where('id', $id)->first();

        return isset($category['title']) ? $category['title'] : "-----";
    }
    // public function coach_program()
    // {
    //     return $this->hasOne(CoachProgram::class,'user_id','id');
    // }
    // public function coach_result()
    // {
    //     return $this->hasOne(ProgramResult::class,'user_id','id');
    // }

    public function getTrainingStyleName($id){

        $trainingStyle = TrainingStyle::where('id',$id)->first();

        return $trainingStyle['title'];

    }

    public function getAllEducation($id){

         $educationDetails = CoachEducation::where('coach_detail_id',$id)->get();

        return $educationDetails;

    }

    public function getAllCoachImages($id){

         $details = CoachImage::where('coach_detail_id',$id)->get();

        return $details;

    }

    public function getAllCoachResults($id){

         $details = CoachResult::where('coach_detail_id',$id)->get();

        return $details;

    }

    public function getAllCoachPrograms($id){

         $details = CoachProgram::where('user_id',$id)->get();
         $detailCount = CoachProgram::where('user_id',$id)->count();

        return ['details' => $details, 'detailCount' => $detailCount];

    }

    public function getWishList($coach_id){
        $data = WishList::where('coach_id',$coach_id)
        ->where('user_id', Auth::user()->id)
        ->where('type', WishList::TYPE_COACH)
        ->first();

        return $data;
    }
    public function getProgramWishList($coach_id){
        $data = WishList::where('program_id',$coach_id)
        ->where('user_id', Auth::user()->id)
        ->where('type', WishList::TYPE_PROGRAM)
        ->first();

        return $data;
    }

    public function getClassWishList($class_id){
        $data = WishList::where('class_id',$class_id)
        ->where('user_id', Auth::user()->id)
        ->where('type', WishList::TYPE_CLASS)
        ->first();

        return $data;
    }

    public function getFullName(){
      return  (!empty($this->first_name) && !empty($this->last_name)) ? ucwords($this->first_name." ".$this->last_name) : "-----";
    }
    public function reviewlistpanel()
    {
        return $this->belongsTo(Review::class,'rated_by','id');

    }
     public function billing_address(){
         return $this->hasone(BillingAddress::class,'user_id','id');
     }

     public function getReviewAndRatingDetail($id = Null){
        $review = Review::where('rate_for_coach_id', $id)
        // ->orwhere('rated_by', $id)
        // ->where('review_type', Review::REVIEW_TYPE_PROGRAM)
        // ->orwhere('review_type', Review::REVIEW_TYPE_PROGRAM)
            ;

        $review_list = $review->get();
        $avg_rating = $review->avg('star');
        return (['review_list' => $review_list, 'avg_rating' => $avg_rating]);
     }

     public function reviews(){     
         
        return $this->hasMany('App\Models\Review','rate_for_coach_id','id');
     }

     public function chat()
     {
         return $this->hasMany('App\chat', 'receiver_id', 'sender_id', 'message');
     }
   

}