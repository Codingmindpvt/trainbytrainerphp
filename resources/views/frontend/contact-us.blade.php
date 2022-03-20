@extends('layouts.guest')
@section('content')
    <!--start banner area here -->
    <div class="contact-banner"
        style="background: url(./images/contact-b.png) no-repeat; background-size: cover; background-position: center;">
        <div class="blue-overlay">
            <div class="container">
                <div class="main-heading oswald-font text-center">
                    <h2>Contact us</h2>
                    <p class="text-light">for all enquiries, please email us using the form below</p>
                </div>
            </div>
        </div>
    </div>
    <!--end banner area here -->

    <!--start form area here -->
    <section class="form-section">
        <div class="container">
            <div class="row">
                <aside class="col-md-6">
                    <div class="form-box">
                     <form action="{{ route('contactus_send') }}" method="POST" id="editcontact"
                            enctype="multipart/form-data" class="form">
                            <h3 class="oswald-font mb-4">Feel free to ask any query!</h3>
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" maxlength="15" class="form-control form-input"
                                        placeholder="E.g. Adam" >
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" maxlength="15" class="form-control form-input"
                                        placeholder="E.g. Smith" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <span class="number1">+31</span>
                                <input type="text" name="phone_number" maxlength="12" class="form-control form-input pl-5"
                                    placeholder="Enter Phone Number" onkeypress="return onlyNumber(event)">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control form-input"
                                    placeholder="E.g. adam_smith007@gmail.com" >
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control value form-input value" maxlength="500" rows="3" placeholder="Your Comment" ></textarea>
                            </div>
                            <div class="form-group">
                                <!-- <a href="create-profile.html" class="blue-btn oswald-font">Send</a> -->
                                <input type="submit" class="blue-btn oswald-font" value="SUBMIT" name="submit"
                                    id='frmSubmit'>

                            </div>
                   </form>
                    </div>

                </aside>
                <aside class="col-md-6">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <img src="public/images/Calling.png" alt="call">
                        </div>
                        <div class="contact-cnt">
                            <h4 class="oswald-font mb-2">Phone number</h4>
                            <p>06-25415947</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <img src="public/images/Message.png" alt="call">
                        </div>
                        <div class="contact-cnt">
                            <h4 class="oswald-font mb-2">Email address</h4>
                            <p>Trainbytrainerbv@gmail.com</p>
                            <p>Trainbytrainer@gmail.com </p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <img src="public/images/Location.png" alt="call">
                        </div>
                        <div class="contact-cnt">
                            <h4 class="oswald-font mb-2">TrainbyTrainer HQ</h4>
                            <p>Anne franklaan 274
                            <p> 1403 HX Bussum</p>
                            <p>06 – 25415947</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!--end form area here -->

    <!--start real trainer area here-->
    <section class="real-trainer common-section">
        <div class="container">
            <h1>Real Trainers. Real Results.</h1>
            <h2>Start today.<br>Do anywhere.</h2>
            <a href="#" class="green-btn">Find Your Coach</a>
            <a href="#" class="green-btn white-btn">Become a Coach</a>
        </div>
    </section>
    <!--ends real trainer area here-->
@endsection
