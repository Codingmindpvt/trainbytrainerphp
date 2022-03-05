<ul class="user-profile-left">
    @php

    $current_uri = request()->segments();
    $current_uri = $current_uri[0] ?? '';

    @endphp
    <li>
        <a href="{{route('userprofile')}}"
            class="{{ isset($current_uri) && $current_uri == 'userprofile' || $current_uri == 'edit_profile' ? 'active' : '' }}"><i
                class="fa fa-user mr-3" aria-hidden="true"></i> ACCOUNT
            INFORMATION</a>
    </li>
    <li>
        <a href="{{route('my-orders')}}" class="{{ isset($current_uri) && $current_uri == 'my-orders' ? 'active' : '' }}"><i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i> MY ORDERS</a>
    </li>
    {{-- <li>
                            <a href=""><i class="fa fa-download mr-3" aria-hidden="true"></i> MY DOWNLOADABLE PRODUCTS</a>
                        </li> --}}
    {{-- <li>
                            <a href="{{route('show-address-billing')}}"><i class="fa fa-address-book mr-3"
        aria-hidden="true"></i> ADDRESS BOOK</a>
    </li> --}}
    <li>
        <a href="{{route('my-review-list')}}"
            class="{{ isset($current_uri) && $current_uri == 'my-review-list' ? 'active' : '' }}"><i
                class="fa fa-star mr-3" aria-hidden="true"></i> MY REVIEWS</a>
    </li>
    {{-- <li>
                            <a href=""><i class="fa fa-comments mr-3" aria-hidden="true"></i> CHAT NOTIFICATIONS</a>
                        </li> --}}
    {{-- <li>
                            <a href=""><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i> SAVED CREDIT CARD</a>
                        </li> --}}
</ul>
