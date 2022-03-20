<?php

use App\Http\Controllers\Admin\AdminCommissionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HowItWorkController as AdminHowItWorkController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\TraningStyleController;
use App\Http\Controllers\Frontend\ClassController;
use App\Http\Controllers\Frontend\CoachController;
use App\Http\Controllers\Frontend\FillInformationController;
use App\Http\Controllers\Frontend\ForgotController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SepaController;
use App\Http\Controllers\Frontend\TranieeController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SocialLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/************************************************* SocialLoginController**********************************/

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/facebook', [SocialLoginController::class, 'facebookRedirect'])->name('login.facebook');
    Route::get('/select-user-type', [SocialLoginController::class, 'selectUserType'])->name('select-user-type');
    Route::post('/save-select-user-type', [SocialLoginController::class, 'saveSelectUserType'])->name('save-select-user-type');
    Route::get('/auth/facebook/callback', [SocialLoginController::class, 'loginWithFacebook'])->name('loginWith.facebook');
    Route::get('/google', [SocialLoginController::class, 'googleRedirect'])->name('auth/google');
    Route::get('/auth/google/callback', [SocialLoginController::class, 'loginWithGoogle'])->name('loginWith.google');


    // Route::any('/review_submit',[HomeController::class,'review_submit']);
    Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
    //Route::get('/admin/',[AdminController::class,'login'])->name('admin.login');
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/admin/user-login', [AdminController::class, 'adminLogin'])->name('admin.user.login');
    Route::any('logout', [HomeController::class, 'logout'])->name('user-logout');
    Route::get('coach-email-verification/{uniqueid}/{token}', [HomeController::class, 'coachEmailVerification'])->name('coach-email-verification');
    Route::post('api/fetch-states', [HomeController::class, 'fetchState']);
    Route::post('api/fetch-cities', [HomeController::class, 'fetchCity']);
    Route::get('category', [HomeController::class, 'category'])->name('category');
    Route::get('coaches', [HomeController::class, 'coaches'])->name('coaches');
    Route::get('coaches-profile/{id}', [HomeController::class, 'coachesProfile'])->name('coaches.profile')->prefix('coaches');
    Route::get('/blogs', [HomeController::class, 'Blogs'])->name('blogs');
    Route::get('/blog-detail/{id}', [HomeController::class, 'blogDetail'])->name('blog-detail');
    Route::get('/blog-detail-by-category/{category_id}', [HomeController::class, 'blogDetailbyCategory'])->name('blog-detail-by-category');
    Route::get('/privacypolicy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::get('/termscondition', [HomeController::class, 'termsCondition'])->name('termscondition');
    Route::get('/aboutus', [HomeController::class, 'aboutUs'])->name('aboutus');
    Route::get('/howitwork', [HomeController::class, 'howItwork'])->name('howitwork');
    Route::get('/popular-Program', [HomeController::class, 'popularProgram'])->name('popular.Program');
    Route::get('/popular-Class', [HomeController::class, 'popularClass'])->name('popular.Class');
    Route::get('/help-Support', [HomeController::class, 'helpSupport'])->name('help.Support');
    //Route::get('/program',[HomeController::class,'programs'])->name('program');
    Route::get('/classes', [HomeController::class, 'classes'])->name('classes');
    Route::any('/programs', [HomeController::class, 'Programs'])->name('programs');
    Route::get('/program-detail/{id}', [HomeController::class, 'programDetail'])->name('program-detail')->prefix('programs');
    Route::get('ajax-get-coaches', [HomeController::class, 'ajaxGetCoaches'])->name('ajax-get-coaches');

    Route::get('classes/classes-detail/{id}', [HomeController::class, 'classesDetail'])->name('classes-detail');

    /******************************************** Frontend *********************************************/

    Route::group(['middleware' => ['guest']], function () {

        Route::any('signup', [HomeController::class, 'signup'])->name('signup');
        Route::get('login', [HomeController::class, 'singIn'])->name('login');
        Route::post('login', [HomeController::class, 'login'])->name('user-login');
        Route::get('/contactus', [HomeController::class, 'contactUs'])->name('contactus');
        Route::post('/contactus', [HomeController::class, 'contactus_send'])->name('contactus_send');

        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('forgot', [ForgotController::class, 'index'])->name('forgot');
        Route::get('trainer_profile', [TranieeController::class, 'index'])->name('trainer_profile');
        Route::get('fill-information', [FillInformationController::class, 'index'])->name('fill-information');
        Route::get('admin-dashboard', [AdminController::class, 'index']);
    });

    Route::group(['middleware' => ['auth', 'is.suspended']], function () {

        Route::match(['get', 'post'], '/review_submit', [HomeController::class, 'review_submit'])->name('review_submit');

        /************************************************* search**********************************/
        Route::post('stripe-ideal', [StripePaymentController::class, 'stripeIdeal'])->name('stripe-ideal');

        Route::get('stripe-checkout-detail', [StripePaymentController::class, 'stripeCheckoutDetail'])->name('stripe.checkout.detail');
        //stripe
        Route::get('stripe/{price}', [StripePaymentController::class, 'stripe'])->name('stripe');
        Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

        Route::match(['get', 'post'], 'userprofile', [HomeController::class, 'userProfile'])->name('userprofile');
        Route::get('create_profile', [HomeController::class, 'create_profile'])->name('create_profile');
        Route::post('create_profile', [HomeController::class, 'createprofile'])->name('createprofile');
        Route::any('edit_profile', [HomeController::class, 'edit_profile'])->name('edit_profile');
        Route::match(['get', 'post'], 'change_password', [HomeController::class, 'change_password'])->name('change_password');
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/createManage-Account', [HomeController::class, 'createManageAccount'])->name('createManage.Account');
        Route::get('/createManegeAccount', [HomeController::class, 'ManageAccount'])->name('manage.account');
        Route::get('/selling-Product', [HomeController::class, 'sellingProduct'])->name('selling.Product');
        Route::get('/cart', [HomeController::class, 'myCart'])->name('cart');
        Route::get('/add-to-cart', [HomeController::class, 'addToCart'])->name('add-to-cart');
        Route::get('/remove-cart-item/{id}', [HomeController::class, 'removeCartItem'])->name('remove-cart-item');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
        Route::get('/whishlist', [HomeController::class, 'whishlist'])->name('whishlist');
        Route::get('/chat/{id?}', [HomeController::class, 'chat'])->name('chat');
        Route::get('/getchat', [HomeController::class, 'getchat_data'])->name('chat_data');
        Route::get('/chat-user-list', [HomeController::class, 'chatUserList'])->name('chat.user_list');
        Route::get('/clear_chat', [HomeController::class, 'clearChat'])->name('chat.clear_chat');

        Route::post('/chat_document', [HomeController::class, 'upload_image_in_chat'])->name('upload_chat_doc');
        Route::get('dependent-dropdown', [HomeController::class, 'index']);
        Route::post('api/fetch-states', [HomeController::class, 'fetchState']);
        Route::post('api/fetch-cities', [HomeController::class, 'fetchCity']);
        Route::get('add-to-wishlist', [HomeController::class, 'addToWishlist'])->name('add-to-wishlist');
        Route::get('my-wishlist', [HomeController::class, 'myWishList'])->name('my-wishlist');
        Route::get('remove-to-wishlist', [HomeController::class, 'removeToWishlist'])->name('remove-to-wishlist'); // Date 6/1/2022 by Tarun saini
        Route::get('my-review-list', [HomeController::class, 'myreviewlist'])->name('my-review-list');

        /************************************************* search**********************************/
        Route::get('search', [HomeController::class, 'search'])->name('search');

        /***********************************Order history *****************/
        Route::get('/order-history', [HomeController::class, 'orderHistory'])->name('order-history');
        Route::get('/my-orders', [HomeController::class, 'myOrders'])->name('my-orders');
        Route::get('/my-program-order-detail/{id}', [HomeController::class, 'myProgramOrderDetail'])->name('my-program-order-detail');
        Route::get('/my-session-order-detail/{id}', [HomeController::class, 'mySessionOrderDetail'])->name('my-session-order-detail');

        /*********************************************** Coach ************************************************/
        Route::match(['get', 'post'], '/review_submit_program', [CoachController::class, 'review_submit_program'])->name('review_submit_program');

        Route::get('coach-dashboard', [CoachController::class, 'coachDashboard'])->name('coach-dashboard');
        Route::get('/coach-profile-detail', [CoachController::class, 'coach_profile_detail'])->name('coach-profile-detail');
        Route::any('/coach-profile-Detail', [CoachController::class, 'coachProfileDetail'])->name('coach.Profile.Detail');
        Route::get('add-coach-result', [CoachController::class, 'addCoachResult'])->name('coach.add-coach-result');
        Route::post('create-coach-result', [CoachController::class, 'createCoachResult'])->name('coach.create-coach-result');
        Route::get('edit-coach-result/{id}', [CoachController::class, 'editCoachResult'])->name('coach.edit-coach-result');
        Route::post('update-coach-result', [CoachController::class, 'updateCoachResult'])->name('coach.update-coach-result');
        Route::get('/delete-coach-result/{id}', [CoachController::class, 'deleteCoachResult'])->name('coach.delete-coach-result');
        Route::get('edit-coach-profile/{id}', [CoachController::class, 'editCoachProfile'])->name('edit-coach-profile');
        Route::post('update-coach-profile', [CoachController::class, 'updateCoachProfile'])->name('update-coach-profile');
        Route::any('delete-coach-profile', [CoachController::class, 'deleteCoachProfile'])->name('delete-coach-profile');
        Route::get('/coach-view-profile/{id}', [CoachController::class, 'viewCoachProfile'])->name('coach.view.profile');
        Route::get('/coach-profile-send-request/{id}', [CoachController::class, 'coachProfileSendRequest'])->name('coach-profile-send-request');
        Route::get('/add-program', [CoachController::class, 'addProgram'])->name('add-program');
        Route::get('/edit-program/{id}', [CoachController::class, 'editProgram'])->name('edit-program');
        Route::post('/update-program', [CoachController::class, 'updateProgram'])->name('update-program');

        Route::get('add-program-result/{id}', [CoachController::class, 'addProgramResult'])->name('coach.add-program-result');
        Route::post('create-program-result', [CoachController::class, 'createProgramResult'])->name('coach.create-program-result');
        Route::get('edit-program-result/{id}', [CoachController::class, 'editProgramResult'])->name('coach.edit-program-result');
        Route::post('update-program-result', [CoachController::class, 'updateProgramResult'])->name('coach.update-program-result');
        Route::get('/delete-program-result/{id}', [CoachController::class, 'deleteProgramResult'])->name('coach.delete-program-result');

        Route::get('add-program-inside/{id}', [CoachController::class, 'addProgramInside'])->name('coach.add-program-inside');
        Route::post('create-program-inside', [CoachController::class, 'createProgramInside'])->name('coach.create-program-inside');
        Route::get('edit-program-inside/{id}', [CoachController::class, 'editProgramInside'])->name('coach.edit-program-inside');
        Route::post('update-program-inside', [CoachController::class, 'updateProgramInside'])->name('coach.update-program-inside');
        Route::get('/delete-program-inside/{id}', [CoachController::class, 'deleteProgramInside'])->name('coach.delete-program-inside');

        Route::get('add-program-file/{id}', [CoachController::class, 'addProgramFile'])->name('coach.add-program-file');
        Route::post('create-program-file', [CoachController::class, 'createProgramFile'])->name('coach.create-program-file');
        Route::get('edit-program-file/{id}', [CoachController::class, 'editProgramFile'])->name('coach.edit-program-file');
        Route::post('update-program-file', [CoachController::class, 'updateProgramFile'])->name('coach.update-program-file');
        Route::get('/delete-program-file/{id}', [CoachController::class, 'deleteProgramFile'])->name('coach.delete-program-file');

        Route::get('/add-class', [ClassController::class, 'addClass'])->name('add.class');
        Route::post('/save-class', [ClassController::class, 'saveClass'])->name('save.class');
        Route::post('/update-class', [ClassController::class, 'updateClass'])->name('update.class');
        Route::post('/create-class-schedule', [ClassController::class, 'createClassSchedule'])->name('create.class.schedule');
        Route::post('/update-class-schedule', [ClassController::class, 'updateSchedule'])->name('update.class.schedule');
        Route::post('/delete-class-schedule', [ClassController::class, 'deleteSchedule'])->name('delete.class.schedule');

        Route::post('/book-class-schedule', [ClassController::class, 'bookSchedule'])->name('book.class.schedule');
        Route::post('/book-schedule', [ClassController::class, 'bookClassSchedule'])->name('book.schedule');

        Route::match(['get', 'post'], '/review_submit_class', [ClassController::class, 'review_submit_class'])->name('review_submit_class');

        Route::any('/add-serviceprogram', [CoachController::class, 'addServiceProgram'])->name('add-serviceprogram');
        Route::get('/program-view/{id}', [CoachController::class, 'viewProgramdetail'])->name('program-view');
        Route::get('/my-product-delete/{id}', [CoachController::class, 'myProductDelete'])->name('my-product-delete');
        Route::get('/add-new-program', [CoachController::class, 'addNewprogram'])->name('add-new-program');
        Route::get('/certificate-diploma', [CoachController::class, 'certificateDiploma'])->name('coach.certificate-diploma');
        Route::get('/certificate-diploma-edit/{id}', [CoachController::class, 'editCertificateDiploma'])->name('coach.certificate-diploma-edit');
        Route::get('/add-coach-education', [CoachController::class, 'addCoachEducation'])->name('coach.add-coach-education');
        Route::post('/create-coach-education', [CoachController::class, 'createCoachEducation'])->name('coach.create-coach-education');
        Route::get('/edit-coach-education/{id}', [CoachController::class, 'editCoachEducation'])->name('coach.edit-coach-education');
        Route::post('/update-coach-education', [CoachController::class, 'updateCoachEducation'])->name('coach.update-coach-education');
        Route::post('/certificate-diploma-update', [CoachController::class, 'updateCertificateDiploma'])->name('coach.certificate-diploma-update');
        Route::get('/certificate-diploma-delete/{id}', [CoachController::class, 'deleteCertificateDiploma'])->name('coach.certificate-diploma-delete');
        Route::get('/coach-verification', [CoachController::class, 'coach_verification'])->name('coach.verification');
        Route::post('/add-coach-verification', [CoachController::class, 'coachVerification'])->name('coach.add-verification');
        Route::get('/view-coach-verification/{id}', [CoachController::class, 'coachViewVerification'])->name('coach.view.verification');
        Route::get('/edit-coach-verification/{id}', [CoachController::class, 'editCoachVerification'])->name('edit-coach-verification');
        Route::post('/update-coach-verification', [CoachController::class, 'updateCoachVerification'])->name('update-coach-verification');
        Route::get('/delete-coach-verification/{id}', [CoachController::class, 'deleteCoachVerification'])->name('delete-coach-verification');

        Route::get('/coach-badge-send-request/{id}', [CoachController::class, 'coachBadgeSendRequest'])->name('coach-badge-send-request');
        Route::any('/my-product-list', [CoachController::class, 'myProductList'])->name('coach.my-product-list');
        Route::get('/searchProductList', [CoachController::class, 'searchProductList'])->name('searchProductList');
        Route::get('/searchProductListDetail', [CoachController::class, 'searchProductListDetail'])->name('searchProductListDetail');

        Route::get('/reviews', [CoachController::class, 'Reviews'])->name('coach.reviews');
        Route::get('/review-reason', [CoachController::class, 'ReviewReason'])->name('coach.review_reason');
        Route::get('/my-transaction-list', [CoachController::class, 'myTransactionList'])->name('coach.my-transaction-list');
        Route::get('/add-new-program-two', [CoachController::class, 'addNewProgramTwo'])->name('coach.add-new-program-two');
        Route::any('/coach-status', [CoachController::class, 'coachStatus'])->name('coach.check-status');
        Route::any('/coach-chat-status', [CoachController::class, 'coachChatStatus'])->name('coach.check-chat-status');
        Route::get('/searching_program_list', [CoachController::class, 'searching_program_list'])->name('searching_program_list');

        /******************************* Billing Address ************************/

        Route::get('/create-address-billing', [CoachController::class, 'createBillingAddress'])->name('create-address-billing');
        Route::post('/address-billing', [CoachController::class, 'addBillingAddress'])->name('address-billing');
        Route::get('/show-address-billing', [CoachController::class, 'showBillingAddress'])->name('show-address-billing');
        Route::get('/address-billing-delete/{id}', [CoachController::class, 'removeBillingAddress'])->name('address-billing-delete');
        Route::get('/edit-address-billing/{id}', [CoachController::class, 'editBillingAddress'])->name('edit-address-billing');
        Route::post('/update-address-billing/{id}', [CoachController::class, 'updateBillingAddress'])->name('update-address-billing');
        Route::get('/order-program-detail/{id}', [CoachController::class, 'orderProgramDetail'])->name('coach.order-program-detail');
        Route::get('/order-class-detail/{id}', [CoachController::class, 'orderClassDetail'])->name('coach.order-class-detail');
        Route::get('/my-order-list', [CoachController::class, 'myOrderList'])->name('coach.my-order-list');
        Route::any('reject-booking-request', [CoachController::class, 'rejectBookingRequest'])->name('booking.reject-booking-request');
        Route::any('accept-booking-request', [CoachController::class, 'acceptBookingRequest'])->name('booking.accept-booking-request');
        Route::get('/my-customers', [CoachController::class, 'myCustomers'])->name('coach.my-customers');
        Route::get('/checkout', [CoachController::class, 'checkout'])->name('coach.checkout');
    });

    /*********************************************** Admin ************************************************/

    Route::group(['middleware' => ['AdminAuth']], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/myprofile', [AdminController::class, 'myProfile'])->name('admin.myprofile');
        Route::get('/admin/editprofile/{id}', [AdminController::class, 'editProfile'])->name('admin.editprofile');
        Route::post('/admin/updateprofile/{id}', [AdminController::class, 'updateProfile'])->name('admin.updateprofile');
        Route::any('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

        //user
        Route::get('/admin/users/user_profile/personalUser', [AdminController::class, 'personalUser'])->name('personalUser');
        Route::get('/admin/users/user_profile/buisnessUser', [AdminController::class, 'buisnessUser'])->name('buisnessUser');
        Route::get('/admin/users/user_profile/inCompleteUser', [AdminController::class, 'inCompleteUsers'])->name('incompleteUser');
        Route::get('/admin/users/user_list', [AdminController::class, 'usersList'])->name('admin.user.list');
        Route::get('/admin/coach-list', [AdminController::class, 'coachList'])->name('admin.coach.list');
        Route::any('/admin/change-status', [AdminController::class, 'changeStatus'])->name('admin.change-status');
        Route::any('/admin/verify-coach-profile-status', [AdminController::class, 'verifyCoachProfileStatus'])->name('admin.verify-coach-profile-status');
        Route::any('/admin/reject-coach-profile-status', [AdminController::class, 'rejectCoachProfileStatus'])->name('admin.reject-coach-profile-status');
        Route::any('/admin/accept-coach-badge-request', [AdminController::class, 'acceptCoachBadgeRequest'])->name('admin.accept-coach-badge-request');
        Route::any('/admin/reject-coach-badge-request', [AdminController::class, 'rejectCoachBadgeRequest'])->name('admin.reject-coach-badge-request');
        Route::any('/admin/change-user-status', [AdminController::class, 'changeUserStatus'])->name('admin.change-user-status');

        Route::get('/admin/incomplete-coach/{type}', [AdminController::class, 'incompleteCoaches'])->name('admin.coach.incomplete-coach');
        Route::get('/admin/user-detail/{id}', [AdminController::class, 'userDetail'])->name('admin.user.detail');
        Route::get('/admin/coach-detail/{id}', [AdminController::class, 'coachDetail'])->name('admin.coach.detail');
        Route::get('/admin/user-delete/{id}', [AdminController::class, 'userDelete'])->name('admin.user.delete');
        Route::get('/admin/add-user', [AdminController::class, 'add_user_list'])->name('admin.add.user');
        //Route::get('/admin/edit-user',[AdminController::class,'editUser'])->name('admin.user.edit');

        Route::get('/admin/users/edit_personal_user/{id}', [AdminController::class, 'editPersonalUser'])->name('admin.edit.personalUser');
        Route::any('/admin/update-pesonal-user/{id}', [AdminController::class, 'updatePersonalUser'])->name('admin.personaluser.update');
        Route::get('/admin/users/edit_buisness_user/{id}', [AdminController::class, 'editBuisnessUser'])->name('admin.edit.buisnessUser');
        Route::any('/admin/update-buisness-user/{id}', [AdminController::class, 'updateBuisnessUser'])->name('admin.buisnessuser.update');

        Route::get('/admin/edit-coach/{id}', [AdminController::class, 'editCoach'])->name('admin.user.editCoach');
        Route::any('/admin/update-coach/{id}', [AdminController::class, 'updateCoach'])->name('admin.user.updateCoach');

        //pages
        Route::get("/admin/page", [PageController::class, 'pageList'])->name("admin.page.list");
        Route::any("/admin/page/add", [PageController::class, 'pageAdd'])->name("admin.page.add");
        Route::get("admin/page/view/{id}", [PageController::class, 'pageView'])->name("admin.page.view");
        Route::get("admin/page/edit/{id}", [PageController::class, 'pageEdit'])->name("admin.page.edit");
        Route::post("admin/page/update", [PageController::class, 'pageUpdate'])->name("admin.page.update");
        Route::get("admin/page/delete/{id}", [PageController::class, 'pageDelete'])->name("admin.page.delete");

        //categories
        Route::get("/admin/category", [CategoryController::class, 'categoryList'])->name("admin.category.list");
        Route::any("/admin/category/add", [CategoryController::class, 'categoryAdd'])->name("admin.category.add");
        Route::get("admin/category/view/{id}", [CategoryController::class, 'categoryView'])->name("admin.category.view");
        Route::get("admin/category/edit/{id}", [CategoryController::class, 'categoryEdit'])->name("admin.category.edit");
        Route::post("admin/category/update", [CategoryController::class, 'categoryUpdate'])->name("admin.category.update");
        Route::get("admin/category/delete/{id}", [CategoryController::class, 'categoryDelete'])->name("admin.category.delete");

        //blogs
        Route::get("/admin/blog", [BlogController::class, 'blogList'])->name("admin.blog.list");
        Route::any("/admin/blog/add", [BlogController::class, 'blogAdd'])->name("admin.blog.add");
        Route::get("admin/blog/view/{id}", [BlogController::class, 'blogView'])->name("admin.blog.view");
        Route::get("admin/blog/edit/{id}", [BlogController::class, 'blogEdit'])->name("admin.blog.edit");
        Route::post("admin/blog/update", [BlogController::class, 'blogUpdate'])->name("admin.blog.update");
        Route::get("admin/blog/delete/{id}", [BlogController::class, 'blogDelete'])->name("admin.blog.delete");

        Route::get('admin/change-password', [AdminController::class, 'adminchangePassword'])->name('admin.change-password');
        Route::post('admin/change-password', [AdminController::class, 'changePassword'])->name('admin.changepassword');

        Route::post('fetch-states', [AdminController::class, 'fetchState']);
        Route::post('fetch-cities', [AdminController::class, 'fetchCity']);

        //Training style routes
        Route::get("/admin/traning_style", [TraningStyleController::class, 'trainingList'])->name("admin.training.list");
        Route::get("admin/traning_style/view/{id}", [TraningStyleController::class, 'trainingView'])->name("admin.training.view");
        Route::any("/admin/traning_style/add", [TraningStyleController::class, 'trainingStyleAdd'])->name("admin.trainingstyle.add");
        Route::get("admin/traning_style/edit/{id}", [TraningStyleController::class, 'trainingEdit'])->name("admin.training.edit");
        Route::post("admin/traning_style/update", [TraningStyleController::class, 'trainingUpdate'])->name("admin.training.update");
        Route::get("admin/traning_style/delete/{id}", [TraningStyleController::class, 'trainingDelete'])->name("admin.training.delete");

        //Faqs
        Route::get('/admin/faqs_dashboard', [FaqController::class, 'index'])->name('faq.dashboard');
        Route::get('/admin/add_faq_form', [FaqController::class, 'addFaqForm'])->name('add.faq.form');
        Route::post('/admin/save_faq_form', [FaqController::class, 'saveFaqForm'])->name('save.faq.form');
        Route::get('/admin/delete_faq/{id}', [FaqController::class, 'deleteFaq'])->name('delete.faq');
        Route::get('/admin/view_faq/{id}', [FaqController::class, 'viewFaq'])->name('faq_view_more');
        Route::get('/admin/edit_faq/{id}', [FaqController::class, 'editFaq'])->name('edit.faq');
        Route::post('/admin/update_faq', [FaqController::class, 'updateFaq'])->name('update.daq');

        //Transaction
        Route::get('/admin/transactionlist', [AdminController::class, 'transactionList'])->name('admin.transaction.list');
        Route::get('/admin/transactiondetail/{id}', [AdminController::class, 'transactionDetail'])->name('admin.transaction.detail');
        //Route::get('admin/transaction/delete/{id}', [AdminController::class, 'transactionDelete'])->name('admin.transaction.delete');
        Route::get('admin/transaction/view/{id}', [AdminController::class, 'transactionView'])->name('admin.transaction.View');
        Route::get('/admin/transactionclasslist', [AdminController::class, 'transactionClassList'])->name('admin.transactionclass.list');
        Route::get('/admin/transactionclassview/{id}', [AdminController::class, 'transactionClassView'])->name('admin.transactionclass.view');
        //contactUs
        Route::get('/admin/contactuslist', [AdminController::class, 'contactuslist'])->name('admin.contactus.list');
          //Porgram and class list show
    Route::get('/admin/Programlist/{id}', [AdminController::class, 'ProgramList'])->name('admin.Program.list');
    Route::get('/admin/Classlist/{id}', [AdminController::class, 'ClassList'])->name('admin.Class.list');
    });

    //admin commission
    Route::any('commission-list', [AdminCommissionController::class, 'commissionList'])->name('admin.commission.list');
    Route::any('commission-add', [AdminCommissionController::class, 'commissionAdd'])->name('admin.commission.add');
    Route::any('commission-edit/{id}', [AdminCommissionController::class, 'commissionEdit'])->name('admin.commission.edit');

    //review
    Route::any('review-list/{id?}', [ReviewController::class, 'reviewList'])->name('admin.review.list')->prefix('coach-list');
    Route::any('review-view/{id}/', [ReviewController::class, 'reviewView'])->name('admin.review.view');
    Route::any('/admin/change-review-status', [ReviewController::class, 'changeReviewStatus'])->name('admin.change-review-status');

    //class booking
    Route::any('booking-list', [BookingController::class, 'bookingList'])->name('admin.booking.list');
    Route::any('booking-view/{id}/', [BookingController::class, 'bookingView'])->name('admin.booking.view');


    //how it works (heading)
    Route::any('heading-list', [AdminHowItWorkController::class, 'headingList'])->name('admin.how-it-work.heading.list');
    Route::any('heading-add', [AdminHowItWorkController::class, 'headingAdd'])->name('admin.how-it-work.heading.add');
    Route::any('heading-edit/{id}', [AdminHowItWorkController::class, 'headingEdit'])->name('admin.how-it-work.heading.edit');

    //how it works (types)
    Route::any('type-list', [AdminHowItWorkController::class, 'typeList'])->name('admin.how-it-work.types.list');
    Route::any('type-add', [AdminHowItWorkController::class, 'typeAdd'])->name('admin.how-it-work.types.add');
    Route::any('type-edit/{id}', [AdminHowItWorkController::class, 'typeEdit'])->name('admin.how-it-work.types.edit');
    Route::any('type-update', [AdminHowItWorkController::class, 'saveEditType'])->name('admin.how-it-work.types.update');
    Route::get('/type-delete/{id}', [AdminHowItWorkController::class, 'typeDelete'])->name('admin.how-it-work.types.delete');

    //how it works (Content)
    Route::any('content-list', [AdminHowItWorkController::class, 'contentList'])->name('admin.how-it-work.contents.list');
    Route::any('content-add', [AdminHowItWorkController::class, 'contentAdd'])->name('admin.how-it-work.contents.add');
    Route::any('save-content-add', [AdminHowItWorkController::class, 'saveContentAdd'])->name('admin.how-it-work.contents.save');
    Route::any('content-edit/{id}', [AdminHowItWorkController::class, 'contentEdit'])->name('admin.how-it-work.contents.edit');
    Route::any('content-update-save', [AdminHowItWorkController::class, 'contentEditSave'])->name('admin.how-it-work.contents-update.save');
    Route::get('/content-delete/{id}', [AdminHowItWorkController::class, 'contentDelete'])->name('admin.how-it-work.contents.delete');

    Auth::routes(['login' => false]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::any('verify-sepa-debit', [SepaController::class, 'verifySepaDebit'])->name('verify.sepa.debit');
    Route::any('webhook-verify-sepa-debit', [SepaController::class, 'webhookVerifySepaDebit'])->name('webhook.verify.sepa.debit');
    Route::get('verify-direct-payment', [SepaController::class, 'verifyDirectPayment'])->name('verify.direct.payment');
});
