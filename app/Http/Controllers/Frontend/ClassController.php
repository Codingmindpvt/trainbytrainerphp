<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminCommission;
use App\Models\Booking;
use App\Models\Category;
use App\Models\CoachClass;
use App\Models\CoachDetail;
use App\Models\Day;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class ClassController extends Controller
{
    //
    public function addClass()
    {

        $sun_schedules = Schedule::where(['user_id' => auth()->user()->id, 'day_id' => 1])->get();
        $mon_schedules = Schedule::where('user_id', auth()->user()->id)->where('day_id', 2)->get();
        $tue_schedules = Schedule::where('user_id', auth()->user()->id)->where('day_id', 3)->get();
        $wed_schedules = Schedule::where('user_id', auth()->user()->id)->where('day_id', 4)->get();
        $thus_schedules = Schedule::where('user_id', auth()->user()->id)->where('day_id', 5)->get();
        $fri_schedules = Schedule::where('user_id', auth()->user()->id)->where('day_id', 6)->get();
        $sat_schedules = Schedule::where('user_id', auth()->user()->id)->where('day_id', 7)->get();

        $schedules = [
            "sun" => $sun_schedules,
            "mon" => $mon_schedules,
            "tue" => $tue_schedules,
            "wed" => $wed_schedules,
            "thus" => $thus_schedules,
            "fri" => $fri_schedules,
            "sat" => $sat_schedules,
        ];
        $commission = AdminCommission::first();
        $days = Day::all();
        $categories = Category::all();
        $classes = CoachClass::with('category')->where('created_by', auth()->user()->id)->latest()->get();
        $coach = User::where('id', Auth::user()->id)->where('coach_profile_verification_status', User::COACH_PROFILE_STATUS_VERIFY)->first();
        $checkCoachDetail = CoachDetail::where('user_id', Auth::user()->id)->where('status', CoachDetail::STATUS_VERIFY)->first();
        if (!isset($checkCoachDetail) && !isset($coach)) {
            notify()->warning('You have not completed all of the required fields to make your account active. Please complete all the required fields in Coach Profile.');
            return Redirect::back();
        } else {
            return view('frontend.class.create')->with([
                'days' => $days, 'categories' => $categories, 'commission' => $commission,
                'classes' => $classes, 'schedules' => $schedules]);
        }

    }

    public function saveClass(Request $request)
    {
        try {

            if ($request->has('class_image')) {
                $imageName = time() . '.' . $request->class_image->extension();
                $request->class_image->move(public_path('class'), $imageName);
                $request->merge(['image' => $imageName]);
            }

            $request->merge(['created_by' => auth()->user()->id]);
            $class = CoachClass::create($request->all());
            notify()->success('Class created Successfully!!');
            return redirect()->back();

        } catch (\Exception $e) {
            notify()->error('Error,' . $e->getMessage());
            return redirect()->back();

        }

    }

    public function updateClass(Request $request)
    {
        try {

            if ($request->has('class_image')) {
                $imageName = time() . '.' . $request->class_image->extension();
                $request->class_image->move(public_path('class'), $imageName);
                $request->merge(['image' => $imageName]);
            }

            $request->merge(['created_by' => auth()->user()->id]);

            $coach_class = CoachClass::find($request->id);
            $coach_class->fill($request->all());
            $coach_class->save();
            notify()->success('message, Class Updated Successfully!!');
            return redirect()->back();

        } catch (\Exception $e) {
            notify()->error('Error,' . $e->getMessage());
            return redirect()->back();

        }
    }

    //////////////////////review section start
    public function review_submit_class(Request $request)
    {

        $postData = $request->all();

        $rules = [
            'star' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($postData, $rules);

        if ($validator->fails()) {
            $response['errors'] = $validator->errors();
            $response['error'] = true;
            return $response;
            return redirect()->back()->with($response)->withInput();
        }

        $checkReviewDetail = Review::where('rated_by', Auth::user()->id)
            ->where('rate_for_class_id', @$postData['rate_for_class_id'])
            ->first();

        if ($checkReviewDetail) {
            $review = Review::find($checkReviewDetail['id']);

            $review->title = $postData['title'];
            $review->description = $postData['description'];
            $review->star = $postData['star'];
            // $review->trained_date = $postData['trained_date'];

            if ($review->save()) {
                notify()->success('Data updated Successfully.');
                // return redirect()->route('frontend.index');
            }
        } else {
            $model = new Review();
            $model->title = $request->post('title');
            $model->description = $request->post('description');
            $model->star = $request->post('star');
            $model->rated_by = Auth::user()->id;
            $model->rate_for = $request->post('rate_for_class_id');
            $model->rate_for_class_id = $request->post('rate_for_class_id');

            $model->review_type = Review::REVIEW_TYPE_CLASS;
            $model->status = Review::STATUS_ACTIVE;
            // $model->trained_date= $request->post('trained_date');
            if ($model->save()) {
                notify()->success('Data added Successfully.');
            } else {
                notify()->error('Somthing went wrong.');
            }
        }
    }

    public function createClassSchedule(Request $request)
    {

        try {
            if (isset($request->detail) && !empty($request->detail)) {
                foreach ($request->detail as $key => $details) {
                    $day_id = Day::where('name', $key)->pluck('id')->first();

                    foreach ($details as $detail) {
                        $schedule = Schedule::where(['day_id' => $day_id, 'class_id' => $detail['class_id'], "from_time" => $detail['form_time'], "to_time" => $detail['to_time']])->first();

                        if (!isset($schedule) && empty($schedule)) {
                            Schedule::create([
                                "class_id" => $detail['class_id'],
                                "day_id" => $day_id,
                                "from_time" => $detail['form_time'],
                                "to_time" => $detail['to_time'],
                                "status" => (int) $detail['status'],
                                "user_id" => auth()->user()->id,
                            ]);
                        }

                    }

                }
                return response()->json([
                    'message' => 'Class schedule added successfully!',
                    'status' => true,

                ]);
            }
            return response()->json([
                'message' => 'Please select a schedule!',
                'status' => false,

            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => false,
            ]);

        }

    }

    public function deleteSchedule(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        return response()->json([
            'message' => 'Schedule deleted successfully!!',
            'status' => true,
        ]);

    }

    public function updateSchedule(Request $request)
    {

        $schedule = Schedule::find($request->data['sch_id']);
        $schedule->from_time = $request->data['from_time'];
        $schedule->to_time = $request->data['to_time'];
        $schedule->class_id = $request->data['class_id'];
        $schedule->status = $request->data['status'];
        $schedule->save();
        return response()->json([
            'message' => 'Schedule Updated successfully!!',
            'status' => true,
        ]);

    }

    public function bookSchedule(Request $request)
    {
        $check_user_valid_for_payment = auth()->user()->account_link;
        if ($check_user_valid_for_payment == '0') {
            return response()->json([
                'message' => 'Schedule Updated successfully!!',
                'status' => false,
                "type" => "invalid_bank",
                "date" => $request->data['date'],
            ]);
        }
        return response()->json([
            'message' => 'Schedule Updated successfully!!',
            'status' => true,
            "type" => "",
            "date" => $request->data['date'],
        ]);
    }
    public function bookClassSchedule(Request $request)
    {

        $request->merge(['user_id' => auth()->user()->id]);
        $request->merge(['status' => 1]);

        Booking::create($request->all());
        $class = CoachClass::find($request->class_id);
        if ($class->attendees_limit > 0) {
            $class->attendees_limit = $class->attendees_limit - 1;
            $class->save();
        }

        return response()->json([
            'message' => 'Booking Request Sent is when the request is awaiting approval from Coach!!',
            'status' => true,
        ]);
    }
}
