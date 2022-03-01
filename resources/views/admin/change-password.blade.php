@extends('layouts.admin.inner')
@section('content')
<h2>Change Password</h2>
<div class="white_box my_profile">
    <div class="row">
        <aside class="col-md-12">
           <form id="changePasswordForm" class="input-box" action="{{ route('admin.change-password') }}" method="post" enctype="multipart/form-data">
               @csrf

                <div class="row d-flex align-items-center justify-content-center">
                    <aside class="col-lg-6">
                         <div class="form-group">
                          <label for="formGroupExampleInput">Old Password</label>
                          <input type="password" name="old_password" class="form-control"   id="old_password"  placeholder="Enter Password" onkeypress="return notSpace(event)" value="{{ old('old_password') }}">

                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">New Password</label>
                          <input type="password" name="new_password" class="form-control"   id="new_password"  placeholder="Enter Password" onkeypress="return notSpace(event)" value="{{ old('new_password') }}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control"   id="confirm_password"  placeholder="Enter Password" onkeypress="return notSpace(event)">
                        </div>
                        <button type="submit" class="blue_btn yellow_btn text-uppercase">Change</button>
                    </aside>
                </div>
            </form>
        </aside>
    </div>
</div>
<script>
    function notSpace(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if(charCode == 32){
            return false;
        }
        return true;
    }

    </script>

@endsection
