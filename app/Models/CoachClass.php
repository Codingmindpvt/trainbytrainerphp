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
    
  
}
