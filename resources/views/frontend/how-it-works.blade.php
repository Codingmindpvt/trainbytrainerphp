@extends('layouts.guest')
@section('content')
<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">FINDING A FITNESS COACH, PERSONAL TRAINER<br>
                OR WORKOUT PROGRAM HAS NEVER BEEN EASIER.</h1>
            <span class="divide-line"></span>
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start how it works area here-->
<section class="how-it-works-section">
    <div class="container">
        <div class="row">
            <aside class="col-md-12 main">
                <h2 class="oswald-font"> HOW TO FIND A COACH </h2>
                <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it t make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </aside>
        </div>
        <div class="row py-4">
            <aside class="col-md-8 d-flex justify-content-start my-5">
                <div class="number-box">
                    <h3 class="oswald-font">1</h3>
                </div>
                <div class="choose-box">
                    <h3 class="oswald-font"> CHOOSE A COACH </h3>
                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it t make a type specimen book. It has survived not only.
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </aside>
            <aside class="col-md-4 how-img">
                <img src="{{url('/')}}/public/images/coach.png" alt="coach">
            </aside>
            <aside class="col-md-4 how-img">
                <img src="{{url('/')}}/public/images/connect.png" alt="coach">
            </aside>
            <aside class="col-md-8 d-flex justify-content-start my-5">
                <div class="number-box">
                    <h3 class="oswald-font">2</h3>
                </div>
                <div class="choose-box">
                    <h3 class="oswald-font"> CONNECT</h3>
                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it t make a type specimen book. It has survived not only.
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </aside>
            <aside class="col-md-8 d-flex justify-content-start my-5">
                <div class="number-box">
                    <h3 class="oswald-font">3</h3>
                </div>
                <div class="choose-box">
                    <h3 class="oswald-font"> START TRAINING </h3>
                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it t make a type specimen book. It has survived not only.
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </aside>
            <aside class="col-md-4 how-img">
                <img src="{{url('/')}}/public/images/share.png" alt="coach">
            </aside>
        </div>
        <div class="row my-5">
            <aside class="col-md-12 main">
                <h2 class="oswald-font">HOW TO FIND A WORKOUT PROGRAM </h2>
                <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it t make a type specimen book. It has survived not only five
                    centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </aside>
        </div>
        <div class="row py-4">
            <aside class="col-md-8 d-flex justify-content-start my-5">
                <div class="number-box">
                    <h3 class="oswald-font">1</h3>
                </div>
                <div class="choose-box">
                    <h3 class="oswald-font">CHOOSE A PROGRAM</h3>
                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it t make a type specimen book. It has survived not only.
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </aside>
            <aside class="col-md-4 how-img">
                <img src="{{url('/')}}/public/images/choose.png" alt="coach">
            </aside>
            <aside class="col-md-4 how-img">
                <img src="{{url('/')}}/public/images/download.png" alt="coach">
            </aside>
            <aside class="col-md-8 d-flex justify-content-start my-5">
                <div class="number-box">
                    <h3 class="oswald-font">2</h3>
                </div>
                <div class="choose-box">
                    <h3 class="oswald-font">DOWNLOAD IT IMMEDIATELY</h3>
                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it t make a type specimen book. It has survived not only.
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </aside>
            <aside class="col-md-8 d-flex justify-content-start my-5">
                <div class="number-box">
                    <h3 class="oswald-font">3</h3>
                </div>
                <div class="choose-box">
                    <h3 class="oswald-font">START TRAINING</h3>
                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it t make a type specimen book. It has survived not only.
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </aside>
            <aside class="col-md-4 how-img">
                <img src="{{url('/')}}/public/images/share.png" alt="coach">
            </aside>
            <aside class="col-md-12">
                <div class="video-outer aos-init aos-animate" data-aos="fade-down">
                    <iframe width="100%" height="656" src="{{url('/')}}/public/videos/pilates.mp4"
                        title="TrainByTrainer" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen=""></iframe>
                </div>
            </aside>
        </div>
    </div>
</section>
<!--ends how it works area here-->
@endsection