@extends('layouts.guest')
@section('content')
<!--start banner area here -->
	<section class="common-light-header">
		<div class="container">
			<div class="popular-box text-center">
				<h1 class="oswald-font">Creating & Managing Your Coach Account</h1>
				<span class="divide-line"></span>
				<p>Discover how to sign up as a coach and manage your profile.</p>
				<p>You can always reach out to us at <span>coaches@trainbytrainer.com</span> any time.</p>
			</div>
		</div>
	</section>
<!--end banner area here -->

<!--start faq area here-->
	<section class="faq-section create-faq">
		<div class="container">
  			<div class="row">
                <div class="col-md-12">
                    @foreach($faq_manage_accounts as $index => $faq_manage_account)
                    <div class="faq" id="accordion">
                        <div class="card">
                            <div class="card-header" id="faqHeading-1{{$index}}">
                                <div class="mb-0">
                                    <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-1{{$index}}" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                       {{$faq_manage_account->questions}}
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-1{{$index}}" class="collapse" aria-labelledby="faqHeading-1{{$index}}" data-parent="#accordion">
                                <div class="card-body">
                                    <p>{{$faq_manage_account->answer ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
          	</div>
        </div>
    </section>
<!--ends faq area here-->

@endsection