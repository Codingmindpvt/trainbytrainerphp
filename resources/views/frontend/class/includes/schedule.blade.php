<!--tab start-->
<div class="schedule-view">
    <div class="alert alert-success schedule-success" role="alert" style="display: none;">
        This is a success alert—check it out!
    </div>
    <p class="my-4 form-p">My Schedule</p>
    @if (isset($classes) && !empty($classes) && count($classes) > 0)

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @isset($days)
                @foreach ($days as $day)
                    <li class="nav-item">
                        <a class="nav-link {{ $day->name == 'Sun' ? 'active' : '' }}" id="home1-tab" data-toggle="tab"
                            href="#{{ $day->name }}" role="tab" aria-controls="sun"
                            aria-selected="true">{{ $day->name }}</a>
                    </li>
                @endforeach
            @endisset
        </ul>


        <div class="tab-content view-box-area" id="myTabContent">
            <span class="all_errors"> </span>

            @include('frontend.class.includes.tabs.sun')
            @include('frontend.class.includes.tabs.mon')
            @include('frontend.class.includes.tabs.tue')
            @include('frontend.class.includes.tabs.wed')
            @include('frontend.class.includes.tabs.thu')
            @include('frontend.class.includes.tabs.fri')
            @include('frontend.class.includes.tabs.sat')
        </div>

        <div class="profile-btm-btn">
            <a href="" class="blue-btn oswald-font my-3 create_schedule">Create Class schedule</a>
        </div>
    @else
        <center>
            <h4>If you schedule a class create a class first!</h4>
        </center>
    @endif

</div>

<!--tab end-->
