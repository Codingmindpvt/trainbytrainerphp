@extends('layouts.guest')
@section('content')
    @php
    //print_r($intent); die;
    @endphp
    <style>
        /**
    * Shows how you can use CSS to style your Element's container.
    * These classes are added to your Stripe Element by default.
    * You can override these classNames by using the options passed
    * to the `idealBank` element.
    * https://stripe.com/docs/js/elements_object/create_element?type=idealBank#elements_create-options-classes
    */

        input,
        .StripeElement {
            height: 40px;

            color: #32325d;
            background-color: white;
            border: 1px solid transparent;
            border-radius: 4px;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .my-cart-page .form-box .form {
            border-bottom: 0;
        }

        input {
            padding: 10px 12px;
        }

        .my-cart-page {
            padding: 20px 0;
        }

        input:focus,
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

    </style>
    <section class="my-cart-page">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-6">
                    <div class="form-box">
                        <img style="margin: 0 auto;"
                            src="http://198.211.110.165/trainbytrainerphp/public/images/ideal-logo.png" alt="logo">
                        <form id="payment-form" class="form">
                            <div class="form-row form-group">
                                <label for="accountholder-name">
                                    Name
                                </label>
                                <input id="accountholder-name" name="accountholder-name" class="form-control form-input">
                            </div>

                            <div class="form-row form-group">
                                <label for="accountholder-email">
                                    Email
                                </label>
                                <input id="accountholder-email" name="accountholder-email" class="form-control form-input">
                            </div>

                            <div class="form-row form-group">
                                <!--
          Using a label with a for attribute that matches the ID of the
          Element container enables the Element to automatically gain focus
          when the customer clicks on the label.
        -->
                                <label for="ideal-bank-element">
                                    iDEAL Bank
                                </label>
                                <div id="ideal-bank-element" class="form-control form-input">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                            </div>

                            <button id="submit-button" class="btn blue-btn my-4"
                                data-secret="{{ $intent->client_secret }}">Submit</button>

                            <!-- Display mandate acceptance text. -->
                            <div id="mandate-acceptance" class="frm-para">
                                By providing your payment information and confirming this payment, you
                                authorise (A) Rocket Rides and Stripe, our payment service provider, to
                                send instructions to your bank to debit your account and (B) your bank to
                                debit your account in accordance with those instructions. As part of your
                                rights, you are entitled to a refund from your bank under the terms and
                                conditions of your agreement with your bank. A refund must be claimed
                                within 8 weeks starting from the date on which your account was debited.
                                Your rights are explained in a statement that you can obtain from your
                                bank. You agree to receive notifications for future debits up to 2 days
                                before they occur.
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="error-message" role="alert"></div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var options = {
            // Custom styling can be passed to options when creating an Element
            style: {
                base: {
                    padding: '4px 12px',
                    color: '#32325d',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    },
                },
            },
        };
        var stripe = Stripe('pk_test_zxcfrbpCVRapiNwcF7YPeBBF');
        var elements = stripe.elements();
        // Create an instance of the idealBank Element
        var idealBank = elements.create('idealBank', options);
        // Add an instance of the idealBank Element into
        // the `ideal-bank-element` <div>
        idealBank.mount('#ideal-bank-element');

        var form = document.getElementById('payment-form');
        var accountholderName = document.getElementById('accountholder-name');
        var accountholderEmail = document.getElementById('accountholder-email');
        var submitButton = document.getElementById('submit-button');
        var clientSecret = submitButton.dataset.secret;

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Redirects away from the client
            stripe.confirmIdealPayment(
                clientSecret, {
                    payment_method: {
                        ideal: idealBank,
                        billing_details: {
                            name: accountholderName.value,
                            email: accountholderEmail.value,
                        },
                    },
                    return_url: "{{ route('stripe.checkout.detail', ['price' => $intent->amount . '-' . $type . '-' . $class_id]) }}",
                }
            );
        });

    </script>
@endsection
