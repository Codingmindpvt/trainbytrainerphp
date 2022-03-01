@extends('layouts.guest')
@section('content')
    @include('frontend.checkout.heading')
    <section class="checkout-section">
        <div class="container">
            <div class="row">
                @include('frontend.checkout.checkout_left')
                @include('frontend.checkout.checkout_right')
            </div>
        </div>
    </section>

@section('scripts')
    @include('frontend.checkout.scripts')
@endsection
@endsection
