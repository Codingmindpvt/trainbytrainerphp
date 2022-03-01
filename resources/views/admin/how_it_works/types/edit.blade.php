@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Edit Type</h2>
    <div class="white_box my_profile">
        <div class="row">
            <form action="{{route('admin.how-it-work.types.update')}}" method="POST" id="editUserForm">
                @csrf
                <aside class="col-lg-8">
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Title</label>
                            <input value="{{@$getData->id}}" name="id" class="form-control" type="hidden">

                            <input value="{{@$getData->title}}" name="title" class="form-control" type="text" required>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('title') }}</span>
                        </aside>
                    </div>
                    <div class="row">
                        <aside class="col-sm-6">
                            <label>Description</label>
                            <textarea name="description" class="form-control" type="text" required>{{@$getData->description}}</textarea>
                            <span class="text-danger" aria-hidden="true">{{ $errors->first('description') }}</span>
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