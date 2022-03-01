@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
		<div class="content_area">

			<div class="tables_area">
				<h2>Add New User</h2>
				<div class="white_box">
					<div class="add_formarea">

						<div class="row">
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">Source</label>
									<input type="text" value="" placeholder="Enter Source" class="form-control" />
									<p class="add_map text-right"><a href="#">Add by Map</a></p>
								</div>
							</aside>
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">Destination</label>
									<input type="text" value="" placeholder="Enter Destination" class="form-control" />
									<p class="add_map text-right"><a href="#">Add by Map</a></p>
								</div>
							</aside>
						</div>


						<div class="row">
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">START TIME</label>
									<div class="icon_input">
										<input type="text" value="" placeholder="Enter Time" class="form-control timepicker" />
										<i class="fa fa-clock-o" aria-hidden="true"></i>
									</div>
								</div>
							</aside>
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">ARRIVAL TIME</label>
									<div class="icon_input">
										<input type="text" value="" placeholder="Enter Time" class="form-control timepicker" />
										<i class="fa fa-clock-o" aria-hidden="true"></i>
									</div>
								</div>
							</aside>
							<aside class="col-sm-2">
								<div class="form-group">
									<label class="text-uppercase">DURATION</label>
									<h3>00:00</h3>
								</div>
							</aside>
						</div>

						<div class="row">
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">BUS TYPE</label>
									<div class="custom_select">
										<select>
											<option>Select Bus Type</option>
											<option>Select Bus Type</option>
										</select>
									</div>
								</div>
							</aside>
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">TOTAL SEATS (Count)</label>
									<div class="row">
										<div class="col-sm-6">
											<input type="text" value="" placeholder="Business Seats" class="form-control" />
										</div>
										<div class="col-sm-6">
											<input type="text" value="" placeholder="Economy Seats" class="form-control" />
										</div>
									</div>
								</div>
							</aside>
						</div>

						<div class="row">
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">Ticket Price</label>
									<input type="text" value="" placeholder="Enter Business Price" class="form-control" />
								</div>
							</aside>
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">Ticket Price</label>
									<input type="text" value="" placeholder="Enter Economy Price" class="form-control" />
								</div>
							</aside>
						</div>

						<h4>Stops</h4>

						<div class="row">
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">Boarding Point 1</label>
									<input type="text" value="" placeholder="Enter Boarding Point" class="form-control" />
								</div>
							</aside>
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">Boarding Point 2</label>
									<input type="text" value="" placeholder="Enter Boarding Point" class="form-control" />
								</div>
							</aside>
						</div>

						<div class="row">
							<aside class="col-sm-10">
								<p class="add_map text-right"><a href="#">+ Add More</a></p>
							</aside>
						</div>

						<div class="row">
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">DROP-OFF Point 1</label>
									<input type="text" value="" placeholder="Enter Drop-off Point" class="form-control" />
								</div>
							</aside>
							<aside class="col-sm-5">
								<div class="form-group">
									<label class="text-uppercase">DROP-OFF Point 2</label>
									<input type="text" value="" placeholder="Enter Drop-off Point" class="form-control" />
								</div>
							</aside>
							<aside class="col-sm-10">
								<p class="add_map text-right"><a href="#">+ Add More</a></p>
							</aside>
						</div>

						<div class="row">
							<aside class="col-sm-10">
								<div class="form-group">
									<label class="text-uppercase">Select Amenities</label>
									<div class="custom_select">
										<select class="multipleSelect" multiple name="Amenities">
											<option value="Water">Water</option>
											<option value="Newspaper">Newspaper</option>
										</select>
										<script>
						                	$('.multipleSelect').fastselect();
						            	</script>
									</div>
									<!-- <ul class="tags">
										<li><span>Water <a href="#"><i class="fa fa-close" aria-hidden="true"></i></a></span></li>
										<li><span>Newspaper <a href="#"><i class="fa fa-close" aria-hidden="true"></i></a></span></li>
									</ul> -->
								</div>
							</aside>
						</div>
						<button type="submit" class="blue_btn yellow_btn big_yellow text-uppercase">Submit</button>

					</div>
				</div>
			</div>
@endsection
