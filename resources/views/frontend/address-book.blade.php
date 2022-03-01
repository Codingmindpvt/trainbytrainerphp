@extends('layouts.guest')
@section('content')

<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">
        <div class="user-name-tag text-center m-5">
            <h1>Hi,{{@$user->first_name}}{{@$user->last_name}}!</h1>
            {{-- <p>View and edit personal details here</p> --}}
        </div>
        <div class="row">
            <div class="col-md-4">
               @include('frontend.nav._sidebar')
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>Address Book</h3>
                        <a href="{{ route('create-address-billing') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD NEW ADDRESS</a>
                    </div>
                    <hr>
                   <div class="address-book-address">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing Address</h4>
                                <div class="Billing Address-box mb-4">
                                    <h6>{{@$user->first_name.@$user->last_name}}</h6>
                                    <p>{{ @$billing_address[0]->company_name }},{{ @$billing_address[0]->address}}</p>
                                    <p>{{@$billing_address[0]->city }},{{@$user->state->name}},{{ @$billing_address[0]->postal_code }},{{@$billing_address[0]->country->name}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <h4>Additional Address Entries</h4>
                        <div class="row">
                            @foreach($billing_address as $item)

                            <div class="col-md-6">
                                <div class="Billing Address-box add-address-height">
                                    <h6>{{@$user->first_name.@$user->last_name}}</h6>
                                     <p>{{ @$item->company_name }},{{ @$item->address }},{{@$item->city }}</p>
                                        <p>{{@$item->state->name}},{{ @$item->postal_code }},{{@$item->country->name}}
                                    </p>

                                    <a href="{{ route('edit-address-billing',$item->id) }}" class="edit-address-box">Edit Address</a>
                                    <a href="{{ route('address-billing-delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="delete-address-box">Delete Address</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
