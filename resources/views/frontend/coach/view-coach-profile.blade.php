@extends('layouts.guest')
@section('content')

<!--start varification div area here -->
@include('frontend.nav._alertSection')

<!--end varification div area here -->


<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">

            <h1 class="oswald-font">Hi, {{Auth::user()->first_name." ".Auth::user()->last_name}}!
                @if(isset($item['coach_badge_status']) && !empty($item['coach_badge_status']) && $item['coach_badge_status'] == 'C')
                <span><img
                        src="{{ url('/') }}/public/images/verified2.png" alt="image"
                        class="img-fluid">Certified</span>
                @endif
            </h1>

            <span class="divide-line"></span>
            <p class="oswald-font light-text"> VIEW AND MANAGE PRODUCT LIST DETAILS HERE</p>
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if(Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </aside>

            <aside class="col-lg-8 marketplace-main-box varification-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">Coach Profile</h3>
                    @if($coachDetail->status == 'S')
                    <a href="{{route('coach-profile-send-request', $coachDetail->id)}}">
                        <div class="save-green-bt"> <i class="fa fa-envelope" aria-hidden="true"></i> Send Request</div>
                    </a>
                    @endif
                </div>
                <div class="sale-by-location">
                    <h4 class="oswald-font">View Profile Information</h4>
                    <div class="view-separate-box">
                        <div class="view-box">
                            <div class="edit-btn-view">
                                <p class="my-2 form-p">Hero Image</p>
                                <a href="{{route('edit-coach-profile', @$coachDetail->id)}}" class="save-green-bt"> <i
                                        class="fa fa-pencil" aria-hidden="true"></i> EDIT PROFILE
                                </a>
                            </div>
                            <div class="upload-certificate-box-main">
                                <div class="upload-certificate-box">
                                    @if(!empty($coachDetail->image_file))
                                    <img src="{{asset('public/'.$coachDetail->image_file)}}" class="profile_picture"
                                        alt="upload">
                                    @else
                                    <img src="{{asset('public/images/default-image.png')}}" class="profile_picture"
                                        alt="upload">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">Coach Page Images</p>
                            <div class="upload-certificate-box-main">
                                @if(count($coachDetail['coach_images'])>0)
                                @foreach($coachDetail['coach_images'] as $page_image)
                                <div class="upload-certificate-box">
                                    <img src="{{asset('public/'.$page_image->image_file)}}" class="profile_picture"
                                        alt="upload">
                                </div> &nbsp
                                @endforeach
                                @else
                                <div class="upload-certificate-box">
                                    <img src="{{asset('public/images/default-image-file.png')}}" class="profile_picture"
                                        alt="upload">
                                </div>
                                @endif

                            </div>
                        </div>
                        <hr>
                        <div class="view-box">
                            <p class="my-2 form-p">City</p>
                            <p class="tag-line">{{$coachDetail['city']}}</p>
                        </div>
                        <hr>
                        {{--  <div class="view-box">
						<p class="my-2 form-p">Time Zone</p>
							<p class="tag-line">{{$coachDetail['timezone']}}</p>
                    </div>
                    <hr> --}}
                    <div class="view-box">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="my-2 form-p">Price Range</label>
                                <p class="tag-line">{{$coachDetail['price_range']}}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="my-2 form-p">Gender</label>
                                {{-- <p class="tag-line">{{$coachDetail->getGender()}}</p> --}}
                                <p class="tag-line">{{$coachDetail->getGender()}}</p>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="view-box">
                        <p class="my-2 form-p">My Title</p>
                        <p class="tag-line">{{$coachDetail['title']}}</p>
                    </div>
                    <hr>
                    <div class="view-box">
                        <p class="my-2 form-p">My Bio</p>
                        <p class="tag-line">{{$coachDetail['bio']}}</p>
                    </div>
                    <hr>
                    <div class="view-box">
                        <p class="my-2 form-p">Coach Categories</p>
                        <p class="tag-line">
                            <?php $categories = explode(",",$coachDetail['categories']); ?>
                            @foreach($categories as $category)
                            <span class="badge badge-secondary">
                                {{isset($category) ? $user->getCategoryName($category) : '-----'}}
                            </span>
                            @endforeach
                        </p>
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Personality & Training Style</p>
                        <p class="tag-line">
                            <?php $trainingStyles = explode(",",$coachDetail['personality_and_training']); ?>
                            @foreach($trainingStyles as $trainingStyle)
                            <span class="badge badge-secondary">
                                {{$user->getTrainingStyleName($trainingStyle)}}
                            </span>
                            @endforeach
                        </p>
                    </div>
                    <hr>
                    <div class="view-box">
                        <p class="my-2 form-p">Languages</p>
                        <?php $languages = explode(",",$coachDetail['languages']); ?>
                        @foreach($languages as $language)
                        <span class="badge badge-secondary">
                            {{$language}}
                        </span>
                        @endforeach
                    </div>
                    <div class="view-box">
                        <p class="my-2 form-p">Link Social Media Account</p>
                        <p class="tag-line"><b>Twitter ID</b></p>
                        <span class="tag-line"><i class="fa fa-twitter-square"></i>
                            {{!empty($coachDetail['twitter_url'])?$coachDetail['twitter_url']:"-----"}}</span>

                        <p class="tag-line"><b>Facebook ID</b></p>
                        <span class="tag-line"><i class="fa fa-facebook-square"></i>
                            {{!empty($coachDetail['facebook_url'])?$coachDetail['facebook_url']:"-----"}}</span>
                        <p class="tag-line"><b>Instagram ID</b></p>
                        <span class="tag-line"><i class="fa fa-instagram-square"></i>
                            {{!empty($coachDetail['instagram_url'])?$coachDetail['instagram_url']:"-----"}}</span>
                        <p class="tag-line"><b>Youtube ID</b></p>
                        <span class="tag-line"><i class="fa fa-youtube-square"></i>
                            {{!empty($coachDetail['youtube_url'])?$coachDetail['youtube_url']:"-----"}}
                        </span>
                        <p class="tag-line"><b>Pinterest ID</b> </p>
                        <span class="tag-line"><i class="fa fa-pinterest"></i>
                            {{!empty($coachDetail['pinterest_url'])?$coachDetail['pinterest_url']:"-----"}}</span>
                    </div>
                </div>
                <div class="view-separate-box">
                    <div class="field_wrapper">
                        <div class="main-section">
                            <div class="view-box">
                                <div class="edit-btn-view">
                                    <p class="my-2 form-p">Education</p>
                                    @if(count($coachDetail['coach_education']) < 5 ) <a
                                        href="{{route('coach.add-coach-education')}}" class="save-green-bt"> <i
                                            class="fa fa-plus" aria-hidden="true"></i> ADD
                                        EDUCATION</a>
                                        @endif
                                </div>
                                @if(count($coachDetail['coach_education'])>0)
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <p class="tag-line"><b>Accreditation or Certificate</b></p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line"><b>Completion Year</b></p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <p class="tag-line"><b>Institute or organisation</b></p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line"><b>Action</b></p>
                                    </div>
                                </div>
                                @foreach($coachDetail['coach_education'] as $education)
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <p class="tag-line">{{$education['title']}}</p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line">{{$education['completion_year']}}</p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <p class="tag-line">{{$education['institute']}}</p>
                                    </div>
                                    <div class="form-group col-md-2 certified-box-right delete-cart">

                                        <a href="{{ route('coach.edit-coach-education',$education['id']) }}"><i
                                                class="fa fa-pencil edit-pencil-new mr-2" aria-hidden="true"
                                                data-toggle="modal"
                                                data-target="#edit-certified_{{$education['id']}}"></i></a>
                                        <a href="{{ route('coach.certificate-diploma-delete',$education['id']) }}"
                                            onclick="return confirm('Are you sure you want to delete this record?')"><i
                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>

                                </div>
                                @endforeach
                                @else
                                <p class="tag-line">No record Found!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view-separate-box">
                    <div class="result_field_wrapper">
                        <div class="result-main-section">
                            <div class="view-box">
                                <div class="edit-btn-view">
                                    <p class="my-2 form-p">Results</p>
                                    @if(count($coachDetail['coach_result']) < 5) <a class="save-green-bt"
                                        href="{{route('coach.add-coach-result')}}"> <i class="fa fa-plus"
                                            aria-hidden="true"></i> ADD
                                        RESULT
                                        </a>
                                        @endif
                                </div>
                                @if(count($coachDetail['coach_result'])>0)
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <p class="tag-line"><b>Image</b></p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line"><b>Title</b></p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line"><b>Stars</b></p>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <p class="tag-line"><b>Description</b></p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line"><b>Action</b></p>
                                    </div>
                                </div>
                                @foreach($coachDetail['coach_result'] as $coachResult)
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <div class="upload-certificate-box">
                                            @if(!empty($coachResult->image_file))
                                            <img src="{{asset('public/'.$coachResult->image_file)}}"
                                                class="profile_picture" alt="upload">
                                            @else
                                            <img src="{{asset('public/images/default-image-file.png')}}"
                                                class="profile_picture" alt="upload">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line">{{$coachResult['title']}}</p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <p class="tag-line"><?php
									     $review = (object)['rate' => $coachResult['star']];
												for ($i = 0; $i < 5; ++$i) {
												    echo '<i class="fa fa-star' , ($review->rate <= $i ? '-o' : '') , '" aria-hidden="true"></i>';
												} ?></p>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <p class="tag-line">{{$coachResult['description']}}</p>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <div class="certified-box-right delete-cart">
                                            <a href="{{route('coach.edit-coach-result',$coachResult['id'])}}"><i
                                                    class="fa fa-pencil edit-pencil-new mr-2" aria-hidden="true"
                                                    data-toggle="modal" data-target="#edit-certified_42"></i></a>
                                            <a href="{{route('coach.delete-coach-result',$coachResult['id'])}}"
                                                onclick="return confirm('Are you sure you want to delete this record?')"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                @endforeach
                                @else
                                <p class="tag-line">No record Found!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <p class="tag-line"></p>

                <!--  <div class="view-box">
                    <p class="my-2 form-p">Link Social Media Account</p>
                    <p class="tag-line"><b>Twitter ID</b></p>
                    <span class="tag-line"><i class="fa fa-twitter-square"></i>
                        {{!empty($coachDetail['twitter_url'])?$coachDetail['twitter_url']:"-----"}}</span>

                    <p class="tag-line"><b>Facebook ID</b></p>
                    <span class="tag-line"><i class="fa fa-facebook-square"></i>
                        {{!empty($coachDetail['facebook_url'])?$coachDetail['facebook_url']:"-----"}}</span>
                    <p class="tag-line"><b>Instagram ID</b></p>
                    <span class="tag-line"><i class="fa fa-instagram-square"></i>
                        {{!empty($coachDetail['instagram_url'])?$coachDetail['instagram_url']:"-----"}}</span>
                    <p class="tag-line"><b>Youtube ID</b></p>
                    <span class="tag-line"><i class="fa fa-youtube-square"></i>
                        {{!empty($coachDetail['youtube_url'])?$coachDetail['youtube_url']:"-----"}}
                    </span>
                    <p class="tag-line"><b>Pinterest ID</b> </p>
                    <span class="tag-line"><i class="fa fa-pinterest"></i>
                        {{!empty($coachDetail['pinterest_url'])?$coachDetail['pinterest_url']:"-----"}}</span>
                </div> -->
        </div>
        </aside>


    </div>
    </div>
</section>
@endsection
