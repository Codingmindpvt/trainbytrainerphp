<div class="checkout-card mt-3">
    <div class="cheackout-header" id="faqHeading-2">
        <div class="mb-0">
            <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-2"
                data-aria-expanded="true" data-aria-controls="faqCollapse-1">Payment method</h5>
        </div>
    </div>
    <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
        <div class="cheackout-body">

            @include('frontend.checkout.checkout_left.cards')

            @include('frontend.checkout.checkout_left.form.payment_method_form')

        </div>
    </div>
</div>
