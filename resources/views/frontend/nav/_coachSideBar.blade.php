<div class="profile-status-chat">
    <div class="profile-status-box">
        <h6>PROFILE STATUS <i class="fa fa-question-circle" aria-hidden="true"></i></h6>
        <label class="switch">
            <input type="hidden" id="user_id" value="<?php echo Auth::user()->id; ?>">
            <input type="hidden" id="checkProfileStatus"
                value="{{ \App\Models\CoachDetail::checkProfileStatus(Auth::user()->id) }}">
            <input type="checkbox" id="profile_status">
            <span class="slider round"></span>
        </label>
    </div>
    <div class="profile-status-box">
        <h6>CHAT <i class="fa fa-question-circle" aria-hidden="true"></i></h6>
        <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
        </label>
    </div>
</div>
<div class="coach-details-tab">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link linking active show" href="#coach" role="tab" data-toggle="tab"
                aria-selected="true">Coach Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link linking" href="#personal" role="tab" data-toggle="tab" aria-selected="false">Personal
                Details</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane in active show" id="coach">
        <ul class="user-profile-left">
            @php

                $current_uri = request()->segments();
                $current_uri = $current_uri[0] ?? '';
                if ($current_uri == 'add-new-program') {
                    $product_url = 'add-new-program';
                } else {
                    $product_url = 'add-program';
                }

            @endphp
            <li>
                <a href="{{ route('coach-dashboard') }}"
                    class="{{ isset($current_uri) && $current_uri == 'coach-dashboard' ? 'active' : '' }}"><i
                        class="fa fa-tachometer mr-3" aria-hidden="true"></i>Marketplace Dashboard</a>
            </li>
            <li>
                <a href="{{ route('coach-profile-detail') }}"
                    class="{{ isset($current_uri) && $current_uri == 'coach-profile-detail' ? 'active' : '' }}"><i
                        class="fa fa-user mr-3" aria-hidden="true"></i>Coach Profile</a>
            </li>
            <li>
                <a href="{{ route('add-program') }}"
                    class="{{ isset($current_uri) && $current_uri == $product_url ? 'active' : '' }}"><i
                        class="fa fa-cart-plus mr-3" aria-hidden="true"></i>New Products</a>
            </li>
            <li>
                <a href="{{ route('coach.my-product-list') }}"
                    class="{{ isset($current_uri) && $current_uri == 'my-product-list' ? 'active' : '' }}"><i
                        class="fa fa-archive mr-3" aria-hidden="true"></i>My Products List</a>
            </li>
            <li>
                <a href="{{ route('coach.my-transaction-list') }}"  class="{{ isset($current_uri) && $current_uri == 'my-transaction-list' ? 'active' : '' }}"><i class="fa fa-file-text mr-3"
                        aria-hidden="true"></i>My Transactions List</a>
            </li>
            <li>
                <a href="{{ route('add.class') }}"
                    class="{{ isset($current_uri) && $current_uri == 'add-class' ? 'active' : '' }}"><i
                        class="fa fa-archive mr-3" aria-hidden="true"></i>My Class</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-credit-card mr-3" aria-hidden="true"></i>Billing Methods</a>
            </li>
            <li>
                <a href="{{ route('coach.my-order-list') }}" class="{{ isset($current_uri) && $current_uri == 'my-order-list' ? 'active' : '' }}" ><i class="fa fa-clock-o mr-3" aria-hidden="true"></i>My
                    Order History</a>
            </li>
            <li>
                <a href="{{ route('coach.my-customers') }}" class="{{ isset($current_uri) && $current_uri == 'my-customers' ? 'active' : '' }}"><i class="fa fa-address-book mr-3"
                        aria-hidden="true"></i>Customers</a>
            </li>
            <li>
                <a href="{{ route('coach.reviews') }}"
                    class="{{ isset($current_uri) && $current_uri == 'reviews' ? 'active' : '' }}"><i
                        class="fa fa-star mr-3" aria-hidden="true"></i>REVIEWS</a>
            </li>
            <li>
                <a href="{{ route('coach.verification') }}"
                    class="{{ isset($current_uri) && $current_uri == 'coach-verification' ? 'active' : '' }}"><i
                        class="fa fa-check-circle mr-3" aria-hidden="true"></i>Get Certified</a>
            </li>
            <li>
                <a href="{{ route('coach.certificate-diploma') }}"
                    class="{{ isset($current_uri) && $current_uri == 'certificate-diploma' ? 'active' : '' }}"><i
                        class="fa fa-address-card mr-3" aria-hidden="true"></i>Certificated / Diplomas</a>
            </li>
        </ul>
    </div>
    <div role="tabpanel" class="tab-pane" id="personal">
        <!-- start sidebar here -->

        @include('frontend.nav._sidebar')

        <!-- end sidebar here -->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var checkProfileStatus = $("#checkProfileStatus").val();

        if (checkProfileStatus == 'E') {
            $('#profile_status').prop('checked', true);
        } else {
            $('#profile_status').prop('checked', false);
        }

        $('#profile_status').on('change', function() {
            if (this.checked) {
                $("#profile_status").val("on");
            } else {
                $("#profile_status").val("off");
            }
            var status = $("#profile_status").val();
            var user_id = $("#user_id").val();
            $.ajax({
                url: "{{ route('coach.check-status') }}",
                data: {
                    user_id: user_id,
                    status: status
                },
                type: 'GET',
                success: function(data) {
                    if (data.length === 0) {
                        SwalOverlayColor();
                        swal("Warning!",
                            "You have not completed all of the required fields to make your account active. Please complete all the required fields in Coach Profile."
                            );
                        $('#profile_status').prop('checked', false);
                    } else {

                        $("#checkProfileStatus").val(data.profile_status);


                    }
                }
            });
        });

    });
</script>
