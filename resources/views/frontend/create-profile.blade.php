@extends('layouts.guest')
@section('content')
    <style>
        .hide {
            display: none;
        }

    </style>
    <!--profile section start area here-->
    <section class="profile-section">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-6">
                    <div class="form-box">
                        <h3 class="oswald-font text-center">Welcome <span class="green-text"></span></h3>
                        <p class="mt-3"><b>Last Step!</b> Setup your profile information.</p>
                        <form class="form" method="post" action="{{ route('createprofile') }}"
                            id="createProfileForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group upload-profile" id="image-holder">
                            </div>
                            <input type="file" name="profile_image" accept="image/png, image/jpg, image/jpeg, image/webp"
                                class="" id="fileUpload" style="display:none;">
                            <!-- <input type="file" name="profile_image22" class=""> -->
                            <p>Upload profile picture (optional)</p>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" class="form-control form-input" id=""
                                        placeholder="E.g. Adam" onkeypress="return blockSpecialChar(event)">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control form-input" id=""
                                        placeholder="E.g. Smith" onkeypress="return blockSpecialChar(event)">
                                </div>
                            </div>

                            <div class="form-group mt-3">


                                <label>Phone Number</label>
                                <div class="phone-code-selected">
                                    <input type="text" name="contact_no" class="form-control form-input" id=""
                                        placeholder="Enter Phone Number" onkeypress="return onlyNumber(event)">
                                    {{-- <span class="phone-code">+1</span> --}}
                                    <?php
                                    $details = get_country_code();

                                    ?>
                                    @php
                                        $details = get_country_code();
                                    @endphp
                                    <select class="phone-code" name="phonecode">
                                        @foreach ($details as $detail)
                                            <option value="+{{ $detail }} ">+{{ $detail }}</option>
                                        @endforeach
                                        <!-- <option value="+91">+91</option> -->
                                    </select>

                                </div>


                            </div>

                            <h4 class="oswald-font blue-text normal-font">Billing Address</h4>
                            {{-- <div class="view-box">
                                <p class="my-2 form-p">Location of the Class</p>
                                <input type="hidden" id="address_lat" name="latitude">
                                <input type="hidden" id="address_long" name="longitude"><br>

                                <input class="form-input on_change_addess map_address" type="text" id="address_1" name="address">
                                <span class="errors address_error hide" id="address_error">
                                    This address is not valid address. Please enter valid address
                                </span>
                            </div> --}}
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="hidden" id="address_lat" name="latitude">
                                <input type="hidden" id="address_long" name="longitude">
                                <input class="form-input on_change_addess map_address" type="text" id="address_1"
                                    name="address">
                                <span class="errors address_error hide" id="address_error">
                                    This address is not valid address. Please enter valid address
                                </span>
                            </div>
                            <div class="form-group row">

                                <aside class="col-sm-6">
                                    <label for="">Country</label>
                                    <div class="form-select">
                                        <select class="form-input" name="country" id="country-dd">
                                            <option value="">Select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </aside>

                                <aside class="col-sm-6">
                                    <label for="">State</label>
                                    <div class="form-select">
                                        <select class="form-input" name="state" id="state-dd">
                                            <option value="">Select</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </aside>
                            </div>
                            <div class="form-group row">
                                <aside class="col-sm-6">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control form-input" id="get-city"
                                        placeholder="E.g. City">

                                </aside>
                                <aside class="col-sm-6">
                                    <label for="">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control form-input" id="postal_code"
                                        placeholder="E.g. 90001">
                                </aside>

                            </div>
                            <div class="form-group row mt-4">
                                <aside class="col-6">
                                    <a href="{{ route('logout') }}" class="blue-btn outline oswald-font">Back</a>
                                </aside>
                                <aside class="col-6">
                                    <input type="submit" name="submit" value="submit"
                                        class="blue-btn oswald-font" />
                                </aside>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
              {{-- $('#coach_submit').on('click', function(e) {
                //alert('ok');

                //$form.submit();
                e.preventDefault();
                if ($('#address_lat').val() == '' && $('#address_long').val() == '') {
                    //alert('address_lat');
                    $('#address_error').removeClass('hide').html(
                        'This address is not valid address. Please enter valid address');
                        //alert('#address_error');
                     return false;
                    //alert('ok');
                } else {
                    $('#address_error').addClass('hide');
                    $('#createProfileForm').submit();
                    //alert('ok');
                }
            }); --}}

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

    <!--profile end area here -->
@endsection
