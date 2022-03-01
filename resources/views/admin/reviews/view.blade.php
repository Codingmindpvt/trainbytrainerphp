@extends('layouts.admin.inner')
@section('content')

<!-- start content area here -->
		<div class="content_area">
			<h2>Review Detail</h2>
			<div class="white_box my_profile">
				<div class="row">
					<aside class="col-lg-2 text-center">
					</aside>

					<aside class="col-lg-5">
						<div class="row">
							<aside class="col-sm-3">
								<label>Star</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>
									<?php
                            		$star = (object)['rate' => $review['star']];
                                    for ($i = 0; $i < 5; ++$i) {
                                        echo '<i class="fa fa-star' , ($star->rate <= $i ? '-o' : '') , '" aria-hidden="true" style="color:#ffb547;"></i>';
                                    } ?>
								</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Type</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($review->review_type) ? $review->getReviewType() : "-----" !!}</h4>
							</aside>
						</div>
						<br/><br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Rate By</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($review->users->first_name) ? $review->users->first_name." ".$review->users->last_name : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Rate For</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($review->program->program_name) ? $review->program->program_name : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Status</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($review->status) ? $review->getStatus() : "-----" !!}</h4>
							</aside>
						</div>
						<br/><br/><hr/><br/>
						<div class="row">
							<aside class="col-sm-3">
								<label>Description</label>
							</aside>
							<aside class="col-sm-2">
								<span>:</span>
							</aside>
							<aside class="col-sm-7">
								<h4>{!! isset($review->description) ? $review->description : "-----" !!}</h4>
							</aside>
						</div>
						<br/><hr/>
					</aside>
                </div>
				</div>
			</div>

@endsection
