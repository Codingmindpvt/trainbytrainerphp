<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\CoachDetail;
use App\Models\Category;
use App\Models\CoachProgram;
use App\Models\CoachClass;
use App\Models\CoachImage;
use App\Models\CoachEducation;
use App\Models\CoachResult;
use App\Models\ProgramInside;
use App\Models\TrainingStyle;
use App\Models\ProgramResult;
use App\Models\programImage;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Day;
use App\Models\Cart;
use App\Models\Country;
use App\Models\State;
use App\Models\PaymentDetail;
use App\Models\TimeZone;
use App\Models\Language;
use App\Models\VerificationDetail;
use App\Models\VerificationDocument;
use App\Models\Review;
use App\Models\Booking;
use App\Models\OrderList;
use App\Models\SepaPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AdminCommission;
use DateInterval;
use DatePeriod;
use DateTime;
use Validator;
use Illuminate\Pagination\Paginator;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

use function GuzzleHttp\Promise\all;

class CoachController extends Controller
{

   
 
    public function searchProductList(Request $request)
    {

         // Get the search value from the request
         $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $posts = CoachProgram::query()
        ->where('program_name', 'LIKE', "%{$search}%")
        ->where('user_id', Auth::user()->id)
        ->get();



    // Return the search view with the resluts compacted
    return view('frontend.coach.my-product-search-list', compact('posts'));
    // return $posts;
    }

    /************************************************************/

    /****** Coach Dashboard *******/

    /************************************************************/


    //////////////////////review section start
    public function review_submit_program(Request $request)
    {

        $postData = $request->all();
        $rules = [
            'star' => 'required | regex:/[a-zA-Z0-9\s]+/',
            'title' => 'required',
            'description' => 'required',
            // 'trained_date' => 'required',
        ];


        $validator = Validator::make($postData, $rules);

        if ($validator->fails()) {
            $response['errors'] = $validator->errors();
            $response['error'] = true;
            return $response;
            // return redirect()->back()->with($response)->withInput();
        }

        $checkReviewDetail = Review::where('rated_by', Auth::user()->id)
            ->where('rate_for_program_id', @$postData['rate_for_program_id'])
            ->first();

        if ($checkReviewDetail) {
            $review = Review::find($checkReviewDetail['id']);

            $review->title = $postData['title'];
            $review->description = $postData['description'];
            $review->star = $postData['star'];
            // $review->trained_date = $postData['trained_date'];

            if ($review->save()) {
                notify()->success('Rating updated successfully.');
                // return redirect()->route('frontend.index');
            }
        } else {
            $model = new Review();
            $model->title = $request->post('title');
            $model->description = $request->post('description');
            $model->star = $request->post('star');
            $model->rated_by = Auth::user()->id;
            $model->rate_for = 0;
            $model->rate_for_program_id = $request->rate_for_program_id;
            $model->rate_for_coach_id = $request->rate_for_coach_id;

            $model->review_type = Review::REVIEW_TYPE_PROGRAM;
            $model->status = Review::STATUS_ACTIVE;
            // $model->trained_date= $request->post('trained_date');
            if ($model->save()) {
                notify()->success('Your review submitted successfully.');
            } else {
                notify()->error('Somthing went wrong.');
            }
        }
    }


    /////////////////////review section end
    public static function getDateByDay($id=null)
    {
        $date = Carbon::now();
        $date = strtotime($date);
        $date = strtotime("+15 day", $date);
        $end_date = date('Y-m-d', $date);
        $current_date = Carbon::now();

        $period = new DatePeriod(
            new DateTime($current_date),
            new DateInterval('P1D'),
            new DateTime($end_date)
        );

        $dates = [];
        foreach ($period as $key => $value) {
            $date = $value->format('Y-m-d');
            $d = new DateTime($date);

            $day = substr($d->format('l'), 0, 3);
            $day_id = Day::where('name', $day)->pluck('id')->first();
            $sch = Schedule::with('class', 'day', 'user', 'booking')
            ->whereHas('class', function($query){
                $query->where('created_by', Auth::id());
        })
                ->where(['day_id' => $day_id])->get()->toArray();
            $classes = Schedule::where(['day_id' => $day_id])->whereHas('class', function($query){
                $query->where('created_by', Auth::id());
        })->pluck('class_id')->toArray();
            $array = [
                "date" => $value->format('M d'),
                "actual_date" => $value->format('Y-m-d'),
                'day' => substr($d->format('l'), 0, 3),
                'day_id' => $day_id,
                'data' => $sch,
                'classes' => $classes,
            ];

            array_push($dates, $array);
        }

        return $dates;
    }
    public function coachDashboard()
    {
        $id =1;
       // $class_detail = CoachClass::with('program_user', 'category')->where(["id" => $id])->orderBy("id", "DESC")->first();
        $schedules = Schedule::with('day', 'user')
        ->whereHas('class', function($query){
                $query->where('created_by', Auth::id());
        })->get()->toArray();
        $schedule_result = [];
        $final_result = [];
        foreach ($schedules as $schedule) {
            $schedule_inner = [];
            $day = Day::where('id', $schedule['day_id'])->pluck('name')->first();
            $inner_schedule = Schedule::with('class','day', 'user', 'booking')
            ->where(['day_id' => $schedule['day_id']])
            ->whereHas('class', function($query){
                $query->where('created_by', Auth::id());
        })
            ->get()->toArray();

            array_push($schedule_inner, $inner_schedule);

            $schedule_result[$day] = $schedule_inner;
            //$dateByDay = self::getDateByDay($inner_schedule['class']['id']);
        }


        $dateByDay = self::getDateByDay();


        $topSellingProgram = CoachProgram::where('user_id',Auth::id())
        ->has('order_list')
        ->withCount(['order_list as orders' => function ($query) {
            $query->groupBy('program_id');
        }])->orderBy('orders', 'desc')->take(5)->get();


        $getCategories = CoachProgram::select('categories')->where('user_id',Auth::id())->withCount(['order_list as orders' => function ($query) {
            $query->groupBy('program_id');
        }])->orderBy('orders', 'desc')->get();
        $categoryArr = [];
        foreach($getCategories as $index=>$getCategory){
            $categoryArr[(int)$index] = explode(",",$getCategory['categories']);
        }
        foreach($categoryArr as $i => $cat){
            $catMerge = array_merge($cat,$categoryArr[$i]);
        }
        if(!empty($catMerge)){
            $getCategoryList = Category::whereIn('id',$catMerge)->groupBy('id')->orderBy('id', 'desc')->take(3)->get();
        }
        else{
            $getCategoryList = [];
        }


        $paymentData =  SepaPayment::select(DB::raw('SUM(amount) as total_amount'))
        ->whereHas('order_list', function($query){
            $query->whereHas('program', function($qry){
                $qry->where('user_id', Auth::id());
            });
        })
        ->whereYear('created_at', date('Y'))
       ->get()
       ->groupBy(function ($date) {
           return Carbon::parse($date->created_at)->format('m');
       });

       $payMonthlyCount = [];
        $paymentArr = [];
       $index = 0;
        foreach ($paymentData as $key => $value) {
            $payMonthlyCount[(int)$key] = $value[$index++]['total_amount'];
        }

        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $totalEarnings = OrderList::has('payment')
        ->whereHas('program', function($query){
            $query->where('user_id', Auth::id())
                ->with('program_user');
        })->get();
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($payMonthlyCount[$i])) {
                //$totalEarnings +=  (double)$payMonthlyCount[$i];
                $paymentArr[$i]['count'] = $payMonthlyCount[$i];
            } else {
                $paymentArr[$i]['count'] = 0;
            }
            $paymentArr[$i]['month'] = $month[$i - 1];

        }


        $paymentData = [];
        $payment_data = ['Sale'];
        $monthList = [];
        $month_list = ['Month'];
        foreach($paymentArr as $key=>$user){
            $paymentData[] = $user['count'];
            $payment_data[] = $user['count'];
            $monthList[] = $user['month'];
            $month_list[] = $user['month'];
        }
        $mergePaymentArray = array_combine($month_list,$payment_data);
            array_push( $mergePaymentArray);

        $monthlyPayment = json_encode($mergePaymentArray);

        $orders = OrderList::with('class','payment')
        ->whereHas('program', function($query){
            $query->where('user_id', Auth::id())
                ->with('program_user');
        })->paginate(5);

        $classBookings = Booking::with('user','schedule')
        ->whereHas('coach_class', function($query){
            $query->where('created_by', Auth::id())
            ->with('program_user');
        })
        ->orderby('id', 'Desc')->paginate(5);

        $classes_count = CoachClass::where('created_by', auth()->user()->id)->count();
        $programs_count = CoachProgram::where('user_id', auth()->user()->id)->count();
        $reviews = Review::where('rate_for_coach_id',Auth::id())->count();

        $coachDetail = new CoachDetail();
        return view('frontend.coach.marketplace-dashboard-data',
        compact('coachDetail','paymentData','monthlyPayment','classes_count','programs_count','orders','classBookings', 'topSellingProgram', 'getCategoryList','totalEarnings','reviews','monthList','schedule_result', 'dateByDay'));
    }

    public function coachStatus(Request $request)
    {

        $postData = $request->all();
        $id = $postData['user_id'];
        $status = $postData['status'];
        $checkCoachDetail = CoachDetail::where('user_id', $id)->first();
        if ($status == "on") {
            $getStatus = 'E';
        } else {
            $getStatus = 'D';
        }

        if (!empty($checkCoachDetail['id'])) {
            $coachDetail = CoachDetail::find($checkCoachDetail['id']);
            $coachDetail->profile_status = $getStatus;
            if ($coachDetail->save()) {
                return $coachDetail;
            }
        } else {
            return $checkCoachDetail;
        }
    }

    public function coachChatStatus(Request $request)
    {
        $postData = $request->all();
        $id = $postData['user_id'];
        $status = $postData['chat_status'];
        $checkCoachDetail = CoachDetail::where('user_id', $id)->first();
        if ($status == "on") {
            $getStatus = 'E';
        } else {
            $getStatus = 'D';
        }

        if (!empty($checkCoachDetail['id'])) {
            $coachDetail = CoachDetail::find($checkCoachDetail['id']);
            $coachDetail->chat_status = $getStatus;
            if ($coachDetail->save()) {
                return $coachDetail;
            }
        } else {
            return $checkCoachDetail;
        }
    }



    /************************************************************/

    /****** Coach Profile *******/

    /************************************************************/

    public function coach_profile_detail()
    {

        $checkCoachDetail = CoachDetail::where("user_id", Auth::user()->id)->first();
        $coachDetail = new CoachDetail();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        //$timezones = TimeZone::all();
        $languages = Language::all();
        $trainingStyles = TrainingStyle::where('status', TrainingStyle::STATUS_ACTIVE)->get();
        if (isset($checkCoachDetail)) {
            return redirect()->route('coach.view.profile', $checkCoachDetail['id']);
        } else {
            return view('frontend.coach.coach-profile', compact('coachDetail', 'categories', 'trainingStyles', 'languages'));
        }
    }

    public function coachProfileDetail(Request $request)
    {
        //dd($request->all());
        $postData = $request->all();
        $rules = [
            //'bio' => 'required',
            //'city' => 'required',
            //'timezone' => 'required',
            'categories' => 'required',
            //'price_range' => 'required',
            'languages' => 'required',
            'personality_and_training' => 'required'

        ];

        // $request->merge(['categories'=>implode(',',$request->categories)]);
        // $request->merge(['personality_and_training'=>implode(',',$request->personality_and_training)]);
        // $request->merge(['languages'=>implode(',',$request->languages)]);
        // $request->merge(['status'=>'P']);
        // $request->merge(['user_id'=>auth()->user()->id]);

        $validator = Validator::make($postData, $rules);
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }


        $postData['categories'] = implode(',', $postData['categories']);
        $postData['personality_and_training'] = implode(',', $postData['personality_and_training']);
        $postData['languages'] = implode(',', $postData['languages']);

        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'coach/profile');
        }


        $coachDetail = CoachDetail::profileDetail($postData);
        if ($coachDetail) {

            $adminDetail = User::where('role_type', User::ROLE_ADMIN)->first();

            //send verification mail for admin
            $base_url = url('/');

            $mail_data['subject'] = 'Train By Trainer: Verification of Coach Profile';
            $mail_data['email'] = $adminDetail->email;
            $mail_data['full_name'] = "TrainByTrainer Admin";
            $mail_data['link'] = $base_url . "/admin/login";
            $mail_data['content'] = Auth::user()->first_name . " " . Auth::user()->last_name . ' sent you account approval request for the coach profile. Please check the request on dashboard';
            $mail_data['layout'] = 'email_templates.verification-request';
            emailSend($mail_data);
            notify()->success('Your profile has been submitted successfully');
            return redirect()->route('coach.view.profile', @$coachDetail['coach_detail']['id']);
        } else {
            notify()->success('Account created successfully.');
        }
    }

    public function viewCoachProfile($id)
    {
        $user = new User();

        $coachDetail = CoachDetail::where('id', $id)->with('coach_education', 'coach_result', 'coach_images')->first();
        return view('frontend.coach.view-coach-profile', compact('coachDetail', 'user'));
    }

    public function coachProfileSendRequest($id)
    {
        $coach = CoachDetail::find($id);
        $coachDetail = CoachDetail::where('id', $id)->with('coach_education', 'coach_result', 'coach_images')->first();
        $adminDetail = User::where('role_type', User::ROLE_ADMIN)->first();
        $user = new User();
        $coach->status = CoachDetail::STATUS_PENDING;
        $coach->save();

        //send verification mail for admin
        $base_url = url('/');

        $mail_data['subject'] = 'Train By Trainer: Verification of Coach Profile';
        $mail_data['email'] = $adminDetail->email;
        $mail_data['full_name'] = "TrainByTrainer Admin";
        $mail_data['link'] = $base_url . "/admin/login";
        $mail_data['content'] = Auth::user()->first_name . " " . Auth::user()->last_name . ' sent you account approval request again for the coach profile. Please check the request on dashboard';
        $mail_data['layout'] = 'email_templates.verification-request';
        emailSend($mail_data);
        notify()->success('Send Verification mail for admin successfully!!');
        return view('frontend.coach.view-coach-profile', compact('coachDetail', 'user'));
    }

    public function coachBadgeSendRequest($id)
    {
        $verification = VerificationDetail::find($id);
        $coachDetail = CoachDetail::where('id', $id)->with('coach_education', 'coach_result', 'coach_images')->first();
        $verificationDetail = VerificationDetail::where('id', $id)->with('verification_document')->first();
        $verification->badge_status = VerificationDetail::STATUS_PENDING;
        $verification->save();

        $adminDetail = User::where('role_type', User::ROLE_ADMIN)->first();
        //send verification mail for admin
        $base_url = url('/');
        $mail_data['subject'] = 'Train By Trainer: Verification Request';
        $mail_data['email'] = $adminDetail->email;
        $mail_data['full_name'] = 'TrainByTrainer Admin';
        $mail_data['link'] = $base_url . "/admin/login";
        $mail_data['content'] = Auth::user()->first_name . " " . Auth::user()->last_name . ' has sent you account certification request again for the coach profile. Please check the request on dashboard';
        $mail_data['layout'] = 'email_templates.verification-request';
        emailSend($mail_data);

        notify()->success('Send Badge Request successfully.');

        return view("frontend.coach.view_verification", compact('verificationDetail', 'coachDetail'));




        $coach = CoachDetail::find($id);
        $coachDetail = CoachDetail::where('id', $id)->with('coach_education', 'coach_result', 'coach_images')->first();
        $adminDetail = User::where('role_type', User::ROLE_ADMIN)->first();
        $user = new User();
        $coach->status = CoachDetail::STATUS_PENDING;
        $coach->save();

        //send verification mail for admin
        $base_url = url('/');

        $mail_data['subject'] = 'Train By Trainer: Verification of Coach Profile';
        $mail_data['email'] = $adminDetail->email;
        $mail_data['full_name'] = "TrainByTrainer Admin";
        $mail_data['link'] = $base_url . "/admin/login";
        $mail_data['content'] = Auth::user()->first_name . " " . Auth::user()->last_name . ' has sent you verification request for the coach profile. Please check the request on dashboard';
        $mail_data['layout'] = 'email_templates.verification-request';
        emailSend($mail_data);
        notify()->success('Send Verification mail for admin successfully!!');
        return view('frontend.coach.view-coach-profile', compact('coachDetail', 'user'));
    }

    public function addProgram()
    {
        $commission = AdminCommission::first();
        $coachDetail = new CoachDetail();
        $coachProgram = new CoachProgram();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        $coach = User::where('id', Auth::user()->id)->where('coach_profile_verification_status', User::COACH_PROFILE_STATUS_VERIFY)->first();
        $checkCoachDetail = CoachDetail::where('user_id', Auth::user()->id)->where('status', CoachDetail::STATUS_VERIFY)->first();
        if (!isset($checkCoachDetail) && !isset($coach)) {
            notify()->warning('You have not completed all of the required fields to make your account active. Please complete all the required fields in Coach Profile.');
            return Redirect::back();
        } else {
            return view('frontend.coach.add-new-program-two', compact('coachProgram', 'categories', 'coachDetail', 'commission','coach'));
        }

    }
    public function editProgram($id)
    {
        // dd($id);
        $program = CoachProgram::where("id", $id)->get();
        // dd($program);
        $coachPrograms = CoachProgram::where('user_id', Auth::id())->with('program_result', 'program_inside', 'program_image')->orderBy("id", "DESC")->first();
        $coachProgramResult = ProgramResult::where("coach_program_id", $id)->get();
        $coachProgramInside = ProgramInside::where("coach_program_id", $id)->get();
        $coachProgramImage = programImage::where("coach_program_id", $id)->get();
        $coachDetail = new CoachDetail();
        $coachProgram = new CoachProgram();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        return view('frontend.coach.edit-new-program-two', compact('coachProgram', 'coachPrograms', 'coachProgramImage', 'categories', 'coachDetail', 'program', 'coachProgramResult', 'coachProgramInside'));
    }
    public function updateProgram(Request $request)
    {
        // dd($request->all());
        $postData = $request->all();
        $user_id = Auth::id();
        $coachProgram = CoachProgram::where("id", $postData['program_id'])->where("user_id", $user_id)->first();
        $coachProgram->program_name = $postData['program_name'];
        $coachProgram->description = $postData['description'];
        $coachProgram->short_description = $postData['short_description'];
        $coachProgram->price = $postData['price'];

        $postData['categories'] = implode(',', $postData['categories']);
        $coachProgram->categories = $postData['categories'] ?? '';
        if (isset($postData['program_image']) && !empty($postData['program_image'])) {
            $postData['program_image'] = UploadImage($postData['program_image'], 'coach/result');
            $coachProgram->image_file  = $postData['program_image'];
        }
        // dd($coachProgram);
        if ($coachProgram->save()) {
            notify()->success('Coach Program updated successfully.');
             return redirect()->route('program-view', @$coachProgram['id']);
        }
        return redirect()->back()->with('error', 'Coach program not update.');
    }

    public function myProductList(Request $request)
    {
        $coachDetail = new CoachDetail();
        $coachPrograms = CoachProgram::where('user_id', Auth::user()->id)->with('program_image', 'program_inside', 'program_result')->orderBy('id', 'desc')->paginate(10);

        // if($request->keyword != ''){      
        //     $coachPrograms = CoachProgram::where('name','LIKE','%'.$request->keyword.'%')->get();      
        // }      
        // return response()->json([         
        //     'coachPrograms' => $coachPrograms      
        // ]);    
    
        return view("frontend.coach.my-product-list", compact('coachDetail', 'coachPrograms'));
    }

    // my Transection list

    public function myTransactionList()
    {
        $coachDetail = new CoachDetail();
        $transactions = PaymentDetail::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        // dd($transactions);
        return view("frontend.coach.my-transactions", compact('coachDetail', 'transactions'));
    }
    //
    public function myOrderList()
    {
        $orders = OrderList::with('class','payment')
        ->whereHas('program', function($query){
            $query->where('user_id', Auth::id())
                ->with('program_user');
        })->paginate(5);

        $classBookings = Booking::with('user','schedule')
        ->whereHas('coach_class', function($query){
            $query->where('created_by', Auth::id())
            ->with('program_user');
        })
        ->orderby('id', 'Desc')->paginate(5);
       // print_r($classBookings); die;

        return view("frontend.coach.order-history",['orders' => $orders, 'classBookings' => $classBookings]);
    }

    public function orderClassDetail($id)
    {
        $order =  Booking::with('user','schedule')->where('id',$id)
        ->whereHas('coach_class', function($query){
            $query->where('created_by', Auth::id())
            ->with('program_user');
        })->first();

        $classBookings = Booking::with('user','schedule')
        ->where('id','!=',$id)
        ->whereHas('coach_class', function($query){
            $query->where('created_by', Auth::id())
            ->with('program_user');
        })
        ->orderby('id', 'Desc')->paginate(3);

        return view("frontend.coach.session-order-history",['order'=>$order, 'classBookings' => $classBookings]);
    }
    public function orderProgramDetail($id)
    {
        $order = OrderList::with('class')
        ->where('id',$id)
        ->whereHas('payment', function($query){
            $query->with('user');
        })
        ->whereHas('program', function($query){
            $query->where('user_id', Auth::id())
                ->with('program_user','program_image');
        })->first();
        return view("frontend.coach.order-program-detail",['order' => $order]);
    }

    public function acceptBookingRequest(Request $request){
        $details = Booking::find($request->id);
        $details->status = Booking::STATUS_ACCEPT;
        if ($details->save()) {
            return response()->json(['message' => 'Booking status update successfully!']);
        }
        return response()->json(['error' => 'Booking status not updated successfully!!!']);
    }

    public function rejectBookingRequest(Request $request){
        $details = Booking::find($request->id);
        $details->status = Booking::STATUS_REJECT;
        if ($details->save()) {
            return response()->json(['message' => 'Booking status update successfully!']);
        }
        return response()->json(['error' => 'Booking status not updated successfully!!!']);
    }

    public function myCustomers()
    {
        $customers = PaymentDetail::select('user_id')
            ->with('users')
            ->groupBy('user_id')
            ->paginate(7);
        // dd($customes);
        return view("frontend.coach.customer", compact('customers'));
    }
    public function checkout()
    {
        $cart = new Cart();
        $cartDetail = Cart::where('user_id', Auth::id())->with('user', 'program')->orderBy('id', 'DESC')->get();
        $sum = Cart::where('user_id', Auth::id())->sum('price');
        return view('frontend.checkout', [
            "cart" => $cart,
            "cartDetail" => $cartDetail,
            "sum" => $sum
        ]);

        // return view("frontend.checkout");
    }

    public function addServiceProgram(Request $request)
    {
        $coachProgram = new CoachProgram();
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'categories' => 'required',

            ]);

            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                notify()->error('Error, ' . $response['message']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }
            $coachProgram->user_id = Auth::id();
            $coachProgram->program_name = $postData['program_name'];
            $coachProgram->description = $postData['description'] ?? '';
            $coachProgram->short_description = $postData['short_description'] ?? '';
            $coachProgram->price = $postData['price'] ?? '';
            $coachProgram->stock = $postData['stock'] ?? '';
            $coachProgram->tax_class = $postData['tax_class'] ?? '';
            $postData['categories'] = implode(',', $postData['categories']);
            $coachProgram->categories = $postData['categories'] ?? '';

            if (isset($postData['image_file']) && !empty($postData['image_file'])) {
                $postData['image_file'] = UploadImage($postData['image_file'], 'coach/result');
                $coachProgram->image_file  = $postData['image_file'];
            }


            if ($coachProgram->save()) {
                if ($postData['result_count'] > 1) {
                    for ($num = 1; $num <= $postData['result_count']; $num++) {
                        $programResult = new ProgramResult();
                        $programResult->coach_program_id = $coachProgram->id;
                        $programResult->title = $postData['result_title_' . $num];
                        $programResult->description = $postData['result_description_' . $num];
                        $programResult->certificate    = $postData['star_' . $num];
                        if (isset($postData['result_image_file_' . $num]) && !empty($postData['result_image_file_' . $num])) {
                            $postData['result_image_file_' . $num] = UploadImage($postData['result_image_file_' . $num], 'coach/result');
                        }
                        $programResult->image_file  = @$postData['result_image_file_' . $num];
                        $programResult->save();
                    }
                } else {
                    $programResult = new ProgramResult();
                    $programResult->coach_program_id = $coachProgram->id;
                    $programResult->title = $postData['result_title_1'];
                    $programResult->description = $postData['result_description_1'];
                    $programResult->certificate    = $postData['star_1'];
                    if (isset($postData['result_image_file_1']) && !empty($postData['result_image_file_1'])) {
                        $postData['result_image_file_1'] = UploadImage($postData['result_image_file_1'], 'coach/result');
                    }
                    $programResult->image_file  = @$postData['result_image_file_1'];
                    $programResult->save();
                }
                if ($postData['inside_count'] > 1) {
                    for ($ln = 1; $ln <= $postData['inside_count']; $ln++) {
                        $programInside = new ProgramInside();
                        $programInside->coach_program_id = $coachProgram->id;
                        $programInside->title = $postData['inside_title_' . $ln];
                        $programInside->description = $postData['inside_description_' . $ln];
                        // dd($programInside);
                        $programInside->save();
                    }
                } else {
                    $programInside = new ProgramInside();
                    $programInside->coach_program_id = $coachProgram->id;
                    $programInside->title = @$postData['inside_title_1'];
                    $programInside->description = $postData['inside_description_1'];

                    $programInside->save();
                }


                if ($postData['education_count'] > 1) {
                    for ($val = 1; $val <= $postData['education_count']; $val++) {
                        $programImage = new programImage();
                        $programImage->coach_program_id = $coachProgram->id;
                        $programImage->title = $postData['education_title_' . $val];
                        if (isset($postData['education_image_file_' . $val]) && !empty($postData['education_image_file_' . $val])) {
                            $postData['education_image_file_' . $val] = UploadImage($postData['education_image_file_' . $val], 'coach/result');
                        }
                        $programImage->image_file = @$postData['education_image_file_' . $val];
                        $programImage->save();
                    }
                } else {
                    $programImage = new programImage();
                    $programImage->coach_program_id = $coachProgram->id;
                    $programImage->title = $postData['education_title_1'];
                    if (isset($postData['education_image_file_1']) && !empty($postData['education_image_file_1'])) {
                        $postData['education_image_file_1'] = UploadImage($postData['education_image_file_1'], 'coach/result');
                    }
                    $programImage->image_file  = @$postData['education_image_file_1'];
                    $programImage->save();
                }
                notify()->success('Product created successfully..');
                return redirect()->route('coach.my-product-list', '');
            }
        }
    }
    public function viewProgramdetail($id)
    {
        $user = new User();

        $coachProgram = CoachProgram::where('user_id', Auth::id())->with('program_result', 'program_inside', 'program_image')->orderBy("id", "DESC")->first();
        return view('frontend.program.view-program-detail', compact('coachProgram', 'user'));
    }
    public function myProductDelete($id)
    {
        programImage::where("coach_program_id", $id)->delete();
        ProgramInside::where("coach_program_id", $id)->delete();
        ProgramResult::where("coach_program_id", $id)->delete();
        CoachProgram::where("id", $id)->delete();

        notify()->success('Data Deleted successfully.');
        return Redirect::back();
    }

    public function addNewprogram()
    {
        $coachDetail = new CoachDetail();
        $coach = User::where('id', Auth::user()->id)->where('coach_profile_verification_status', User::COACH_PROFILE_STATUS_VERIFY)->first();
        $checkCoachDetail = CoachDetail::where('user_id', Auth::user()->id)->where('status', CoachDetail::STATUS_VERIFY)->first();
        if (!isset($checkCoachDetail) && !isset($coach)) {
            notify()->warning('You have not completed all of the required fields to make your account active. Please complete all the required fields in Coach Profile.');
            return Redirect::back();
        } else {
            return view('frontend.coach.add-new-program', compact('coachDetail'));
        }
    }
    /*****************************************/

    /* view certificate and diploma */

    /****************************************/
    public function certificateDiploma()
    {
        $coachDetail = new CoachDetail();
        $certificateDiplomas = CoachDetail::where('user_id', Auth::user()->id)->with('coach_education')->first();
        return view("frontend.coach.certified", ["certificateDiplomas" => $certificateDiplomas, "coachDetail" => $coachDetail]);
    }

    /*****************************************/

    /* edit certificate and diploma */

    /****************************************/
    public function editCertificateDiploma($id)
    {
        $coachDetail = new CoachDetail();
        $certificateDiploma = CoachEducation::where(["id" => $id])->first();
        if ($certificateDiploma) {
            return view("frontend.coach.certified-update", ['certificateDiploma' => $certificateDiploma, 'coachDetail' => $coachDetail]);
        }
        return Redirect::back();
    }

    public function addCoachEducation()
    {
        $coachDetail = CoachDetail::where(["user_id" => Auth::id()])->first();
        if ($coachDetail) {
            return view("frontend.coach.add_coach_education", ['coachDetail' => $coachDetail]);
        }
        return Redirect::back();
    }

    public function createCoachEducation(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'title' => 'required',
            'completion_year' => 'required',
            'institute' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $certificateDiploma = new CoachEducation();

        $certificateDiploma->coach_detail_id = $postData['coach_detail_id'];
        $certificateDiploma->title = $postData['title'];
        $certificateDiploma->completion_year = $postData['completion_year'];
        $certificateDiploma->institute = $postData['institute'];
        if ($certificateDiploma->save()) {
            notify()->success('Coach Education Added successfully.');
            return redirect()->route('coach.view.profile', @$certificateDiploma['coach_detail_id']);
        }
    }

    public function editCoachEducation($id)
    {
        $coachDetail = new CoachDetail();
        $certificateDiploma = CoachEducation::where(["id" => $id])->first();
        if ($certificateDiploma) {
            return view("frontend.coach.edit_coach_education", ['certificateDiploma' => $certificateDiploma, 'coachDetail' => $coachDetail]);
        }
        return Redirect::back();
    }

    public function updateCoachEducation(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'title' => 'required',
            'completion_year' => 'required',
            'institute' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $certificateDiploma = CoachEducation::find($postData['id']);

        $certificateDiploma->id = $postData['id'];
        $certificateDiploma->title = $postData['title'];
        $certificateDiploma->completion_year = $postData['completion_year'];
        $certificateDiploma->institute = $postData['institute'];
        if ($certificateDiploma->save()) {
            notify()->success('Data updated successfully.');
            return redirect()->route('coach.view.profile', @$certificateDiploma['coach_detail_id']);
        }
    }

    public function updateCertificateDiploma(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'title' => 'required',
            'completion_year' => 'required',
            'institute' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $certificateDiploma = CoachEducation::find($postData['id']);

        $certificateDiploma->id = $postData['id'];
        $certificateDiploma->title = $postData['title'];
        $certificateDiploma->completion_year = $postData['completion_year'];
        $certificateDiploma->institute = $postData['institute'];
        if ($certificateDiploma->save()) {
            notify()->success('Data updated successfully.');
            return Redirect::to('certificate-diploma');
        }
    }

    /*****************************************/

    /* delete certificate and diploma  */

    /****************************************/
    public function deleteCertificateDiploma($id)
    {
        $certificateDiploma = CoachEducation::where("id", $id)->delete();
        if ($certificateDiploma) {
            notify()->success('Data Deleted successfully.');
            return Redirect::back();
        }
    }

    /*****************************************/

    /* coach profile verification  */

    /****************************************/
    public function coach_verification()
    {
        $coachDetail = new CoachDetail();
        $checkVerificationDetail = VerificationDetail::where("user_id", Auth::user()->id)->first();
        $verificationDetail = new VerificationDetail();
        $checkCoachDetail = CoachDetail::where('user_id', Auth::user()->id)->first();
        if (!isset($checkCoachDetail)) {
            notify()->warning('You have not completed all of the required fields to make your account active. Please complete all the required fields in Coach Profile.');
            return Redirect::back();
        } else {
            if (isset($checkVerificationDetail)) {
                return redirect()->route('coach.view.verification', $checkVerificationDetail['id']);
            } else {
                return view("frontend.coach.verification", compact('verificationDetail', 'coachDetail'));
            }
        }
    }

    public function coachViewVerification($id)
    {
        $coachDetail = new CoachDetail();
        $verificationDetail = VerificationDetail::where('id', $id)->with('verification_document')->first();

        return view("frontend.coach.view_verification", compact('verificationDetail', 'coachDetail'));
    }
    public function editCoachVerification($id)
    {
        $coachDetail = new CoachDetail();
        $verificationDetail = VerificationDetail::where('id', $id)->with('verification_document')->first();
        return view('frontend.coach.edit-coach-verification', compact('verificationDetail', 'coachDetail'));
    }
    public function updateCoachVerification(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'qualifications' => 'required',
            'country' => 'required',
            'insured_with' => 'required',
            'insurance_type' => 'required'
        ]);
        // dd('abcdef');
        $update_coach_verification = VerificationDetail::find($request->id);
        // dd($update_coach_verification);
        $update_coach_verification->user_id = Auth::user()->id;
        $update_coach_verification->qualification = $request->qualifications;
        // $update_coach_verification->qualified_fitness_coach = $request->qualified_fitness_coach;
        // $update_coach_verification->currently_insured = $request->currently_insured;
        $update_coach_verification->country = $request->country;
        $update_coach_verification->insured_with = $request->insured_with;
        $update_coach_verification->insurance_type = $request->insurance_type;
        $update_coach_verification->insurance_expire_date = $request->insurance_expire_date;
        if ($update_coach_verification->save()) {
            $postData = $request->all();
            if (isset($postData['certificates'])) {
                $certificates = $postData['certificates'];
                foreach ($certificates as $certificate) {
                    $coach_certificate = new VerificationDocument();
                    $certificate = UploadImage($certificate, 'coach/images');
                    $coach_certificate->image_file =  @$certificate;
                    $coach_certificate->verification_detail_id = $update_coach_verification->id;
                    $coach_certificate->user_id = Auth::user()->id;
                    $coach_certificate->type = VerificationDocument::TYPE_CERTIFICATE;
                    $coach_certificate->save();
                }
            }
            if (isset($postData['insurances'])) {
                $insurances = $postData['insurances'];
                foreach ($insurances as $insurance) {
                    $coach_insurance = new VerificationDocument();
                    $insurance = UploadImage($insurance, 'coach/images');
                    $coach_insurance->image_file =  @$insurance;
                    $coach_insurance->verification_detail_id = $update_coach_verification->id;
                    $coach_insurance->user_id = Auth::user()->id;
                    $coach_insurance->type = VerificationDocument::TYPE_INSURANCE;
                    $coach_insurance->save();
                }
            }
            return redirect()->back()->with('message', 'Coach verification successfully.');
        }
    }
    public function deleteCoachVerification($id)
    {
        // dd('netset');
        $delete_coach_verification_document = VerificationDocument::where('id', $id);
        if(!empty($delete_coach_verification_document)) {
            VerificationDocument::where('id', $id)->delete();
            return redirect()->back()->with('message', 'Qualification certificate delete successfully!.');
        }
        return redirect()->back()->with('error', 'Qualification certificate not delete!');
    }

    public function coachVerification(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'qualified_fitness_coach' => 'required',
            'qualifications' => 'required',
            'country' => 'required',
            'currently_insured' => 'required',
            'insured_with' => 'required',
            'currently_insured' => 'required'
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['message']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $verificationDetail = new VerificationDetail();
        $verificationDetail->user_id = Auth::user()->id;
        $verificationDetail->qualified_fitness_coach = $postData['qualified_fitness_coach'];
        $verificationDetail->qualification = $postData['qualifications'];
        $verificationDetail->country = $postData['country'];
        $verificationDetail->currently_insured = $postData['currently_insured'];
        $verificationDetail->insured_with = $postData['insured_with'];
        $verificationDetail->insurance_type = $postData['insurance_type'];
        $verificationDetail->insurance_expire_date = $postData['insurance_expire_date'];
        $verificationDetail->badge_status = VerificationDetail::STATUS_PENDING;
        if (@$postData['agree_as_a_coach'] == 'on') {
            $verificationDetail->agree_as_a_coach = VerificationDetail::COACH_AGREE;
        } else {
            $verificationDetail->agree_as_a_coach = VerificationDetail::COACH_NOT_AGREE;
        }

        if ($verificationDetail->save()) {

            if (isset($postData['certificates'])) {
                $certificates = $postData['certificates'];
                foreach ($certificates as $certificate) {
                    $coach_certificate = new VerificationDocument();
                    $certificate = UploadImage($certificate, 'coach/images');
                    $coach_certificate->image_file =  @$certificate;
                    $coach_certificate->verification_detail_id = $verificationDetail->id;
                    $coach_certificate->user_id = Auth::user()->id;
                    $coach_certificate->type = VerificationDocument::TYPE_CERTIFICATE;
                    $coach_certificate->save();
                }
            }


            if (isset($postData['insurances'])) {
                $insurances = $postData['insurances'];
                foreach ($insurances as $insurance) {
                    $coach_insurance = new VerificationDocument();
                    $insurance = UploadImage($insurance, 'coach/images');
                    $coach_insurance->image_file =  @$insurance;
                    $coach_insurance->verification_detail_id = $verificationDetail->id;
                    $coach_insurance->user_id = Auth::user()->id;
                    $coach_insurance->type = VerificationDocument::TYPE_INSURANCE;
                    $coach_insurance->save();
                }
            }
            $adminDetail = User::where('role_type', User::ROLE_ADMIN)->first();
            //send verification mail for admin
            $base_url = url('/');
            $mail_data['subject'] = 'Train By Trainer: Verification Request';
            $mail_data['email'] = $adminDetail->email;
            $mail_data['full_name'] = 'TrainByTrainer Admin';
            $mail_data['link'] = $base_url . "/admin/login";
            $mail_data['content'] = Auth::user()->first_name . " " . Auth::user()->last_name . ' has sent you account certification request for the coach profile. Please check the request on dashboard';
            $mail_data['layout'] = 'email_templates.verification-request';
            emailSend($mail_data);

            notify()->success('You submitted your Badge Request successfully.');
            return redirect()->route('coach.view.verification', $verificationDetail['id']);
        }
    }

    public function addNewProgramTwo()
    {
        return view("frontend.coach.add-new-program-two");
    }


    /*****************************************/

    /* coach Reviews */

    /****************************************/
    public function Reviews()
    {
        $coachDetail = new CoachDetail();
        $coachReview = Review::where('rate_for_coach_id', Auth::id())
        ->orderBy('id', 'DESC')
            ->where('review_type', Review::REVIEW_TYPE_CLASS)
            ->with('users')
            ->get();

        $programReview = Review::where('rate_for_coach_id', Auth::id())
        ->orderBy('id', 'DESC')
            ->where('review_type', Review::REVIEW_TYPE_PROGRAM)
            ->with('users', 'program')
            ->get();
        $ratingReview = Review::where('rate_for_coach_id', Auth::id())
        ->orderBy('id', 'DESC')
            ->where('review_type', Review::REVIEW_TYPE_CLASS)
            ->with(['program' => function ($query) {
                $query->where('user_id', Auth::id())
                    ->with('program_reviews', function ($query) {
                        $query->where('review_type', Review::REVIEW_TYPE_PROGRAM);
                    });
            }]);
        $avgRating = $ratingReview->avg('star');
        return view("frontend.coach.reviews", [
            'coachDetail' => $coachDetail,
            'coachReview' => $coachReview,
            'programReview' => $programReview,
            'avgRating' => $avgRating
        ]);
    }

    public function ReviewReason(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'reason' => 'required'
        ]);
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }
        $review = Review::find($request->id);
        $review->reason = $request->reason;
        if ($review->save()) {
            $response['status'] = "Success";
            $response['message'] = "Add your Reason Successfully.";
            return response()->json($response);
        }
    }
    public function createBillingAddress()
    {
        $user = Auth::user();
        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);

        return view('frontend.add-addressbook', compact('countries', 'states', 'user'));
    }

    public function addBillingAddress(Request $request)
    {


        $billing_address = new BillingAddress();
        if ($request->isMethod('post')) {
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'company_name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'postal_code' => 'required'
            ]);



            if ($validator->fails()) {
                $response['message'] = $validator->errors()->first();
                notify()->error('Error, ' . $response['message']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }
            if (isset($postData['default'])) {
                $update =  BillingAddress::where('user_id', Auth::id())->get();

                if (isset($update) && !empty($update)) {
                    foreach ($update as $us) {
                        $us->default = '0';
                        $us->save();
                    }
                }
                $billing_address->default = $postData['default'] ?? 0;
            }
            $billing_address->user_id = Auth::id();
            $billing_address->company_name     = $postData['company_name'];
            $billing_address->address = $postData['address'] ?? '';
            $billing_address->city = $postData['city'] ?? '';
            $billing_address->state_id = $postData['state'] ?? '';
            $billing_address->country_id = $postData['country'] ?? '';
            $billing_address->postal_code = $postData['postal_code'] ?? '';
            if ($billing_address->save()) {
                notify()->success('Billing-Address created successfully..');
                return Redirect::route('show-address-billing');
            }
        }
    }

    public function showBillingAddress()
    {
        $user = Auth::user();
        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);
        $billing_address = BillingAddress::with('country', 'state')->orderBy('default')->get();
        return view('frontend.address-book', compact('user', 'billing_address', 'countries', 'states'));
    }
    public function removeBillingAddress($id)
    {
        BillingAddress::where("id", $id)->delete();
        notify()->success('successfully removed from Billing address.');
        return Redirect::back();
    }
    public function editBillingAddress($id)
    {
        $user = Auth::user();
        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);
        $billing = BillingAddress::with('country', 'state')->find($id);
        return view('frontend.edit-addressbook', compact('user', 'billing', 'countries', 'states'));
    }

    public function updateBillingAddress(Request $req)
    {
        $billing = $req->validate([
            'address' => 'required',

        ]);

        $billing = BillingAddress::find($req->id);
        if (isset($req->default)) {
            $update =  BillingAddress::where('user_id', Auth::id())->get();

            if (isset($update) && !empty($update)) {
                foreach ($update as $us) {
                    $us->default = '0';
                    $us->save();
                }
            }
            $billing->default = $req->default ?? 0;
        }

        // dd($billing);
        $billing->company_name  = $req->company_name;
        $billing->address = $req->address;
        $billing->city = $req->city;
        $billing->state_id = $req->state;
        $billing->country_id = $req->country;
        $billing->postal_code = $req->postal_code;
        if ($billing->save()) {
            notify()->success('Billing-Address update successfully..');
            return Redirect::route('show-address-billing');
        }
    }
    public function editCoachProfile($id)
    {
        $user = new User();
        $timezones = TimeZone::all();
        $languages = Language::all();
        $categories = Category::where('status', Category::STATUS_ACTIVE)->get();
        $trainingStyles = TrainingStyle::where('status', TrainingStyle::STATUS_ACTIVE)->get();
        $coachDetail = CoachDetail::where('id', $id)->with('coach_education',  'coach_result', 'coach_images')->first();
        //   dd($coachDetail);
        return view('frontend.coach.edit_coach_profile')->with([
            'user' => $user, 'coachDetail' => $coachDetail,
            'timezones' => $timezones, 'categories' => $categories, 'trainingStyles' => $trainingStyles, 'languages' => $languages
        ]);
    }
    public function updateCoachProfile(Request $request)
    {

        $request->validate([
            'city' => 'required',
            //'timezone' => 'required',
            'price_range' => 'required',
            'title' => 'required',
            'bio' => 'required',
            'categories' => 'required'
        ]);
        // dd($request->all());
        $id = $request->id;
        $update_coach_profile = CoachDetail::find($request->id);
        if (isset($request->image) && !empty($request->image)) {
           $request->image = UploadImage($request->image, 'coach/images');
        }else{
           $request->image =  $update_coach_profile->image_file;
        }
        $update_coach_profile->image_file = $request->image;
        $update_coach_profile->city = $request->city;
        $languages = implode(',', $request->languages);
        $categories = implode(',', $request->categories);
        $personal_training = implode(',', $request->personality_and_training);
        $update_coach_profile->languages = $languages;
        $update_coach_profile->categories = $categories;
        $update_coach_profile->personality_and_training = $personal_training;
        $update_coach_profile->fill($request->except(['city']));
        if ($update_coach_profile->save()) {
            if (isset($request->page_images)) {
                $page_images = $request->page_images;
                foreach ($page_images as $page_image) {
                    $coach_image = new CoachImage();
                    $page_image = UploadImage($page_image, 'coach/images');
                    $coach_image->image_file =  @$page_image;
                    $coach_image->coach_detail_id = $update_coach_profile->id;
                    $coach_image->save();
                }
            }
           if($update_coach_profile->status == CoachDetail::STATUS_PENDING || $update_coach_profile->status == CoachDetail::STATUS_SUSPEND){
                $coach = CoachDetail::find($id);
                $coachDetail = CoachDetail::where('id', $id)->with('coach_education', 'coach_result', 'coach_images')->first();
                $adminDetail = User::where('role_type', User::ROLE_ADMIN)->first();
                $user = new User();
                $coach->status = CoachDetail::STATUS_PENDING;
                $coach->save();
        
                //send verification mail for admin
                $base_url = url('/');
        
                $mail_data['subject'] = 'Train By Trainer: Verification of Coach Profile';
                $mail_data['email'] = $adminDetail->email;
                $mail_data['full_name'] = "TrainByTrainer Admin";
                $mail_data['link'] = $base_url . "/admin/login";
                $mail_data['content'] = Auth::user()->first_name . " " . Auth::user()->last_name . ' sent you account approval request again for the coach profile. Please check the request on dashboard';
                $mail_data['layout'] = 'email_templates.verification-request';
                emailSend($mail_data);
                notify()->success('Send Verification mail for admin successfully!!');
                return redirect()->route('coach.view.profile', @$update_coach_profile['id']);
        }

            notify()->success('Coach profile update successfully!.');
            return redirect()->route('coach.view.profile', @$update_coach_profile['id']);
        }
        notify()->error('something went wrong!.');
        return redirect()->back();
    }

    public function deleteCoachProfile(Request $request)
    {
        $id = $request->id;
        $coach_detail_id = $request->coach_detail_id;
        $delete_coach_profile = CoachImage::where('id', $id);
        if (!empty($delete_coach_profile)) {
            CoachImage::where('id', $id)->delete();
            $imageCount = CoachImage::where('coach_detail_id',$coach_detail_id)->count();
            return response()->json(['status' => 200, 'imageCount' => $imageCount]);
        }

        return response()->json(['status' => 400]);
    }

    public function addCoachResult()
    {
        $coachDetail = CoachDetail::where('user_id',Auth::id())->first();
        return view('frontend.coach.add-coach-result',['coachDetail'=>$coachDetail]);
    }
    public function createCoachResult(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'title' => 'required',
            'star' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $result = new CoachResult();

        $result->coach_detail_id = $postData['coach_detail_id'];
        $result->title = $postData['title'];
        $result->star = $postData['star'];
        $result->description = $postData['description'];
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'result');
            $result->image_file = $postData['image_file'];
    }
        if ($result->save()) {
            notify()->success('Coach Result Added successfully.');
            return redirect()->route('coach.view.profile', @$result['coach_detail_id']);
        }
    }

    public function editCoachResult($id = null)
    {
        $result = CoachResult::where('id',$id)->first();
        return view('frontend.coach.edit-coach-result',['result'=>$result]);
    }
    public function updateCoachResult(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            'title' => 'required',
            'star' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $result = CoachResult::find($postData['id']);

        $result->id = $postData['id'];
        $result->title = $postData['title'];
        $result->star = $postData['star'];
        $result->description = $postData['description'];
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'result');
            $result->image_file =  !empty($postData['image_file'])?$postData['image_file']:@$result->image_file;
    }
        if ($result->save()) {
            notify()->success('Coach Result updated successfully.');
            return redirect()->route('coach.view.profile', @$result['coach_detail_id']);
        }
    }

    public function deleteCoachResult($id)
    {
        $result = CoachResult::where("id", $id)->delete();
        if ($result) {
            notify()->success('Coach Result Deleted successfully.');
            return Redirect::back();
        }
    }

    //program
    public function addProgramResult($id = null)
    {
        $coachDetail = CoachProgram::where('id',$id)->first();
        return view('frontend.coach.add-program-result',['coachDetail'=>$coachDetail]);
    }
    public function createProgramResult(Request $request)
    {

        $postData = $request->all();
        $validator = Validator::make($postData, [
            // 'title' => 'required',
            // 'star' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            notify()->error('error'.$response['message']);
            return redirect()->back()->with($response);
        }

        $result = new ProgramResult();

        $result->coach_program_id = $postData['coach_program_id'];
        $result->title = $postData['title'];
        $result->certificate  = $postData['star'];
        $result->description = $postData['description'];
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'result');
            $result->image_file = $postData['image_file'];
    }
        if ($result->save()) {
            notify()->success('Coach Result Added successfully.');
            return redirect()->route('program-view', @$result['coach_program_id']);
        }
    }

    public function editProgramResult($id = null)
    {
        $result = ProgramResult::where('id',$id)->first();
        return view('frontend.coach.edit-program-result',['result'=>$result]);
    }
    public function updateProgramResult(Request $request)
    {
        $postData = $request->all();
        $validator = Validator::make($postData, [
            // 'title' => 'required',
            // 'star' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['error'] = true;
            notify()->error('error'.$response['message']);
            return redirect()->back()->with($response);
        }

        $result = ProgramResult::find($postData['id']);

        $result->id = $postData['id'];
        $result->title = $postData['title'];
        $result->certificate  = $postData['star'];
        $result->description = $postData['description'];
        if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'result');
            $result->image_file =  !empty($postData['image_file'])?$postData['image_file']:@$result->image_file;
    }
        if ($result->save()) {
            notify()->success('Program Result updated successfully.');
            return redirect()->route('program-view', @$result['coach_program_id']);
        }
    }

    public function deleteProgramResult($id)
    {
        $result = ProgramResult::where("id", $id)->delete();
        if ($result) {
            notify()->success('Program Result Deleted successfully.');
            return Redirect::back();
        }
    }

     //program inside
     public function addProgramInside($id = null)
     {
         $coachDetail = CoachProgram::where('id',$id)->first();
         return view('frontend.coach.add-program-inside',['coachDetail'=>$coachDetail]);
     }
     public function createProgramInside(Request $request)
     {

         $postData = $request->all();
         $validator = Validator::make($postData, [
            //  'title' => 'required',
            //  'description' => 'required',
         ]);

         if ($validator->fails()) {
             $response['message'] = $validator->errors()->first();
             $response['error'] = true;
             notify()->error('error'.$response['message']);
             return redirect()->back()->with($response);
         }

         $result = new ProgramInside();

         $result->coach_program_id = $postData['coach_program_id'];
         $result->title = $postData['title'];
         $result->description = $postData['description'];
         if ($result->save()) {
             notify()->success('Program Inside Added successfully.');
             return redirect()->route('program-view', @$result['coach_program_id']);
         }
     }

     public function editProgramInside($id = null)
     {
         $result = ProgramInside::where('id',$id)->first();
         return view('frontend.coach.edit-program-inside',['result'=>$result]);
     }
     public function updateProgramInside(Request $request)
     {
         $postData = $request->all();
         $validator = Validator::make($postData, [
            //  'title' => 'required',
            //  'description' => 'required',
         ]);

         if ($validator->fails()) {
             $response['message'] = $validator->errors()->first();
             $response['error'] = true;
             notify()->error('error'.$response['message']);
             return redirect()->back()->with($response);
         }

         $result = ProgramInside::find($postData['id']);

         $result->id = $postData['id'];
         $result->title = $postData['title'];
         $result->description = $postData['description'];
         if ($result->save()) {
             notify()->success('Program Inside updated successfully.');
             return redirect()->route('program-view', @$result['coach_program_id']);
         }
     }

     public function deleteProgramInside($id)
     {
         $result = ProgramInside::where("id", $id)->delete();
         if ($result) {
             notify()->success('Program Inside Deleted successfully.');
             return Redirect::back();
         }
     }

     //program file
     public function addProgramFile($id = null)
     {
         $coachDetail = CoachProgram::where('id',$id)->first();
         return view('frontend.coach.add-program-file',['coachDetail'=>$coachDetail]);
     }
     public function createProgramFile(Request $request)
     {

         $postData = $request->all();
         $validator = Validator::make($postData, [
            //  'title' => 'required',
         ]);

         if ($validator->fails()) {
             $response['message'] = $validator->errors()->first();
             $response['error'] = true;
             notify()->error('error'.$response['message']);
             return redirect()->back()->with($response);
         }

         $result = new ProgramImage();

         $result->coach_program_id = $postData['coach_program_id'];
         $result->title = $postData['title'];
         if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'result');
            $result->image_file = $postData['image_file'];
    }
         if ($result->save()) {
             notify()->success('Program Inside Added successfully.');
             return redirect()->route('program-view', @$result['coach_program_id']);
         }
     }

     public function editProgramFile($id = null)
     {
         $result = ProgramImage::where('id',$id)->first();
         return view('frontend.coach.edit-program-file',['result'=>$result]);
     }
     public function updateProgramFile(Request $request)
     {
         $postData = $request->all();
         $validator = Validator::make($postData, [
            //  'title' => 'required',
         ]);

         if ($validator->fails()) {
             $response['message'] = $validator->errors()->first();
             $response['error'] = true;
             notify()->error('error'.$response['message']);
             return redirect()->back()->with($response);
         }

         $result = ProgramImage::find($postData['id']);

         $result->id = $postData['id'];
         $result->title = $postData['title'];
         if (isset($postData['image_file']) && !empty($postData['image_file'])) {
            $postData['image_file'] = UploadImage($postData['image_file'], 'result');
            $result->image_file =  !empty($postData['image_file'])?$postData['image_file']:@$result->image_file;
    }
         if ($result->save()) {
             notify()->success('Program File updated successfully.');
             return redirect()->route('program-view', @$result['coach_program_id']);
         }
     }

     public function deleteProgramFile($id)
     {
         $result = ProgramImage::where("id", $id)->delete();
         if ($result) {
             notify()->success('Program File Deleted successfully.');
             return Redirect::back();
         }
     }

}