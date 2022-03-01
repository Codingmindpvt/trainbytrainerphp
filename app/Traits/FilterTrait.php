<?php
namespace App\Traits;

use App\Models\CoachDetail;
use App\Models\CoachProgram;
use App\Models\Review;
use App\Models\User;
trait FilterTrait
{
    public function programFilter($category_ids)
    {
        $categories = CoachProgram::select('id', 'categories')->get()->toArray();
        $user_ids = $this->modifySearch($categories, $category_ids) ?? [];
        return $user_ids;
    }

    public function modifySearch($categories, $category_ids)
    {
        $user_ids = [];
        foreach ($categories as $category) {
            if (isset($category['categories']) && $category['categories'] != "") {
                $explode_categories = explode(",", $category['categories']);

                if (is_array($category_ids)) {
                    $category_ids = implode(',', $category_ids);
                }

                if (isset($explode_categories) && !empty($explode_categories) && isset($category_ids)) {
                    $category_ids = explode(",", $category_ids);

                    foreach ($category_ids as $category_id) {
                        if (in_array($category_id, $explode_categories)) {
                            array_push($user_ids, $category['id']);
                        }
                    }
                }
            }
        }

        return (isset($user_ids) && !empty($user_ids)) ? array_unique($user_ids) : [];
    }

    public function modifyPersonalityFilter($filter_personality)
    {
        if (isset($filter_personality) && !empty($filter_personality)) {

            $personalities = CoachDetail::get(['personality_and_training', 'user_id'])->toArray();
            if (isset($personalities) && !empty($personalities)) {
                $user_ids = [];
                foreach ($personalities as $personality) {
                    $personality_explode = explode(",", $personality['personality_and_training']);
                    if (isset($personality_explode) && !empty($personality_explode)) {
                        foreach ($personality_explode as $perId) {

                            if (in_array($perId, $filter_personality)) {
                                array_push($user_ids, $personality['user_id']);
                            }
                        }
                    }
                }
                return (isset($user_ids) && !empty($user_ids)) ? array_unique($user_ids) : [];
            }
            return [];
        } else {
            return [];

        }

    }
    public function modifyRatingFilter($ratings)
    {
        $review_user_id = Review::whereIn('star', $ratings)->where('review_type','C')->pluck('rate_for')->toArray();
        return (isset($review_user_id) && !empty($review_user_id)) ? array_unique($review_user_id) : [];
    }

    public function modifyProgramRatingFilter($ratings)
    {
        $review_user_id = Review::whereIn('star', $ratings)->where('review_type','P')->pluck('rate_for')->toArray();
        return (isset($review_user_id) && !empty($review_user_id)) ? array_unique($review_user_id) : [];
    }


    public function coachFilter($category_ids)
    {
        $coachList = User::whereHas('coach_detail', function ($query) {
            $query->select('user_id', 'personality_and_training', 'categories');
        })->get();

        $user_ids = $this->modifyProgramSearch($coachList, $category_ids) ?? [];
        return $user_ids;
    }

    public function modifyProgramSearch($coachList, $category_ids)
    {
        $user_ids = [];
        foreach ($coachList as $coachDetail) {
            if (isset($coachDetail['coach_detail']['categories']) && $coachDetail['coach_detail']['categories'] != "") {
                $explode_categories = explode(",", $coachDetail['coach_detail']['categories']);

                if (is_array($category_ids)) {
                    $category_ids = implode(',', $category_ids);
                }

                if (isset($explode_categories) && !empty($explode_categories) && isset($category_ids)) {
                    $category_ids = explode(",", $category_ids);

                    foreach ($category_ids as $category_id) {
                        if (in_array($category_id, $explode_categories)) {
                            array_push($user_ids, $coachDetail['coach_detail']['user_id']);
                        }
                    }
                }
            }
        }
        return (isset($user_ids) && !empty($user_ids)) ? array_unique($user_ids) : [];
        //dd($user_ids);
    }

}
