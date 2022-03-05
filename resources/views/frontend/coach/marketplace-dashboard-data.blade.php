@extends('layouts.guest')
@section('content')
<style type="text/css">
.swiper {
    width: inherit;
    height: inherit;
}

.schedule-view {
    margin-top: 0px !important;
    border-top: 0;
}

.schedule-view .nav-link {
    display: block;
    padding: 1.5rem 2rem;
}

.upcomingslider .swiper-button-next {
    position: absolute;
    top: 57px;
    right: 10px;
    background-color: transparent !important;
}

.upcomingslider .swiper-button-prev {
    position: absolute;
    top: 55px;
    left: 10px;
    background-color: transparent !important;
}

.schedule-view #myTabContent {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}

@media (max-width: 1199px) {
    .schedule-view .nav-link {
        padding: 1.5rem 1.4rem;
    }
}

@media (max-width: 767px) {
    .schedule-view .nav-link {
        padding: 1.5rem 1rem;
    }

    .ad-result-1 .nav-link {
        font-size: 14px;
    }

    .ad-result-1 .nav-link span {
        font-size: 17px;
    }
}

@media (max-width: 600px) {
    .upcomingslider .swiper-button-next {
        position: absolute;
        top: 2px;
        right: 50%;
        background-color: transparent !important;
        transform: translate(0, -50%) rotate(180deg);
    }

    .upcomingslider .swiper-button-prev {
        position: absolute;
        top: 2px;
        left: 50%;
        background-color: transparent !important;
        transform: translate(0, -50%) rotate(180deg);
    }

    .swiper.ad-result-1 {
        margin-top: 45px !important;
    }
}
</style>
<!--start varification div area here -->
@include('frontend.nav._alertSection')
<!--end varification div area here -->

<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}! {!!
                certifiedUser() !!}</h1>
            <span class="divide-line"></span>
            {{-- <p class="oswald-font light-text">View and edit COACH OR personal details here</p> --}}
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if (Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </aside>

            <aside class="col-lg-8 marketplace-main-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">Marketplace Dashboard</h3>
                </div>
                <!-- <br/> -->
                <div class="row">
                    <aside class="col-lg-8">
                        <div class="sales-by-location-box">
                            <div class="row">
                                <aside class="col-lg-4">
                                    <div class="location-bx">
                                        <h4 class="oswald-font">{{ $classes_count }}</h4>
                                        <p>Classes</p>
                                    </div>
                                </aside>
                                <aside class="col-lg-4">
                                    <div class="location-bx pink">
                                        <h4 class="oswald-font">{{ $programs_count }}</h4>
                                        <p>Programs</p>
                                    </div>
                                </aside>
                                <aside class="col-lg-4">
                                    <div class="location-bx blue">
                                        <h4 class="oswald-font">{{$reviews}}</h4>
                                        <p>Reviews</p>
                                    </div>
                                </aside>
                            </div>
                        </div>
                        <div class="sale-by-location state_form">
                            <h4 class="oswald-font">Sales Stats</h4>
                            <div class="view-box">
                                <p class="pr-2">From</p>
                                <div class="calender-view">
                                    <i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
                                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="From">
                                </div>
                                <p class="pr-2">To</p>
                                <div class="calender-view">
                                    <i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
                                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="From">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="sale-by-location">
                            <h4 class="oswald-font">Sales Stats</h4>
                            <div class="view-box">
                                <p class="pr-2">Year
                                <div class="form-select">
                                    <select class="form-input" id="exampleFormControlSelect1">
                                        <option>year</option>
                                        <option>2 year</option>
                                        <option>3 year</option>
                                        <option>4 year</option>
                                        <option>5 year</option>
                                    </select>
                                </div>
                                </p>
                            </div>
                        </div> -->
                        <div class="sales-by-location-map">
                            <figure class="highcharts-figure">
                                <div id="userChart"></div>
                                <!-- <div id="curve_chart" style="width: 675px; height: 400px; "></div> -->
                            </figure>
                        </div>
                    </aside>
                    <aside class="col-lg-4">
                        <div class="main-lifetime">
                            <div class="lifetime-sales-box">
                                <h4 class="oswald-font text-center">Sales Stats</h4>
                            </div>
                            @php
                            $amountArr = [];
                            @endphp
                            @foreach($totalEarnings as $totalEarning)
                            @php
                            $amountArr[] = $totalEarning['payment']['amount'];
                            @endphp
                            @endforeach
                            <h5 class="oswald-font my-3 text-center">
                                {{ !empty($amountArr) ? DEFAULT_CURRENCY.array_sum($amountArr) : 0}}
                            </h5>
                        </div>

                        <div class="main-lifetime">
                            <div class="lifetime-sales-box">
                                <h4 class="oswald-font">Top Selling Products</h4>
                            </div>
                            @forelse($topSellingProgram as $index=>$program)
                            <p class="mb-2"><span>{{$index+1}}</span>
                                <b>{{ucwords($program['program_name'])}}</b><br>{{!empty($program['orders']) ? $program['orders'] : "0"}}
                                times
                                sold
                            </p>
                            @empty
                            <p class="blank-para">No Data Found!!</p>
                            @endforelse
                        </div>
                        <div class="main-lifetime">
                            <div class="lifetime-sales-box">
                                <h4 class="oswald-font">Top Selling Category</h4>
                            </div>
                            @forelse($getCategoryList as $srNo => $category)
                            <p class="mb-2"><span>{{$srNo+1}}</span>
                                <b>{{ ucwords($category['title']) }}</b>
                            </p>
                            @empty
                            <p class="blank-para">No Data Found!!</p>
                            @endforelse
                        </div>
                    </aside>

                    <aside class="col-lg-12">
                        <div class="user-profle-right-side">
                            <div class="info-profile-head slidebarhead">
                                <h3>My Orders</h3>
                                <ul class="nav nav-tabs media_tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" href="#sessions" role="tab" data-toggle="tab"
                                            aria-selected="true">New Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#programs" role="tab" data-toggle="tab"
                                            aria-selected="false">Programs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Upcoming" role="tab" data-toggle="tab"
                                            aria-selected="false">Upcoming</a>
                                    </li>
                                </ul>
                            </div>
                            <hr>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="programs">
                                    @forelse($orders as $order)
                                    <div class="my-oders-list">
                                        <div class="image-product-tb">
                                            @if(!empty($order['program']['image_file']))
                                            <img src="{{asset('public/'.$order['program']['image_file'])}}" alt="">
                                            @else
                                            <img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
                                            @endif
                                            <div>
                                                <p>{{"Order ID: #".$order->order_id}}</p>
                                                <h3>{{ucwords(@$order['program']['program_name'])}}</h3>
                                                <h6 class="doller-ten">{{DEFAULT_CURRENCY.$order['program']['price']}}
                                                    <b></b><span>Order By:
                                                        {{isset($order['payment']['user']['first_name']) ? ucwords($order['payment']['user']['first_name']." ".$order['payment']['user']['last_name'])  : ''}}</span>
                                                </h6>

                                            </div>
                                        </div>
                                        <div class="purchase-date">
                                            <p>Purchased on:</p>
                                            <p class="mb-2">
                                                {{ date_format(date_create($order->created_at),"M d, Y H:i A")}}</p>
                                            <a href="{{route('coach.order-program-detail',$order->id)}}">View
                                                Details</a>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="blank-para"> No Data Found!!</p>
                                    @endforelse
                                    {{$orders->links()}}
                                </div>

                                <div role="tabpanel" class="tab-pane in active show" id="sessions">
                                    @forelse( $classBookings as $serial_no=>$booking)

                                    <div class="my-oders-list">
                                        <div class="image-product-tb">
                                            @if(!empty($booking['coach_class']['image']))
                                            <img src="{{asset('public/class/'.$booking['coach_class']['image'])}}"
                                                alt="">
                                            @else
                                            <img src="{{asset('public/images/default-image-file-o.png')}}" alt="">
                                            @endif
                                            <div>
                                                <p>Booking ID: {{'#'.$booking->id}}</p>
                                                <h3>{{$booking['coach_class']['name']}}</h3>
                                                <h6 class="doller-ten">
                                                    {{DEFAULT_CURRENCY.$booking['coach_class']['price']}}
                                                    <b>/Session</b><span>Booked By:
                                                        {{ucwords($booking['user']['first_name']." ".$booking['user']['last_name'])}}</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="purchase-date">
                                            <p> Booked on: </p>
                                            <p class="mb-2">
                                                {{ date_format(date_create($booking->booking_date),"M d, Y H:i A")}}
                                            </p>
                                            <div class="view-accept-reject-bt">
                                                <a href="{{route('coach.order-class-detail',$booking->id)}}">View
                                                    Details</a>
                                                @if($booking['status'] == '0')
                                                <br><span class="badge badge-danger">
                                                    REJECTED
                                                </span>
                                                @elseif($booking['status'] == '2')
                                                <br><span class="badge badge-success">
                                                    ACCEPTED
                                                </span>
                                                @else
                                                <button type="button" title="Accept" value="2" id="{{$booking->id}}"
                                                    class="view-accept-bt accept-booking-request accept_request_{{$booking->id}}">
                                                    ACCEPT
                                                </button>
                                                <button type="button" title="Reject" value="0" id="{{$booking->id}}"
                                                    class="view-reject-bt reject-booking-request reject_request_{{$booking->id}}">
                                                    REJECT
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="blank-para">No Data Found!!</p>
                                    @endforelse
                                    {{$classBookings->links()}}
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Upcoming">
                                    <div>
                                        <div class="swiper mySwiper ad-result-1 mt-3">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="schedule-view">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            @isset($dateByDay)
                                                            <?php $ff = true; ?>
                                                            @foreach (array_slice($dateByDay, 0, 7) as $key => $item)
                                                            <li class="nav-item loop">

                                                                <a class="nav-link test oswald-font "
                                                                    id="home{{ $key + 1 }}-tab" data-id="{{ $key + 1 }}"
                                                                    data-toggle="tab" href="#home{{ $key + 1 }}"
                                                                    role="tab" aria-controls="sun"
                                                                    aria-selected="true">@php
                                                                    print_r($item['day']) ; @endphp<br><span
                                                                        style="font-weight: 300; text-transform: uppercase;">@php
                                                                        print_r($item['date']) ; @endphp</span></a>
                                                            </li>

                                                            @endforeach

                                                            @endisset


                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="schedule-view">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            @isset($dateByDay)
                                                            @foreach (array_slice($dateByDay, 7, 7) as $key => $item)
                                                            <li class="nav-item">
                                                                <a class="nav-link oswald-font"
                                                                    id="home{{ $key + 8 }}-tab" data-toggle="tab"
                                                                    href="#home{{ $key + 8 }}" role="tab"
                                                                    aria-controls="sun" aria-selected="true">@php
                                                                    print_r($item['day']) ; @endphp<br><span
                                                                        style="font-weight: 300; text-transform: uppercase;">@php
                                                                        print_r($item['date']) ; @endphp</span></a>
                                                            </li>

                                                            @endforeach

                                                            @endisset
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="schedule-view">
                                            <div class="tab-content view-box-area" id="myTabContent">


                                                @isset($dateByDay)
                                                @foreach ($dateByDay as $key => $item)
                                                <div class="tab-pane fade " id="home{{ $key + 1 }}" role="tabpanel"
                                                    aria-labelledby="home{{ $key + 1 }}-tab">
                                                    @isset($item['data'])
                                                    @foreach ($item['data'] as $detail)
                                                    @php
                                                    $booking_status = $detail['booking']['status'] ?? '';
                                                    $booking_date = $detail['booking']['booking_date'] ?? '';
                                                    @endphp

                                                    <div class="row py-2">
                                                        <aside class="col-md-3">
                                                            <h3><?php print_r($detail['class']['name']); ?></h3>
                                                            <p><?php print_r($detail['from_time']); ?> -
                                                                <?php print_r($detail['to_time']); ?></p>
                                                            <a class="text-left">@php print
                                                                truncateString($detail['class']['description'] ??
                                                                '', 20, false) . "\n"; @endphp</a>
                                                        </aside>

                                                        <aside class="col-md-3">
                                                            <p style="font-weight: bold;">Seats Available</p>
                                                            <p class="attendee_limit_{{ $detail['id'] }}">@php
                                                                print_r($detail['class']['attendees_limit']) ; @endphp
                                                            </p>
                                                        </aside>
                                                        <aside class="col-md-3">
                                                            <p style="font-weight: bold;">Location</p>
                                                            <p> <i class="fa fa-map-marker" aria-hidden="true"></i> @php
                                                                print_r($detail['class']['address']) ; @endphp
                                                            </p>
                                                        </aside>
                                                        <aside class="col-md-3">
                                                            <a class="blue-btn oswald-font my-3 text-light">
                                                                VIEW </a>
                                                        </aside>
                                                    </div>
                                                    @endforeach

                                                    @endisset
                                                    @if(count($item['data']) == 0)
                                                    <center>
                                                        <h5>No Records Found</h5>
                                                    </center>
                                                    @endempty

                                                </div>
                                                @endforeach


                                                @endisset



                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

        </div>
        </aside>
    </div>
    </aside>


    </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);
    var monthlyPayment = '<?php print_r($monthlyPayment); ?>';
    var hh = jQuery.parseJSON(monthlyPayment);


    console.log(hh)
    var iii = [
        ['Year', 'Sales'],
        ['2004', 1000],
        ['2005', 1170],
        ['2006', 660],
        ['2007', 1030]
    ]

    console.log(iii);
    var sss = [];

    $.each(hh, function(index, value) {
        var value = [index, value];
        sss.push(value);
    });

    console.log(sss);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(sss);

        var options = {
            title: 'Sales Stats',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    </script>
    </head>



</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('.accept-booking-request').on('click', function() {
    let alert_msg = "Are you sure you want to accept this booking request.";
    var booking_status = this.value;
    var booking_id = this.id;
    if (confirm(alert_msg) == true) {
        if (booking_status == 2) {
            var token = '{{ csrf_token() }}';
            var url = "{{route('booking.accept-booking-request')}}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: booking_id,
                    _token: token
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    } else {
        return false;
    }

});

$('.reject-booking-request').on('click', function() {
    let alert_msg = "Are you sure you want to reject this booking request.";
    var booking_status = this.value;
    var booking_id = this.id;
    if (confirm(alert_msg) == true) {
        if (booking_status == 0) {
            var token = '{{ csrf_token() }}';
            var url = "{{route('booking.reject-booking-request')}}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: booking_id,
                    _token: token
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    } else {
        return false;
    }

});
</script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<script src="js/countrySelect.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
window.onscroll = function() {
    myFunction()
};

var header = document.getElementById("fixed_header");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset - 200 > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
</script>
<script type="text/javascript">
var userData = <?php echo json_encode($paymentData)?>;
var monthList = <?php echo json_encode($monthList)?>;


Highcharts.chart('userChart', {
    title: {
        text: 'Sales'
    },
    subtitle: {
        text: 'Sales Stats'
    },
    xAxis: {
        categories: monthList,
        title: {
            text: 'Months'
        }
    },
    yAxis: {
        title: {
            text: 'Sales [in EURO(€)]'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: 'New Sales',
        data: userData
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
</script>

<script>
var owl = $('.screenshot_slider').owlCarousel({
    loop: true,
    responsiveClass: true,
    nav: true,
    margin: 0,
    autoplayTimeout: 4000,
    smartSpeed: 400,
    center: true,
    navText: ['<img src="images/left-arrow.png">', '<img src="images/right-arrow.png">'],
    responsive: {
        0: {
            items: 1,
            center: false
        },
        767: {
            items: 1,
            center: false
        },
        991: {
            items: 2,
            center: false
        },
        1200: {
            items: 3
        }
    }
});

$("#mobile-view-search").click(function() {
    $(".header-search-input").slideToggle();
});

/****************************/

jQuery(document.documentElement).keydown(function(event) {

    // var owl = jQuery("#carousel");

    // handle cursor keys
    if (event.keyCode == 37) {
        // go left
        owl.trigger('prev.owl.carousel', [400]);
        //owl.trigger('owl.prev');
    } else if (event.keyCode == 39) {
        // go right
        owl.trigger('next.owl.carousel', [400]);
        //owl.trigger('owl.next');
    }

});
$("#country_selector").countrySelect({
    defaultCountry: "us"
});
</script>
<!--hide show condition when some click on button-->
<script>
$(document).ready(function() {
    $("#form").click(function() {
        $("#form-show").show(50);
    });
});

$(document).ready(function() {
    $("#form-1").click(function() {
        $("#form-show-1").show(50);
    });
});

$(document).ready(function() {
    $("#cvv-1").click(function() {
        $("#cvv-v1").show(50);
    });
    $("#cvv-2").click(function() {
        $("#cvv-v1").hide(50);
    });
});

$(document).ready(function() {
    $("#cvv-2").click(function() {
        $("#cvv-v2").show(50);
    });
    $("#cvv-3").click(function() {
        $("#cvv-v2").hide(50);
    });
});

$(document).ready(function() {
    $("#cvv-3").click(function() {
        $("#cvv-v3").show(50);
    });
    $("#form-1").click(function() {
        $("#cvv-v3").hide(50);
    });
});
</script>
<script type="text/javascript">
Highcharts.getJSON(
    'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/world-population-density.json',
    function(data) {

        // Prevent logarithmic errors in color calulcation
        data.forEach(function(p) {
            p.value = (p.value < 1 ? 1 : p.value);
        });

        // Initialize the chart
        Highcharts.mapChart('container', {

            chart: {
                map: 'custom/world'
            },

            title: {
                text: ''
            },

            mapNavigation: {
                enabled: true,
                buttonOptions: {

                }
            },



            colorAxis: {
                min: 0,
                max: 1000,
                type: 'logarithmic'
            },

            series: [{
                data: data,
                joinBy: ['iso-a3', 'code3'],
                name: 'Population density',
                states: {
                    hover: {
                        color: '#21ccac'
                    }
                }
            }]
        });
    });
</script>
<script type="text/javascript">
var swiper = new Swiper(".mySwiper.ad-result-1", {
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>
<!--ends my profile no date area here-->
@endsection