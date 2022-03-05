<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CoachDetail extends Model
{
    use HasFactory;

    protected $table = 'users_coach_details';
    protected $fillable = [
        'id', 'title', 'bio', 'user_id', 'gender', 'city', 'state', 'country', 'timezone', 'price_range', 'image_file',
        'twitter_url', 'facebook_url', 'instagram_url', 'youtube_url', 'pinterest_url',
        'profile_status', 'created_at', 'updated_at'
    ];
    /*****************************************/

    /* STATUS CONST */

    /* [F = Female, M = Male, O = Other] */

    /****************************************/
    const GENDER_FEMALE = 'F';

    const GENDER_MALE = 'M';

    const GENDER_OTHER = 'O';

    public static function getGenderOptions()
    {
        return
            [
                self::GENDER_FEMALE =>  'Female',
                self::GENDER_MALE =>  'Male',
                self::GENDER_OTHER =>  'Other',

            ];
    }
    public function getGender()
    {

        $list = self::getGenderOptions();
        return isset($list[$this->gender]) ? $list[$this->gender] : "Female";
    }

    /*****************************************/

    /* COACH PROFILE VERIFICATION STATUS CONST */

    /* [V = Verify, P = Pending(not submitted), S = Suspend] */

    /****************************************/

    const STATUS_PENDING = 'P';

    const STATUS_VERIFY = 'V';

    const STATUS_SUSPEND = 'S';



    public static function getCoachProfileStatusOptions()
    {
        return
            [
                self::STATUS_PENDING =>  'Not Submitted',
                self::STATUS_VERIFY =>  'Verify',
                self::STATUS_SUSPEND =>  'Reject',
            ];
    }


    public function getCoachProfileStatus()
    {
        $list = self::getCoachProfileStatusOptions();
        return isset($list[$this->status]) ? $list[$this->status]: "Not Defined";
    }


    public static function profileDetail($data)
    {

        $coachDetail = new CoachDetail();
        $coachDetail->user_id = Auth::id();
        $coachDetail->title =$data['title'];
         $coachDetail->bio  =$data['bio'];
         $coachDetail->city =$data['city'];
         //$coachDetail->timezone =$data['timezone'];
         $coachDetail->gender = $data['gender'];
         $coachDetail->price_range = @$data['price_range'];
         $coachDetail->categories  = $data['categories'];
         $coachDetail->personality_and_training  = $data['personality_and_training'];
         $coachDetail->languages =  $data['languages'];
         $coachDetail->twitter_url=  $data['twitter_url'];
         $coachDetail->facebook_url =  $data['facebook_url'];
         $coachDetail->instagram_url =  $data['instagram_url'];
         $coachDetail->youtube_url =  $data['youtube_url'];
         $coachDetail->pinterest_url =  $data['pinterest_url'];
         $coachDetail->status =  'P';
         $coachDetail->image_file  = @$data['image_file'];

        if($coachDetail->save()){


        if (isset($data['page_images'])) {
           $page_images = $data['page_images'];
           foreach ($page_images as $page_image) {
                $coach_image = new CoachImage();
                $page_image = UploadImage($page_image, 'coach/images');
                $coach_image->image_file =  @$page_image;
                $coach_image->coach_detail_id = $coachDetail->id;
                $coach_image->save();
           }
        }
            if ($data['education_count'] > 1) {
                for ($num = 1; $num <= $data['education_count']; $num++) {
                    $coachEducation = new CoachEducation();
                    $coachEducation->coach_detail_id =  $coachDetail->id;
                    $coachEducation->title = $data['education_title_' . $num];
                    $coachEducation->completion_year = $data['completion_year_' . $num];
                    $coachEducation->institute = $data['institute_' . $num];
                    $coachEducation->save();
                }
            } else {
                $coachEducation = new CoachEducation();
                $coachEducation->coach_detail_id =  $coachDetail->id;
                $coachEducation->title = $data['education_title_1'];
                $coachEducation->completion_year = $data['completion_year_1'];
                $coachEducation->institute = $data['institute_1'];
                $coachEducation->save();
            }

            if ($data['result_count'] > 1) {
                for ($val = 1; $val <= $data['result_count']; $val++) {
                    $coachResult = new CoachResult();
                    $coachResult->coach_detail_id = $coachDetail->id;
                    $coachResult->title = $data['result_title_' . $val];
                    $coachResult->star = $data['star_' . $val];
                    $coachResult->description = $data['result_description_' . $val];
                    if (isset($data['result_image_file_' . $val]) && !empty($data['result_image_file_' . $val])) {
                        $data['result_image_file_' . $val] = UploadImage($data['result_image_file_' . $val], 'coach/result');
                    }
                    $coachResult->image_file  = @$data['result_image_file_' . $val];
                    $coachResult->save();
                }
            } else {
                $coachResult = new CoachResult();
                $coachResult->coach_detail_id = $coachDetail->id;
                $coachResult->title = $data['result_title_1'];
                $coachResult->star = $data['star_1'];
                $coachResult->description = $data['result_description_1'];
                if (isset($data['result_image_file_1']) && !empty($data['result_image_file_1'])) {
                    $data['result_image_file_1'] = UploadImage($data['result_image_file_1'], 'coach/result');
                }
                $coachResult->image_file  = @$data['result_image_file_1'];
                $coachResult->save();
            }


            return $data = ['coach_detail' => $coachDetail, 'coach_education' => $coachEducation, 'coach_result' => $coachResult];
        }

        return false;
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function coachProfileDetail()
    {
        return CoachDetail::with('user')->where("user_id", Auth::user()->id)->first();
    }

    public function coachVerificationDetail()
    {

        return VerificationDetail::where("user_id", Auth::user()->id);
    }


    public function coach_education()
    {
        return $this->hasMany('App\Models\CoachEducation', 'coach_detail_id', 'id');
    }

    public function coach_result()
    {
        return $this->hasMany('App\Models\CoachResult', 'coach_detail_id', 'id');
    }

    public function coach_images()
    {
        return $this->hasMany('App\Models\CoachImage', 'coach_detail_id', 'id');
    }

    public function checkProfileStatus($user_id)
    {
        $data = CoachDetail::where('user_id', $user_id)->first();
        return @$data['profile_status'];
    }

    public function checkChatStatus($user_id)
    {
        $data = CoachDetail::where('user_id', $user_id)->first();
        return @$data['chat_status'];
    }
}
