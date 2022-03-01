@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Edit Heading</h2>
    <div class="white_box my_profile">
        <div class="row">
            <form action="" method="POST" id="editUserForm">
                @csrf

                <aside class="col-lg-8">
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Title</label>
                            <input value="{{$heading->title}}" name="title" class="form-control" type="text" required>
                        </aside>
                    </div>
                    <button type="submit" class="blue_btn yellow_btn text-uppercase">Save</button>
                </aside>
            </form>
        </div>
    </div>
</div>
@endsection