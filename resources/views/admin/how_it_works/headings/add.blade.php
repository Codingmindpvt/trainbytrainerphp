@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Add Heading</h2>
    <div class="white_box my_profile">
        <div class="row">
            <form action="" method="POST" id="editUserForm">
                @csrf

                <aside class="col-lg-8">
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Title</label>
                            <input value="" name="title" class="form-control" type="text" required>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('title') }}</span>
                        </aside>
                    </div>
                    <button type="submit" class="blue_btn yellow_btn text-uppercase">Save</button>
                </aside>
            </form>
        </div>
    </div>
</div>
@endsection
@include('admin.how_it_works.script')