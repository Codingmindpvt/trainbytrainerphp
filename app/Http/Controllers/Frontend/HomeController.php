<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chat;
use App\Models\City;
use App\Models\CoachClass;
use App\Models\CoachDetail;
use App\Models\CoachProgram;
use App\Models\Country;
use App\Models\Day;
use App\Models\Page;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\State;
use App\Models\TrainingStyle;
use App\Models\User;
use App\Models\WishList;
use App\Traits\FilterTrait;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Validator;

class HomeController extends Controller
{

    use FilterTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /********************************/

    /* Index (Home Page) */

    /********************************/

    public function review_submit(Request $request)
    {
        $postData = $request->all();
        $rules = [
            //'star' => 'required',
            'title' => 'required',
            'description' => 'required',
            'trained_date' => 'required',
        ];

        $validator = Validator::make($postData, $rules);

        if ($validator->fails()) {
            $response['errors'] = $validator->errors();
            $response['error'] = true;
            return $response;
            // return redirect()->back()->with($response)->withInput();
        }

        $checkReviewDetail = Review::where('rated_by', Auth::user()->id)
            ->where('rate_for', @$postData['rate_for'])
            ->first();

        if ($checkReviewDetail) {
            $review = Review::find($checkReviewDetail['id']);

            $review->title = $postData['title'];
            $review->description = $postData['description'];
            $review->star = $postData['star'];
            $review->trained_date = $postData['trained_date'];

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
            $model->rate_for = $request->rate_for;
            $model->review_type = Review::REVIEW_TYPE_COACH;
            $model->status = Review::STATUS_ACTIVE;
            $model->trained_date = $request->post('trained_date');
            if ($model->save()) {
                notify()->success('Data added Successfully.');
            } else {
                notify()->error('Somthing went wrong.');
            }
        }
    }

    public function index(Request $request)
    {
        if (Auth::check()) {
            $userinfo = User::where('id', Auth::user()->id)->first();
            if (empty($userinfo->first_name) && empty($userinfo->last_name)) {
                return redirect()->route('create_profile');
            }
        }
        $trainingStyles = TrainingStyle::where('status', TrainingStyle::STATUS_ACTIVE)->get();


        $coach = User::where('role_type', User::ROLE_COACH)
            ->where('id', "!=", Auth::id())
            ->has('coach_detail')->first();
        if ($request->has('filter_category') && $request->filter_category != '') {
            $category_ids = $request->filter_category;
            //$category_ids = explode(',', $category_ids);
            $coach_ids = $this->coachFilter($category_ids);
            // if (isset($user_ids) && !empty($user_ids)) {
            //     $coach->whereIn('id', $user_ids);
            // }
            $coach->whereIn('id', $coach_ids);
        }


        // $users = $coach->where('id',$id)
        // ->get();
        //dd($users);
        $categories = Category::where('status', Category::STATUS_ACTIVE)->orderby('id', 'Desc')->limit(8)->get();
        //dd($categories);
        $category_count = Category::where('status', Category::STATUS_ACTIVE)->orderby('id', 'Desc')->count();
        return view('frontend.index', ['categories' => $categories, 'category_count' => $category_count, 'coach' => $coach, 'trainingStyles' => $trainingStyles]);
    }

    /********************************/

    /* Signup */

    /********************************/

    public function signup(Request $request)
    {
        $user = new User();

        if ($request->isMethod('post')) {
            $postData = $request->all();
            $rules = [
                'email' => 'required|email|unique:users,email,NULL,id',
                'password' => ['required', 'min:8'],
                'confirm_password' => ['required', 'same:password'],
                'role_type' => ['required', 'in:C,U'],
            ];

            $validator = Validator::make($postData, $rules);

            if ($validator->fails()) {
                $response['error'] = $validator->errors()->first();
                notify()->error('Error, ' . $response['error']);
                $response['error'] = true;
                return redirect()->back()->with($response)->withInput();
            }

            $createUser = User::createUser($postData);

            if ($createUser) {
                Auth::loginUsingid($createUser->id);
                notify()->success('Signup Successfully.');
                return redirect::to('/create_profile');
            } else {
                notify()->error('Something went wrong!');
                return redirect()->back();
            }
        }
        return view("frontend.get-started", ["user" => $user]);
    }

    /********************************/

    /* Create User Profile */

    /********************************/

    public function create_profile()
    {
        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);
        return view('frontend.create-profile', compact('countries', 'states'));
    }

    public function createprofile(Request $request)
    {

        $postData = $request->all();
        $rules = [
            'first_name' => 'required:max:15',
            'last_name' => 'required:max:15',
            'postal_code' => 'required',
            'city' => 'required',
            'address' => 'required',

        ];

        $validator = Validator::make($postData, $rules);
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            notify()->error('Error, ' . $response['error']);
            $response['error'] = true;
            return redirect()->back()->with($response)->withInput();
        }

        if (isset($postData['profile_image']) && !empty($postData['profile_image'])) {
            $postData['profile_image'] = UploadImage($postData['profile_image'], 'profile');
        }

        $createUser = User::createprofile($postData);

        if ($createUser) {
            if ($createUser->role_type == User::ROLE_USER) {
                notify()->success('Profile created successfully.');
            } else {
                notify()->success('Account created successfully. Please verify your email on registered email address.');
            }
            if ($createUser->role_type == User::ROLE_COACH) {

                $base_url = url('/');
                $token = base64_encode(time());
                $uniqueid = base64_encode($createUser['hash_token']);

                $mail_data['subject'] = 'Train By Trainer: Registration successful';
                $mail_data['email'] = $createUser['email'];
                $mail_data['full_name'] = $createUser['first_name'] . " " . $createUser['last_name'];
                $mail_data['link'] = $base_url . "/coach-email-verification/" . $uniqueid . "/" . $token;
                $mail_data['content'] = 'Thank you for signing up to TrainbyTrainer as a Coach! We look forward to having you use our platform, and know that we will be able to assist you with any of your queries.';
                $mail_data['layout'] = 'email_templates.system_generated';
                emailSend($mail_data);

                Auth::logout();
                return redirect()->route('login');
                //return redirect()->route('coach-dashboard');
            } else {
                return redirect()->route('frontend.index');
            }
        } else {
            notify()->error('Error, Something went wrong!');
            return redirect()->back();
        }
    }

    public function coachEmailVerification($uniqueid, $token)
    {
        $hash_token = base64_decode($uniqueid);
        $currentToken = base64_decode($token);
        //expire time 2 min
        $expireToken = (time() - 2 * 60);
        if ($currentToken >= $expireToken) {

            $checkUser = User::where("hash_token", $hash_token)->where('is_verification', User::EMAIL_VERIFIED)->first();
            if (isset($checkUser)) {
                notify()->Error('Error, This Verification Link has already Used.');
                return redirect()->back();
            } else {

                $user = User::where("hash_token", $hash_token)->update([
                    "is_verification" => User::EMAIL_VERIFIED,
                ]);

                notify()->success('Success, Your Email Address has Verified Successfully.');
                Auth::logout();
                return redirect()->route('login');
            }
        } else {
            notify()->error('Error, Your Email Verification Link has been Expired!');
            Auth::logout();
            return redirect()->route('login');
        }
    }

    /*****************************************/

    /* logout */

    /****************************************/

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /*****************************************/

    /* user profile details (view)*/

    /****************************************/

    public function userProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.userprofile', compact('user'));
    }

    /*****************************************/

    /* edit profile details*/

    /****************************************/

    public function edit_profile(Request $request)
    {
        $user = Auth::user();
        $countries = Country::get(['id', 'name']);
        $states = State::limit('100')->get(['id', 'name']);
        if ($request->isMethod('post')) {
            $postData = $request->all();

            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'contact_no' => ['required'],
            ];
            $validator = Validator::make($postData, $rules);
            if ($validator->fails()) {
                $response['error'] = $validator->errors()->first();
                notify()->error('Error, ' . $response['error']);
                $response['error'] = true;
                return redirect()->back()->with($response);
            }

            if (isset($postData['profile_image']) && !empty($postData['profile_image'])) {
                $postData['profile_image'] = UploadImage($postData['profile_image'], 'profile');
            }

            $postData['user_id'] = $user->id;

            $updateUser = User::updateprofile($postData);

            if ($updateUser) {
                notify()->success('Your profile information updated successfully!!');
                return redirect()->route('userprofile');
            }
        }
        return view('frontend.account-edit', compact('user', 'countries', 'states'));
    }

    /*****************************************/

    /* change password */

    /****************************************/

    public function change_password(Request $request)
    {
        if ($request->isMethod('post')) {
            try {

                $user = Auth::user();

                $validator = Validator::make($request->all(), [
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
                    'old_password' => 'required_without:new_password | different:new_password',
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
                    return redirect::back();
                } else {
                    notify()->error('Error, The old password is incorrect.');
                    return redirect::back()->withInput();
                }
            } catch (\Exception $e) {
                return redirect::back()->with('error', $e->getMessage());
            }
        }

        return redirect()->route('userprofile');
    }

    /*****************************************/

    /* Login */

    /****************************************/

    public function singIn()
    {

        return view('frontend.login');
    }

    public function login(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($postData, $rules);

        if ($validator->fails()) {

            $response['error'] = $validator->errors()->first();

            notify()->error('Error, ' . $response['error']);

            $response['error'] = true;

            return redirect()->back()->with($response)->withInput();
        }

        $userEmail = $request->get('email');
        $userPassword = $request->get('password');

        if (Auth::attempt(['email' => $userEmail, 'password' => $userPassword])) {

            if (Auth::user()->role_type == User::ROLE_ADMIN) {
                notify()->error('This account not an User or Coach account.');
                Auth::logout();
                return back();
            } else if (Auth::user()->account_complete == User::PROFILE_NOT_COMPLETE) {
                notify()->success('Login Successfully, Now complete your profile.');
                return redirect::to('/create_profile');
            } elseif (Auth::user()->role_type == User::ROLE_USER || (Auth::user()->is_verification == User::EMAIL_VERIFIED && Auth::user()->role_type == User::ROLE_COACH && Auth::user()->status == User::STATUS_ACTIVE)) {
                notify()->success('Login Successfully.');
                if (Auth::user()->role_type == User::ROLE_COACH) {
                    return redirect()->route('coach-dashboard');
                } else {
                    return redirect()->route('userprofile');
                }
            } elseif (Auth::user()->status == User::STATUS_SUSPEND) {
                notify()->warning('Warning!, Your account has been suspended by admin for more detail, please contact to Admin.');
                Auth::logout();
                return back();
            } elseif (Auth::user()->is_verification != User::EMAIL_VERIFIED && Auth::user()->role_type == User::ROLE_COACH) {
                $base_url = url('/');
                $token = base64_encode(time());
                $uniqueid = base64_encode(Auth::user()->hash_token);

                $mail_data['subject'] = 'Train By Trainer: Registration successful';
                $mail_data['email'] = Auth::user()->email;
                $mail_data['full_name'] = Auth::user()->first_name . " " . Auth::user()->last_name;
                $mail_data['link'] = $base_url . "/coach-email-verification/" . $uniqueid . "/" . $token;
                $mail_data['content'] = 'Thank you for signing up to TrainbyTrainer as a Coach! We look forward to having you use our platform, and know that we will be able to assist you with any of your queries.';
                $mail_data['layout'] = 'email_templates.system_generated';
                emailSend($mail_data);

                notify()->error('Your Email Address not Verified. Please verify your email on registered email address.');
                Auth::logout();
            } else {
                notify()->info('Information, Your Account not Verified by Admin. Please wait till the verification.');
                Auth::logout();
            }
        } else {
            notify()->error('Error, Login details are not valid.');
        }
        return redirect()->back()->withInput();
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $userEmail = $request->get('email');
        $userPassword = $request->get('password');

        if (Auth::attempt(['email' => $userEmail, 'password' => $userPassword, 'role_type' => User::ROLE_ADMIN])) {
            notify()->success('Success, Login Successfully.');
            return redirect()->route('admin.dashboard');
        } else {
            notify()->error('Error, Login details are not valid.');
            return back();
        }
    }

    /*****************************************/

    /* category Display */

    /****************************************/

    public function category(Request $request)
    {

        $categories = Category::orderBy("id", "DESC")->paginate(16);
        return view("frontend.category", ["categories" => $categories]);
    }

    /*****************************************/

    /* coaches list */

    /****************************************/
    public function coaches(Request $request)
    {




        $coach = User::where('role_type', User::ROLE_COACH)
            ->where('id', "!=", Auth::id())
            ->has('coach_detail')
            ->with('verification_detail');



        $cat_id  = $request->cat_id;
        if (isset($cat_id) && $cat_id != '') {
            $coach = User::whereHas('coach_detail', function ($q) use ($cat_id) {
                $q->whereRaw("find_in_set('".$cat_id."',users_coach_details.categories)");
            })->where('role_type', User::ROLE_COACH)
                ->where('id', "!=", Auth::id())
                ->has('coach_detail')
                ->with('verification_detail');
        }
        $pat_id = $request->pat_id;
        if (isset($pat_id) && $pat_id != '') {
            $coach = User::whereHas('coach_detail', function ($q) use ($pat_id) {
                $q->whereRaw("find_in_set('".$pat_id."',users_coach_details.personality_and_training)");
            })->where('role_type', User::ROLE_COACH)
                ->where('id', "!=", Auth::id())
                ->has('coach_detail')
                ->with('verification_detail');
        }
        if ($request->has('filter_category') || $request->has('filter_training_style') && $request->filter_category != '') {
            $category_ids = @$request->filter_category;

            $training_style_ids = @$request->filter_training_style;
            //$country_ids = $request->filter_category;
            $user_ids = $this->coachFilter($category_ids, $training_style_ids);
            if (isset($user_ids) && !empty($user_ids)) {
                $coach->whereIn('id', $user_ids);
            }
        }

        if ($request->has('filter_personality') && $request->filter_personality != '') {
            $filter_personality = $request->filter_personality;
            if (isset($filter_personality)) {
                $filter_personality = explode(',', $filter_personality);
            }
            $user_id_per = $this->modifyPersonalityFilter($filter_personality);
            if (isset($user_id_per) && !empty($user_id_per)) {
                if (isset($user_ids) && !empty($user_ids)) {
                    $merge_user = array_merge($user_ids, $user_id_per);
                    $user_id_per = array_unique($merge_user);
                }
            }
            if (isset($user_id_per) && !empty($user_id_per)) {
                $coach->whereIn('id', $user_id_per);
            }
        }
        if ($request->has('filter_rating') && $request->filter_rating != '') {
            $filter_rating = $request->filter_rating;
            if (isset($filter_rating)) {
                $filter_rating = explode(',', $filter_rating);
            }
            $user_id_review = $this->modifyRatingFilter($filter_rating);
            if (isset($user_id_per) && !empty($user_id_per)) {
                $merge_user = array_merge($user_id_per, $user_id_review);
                $user_id_review = array_unique($merge_user);
            }

            // dd($user_id_review);

            // if (isset($user_id_review) && !empty($user_id_review)) {
            $coach->whereIn('id', $user_id_review);
            // }

            // dd($coach->get()->toArray());

        }

        if ($request->has('filter_price') && $request->filter_price != '') {
            $filter_price = $request->filter_price;
            if (isset($filter_price)) {
                $filter_price = explode(',', $filter_price);
            }
            if (isset($filter_price) && !empty($filter_price)) {
                $coach->whereHas('coach_detail', function ($q) use ($filter_price) {
                    $q->whereIn('price_range', $filter_price);
                })->get();
            }
        }

        if ($request->has('filter_gender') && $request->filter_gender != '') {
            $filter_gender = $request->filter_gender;
            if (isset($filter_gender)) {
                $filter_gender = explode(',', $filter_gender);
            }

            if (isset($filter_gender) && !empty($filter_gender)) {
                $coach->whereHas('coach_detail', function ($q) use ($filter_gender) {
                    $q->whereIn('gender', $filter_gender);
                })->get();
            }
        }

        if ($request->has('filter_country') && $request->filter_country != '') {
            $filter_country = $request->filter_country;
            if (isset($filter_country)) {
                $filter_country = explode(',', $filter_country);
            }
            if (isset($filter_country) && !empty($filter_country)) {
                $coach->whereIn('country_id', $filter_country);
            }
        }

        // @vikas filter
        $wishList = new WishList();
        $categoryList = Category::Where('status', Category::STATUS_ACTIVE)->get();
        $trainingStyleList = TrainingStyle::Where('status', TrainingStyle::STATUS_ACTIVE)->get();

        $coach_count = $coach->count();

        $users = $coach
            ->orderBy("id", "DESC")->paginate(6);

        $countryList = Country::select('id', 'name', 'code')->get();
        $stateList = State::select('id', 'name', 'country_id')->get();

        return view("frontend.coaches", [
            "coach_count" => $coach_count,
            "users" => $users,
            "wishList" => $wishList,
            "categoryList" => $categoryList,
            "countryList" => $countryList,
            "stateList" => $stateList,
            "trainingStyleList" => $trainingStyleList,

        ]);
    }
    /*****************************************/

    /* category Profile */

    /****************************************/

    public function coachesProfile(Request $request, $id)
    {

        //$book = Book::find($id);
        $myReviewDetail = Review::where('rated_by', Auth::id())
            ->where('rate_for', @$id)
            ->first();

        $reviewList = Review::where('rate_for', $id)->with('users')->get();
        $reviewListsum = DB::table('reviews')->where('rate_for', $id)->sum('star');
        $userProfile = User::where('id', $id)
            ->where('role_type', User::ROLE_COACH)
            ->has('coach_detail')
            ->first();

        $wishList = new WishList();
        $categoryList = Category::all();
        $coach = User::where('role_type', User::ROLE_COACH)
            ->where('id', "!=", Auth::id())
            ->has('coach_detail');

        // dd($coach);
        $coach_count = $coach->count();
        $users = $coach
            ->orderBy("id", "DESC")->paginate(6);

        return view("frontend.trainer_profile", [
            "coach_count" => $coach_count,
            "users" => $users,
            "wishList" => $wishList,
            "categoryList" => $categoryList,
            "userProfile" => $userProfile,
            'reviewList' => $reviewList,
            'myReviewDetail' => $myReviewDetail,
            'reviewListsum' => $reviewListsum,
        ]);
    }

    /*****************************************/

    /* Contact us */

    /****************************************/

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    /*****************************************/

    /* blogs */

    /****************************************/

    public function Blogs()
    {
        $categoryList = Category::Where('status', Category::STATUS_ACTIVE)->orderBy("id", "DESC")->get();
        $blogList = Blog::with('category')->Where('status', Blog::STATUS_ACTIVE)->orderBy("id", "DESC")->get();
        return view('frontend.blog.blogs', ['categoryList' => $categoryList, 'blogList' => $blogList]);
    }

    public function BlogDetail($id)
    {
        $blogDetail = Blog::with('category')
            ->Where('id', $id)
            ->Where('status', Blog::STATUS_ACTIVE)
            ->first();
        return view('frontend.blog.blog-detail', ['blogDetail' => $blogDetail]);
    }

    public function BlogDetailByCategory($categoryId)
    {
        $categoryList = Category::Where('status', Category::STATUS_ACTIVE)
            ->Where('id', "!=", $categoryId)
            ->orderBy("id", "DESC")
            ->get();
        $blogList = Blog::with('category')
            ->Where('category_id', $categoryId)
            ->Where('status', Blog::STATUS_ACTIVE)
            ->orderBy("id", "DESC")
            ->get();
        return view('frontend.blog.blog-detail-by-category', ['blogList' => $blogList, 'categoryList' => $categoryList]);
    }

    /*****************************************/

    /* privacy Policy */

    /****************************************/

    public function privacyPolicy(Request $request)
    {
        $privacy = Page::where('type', Page::PRIVACY_POLICY)->where('status', Page::STATUS_ACTIVE)->first();
        return view('frontend.pages.privacy-policy', compact('privacy'));
    }

    /*****************************************/

    /*Terms Condition */

    /****************************************/

    public function termsCondition()
    {
        $userTerms = Page::where('type', Page::TERM_AND_CONDITION_OF_USER)->where('status', Page::STATUS_ACTIVE)->first();
        $coachTerms = Page::where('type', Page::TERM_AND_CONDITION_OF_COACH)->where('status', Page::STATUS_ACTIVE)->first();
        return view('frontend.pages.terms-and-condition', compact('userTerms', 'coachTerms'));
    }
    /*****************************************/

    /*About US */

    /****************************************/
    public function aboutUs()
    {
        return view('frontend.pages.about');
    }

    /*****************************************/

    /* HowItWork */

    /****************************************/

    public function howItwork()
    {
        return view('frontend.how-it-works');
    }
    /*****************************************/

    /* State  and Country*/

    /****************************************/

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
    /*****************************************/

    /* Popular-program*/

    /****************************************/

    public function popularProgram(Request $request)
    {
        return view('frontend.popular-program');
    }

    /*****************************************/

    /* Popular-class*/

    /****************************************/

    public function popularClass(Request $request)
    {
        return view('frontend.popular-class');
    }

    /*****************************************/

    /* Help & Support*/

    /****************************************/

    public function helpSupport()
    {
        return view('frontend.help&support');
    }

    public function createManageAccount(Request $request)
    {
        return view('frontend.create-manage-account');
    }

    /*****************************************/

    /* Selling-product*/

    /****************************************/
    public function sellingProduct(Request $request)
    {
        return view('frontend.selling-product');
    }
    public function ManageAccount(Request $request)
    {
        return view('frontend.manage_account');
    }

    /*****************************************/

    /* Program*/

    /****************************************/

    public function Programs(Request $request, $id = null)
    {
        $review = Review::where('rate_for_program_id', $id)
            ->where('review_type', Review::REVIEW_TYPE_PROGRAM);

        $review_list = $review->get();
        $avg_rating = $review->avg('star');

        $programs = CoachProgram::where('user_id', '!=', Auth::id());
        if ($request->has('filter_category') && $request->filter_category != '') {
            $category_ids = $request->filter_category;

            //$category_ids = explode(',', $category_ids);
            $program_ids = $this->programFilter($category_ids);
            //dd($user_ids);
            //  dd(Auth::id());
            $programs->whereIn('id', $program_ids);
        }

        if ($request->has('filter_rating') && $request->filter_rating != '') {
            $filter_rating = $request->filter_rating;
            if (isset($filter_rating)) {
                $filter_rating = explode(',', $filter_rating);
            }

            $program_id_review = $this->modifyProgramRatingFilter($filter_rating);

            $programs->whereIn('id', $program_id_review);
        }

        if ($request->has('filter_price') && $request->filter_price != '') {
            if ($request->filter_price == '0-100') {
                $programs->whereBetween('price', [0, 100]);
            } else if ($request->filter_price == '100+') {
                $programs = @$programs->where('price', '>', 100);
            }
        }

        // $programs = $programs->orderBy("id", "DESC")->paginate(9);

        $categoryList = Category::Where('status', Category::STATUS_ACTIVE)->get();
        $wishList = new WishList();
        $coach = new User();
        $program = $programs->count();
        // $coach_count = count(CoachProgram::select('user_id')->where('user_id', '!=', Auth::id())
        //         ->distinct()
        //         ->get());
        $programs = $programs->orderBy("id", "DESC")->paginate(6);

        $reviewList = Review::where('rate_for')->with('users')->get();
        return view('frontend.programs', compact('review', 'avg_rating', 'review_list', 'programs', 'coach', 'wishList', 'categoryList', 'reviewList', 'program'));
    }

    public function programDetail($id)
    {

        $coachDetail = new CoachDetail();

        $myReviewDetail = Review::where('rated_by', Auth::id())
            ->where('rate_for_program_id', @$id)
            ->first();
        $wishList = new WishList();
        $cartItem = Cart::where('user_id', Auth::id())->where('program_id', $id)->first();
        $reviewList = Review::where('rate_for_program_id', $id)->with('users')->get();
        $reviewListsum = DB::table('reviews')->where('rate_for_program_id', $id)->sum('star');
        $coach = new User();
        $programs = CoachProgram::with('program_user', 'program_result', 'program_inside')->where(["id" => $id])->orderBy("id", "DESC")->first();

        $programDetail = CoachProgram::with('program_user', 'program_result', 'program_inside')
            ->where("id", "!=", $id)
            ->where("user_id", "!=", Auth::id());
        $otherPogram = $programDetail->orderBy("id", "DESC")->paginate(3);
        $otherPogramCount = $programDetail->count();

        return view('frontend.program.program-detail', compact('programs', 'coach', 'cartItem', 'coachDetail', 'otherPogram', 'myReviewDetail', 'reviewList', 'reviewListsum', 'otherPogramCount', 'wishList'));
    }

    /*MY WISHLIST*/

    /****************************************/

    public function addToWishlist(Request $request)
    {

        $postData = $request->all();
        $rules = [
            'coach_id' => '',

        ];

        $validator = Validator::make($postData, $rules);

        // if ($validator->fails()) {

        //     // $response['error'] = $validator->errors()->first();
        //     // $response['error'] = true;
        //     return response()->json($response);
        //     // return redirect()->back()->with($response);
        // }

        if (!empty($postData['user_id']) && !empty($postData['coach_id']) && !empty($postData['type']) || !empty(@$postData['program_id'])) {
            if (!empty(@$postData['program_id'])) {
                $checkWishList = WishList::where([
                    'user_id' => $postData['user_id'],
                    'program_id' => $postData['program_id'],
                    'type' => $postData['type'],
                ])->first();
            } else {
                $checkWishList = WishList::where([
                    'user_id' => $postData['user_id'],
                    'coach_id' => $postData['coach_id'],
                    'type' => $postData['type'],
                ])->first();
            }
            if (isset($checkWishList)) {
                $response['status'] = "Error";
                $response['message'] = "You have already added in your Wish List.";
                return response()->json($response);
            } else {
                $wishList = new WishList();
                $wishList->user_id = $postData['user_id'];
                $wishList->coach_id = $postData['coach_id'];
                $wishList->program_id = @$postData['program_id'];
                $wishList->type = $postData['type'];
                if ($wishList->save()) {
                    if (empty($wishList->program_id)) {
                        $response['data'] = $wishList;
                        $response['status'] = "Success";
                        $response['message'] = "Coach profile successfully added to wishlist.";
                        return response()->json($response);
                    } else {
                        $response['data'] = $wishList;
                        $response['status'] = "Success";
                        $response['message'] = "Program successfully added to wishlist.";
                        return response()->json($response);
                    }
                } else {

                    $response['status'] = "error";
                    $response['message'] = "Something went Wrong!!";
                    return response()->json($response);
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function myWishList()
    {
        $wishList = new WishList();

        $getWishList = WishList::where('user_id', Auth::user()->id)->where('type', WishList::TYPE_COACH)
            ->with(['users' => function ($query) {
                $query->with('coach_detail');
            }])
            ->orderBy("id", "DESC")
            ->paginate(6);

        $getProgramWishList = WishList::where('user_id', Auth::user()->id)->where('type', WishList::TYPE_PROGRAM)
            ->with('coach_program')
            ->orderBy("id", "DESC")
            ->paginate(6);

        return view("frontend.my-wishlist", [
            "getWishList" => $getWishList,
            "getProgramWishList" => $getProgramWishList,
            "wishList" => $wishList,
        ]);
    }

    //Remove coaches from  wishlist   by tarun
    public function removeToWishlist(Request $request)
    {
        $postData = $request->all();
        if (!empty($postData['program_id'])) {
            $wishList = WishList::where('coach_id', $postData['coach_id'])->where('user_id', Auth::user()->id)->where('program_id', $postData['program_id'])->delete();
            $response['data'] = $wishList;
            $response['status'] = "Success";
            $response['message'] = "Program successfully removed from wishlist.";
            return response()->json($response);
        } else {
            $wishList = WishList::where('coach_id', $postData['coach_id'])->where('user_id', Auth::user()->id)->where('type', WishList::TYPE_COACH)->delete();
            $response['data'] = $wishList;
            $response['status'] = "Success";
            $response['message'] = "Coach successfully removed from wishlist..";
            return response()->json($response);
        }
    }

    //
    /*****************************************/

    /*CHAT*/

    /****************************************/

    public function chat()
    {

        $users = User::where('id', '!=', auth()->user()->id)->where('role_type', '!=', 'A')->get()->toArray();

        foreach ($users as $iii => $user) {

            $get_last_message = Chat::where('sender_id', '=', auth()->user()->id)
                ->where('receiver_id', '=', $user["id"])
                ->orWhere('sender_id', '=', $user["id"])
                ->where('receiver_id', '=', auth()->user()->id)
                ->orderBy('created_at', 'DESC')->first();
            $users[$iii]["last_message"] = $get_last_message->message ?? '';
            $users[$iii]["type"] = $get_last_message->type ?? '';
            $users[$iii]["time"] = $get_last_message->created_at ?? '';
        }

        usort($users, function ($a1, $a2) {
            return $a2["time"] > $a1["time"];
        });

        $rrr = (object) json_decode(json_encode($users), false);

        // dd($rrr);
        return view('frontend.chat')->with('users', $rrr);
    }
    public function getchat_data(Request $request)
    {
        $messages = Chat::where('receiver_id', $request->sidebar_user_id)
            ->where('sender_id', auth()->user()->id)
            ->orwhere('sender_id', $request->sidebar_user_id)
            ->where('receiver_id', auth()->user()->id)
            ->get();
        //    print_r($messages); die;
        $user = User::where('id', $request->sidebar_user_id)->first();

        $response['data'] = $messages;

        $response['data1'] = $user;
        //    $$response['get_last_message'] = $get_last_message;
        $response['status'] = "Success";
        $response['message'] = "chat get successfully";
        return response()->json($response);
    }
    public function upload_image_in_chat(Request $request)
    {
        $postData = $request->all();
        if (isset($postData['document']) && !empty($postData['document'])) {
            $postData['document'] = UploadImage($postData['document'], 'chat_doc');
            $imageUrl = URL('/') . '/public/' . $postData['document'];
            return response()->json(['url' => $imageUrl, 'status' => true], 200);
        }
        return response()->json(['url' => '', 'status' => false], 404);

    }
    public function chat_user_list()
    {

        $users = User::where('id', '!=', auth()->user()->id)->where('role_type', '!=', 'A')->get()->toArray();

        foreach ($users as $iii => $user) {

            $get_last_message = Chat::where('sender_id', '=', auth()->user()->id)
                ->where('receiver_id', '=', $user["id"])
                ->orWhere('sender_id', '=', $user["id"])
                ->where('receiver_id', '=', auth()->user()->id)
                ->orderBy('created_at', 'DESC')->first();
            $users[$iii]["last_message"] = $get_last_message->message ?? '';
            $users[$iii]["type"] = $get_last_message->type ?? '';
            $users[$iii]["time"] = $get_last_message->created_at ?? '';
        }

        usort($users, function ($a1, $a2) {
            return $a2["time"] > $a1["time"];
        });

        $rrr = (object) json_decode(json_encode($users), false);

        $response['data'] = $rrr;
        $response['status'] = "Success";
        $response['message'] = "successfull";
        return response()->json($response);

        // dd($rrr);
        // return view('frontend.chat')->with('users', $rrr);
    }

    /*****************************************/

    /* ADD TO CART*/

    /****************************************/
    public function addToCart(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'program_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($postData, $rules);

        if ($validator->fails()) {
            $response['error'] = $validator->errors()->first();
            $response['error'] = true;
            return redirect()->back()->with($response);
        }

        $cart = new Cart();
        $cart->user_id = $postData['user_id'];
        $cart->program_id = $postData['program_id'];
        $cart->price = $postData['price'];
        $cart->type = Cart::TYPE_PROGRAM;
        if ($cart->save()) {
            $response['data'] = $cart;
            $response['status'] = "Success";
            $response['message'] = "Item successfully added to Cart. ";
            return response()->json($response);
        } else {
            $response['status'] = "error";
            $response['message'] = "Something went wrong!!";
            return response()->json($response);
        }
    }

    /*****************************************/

    /* MY CART*/

    /****************************************/
    public function myCart()
    {
        $cart = new Cart();
        $cartDetail = Cart::where('user_id', Auth::id())->with('user', 'program')->orderBy('id', 'DESC')->get();
        $sum = Cart::where('user_id', Auth::id())->sum('price');
        return view('frontend.my_cart', [
            "cart" => $cart,
            "cartDetail" => $cartDetail,
            "sum" => $sum,
        ]);
    }
    public function removeCartItem($id)
    {
        Cart::where("id", $id)->delete();
        notify()->success('Item successfully removed from Cart.');
        return Redirect::back();
    }
    /*****************************************/

    /* MY Checkout */

    /****************************************/
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function myreviewlist()
    {
        $coachReviewlist = Review::where('rated_by', Auth::id())
            ->where('review_type', Review::REVIEW_TYPE_COACH)
            ->with('coach')
            ->get();
        $programReviewlist = Review::where('rated_by', Auth::id())
            ->where('review_type', Review::REVIEW_TYPE_PROGRAM)
            ->with('program')
            ->get();
        $classReviewlist = Review::where('rated_by', Auth::id())
            ->where('review_type', Review::REVIEW_TYPE_CLASS)
            ->with('class')
            ->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view('user.my-review-list', compact('classReviewlist', 'coachReviewlist', 'programReviewlist', 'user'));
    }

    public function orderHistory()
    {

        return view('frontend.order-details');
    }

    /*****************************************/

    /* classes*/

    /****************************************/
    public function classes(Request $request, $id = null)
    {
        $categories = Category::all();
        @$classes = CoachClass::with('category', 'program_user')->where('created_by', '!=', auth()->user()->id)->latest()->get();
        // $checkCoachDetail = CoachDetail::where('user_id', Auth::user()->id)->first();

        return view('frontend.classes', compact('classes', 'categories'));
    }
    /*****************************************/
    // classes section

    public function classesDetail($id)
    {
        $schedules = Schedule::with('class', 'day', 'user')->where('class_id', $id)->get()->toArray();
        $schedule_result = [];
        $final_result = [];
        foreach ($schedules as $schedule) {
            $schedule_inner = [];
            $day = Day::where('id', $schedule['day_id'])->pluck('name')->first();
            $inner_schedule = Schedule::with('class', 'day', 'user', 'booking')->where(['day_id' => $schedule['day_id'], 'class_id' => $id])->get()->toArray();

            array_push($schedule_inner, $inner_schedule);

            $schedule_result[$day] = $schedule_inner;
        }

        $dateByDay = self::getDateByDay($id);

        $class_detail = CoachClass::with('program_user', 'category')->where(["id" => $id])->orderBy("id", "DESC")->first();
        // print_r($class_detail); die;
        $categories = Category::all();
        $reviewList = Review::where('rate_for_class_id', $id)->with('users')->get();

        $myReviewDetail = Review::where('rated_by', Auth::id())
            ->where('rate_for_class_id', @$id)
            ->first();
        $classDetailAll = CoachClass::with('program_user')
            ->where("id", "!=", $id)
            ->where("created_by", "!=", Auth::id());
        $otherClass = $classDetailAll->orderBy("id", "DESC")->paginate(3);
        return view('frontend.classes.classes-detail', compact('myReviewDetail', 'categories', 'reviewList', 'class_detail', 'otherClass', 'schedule_result', 'dateByDay'));
    }

    public static function getDateByDay($id)
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
                ->where(['class_id' => $id, 'day_id' => $day_id])->get()->toArray();
            $classes = Schedule::where(['class_id' => $id, 'day_id' => $day_id])->pluck('class_id')->toArray();
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
}
