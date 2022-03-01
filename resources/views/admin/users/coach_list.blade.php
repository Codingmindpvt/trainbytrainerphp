@extends('layouts.admin.inner')
@section('content')
	<!-- start content area here -->
	<style>
		/*  Toggle Switch  */

.toggleSwitch span span {
  display: none;
}

@media only screen {
  .toggleSwitch {
    display: inline-block;
    height: 18px;
    position: relative;
    overflow: visible;
    padding: 0;
    margin-left: 50px;
    cursor: pointer;
    width: 40px
  }
  .toggleSwitch * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  .toggleSwitch label,
  .toggleSwitch > span {
    line-height: 20px;
    height: 20px;
    vertical-align: middle;
  }
  .toggleSwitch input:focus ~ a,
  .toggleSwitch input:focus + label {
    outline: none;
  }
  .toggleSwitch label {
    position: relative;
    z-index: 3;
    display: block;
    width: 100%;
  }
  .toggleSwitch input {
    position: absolute;
    opacity: 0;
    z-index: 5;
  }
  .toggleSwitch > span {
    position: absolute;
    left: -50px;
    width: 100%;
    margin: 0;
    padding-right: 50px;
    text-align: left;
    white-space: nowrap;
  }
  .toggleSwitch > span span {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 5;
    display: block;
    width: 50%;
    margin-left: 50px;
    text-align: left;
    font-size: 0.9em;
    width: 100%;
    left: 15%;
    top: -1px;
    opacity: 0;
  }
  .toggleSwitch a {
    position: absolute;
    right: 50%;
    z-index: 4;
    display: block;
    height: 100%;
    padding: 0;
    left: 2px;
    width: 18px;
    background-color: #fff;
    border: 1px solid #CCC;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  }
  .toggleSwitch > span span:first-of-type {
    color: #ccc;
    opacity: 1;
    left: 45%;
  }
  .toggleSwitch > span:before {
    content: '';
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    left: 50px;
    top: -2px;
    background-color: #fafafa;
    border: 1px solid #ccc;
    border-radius: 30px;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
  }
  .toggleSwitch input:checked ~ a {
    border-color: #fff;
    left: 100%;
    margin-left: -8px;
  }
  .toggleSwitch input:checked ~ span:before {
    border-color: #0097D1;
    box-shadow: inset 0 0 0 30px #0097D1;
  }
  .toggleSwitch input:checked ~ span span:first-of-type {
    opacity: 0;
  }
  .toggleSwitch input:checked ~ span span:last-of-type {
    opacity: 1;
    color: #fff;
  }
  /* Switch Sizes */
  .toggleSwitch.large {
    width: 60px;
    height: 27px;
  }
  .toggleSwitch.large a {
    width: 27px;
  }
  .toggleSwitch.large > span {
    height: 29px;
    line-height: 28px;
  }
  .toggleSwitch.large input:checked ~ a {
    left: 41px;
  }
  .toggleSwitch.large > span span {
    font-size: 1.1em;
  }
  .toggleSwitch.large > span span:first-of-type {
    left: 50%;
  }
  .toggleSwitch.xlarge {
    width: 80px;
    height: 36px;
  }
  .toggleSwitch.xlarge a {
    width: 36px;
  }
  .toggleSwitch.xlarge > span {
    height: 38px;
    line-height: 37px;
  }
  .toggleSwitch.xlarge input:checked ~ a {
    left: 52px;
  }
  .toggleSwitch.xlarge > span span {
    font-size: 1.4em;
  }
  .toggleSwitch.xlarge > span span:first-of-type {
    left: 50%;
  }
}
	</style>
		<div class="content_area">
			<div class="tables_area">
				<h2 class="pull-left">Coaches Listing</h2><br/>
				{{-- <a href="add_user" class="blue_btn yellow_btn pull-right text-uppercase">Add New</a> --}}
				<div class="clear"></div>
				<div class="white_box">
					<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade active in" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<div class="table-responsive">
							<table width="100%" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Contact No.</th>
										<th>Address</th>
										<th>Status</th>
										<th>Verification Status</th>
										<th>Certification Status</th>
	                  <th>Action</th>
									</tr>
								</thead>
								<tbody>
	                 @foreach( $coach_users as $coach )
									<tr>
										<td>{{$coach->id}}</td>
										<td>{{ $coach->first_name}}</td>
										<td>{{ $coach->last_name }}</td>
										<td>{{ $coach->email }}</td>
										<td>{{ $coach->contact_no }}</td>
										<td>{{ @$coach->address }}</td>
	                 <td> 

											<input type="checkbox" class="toggle-status-class"  data-id="{{$coach->id}}"  data-toggle="toggle" data-on="Active" data-off="Suspend" data-onstyle="success" data-offstyle="danger" {{ $coach->status == 'A' ? 'checked' : '' }}>

									  </td>
									  <td> 
                      @if(empty($coach['coach_detail']['status']) && !isset($coach['coach_detail']['status']))
                      {{"Not Submitted"}}
                      @elseif($coach['coach_detail']['status'] == 'P')
                      <button type="button" title="Verify" value="V" id="{{$coach->id}}" class="btn btn-success verify-coach-profile abc_verify_{{$coach->id}}" >
                      <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                      <button type="button" title="Reject" onclick="return confirm('Are you sure you want to reject this coach profile?')" data-id="{{$coach->id}}" class="btn btn-danger reject-coach-profile abc_reject_{{$coach->id}}" >
                        <i class="fa fa-close" aria-hidden="true"></i>
                     </button>
                     @else
                     {!!$coach->getCoachProfileStatus()!!}
                      @endif
									  	
                    </td>
									  <td>

                      @if(empty($coach['verification_detail']['badge_status']) && !isset($coach['verification_detail']['badge_status']))
                      {{"Not Submitted"}}
                      @elseif($coach['verification_detail']['badge_status'] == 'P')
                      <button type="button" title="Certify" value="C" id="{{$coach->id}}" class="btn btn-success certifyBadgeProfile abc_certified_{{$coach->id}}">
                      <i class="fa fa-check" aria-hidden="true"></i>
                    </button>

                      <button type="button" onclick="return confirm('Are you sure you want to reject this badge request of coach?')" title="Reject Request" data-id="{{$coach->id}}" class="btn btn-danger reject-badge-profile abc_reject_badge_{{$coach->id}}">
                        <i class="fa fa-close" aria-hidden="true"></i>
                     </button>
                     @else
                     {!!$coach->getCoachBadgeStatus()!!}
                      @endif
									  </td>
										<td>
											<a href="{{ route('admin.coach.detail',$coach->id) }}" data-toggle="tooltip" data-placement="top" title="user.detail" class="action_btn" alt="detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
											<a href="{{ route('admin.user.editCoach',$coach->id) }}" data-toggle="tooltip" data-placement="top" title="user.edit" class="action_btn" alt="edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
											<!-- <a href="{{ route('admin.user.delete',$coach->id) }}" onclick="return confirm('Are you sure you want to delete this account?')" data-toggle="tooltip" data-placement="top" title="user.delete" class="action_btn" alt="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
										</td>
									</tr>

	                 @endforeach

								</tbody>

							</table>

						</div>
					</div>
                    <div class="paginator">
                        {{ $coach_users->links() }}
                    </div>
					</div>
					  </div>
					</div>
				</div>
			</div>
      <!-- Verification Modal -->
     <div class="modal fade" id="rejectModal" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">coach profile verification</h4>
              </div>
              <div class="modal-body">

                <input type="hidden" name="id" id="coach_id_">
                 <div class="form-group">
                    <label for="reject">Mention Your Reason</label>
                    <textarea class="form-control" name="reason" id="reason"></textarea>
                 </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit"  class="btn btn-info submit_reason" value="Save"/>
              </div>
            </div>
          </div>
        </div>

        <!-- Badge Modal -->
          <div class="modal fade" id="rejectBadgeModal" role="dialog">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Coach Badge Request</h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" id="badge_coach_id" >
                   <div class="form-group">
                      <label for="reject">Mention Your Reason</label>
                      <textarea class="form-control" name="reason" id="badge_reason"></textarea>
                   </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit"  class="btn btn-info badge_submit_reason" value="Save"/>
                </div>
              </div>
            </div>
          </div>
                    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {
        $('.toggle-status-class').change(function() {

            var status = $(this).prop('checked') == true ? 'A' : 'S';
            console.log(status);
            var user_id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            var url = "{{route('admin.change-status')}}"; 
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    status: status,
                    id: user_id,
                    _token: token
                },
                success: function(data) {
                   SwalOverlayColor();
                    swal({
                    title: data.status,
                    text: data.message,
                    })
                    
                }
            });
        })
    })


$('.certifyBadgeProfile').on('click', function() {
  var profile_status = this.value;
  var coach_id = this.id;

  if(profile_status == 'C'){
    var token = '{{ csrf_token() }}';
    var url = "{{route('admin.accept-coach-badge-request')}}"; 
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: coach_id,
            _token: token
        },
        success: function(data) {
            
            location.reload(); 
        }
    });
}
});

$('.verify-coach-profile').on('click', function() {
  var profile_status = this.value;
  var coach_id = this.id;

  if(profile_status == 'V'){
    var token = '{{ csrf_token() }}';
    var url = "{{route('admin.verify-coach-profile-status')}}"; 
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: coach_id,
            _token: token
        },
        success: function(data) {
           location.reload(); 
        }
    });
}
});

 $('.submit_reason').on('click', function(e){
        var rejection_reason = $('#reason').val();
        var coach_id = $('#coach_id_').val();
      
        var token = '{{ csrf_token() }}';
            var url = "{{route('admin.reject-coach-profile-status')}}"; 
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: coach_id,
                    reason: rejection_reason,
                    _token: token
                },
                success: function(data) {
                    location.reload(); 
                }
            });
    });

  $('.badge_submit_reason').on('click', function(e){
        var rejection_reason = $('#badge_reason').val();
        var coach_id = $('#badge_coach_id').val();
        var token = '{{ csrf_token() }}';
            var url = "{{route('admin.reject-coach-badge-request')}}"; 
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: coach_id,
                    reason: rejection_reason,
                    _token: token
                },
                success: function(data) {
                    
                    $('#rejectBadgeModal').modal('hide');
                    location.reload(); 
                }
            });
    });


  $('.reject-coach-profile').on('click',function(){
     var modal = $('#rejectModal').modal();
     modal.find('#coach_id_').val($(this).data('id'));
     modal.show();
  })

  $('.reject-badge-profile').on('click',function(){
     var modal = $('#rejectBadgeModal').modal();
     modal.find('#badge_coach_id').val($(this).data('id'));
     modal.show();
  })


</script>
@endsection
