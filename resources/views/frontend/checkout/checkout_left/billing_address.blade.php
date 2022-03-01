<div class="checkout-card">
    <div class="cheackout-header" id="faqHeading-1">
        <div class="mb-0">
            <h5 class="oswald-font faq-title collapsed" data-toggle="collapse" data-target="#faqCollapse-1"
                data-aria-expanded="true" data-aria-controls="faqCollapse-1">Billing address</h5>
        </div>
    </div>

    <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
        <div class="cheackout-body">


            @include('frontend.checkout.checkout_left.billing_addresses')

            @include('frontend.checkout.checkout_left.form.billing_form')

        </div>
    </div>

</div>
