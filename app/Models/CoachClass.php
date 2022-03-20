<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachClass extends Model
{
    use HasFactory;

    protected $table = 'coach_classes';
    protected $fillable = ['name', 'category_id', 'price', 'action', 'description', 'attendees_limit', 'address', 'latitude', 'image','longitude', 'status','created_by'];


    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function getReviewAndRatingDetail($id = Null)
    {
        $review = Review::where('rate_for_class_id', $id)
            ->where('review_type', Review::REVIEW_TYPE_CLASS);

        $review_list = $review->get();
        $avg_rating = $review->avg('star');
        return (['review_list' => $review_list, 'avg_rating' => $avg_rating]);
    }


    public function classDetails()
    {
        return $this->hasOne(CoachDetail::class, 'user_id', 'id');
    }
    public function program_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    public function class_get_name()
    {
        return $this->belongsTo('App\Models\User', 'id', 'created_by');
    }
    public function reviewClass_list()
    {
        return $this->hasMany('App\Models\Review', 'rate_for_coach_id', 'id');
    }
    public function review_list()
    {
        return $this->hasMany('App\Models\Review', 'rate_for_class_id', 'id');
    }
    public function booking()
    {
        return $this->hasMany('App\Models\Booking', 'class_id', 'id');
    }
    public function checkAttendeesCount($booking_date = null, $class_id = null)
    {
        $data = Booking::where('class_id', $class_id)
        ->whereIn('status', [Booking::STATUS_REQUEST_SEND, Booking::STATUS_ACCEPT])
        ->whereDate('booking_date', '=', $booking_date)->count();
       return $data ?? 0 ;
    }
    // public function schedules(){
    //     return $this->belongsTo(Schedule::class);
    // }


}