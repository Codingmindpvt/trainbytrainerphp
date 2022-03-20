@php
$coachDetail = \App\Models\CoachDetail::coachProfileDetail();
$coachVerificationDetail = \App\Models\CoachDetail::coachVerificationDetail();
@endphp
@if($coachDetail == '' && empty($coachDetail))
<section class="profesional-common-box">
    <div class="container">
        <p><img src="{{asset('public/images/notify.png')}}" class="mr-2" alt="notify">You have currently not complete it should be completed
            your coach profile. &nbsp<a href="{{route('coach-profile-detail')}}"><span>Click here</span></a> &nbsp or on
            the "Coach Profile" tab to create your profile as a fitness coach.
    </div>
</section>

@elseif($coachDetail['status'] == 'P')
<section class="profesional-common-box">
    <div class="container">
        <p><img src="{{asset('public/images/notify.png')}}" class="mr-2" alt="notify">Your coach profile has been
            submitted successfully to admin. Please wait for admin approval.
    </div>
</section>
@elseif($coachDetail['status'] == 'S')
<section class="profesional-error-box">
    <div class="container">
        <p><img src="{{asset('public/images/red-notify.png')}}" style="height:35px; width:35px" class="mr-2"
                alt="notify">Your profile has been rejected by admin, Please resubmit your profile information and check
            your email for the reason.
    </div>
</section>
@elseif($coachVerificationDetail->count()==0 && $coachDetail['status'] == 'V')
<section class="profesional-common-box">
    <div class="container">
        <p><img src="{{asset('public/images/notify.png')}}" class="mr-2" alt="notify">You are currently not certified.
            &nbsp<a href="#"><span>Click here</span></a> &nbsp or on the Get Certified
            tab to Certify yourself as a professional
            fitness coach.
    </div>
</section>
@elseif(isset($coachVerificationDetail->first()->badge_status) &&
$coachVerificationDetail->first()->badge_status == 'P' && $coachDetail['status'] == 'V')
<section class="profesional-common-box">
    <div class="container">
        <p><img src="{{asset('public/images/notify.png')}}" class="mr-2" alt="notify">Your profile has been submitted
            successfully to admin for certification.
    </div>
</section>
@elseif(isset($coachVerificationDetail->first()->badge_status) &&
$coachVerificationDetail->first()->badge_status == 'S' && $coachDetail['status'] == 'V')
<section class="profesional-common-box">
    <div class="container">
        <p><img src="{{asset('public/images/notify.png')}}" class="mr-2" alt="notify">Your profile has been rejected by
            admin, Please resubmit the certification and check your email for the reason.
    </div>
</section>
@endif
