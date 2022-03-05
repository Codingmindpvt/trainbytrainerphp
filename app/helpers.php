<?php

/********************************/

use App\Models\Booking;
use App\Models\Country;
use App\Models\User;
use phpseclib3\File\ASN1\Maps\Certificate;

/* Email Send */

/********************************/
function emailSend($postData)
{
    try {
        $email = Mail::send($postData['layout'], $postData, function ($message) use ($postData) {
            $message->to($postData['email'])
                ->subject($postData['subject']);
            //$message->setbody($postData['token']);
            $message->from(FROM_EMAIL_ADDRESS);
        });

        $response['status'] = true;
        $response['message'] = "Mail sent successully.";
        return $response;
    } catch (\Execption $e) {
        $response['status'] = false;
        $response['message'] = $e->getMessage();
        return $response;
    }
}

function truncateString($str, $chars, $to_space, $replacement = "...")
{
    if ($chars > strlen($str)) {
        return $str;
    }

    $str = substr($str, 0, $chars);
    $space_pos = strrpos($str, " ");
    if ($to_space && $space_pos >= 0) {
        $str = substr($str, 0, strrpos($str, " "));
    }

    return ($str . $replacement);
}

/********************************/

/* Upload Image */

/********************************/
function UploadImage($file, $destinationPath)
{
    try {
        $imgName = $file->getClientOriginalName();
        $ext = explode('?', \File::extension($imgName));
        $main_ext = $ext[0];
        $rand_no = time() . "_" . rand(1, 10000);
        $finalName = $rand_no . '.' . $main_ext;
        $file->move(public_path($destinationPath), $finalName);

        if ($main_ext == 'mp4') {
            $thumb_name = $rand_no . ".png";
            $inputFile = $destinationPath . '/' . $finalName;
            $thumbpath = $destinationPath . "/" . $rand_no . ".png";

            $FFmpeg = new \FFMpeg;
            $upload_shell_video = "ffmpeg -i $file -vcodec h264 -acodec mp2 $inputFile";
            echo shell_exec($upload_shell_video);

            $shell = "ffmpeg -i " . $inputFile . " -frames:v 1 -q:v 2 -vf 'scale=480:480:force_original_aspect_ratio=increase,crop=480:480' " . $thumbpath;
            echo shell_exec($shell);
        }

        return $path = $destinationPath . '/' . $finalName;
    } catch (\Execption $e) {
        $response['status'] = false;
        $response['message'] = $e->getMessage()->withInput();
        return $response;
    }
}

// function printy($data){
//     echo "<pre>";
//     print_r($data);
//     echo "<pre>";
//     die();

if (!function_exists('get_country_code')) {
    function get_country_code()
    {
        return Country::pluck('phonecode');
    }

}
if (!function_exists('check_sch_booking')) {
    function check_sch_booking($date,$id,$class_id)
    {

        $booking = Booking::where(['booking_date'=> $date,'schedule_id'=>$id,'class_id'=>$class_id,'user_id'=>Auth::id()])->first();
        if (isset($booking) && !empty($booking)) {
            return true;
        }else{
            return false;
        }
    }

}
if (!function_exists('booked')) {
    function booked($date,$id,$class_id)
    {
        $booking = Booking::where(['booking_date'=> $date,'schedule_id'=>$id,'status'=>2,'class_id'=>$class_id,'user_id'=>Auth::id()])->first();
        if (isset($booking) && !empty($booking)) {
            return true;
        }else{
            return false;
        }
    }

}

function certifiedUser(){
    $user = User::Where('id',Auth::id())->first();
    return (isset($user['coach_badge_status']) && $user['coach_badge_status'] == User::BADGE_STATUS_CERTIFIED) ? "<span><img src='".url('/')."/public/images/verified2.png'> Certified</span>" : "";
}