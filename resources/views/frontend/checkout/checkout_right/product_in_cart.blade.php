<div class="checkout-tab" id="accordion">
    <div class="checkout-card">
        <div class="cheackout-header" id="faqHeading-1">
            <div class="mb-0">
                <h5 class="oswald-font faq-title">Products IN Cart</h5>
            </div>
        </div>
        <div class="cheackout-body pl-3">
            @foreach (@$cartDetail as $cart)
                <div class="chk-out">
                    @if (!empty(@$cart['program']['image_file']))
                        <img src="{{ asset('public/' . @$cart['program']['image_file']) }}" alt="">
                    @else
                        <img src="{{ asset('public/images/default-image-file-o.png') }}" alt="">
                    @endif
                    <div class="chk-content">
                        <div class="chk-1">
                            <h6 class="oswald-font faq-title">
                                {{ strtoupper(@$cart['program']['program_name']) }}</h6>
                            <a href="#" class="small-blue-btn">Continue</a>
                        </div>
                        <p>{{ DEFAULT_CURRENCY . @$cart['price'] }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
