<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoachDetail;
use Auth;

class CoachProgram extends Model
{
    use HasFactory;
    protected $table = 'user_coach_programs';

    protected $fillable = ['id', 'user_id', 'program_name', 'description', 'short_description', 'price', 'stock',
       'tax_class', 'categories', 'image_file', 'program_star', 'created_at', 'updated_at'
];

    public function program_image()
    {
        return $this->hasMany('App\Models\programImage', 'coach_program_id', 'id');
    }
    public function program_inside()
    {
        return $this->hasMany('App\Models\ProgramInside', 'coach_program_id', 'id');
    }
    public function program_result()
    {
        return $this->hasMany('App\Models\ProgramResult', 'coach_program_id', 'id');
    }
    public function program_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function program_reviews()
    {
        return $this->hasMany('App\Models\Review', 'rate_for', 'user_id');
    }
    public function getReviewAndRatingDetail($id = Null)
    {
        $review = Review::where('rate_for_program_id', $id)
            ->where('review_type', Review::REVIEW_TYPE_PROGRAM);

        $review_list = $review->get();
        $avg_rating = $review->avg('star');
        //print_r($avg_rating );
        return (['review_list' => $review_list, 'avg_rating' => $avg_rating]);
    }

    public function coachDetails()
    {
        return $this->hasOne(CoachDetail::class, 'user_id', 'id');
    }
    public function order_list(){
        return $this->hasMany('App\Models\OrderList', 'program_id', 'id');
    }
    public function review_list()
    {
        return $this->hasMany('App\Models\Review', 'rate_for_program_id', 'id');
    }
}
