<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class ReviewController extends Controller
{

    /*****************************************/

    /* Review List */

    /****************************************/ 

    public function reviewList()
    {

        $reviews = Review::get();
        return view('admin.reviews.list', compact('reviews'));
    }

    /*****************************************/

    /* view detail */

    /****************************************/
    public function reviewView($id=null)
    {
        $review = Review::with('users','program')->where(['id' => $id])->first();
        return view('admin.reviews.view', ['review' => $review]);
    }

    public function changeReviewStatus(Request $request){
    $details = Review::find($request->id);
        $details->status = $request->status;
        if ($details->save()) {
            return response()->json(['message' => 'status update successfully!']);
        }
        return response()->json(['error' => 'status not updated successfully!!!']);
    }
}
