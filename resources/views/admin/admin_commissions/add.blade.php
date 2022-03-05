@extends('layouts.admin.inner')
@section('content')
<!-- start content area here -->
<div class="content_area">
    <h2>Add Admin Commission</h2>
    <div class="white_box my_profile">
        <div class="row">
            <form action="{{route('admin.commission.add')}}" method="POST" id="commissionForm" enctype="multipart/form-data">
                @csrf
                <aside class="col-sm-2"></aside>
                <aside class="col-sm-8">
                    <aside class="row">
                        <label>Commission Percent</label>
                        <input name="commission_percent" id="price" class="form-control" type="text">
                    </aside>
                    <aside class="row">
                        <label>Commission Type</label>
                        <select name="commission_type" class="form-control" id="cars">
                            <option value="P">Program</option>
                            <option value="C">Class</option>

                        </select>
                    </aside>




                    <aside class="row">
                        <button type="submit" class="blue_btn yellow_btn text-uppercase">Add</button>
                    </aside>
                </aside>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var cVal = 0;
        $('#price').keyup(function() {
            var regexPositiveFloat = /^([0-9]*)(.[0-9]{0,2})?$/;
            if (regexPositiveFloat.test($('#price').val())) {
                console.log('Current Value', $('#price').val())
                cVal = $('#price').val();
                $('#price').val(cVal);
            } else {
                $('#price').val(cVal);
            }


            var val = $(this).val();




            if (isNaN(val)) {
                val = val.replace(/[^0-9\.]/g, '');
                if (val.split('.').length > 0)
                    val = val.replace(/\.+$/, '');
            }
            $(this).val(val);
        });
    </script>
    @endsection