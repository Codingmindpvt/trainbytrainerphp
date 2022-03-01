@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">
        <div class="user-name-tag text-center m-5">
            <h1>Hi, {{strtoupper(@$user->first_name." ".@$user->last_name)}} !</h1>
            <p>View and edit personal details here</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                @include('frontend.nav._sidebar')

            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head head-edit-account">
                        <h3>Address Book</h3>
                        <h4> > Add New Address</h4>
                    </div>
                    <hr>
                    <form id="billing" class="input-box"  action="{{ route('address-billing') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="change-pass-area">
                        <div class="row">
                            <div class ="col-md-6">
                                <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control"  name="first_name" value="{{@$user->first_name}}"  readonly>
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{@$user->last_name}}" readonly>
                                </div>
                            </div>

                            <div class ="col-md-12">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Company</label>
                                <input type="text" class="form-control" name="company_name" placeholder="E.g. Train By Trainers">
                                </div>
                            </div>
                            <div class ="col-md-12">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Address</label>
                                <input type="text"  name="address"class="form-control" placeholder="E.g. 202 Main Town, Dolphin Chowk">
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <i class="fa fa-angle-down select-angle" aria-hidden="true"></i>
                                    <select class="form-input" name="country" id="country-dd">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <i class="fa fa-angle-down select-angle" aria-hidden="true"></i>
                                   <select class="form-input" name="state" id="state-dd">
                                            <option value="">Select</option>

                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                  </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                <label for="formGroupExampleInput">City</label>
                                <input type="text" name="city" class="form-control" placeholder="E.g. Los Angeles">
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Zip Code</label>
                                <input type="text"  name="postal_code" class="form-control" id="formGroupExampleInput" placeholder="E.g. 190001">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" value="1" name="default" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">Use as my default billing address</label>
                                </div>
                            </div>


                            <div class ="col-md-6">
                                <input type="submit" name="submit" value="submit" class="blue-btn oswald-font" />
                            </div>
                              <div class ="col-md-6">
                                  <div class="new-main">
                                <a class="new-address" href="{{ route('show-address-billing') }}"> </a>
                                <button type="button" class="sign-bt-cancel">CANCEL</button>
                                  </div>


                        </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country-dd').on('change', function() {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{ url('api/fetch-states') }}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function() {
            var idState = this.value;


            $("#city-dd").html('');
            $.ajax({
                url: "{{ url('api/fetch-cities') }}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function(key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection
