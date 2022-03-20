<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCommission;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Review;
use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Booking;
use App\Models\ContactUs;
use App\Models\OrderList;
use App\Models\CoachDetail;
use App\Models\CoachClass;
use App\Models\CoachProgram;
use App\Models\VerificationDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function index()
    {
        $verified_user = User::where('status', User::STATUS_ACTIVE)->where('role_type', '!=', User::ROLE_ADMIN)->where('coach_badge_status', User::BADGE_STATUS_CERTIFIED)->count();
        $suspend_user = User::where('status', User::STATUS_SUSPEND)->count();
        $category_count = Category::count();
        $class_count = CoachClass::count();
        $program_count = CoachProgram::count();
        $personal_user = User::where('role_type', User::ROLE_USER)->where('user_type', User::TYPE_PERSONAL)->count();
        $business_user = User::where('role_type', User::ROLE_USER)->where('user_type', User::TYPE_BUSINESS)->count();
        $coach_count = User::where('role_type', User::ROLE_COACH)->count();
        $records = array(
            [
                "user" => "Personal User",
                "percent" => $personal_user,
            ],
            [
                "user" => "Business User",
                "percent" => $business_user,
            ],
            [
                "user" => "Coach",
                "percent" => $coach_count,
            ],
            [
                "user" => "Certified User",
                "percent" => $verified_user,
            ],
            [
                "user" => "Suspended User",
                "percent" => $suspend_user,
            ],
        );

        $dataPoints = [];

        foreach ($records as $pieChart) {

            $dataPoints[] = [
                "name" => $pieChart['user'],
                "y" => floatval($pieChart['percent'])
            ];
        }

        $userData = User::select('id', 'created_at')
            ->whereYear('created_at', date('Y'))
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m');
            });

        $usermcount = [];
        $userArr = [];

        foreach ($userData as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($usermcount[$i])) {
                $userArr[$i]['count'] = $usermcount[$i];
            } else {
                $userArr[$i]['count'] = 0;
            }
            $userArr[$i]['month'] = $month[$i - 1];
        }
        $users_data = [];
        $monthList = [];
        foreach ($userArr as $key => $user) {
            $users_data[] = $user['count'];
            $monthList[] = $user['month'];
        }



        return view('admin.dashboard')->with([
            'personal_user' => $personal_user,
            'business_user' => $business_user,
            'coach_count' => $coach_count,
            'verified_user' => $verified_user,
            'suspend_user' => $suspend_user,
            'category_count' => $category_count,
            'users_data' => $users_data,
            "monthList" => $monthList,
            'class_count' => $class_count,
            'program_count' => $program_count,
            "pieChart" => json_encode($dataPoints)
        ]);
    }


    /*****************************************/

    /* Login */

    /****************************************/

    public function login()
    {
        return view('admin.login');
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $userEmail = $request->get('email');
        $userPassword = $request->get('password');

        if (Auth::guard('admin')->attempt(['email' => $userEmail, 'password' => $userPassword, 'role_type' => User::ROLE_ADMIN])) {
            notify()->success('Login Successfully.');
            return redirect()->route('admin.dashboard');
        } else {
            notify()->error('Error, Login details are not valid.');
            return back();
        }
    }
    public function myProfile(Request $request)
    {
        $id = Auth::guard('admin')->id();
        $users = User::where('id', $id)->where('role_type', User::ROLE_ADMIN)->first();
        return view('admin.my_profile', compact('users'));
    }
    public function editProfile($id)
    {
        $user = User::find($id);
        return view('admin.edit_profile')->with('user', $user);
    }
    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);


        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
        if (isset($request->profile_image) && !empty($request->profile_image)) {
            $request->profile_image = UploadImage($request->profile_image, 'profile');
            $user->profile_image =  !empty($request->profile_image) ? $request->profile_image : @$user->profile_image;
        }
        if ($user->save()) {
            notify()->success(' Updated Profile Successfully.');
            return redirect(route('admin.myprofile'));
        }
        return back();
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // public function personalUser($type){
    //     if($type=="personal"){
    //         $user_list = User::where('role_type', User::ROLE_USER)->where('user_type', User::TYPE_PERSONAL)->where('account_complete', User::PROFILE_COMPLETE)->orderby('id', 'Desc')->paginate(20);
    //     }
    //     elseif($type=="business"){
    //         $user_list = User::where('role_type', User::ROLE_USER)->where('user_type', User::TYPE_BUSINESS)->where('account_complete', User::PROFILE_COMPLETE)->orderby('id', 'Desc')->paginate(20);
    //     }else{
    //         $user_list = User::where('role_type', '!=', User::ROLE_ADMIN)->where('role_type', '!=', User::ROLE_COACH)->where('account_complete', User::PROFILE_NOT_COMPLETE)->orderby('id', 'Desc')->paginate(20);
    //     }

    //     return view('admin.users.user_list',compact('user_list','type'));
    // }
    public function usersList()
    {
        $user_list = User::paginate(15);

        return view('admin.users.user_list', compact('user_list'));
    }
    public function inCompleteUsers()
    {
        $user_list = User::where('role_type', '!=', User::ROLE_ADMIN)
            ->where('role_type', '!=', User::ROLE_COACH)
            ->where('account_complete', User::PROFILE_NOT_COMPLETE)->orderby('id', 'Desc')->paginate(20);
        return view('admin.users.user_profile.incomplete_user', compact('user_list'));
    }
    public function personalUser()
    {
        $user_list = User::where('role_type', User::ROLE_USER)
            ->where('user_type', User::TYPE_PERSONAL)
            ->where('account_complete', User::PROFILE_COMPLETE)->orderby('id', 'Desc')->paginate(10);
        return view('admin.users.user_profile.personal_user', compact('user_list'));
    }
    public function buisnessUser()
    {
        $user_list = User::where('role_type', User::ROLE_USER)
            ->where('user_type', User::TYPE_BUSINESS)
            ->where('account_complete', User::PROFILE_COMPLETE)->orderby('id', 'Desc')->paginate(10);
        return view('admin.users.user_profile.buisness_user', compact('user_list'));
    }

    public function coachList()
    {
        $coach_users = User::with('coach_detail', 'verification_detail')->where('role_type', User::ROLE_COACH)->where('account_complete', User::PROFILE_COMPLETE)->orderby('id', 'Desc')->paginate(10);
        // $review = Review::with('users','program')->where(['id' => $id])->get();
        return view('admin.users.coach_list', compact('coach_users'));
    }
    public function changeStatus(Request $request)
    {
        $details = User::find($request->id);
        $details->status = $request->status;
        if ($request->status == 'S') {
            $userToLogout = User::find($request->id);
            Auth::setUser($userToLogout);
            Auth::logout();
        }
        if ($details->save()) {

            return response()->json([
                'status' => $details->getStatusText(),
                'message' => 'User status update successfully!'
            ]);
        }
        return response()->json(['error' => 'User status not updated successfully!!!']);
    }

    public function rejectCoachProfileStatus(Request $request)
    {
        $details = User::find($request->id);
        $coachProfile = CoachDetail::where('user_id', $request->id)->first();
        $details->coach_profile_verification_status = User::COACH_PROFILE_STATUS_REJECT;
        $coachProfile->status = CoachDetail::STATUS_SUSPEND;
        $coachProfile->profile_status = 'D';
        $reason = $request->reason;
        if ($details->save()) {
            $coachProfile->save();
            //send verification mail for admin
            $base_url = url('/');

            $mail_data['subject'] = 'Train By Trainer: Verification of Profile';
            $mail_data['email'] = $details->email;
            $mail_data['full_name'] = $details->first_name . " " . $details->last_name;
            $mail_data['link'] = $base_url;
            $mail_data['content'] = '<p>Admin has rejected your account approval request. Please see the reason mentioned below and resubmit your profile information.</p><p><b>Reason: </b>' . $reason . '</p>';
            $mail_data['layout'] = 'email_templates.coach-profile-status';
            emailSend($mail_data);
            return response()->json(['message' => 'User status update successfully!']);
        }
        return response()->json(['error' => 'User status not updated successfully!!!']);
    }

    public function verifyCoachProfileStatus(Request $request)
    {
        $details = User::find($request->id);
        $coachProfile = CoachDetail::where('user_id', $request->id)->first();
        $details->coach_profile_verification_status = User::COACH_PROFILE_STATUS_VERIFY;
        $coachProfile->status = CoachDetail::STATUS_VERIFY;
        $coachProfile->profile_status = 'E';
        if ($details->save()) {
            $coachProfile->save();
            //send verification mail for admin
            $base_url = url('/');

            $mail_data['subject'] = 'Train By Trainer: Verification of Profile';
            $mail_data['email'] = $details->email;
            $mail_data['full_name'] = $details->first_name . " " . $details->last_name;
            $mail_data['link'] = $base_url;
            $mail_data['content'] = 'Admin has accepted your account approval request.';
            $mail_data['layout'] = 'email_templates.coach-profile-status';
            emailSend($mail_data);
            return response()->json(['message' => 'User status update successfully!']);
        }
        return response()->json(['error' => 'User status not updated successfully!!!']);
    }



    public function rejectCoachBadgeRequest(Request $request)
    {
        $details = User::find($request->id);
        $coachVerificationDetail = VerificationDetail::where('user_id', $request->id)->first();
        $coachDetail = CoachDetail::where("user_id", $request->id)->first();
        $details->coach_badge_status = User::BADGE_STATUS_REJECT;
        $coachVerificationDetail->badge_status = VerificationDetail::STATUS_SUSPEND;
        $reason = $request->reason;
        if ($details->save()) {
            $coachVerificationDetail->save();
            //send verification mail for admin
            $base_url = url('/');

            $mail_data['subject'] = 'Train By Trainer: Request for Badge';
            $mail_data['email'] = $details->email;
            $mail_data['full_name'] = $details->first_name . " " . $details->last_name;
            $mail_data['link'] = $base_url . "/";
            $mail_data['content'] = '<p>Admin has rejected your account certification request. Please see the reason mentioned below and resubmit your certification.</p><p><b>Reason: </b>' . $reason . '</p>';
            $mail_data['layout'] = 'email_templates.coach-profile-status';
            emailSend($mail_data);
            return response()->json(['message' => 'User status update successfully!']);
        }
        return response()->json(['error' => 'User status not updated successfully!!!']);
    }

    public function acceptCoachBadgeRequest(Request $request)
    {
        $details = User::find($request->id);
        $coachVerificationDetail = VerificationDetail::where('user_id', $request->id)->first();
        $coachDetail = CoachDetail::where("user_id", $request->id)->first();
        if (!empty($coachDetail->status) && $coachDetail->status == CoachDetail::STATUS_VERIFY) {
            $details->coach_badge_status = User::BADGE_STATUS_CERTIFIED;
            $coachVerificationDetail->badge_status = VerificationDetail::STATUS_CERTIFIED;
            if ($details->save()) {
                $coachVerificationDetail->save();
                //send verification mail for admin
                $base_url = url('/');

                $mail_data['subject'] = 'Train By Trainer: Request for Badge';
                $mail_data['email'] = $details->email;
                $mail_data['full_name'] = $details->first_name . " " . $details->last_name;
                $mail_data['link'] = $base_url . "/";
                $mail_data['content'] = 'Admin has accepted your Profile Badge request. Please now check your proflie';
                $mail_data['layout'] = 'email_templates.coach-profile-status';
                emailSend($mail_data);
                return response()->json(['message' => 'User status update successfully!']);
            }
        } else {
            return response()->json(['message' => 'Please verify coach profile first!!']);
        }

        return response()->json(['error' => 'User status not updated successfully!!!']);
    }


    public function incompleteCoaches($type)
    {
        $incompleteProfiles = User::whereIn('role_type', [User::ROLE_COACH, User::ROLE_ADMIN])
            ->where('account_complete', User::PROFILE_NOT_COMPLETE)
            ->orderby('id', 'Desc')->paginate(20);

        // $noEmailVerify = User::where('role_type', User::ROLE_COACH)->where('account_complete', User::PROFILE_COMPLETE)->where('is_verification', '!=', User::EMAIL_VERIFIED)->orderby('id', 'Desc')->paginate(20);

        // $verifiedEmails = User::where('role_type', User::ROLE_COACH)->where('status', User::STATUS_PENDING)->where('account_complete', User::PROFILE_COMPLETE)->where('is_verification', User::EMAIL_VERIFIED)->orderby('id', 'Desc')->paginate(20);


        return view('admin.users.incomplete_coach', compact('incompleteProfiles', 'type'));
    }

    public function userDetail($id)
    {
        $user = User::where('id', $id)->with('country_view', 'state_view')->first();
        return view('admin.users.user_detail', compact('user'));
    }
    public function coachDetail($id)
    {
        $user = User::where('id', $id)
            ->with('country_view', 'state_view')
            ->with(['coach_detail' => function ($query) {
                $query->with('coach_education', 'coach_images', 'coach_result');
            }])
            ->with(['verification_detail' => function ($query) {
                $query->with('verification_document');
            }])
            ->first();
        return view('admin.users.coach_detail', compact('user'));
    }
    public function userDelete($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->delete()) {

            return back()->with('flash_success', 'User delete successfully');
        } else {

            return back()->with('flash_error', 'User not deleted');
        }
    }
    /*****************************************/

    /* edit profile details*/

    /****************************************/

    public function editPersonalUser($id)
    {
        $user = User::find($id);
        $countries = Country::where('code', 'NL')->select('id', 'name')->first();
        $states = State::where('country_id', 155)->get(['id', 'name']);
        return view('admin.users.user_profile.edit_personal_user', compact('user', 'countries', 'states'));
    }

    public function updatePersonalUser(Request $request)
    {
        // $type = $request->type;

        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'postal_code' => 'required',

            'city' => 'required'
        ]);

        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;

        $user->city = $request->city;
        $user->country_id = $request->country;
        $user->state_id = $request->state;

        if (isset($request->profile_image) && !empty($request->profile_image)) {
            $request->profile_image = UploadImage($request->profile_image, 'profile');
            $user->profile_image =  !empty($request->profile_image) ? $request->profile_image : @$user->profile_image;
        }


        if ($user->save()) {
            notify()->success('Updated Successfully.');

            return redirect()->route('admin.user.detail',$user->id);
        }
        return back();
    }
    public function changeUserStatus(Request $request)
    {
        $details = User::find($request->id);
        $details->status = $request->status;
        if ($request->status == 'S') {
            $userToLogout = User::find($request->id);
            Auth::setUser($userToLogout);
            Auth::logout();
        }
        if ($details->save()) {

            return response()->json([
                'status' => $details->getStatusText(),
                'message' => 'User status update successfully!'
            ]);
        }
    }
    public function editBuisnessUser($id)
    {
        $user = User::find($id);
        $countries = Country::where('code', 'NL')->select('id', 'name')->first();
        $states = State::where('country_id', 155)->get(['id', 'name']);
        return view('admin.users.user_profile.edit_buisness_user', compact('user', 'countries', 'states'));
    }

    public function updateBuisnessUser(Request $request)
    {
        // $type = $request->type;

        $countries = Country::where('code', 'NL')->select('id', 'name')->first();
        $states = State::where('country_id', 155)->get(['id', 'name']);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required'
        ]);

        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->country_id = $request->country;
        $user->state_id = $request->state;

        if (isset($request->profile_image) && !empty($request->profile_image)) {
            $request->profile_image = UploadImage($request->profile_image, 'profile');
            $user->profile_image =  !empty($request->profile_image) ? $request->profile_image : @$user->profile_image;
        }


        if ($user->save()) {
            notify()->success('Updated Successfully.');

            return redirect()->route('admin.user.detail',$user->id);
        }
        return back();
    }
    /*****************************************/

    /* edit coach profile details*/

    /****************************************/

    public function editCoach($id)
    {
        $user = User::find($id);
        $countries = Country::where('code', 'NL')->select('id', 'name')->first();
        $states = State::where('country_id', 155)->get(['id', 'name']);
        return view('admin.users.edit_coach', compact('user', 'countries', 'states'));
    }


    public function updateCoach(Request $request)
    {
        // $type = $request->type;

        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required'
        ]);

        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response);
        }
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        // $user->status = $request->status;
        $user->city = $request->city;
        $user->country_id = $request->country;
        $user->state_id = $request->state;

        if (isset($request->profile_image) && !empty($request->profile_image)) {
            $request->profile_image = UploadImage($request->profile_image, 'profile');
            $user->profile_image =  !empty($request->profile_image) ? $request->profile_image : @$user->profile_image;
        }


        if ($user->save()) {
            notify()->success('Updated Successfully.');

            return redirect()->route('admin.coach.detail',$user->id);
        }
        return back();
    }


    // public function forgot_password()
    // {
    //     return view('admin.forgot_password');
    // }
    public function adminchangePassword()
    {
        return view('admin.change-password');
    }
    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            try {

                $user = Auth::guard('admin')->user();

                $validator = Validator::make($request->all(), [
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
                    'old_password' => 'required_without:new_password | different:new_password'
                ]);
                if ($validator->fails()) {
                    $response['error'] = $validator->errors()->first();
                    notify()->error('Error, ' . $response['error']);
                    $response['error'] = true;
                    return redirect()->back();
                }

                if (Hash::check(trim($request->old_password), $user->password)) {
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    notify()->success('Password updated successfully.');
                    return redirect()->route('admin.dashboard');
                } else {
                    notify()->error('Error, The old password is incorrect.');
                    return redirect::back()->withInput();
                }
            } catch (\Exception $e) {
                return redirect::back()->with('error', $e->getMessage());
            }
        }
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function transactionList(Request $request)
    {
        $user = User::orderBy("id", "DESC")->paginate(10);
        $transactions = OrderList::has('payment')
            ->whereHas('program', function ($query) {
                $query->with('program_user');
            })->orderBy('id', 'desc')->paginate(10);
        return view('admin.Transaction_Management.transaction_list', compact('transactions'));
    }
    public function transactionDetail($id)
    {
        $coachDetail = new CoachDetail();
        $transactions = OrderList::has('payment')
            ->whereHas('program', function ($query) use ($id) {
                $query->where('user_id', $id)
                    ->with('program_user');
            })->orderBy('id', 'desc')->paginate(10);
        $user = User::orderBy("id", "DESC")->paginate(10);
        return view('admin.Transaction_Management.Deatil', compact('user', 'coachDetail', 'transactions'));
    }
    public function transactionDelete($id)
    {
        User::where("id", $id)->delete();
        return Redirect::back()->with("message", "Data Deleted Successfully");
    }
    public function transactionView($id = null)
    {
        $transaction = OrderList::where('id', $id)->with('class')
            ->has('payment')
            ->whereHas('program', function ($query) {
                $query->with('program_user');
            })
            ->first();
            //dd($transaction);
        $commission = AdminCommission::where('type', 'P')->first();

       // dd($commission );
        return view('admin.Transaction_Management.view', ['transaction' => $transaction, 'commission' => $commission]);
    }
    public function programList($id)
    {
        $myReviewDetail = Review::where('rated_by', 'id')
        ->where('rate_for_program_id', @$id)
        ->first();
        $avgRating = Review::where("rate_for_coach_id", $id)->avg('star');
        $programDetail = CoachProgram::with('program_user', 'program_result', 'program_inside','review_list')
        ->where("user_id", $id);
        $program = $programDetail->orderBy("id", "DESC")->paginate(10);
        return view('admin.type.program', compact('program','myReviewDetail','avgRating'));
    }
    public function ClassList($id)
    {
        $myReviewDetail = Review::where('rated_by', 'id')
        ->where('rate_for_class_id', @$id)
        ->first();
        $avgRating = Review::where("rate_for_coach_id", $id)->avg('star');
        $classDetailAll = CoachClass::with('program_user','reviewClass_list')
            ->where("created_by", $id);
        $otherClass = $classDetailAll->orderBy("id", "DESC")->paginate(10);

        return view('admin.type.class',compact('otherClass','avgRating','myReviewDetail'));
    }
    public function contactuslist(){
        $contactus = ContactUs::orderBy("id", "DESC")->paginate(10);
        return view('admin.contactus.list',['contactus'=>$contactus]);
        }
        public function transactionClassList(){

            $classBookings = Booking::with('user','schedule')
            ->whereHas('coach_class', function($query){
                $query->where('created_by', Auth::id())
                ->with('program_user');
            })
            ->orderby('id', 'Desc')->paginate(10);
        return view('admin.Transaction_Management.class_list',compact('classBookings'));
        }
        public function transactionClassView($id=null){
            $session = Booking::where('id',$id)->where('user_id',Auth::id())->with('user','schedule')
            ->whereHas('coach_class', function($query){
                $query->with('program_user');
            })
            ->first();

            $otherBookings = Booking::where('id',$id)->where('user_id',Auth::id())->with('user','schedule')
            ->whereHas('coach_class', function($query){
                $query->with('program_user');
            })
            ->paginate(3);
           //dd($otherBookings);
            return view('admin.Transaction_Management.class_view',['session'=>$session, 'otherBookings' => $otherBookings]);
        }

}
