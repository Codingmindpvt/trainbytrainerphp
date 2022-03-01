@extends('layouts.guest')
@section('content')
<!-- user profile content start here -->

<section class="user-profile-page">
    <div class="container">
        <div class="user-name-tag text-center m-5">
            <h1>Hi, Adam Smith!</h1>
            <p>View and edit personal details here</p>
        </div>
        <div class="row">
            <div class="col-md-4">
               <ul class="user-profile-left">
                    <li>
                         <a href="userprofile.html"><i class="fa fa-user mr-3" aria-hidden="true"></i> ACCOUNT INFORMATION</a>
                    </li>
                    <li>
                        <a href="my-order.html"><i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i> MY ORDERS</a>
                    </li>
                    <li>
                         <a href="downloadable-product.html"><i class="fa fa-download mr-3" aria-hidden="true"></i> MY DOWNLOADABLE PRODUCTS</a>
                    </li>
                    <li>
                         <a href="address-book.html"><i class="fa fa-address-book mr-3" aria-hidden="true"></i> ADDRESS BOOK</a>
                    </li>
                    <li>
                         <a href="my-review.html"><i class="fa fa-star mr-3" aria-hidden="true"></i> MY REVIEWS</a>
                    </li>
                    <li>
                        <a href="chat-notification.html"><i class="fa fa-comments mr-3" aria-hidden="true"></i> CHAT NOTIFICATIONS</a>
                   </li>
                   <li>
                        <a href="saved-card.html" class="active"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i> SAVED CREDIT CARD</a>
                   </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head head-edit-account">
                        <h3>Saved Credit Cards</h3>
                        <h4> > Add New Card</h4>
                    </div>
                    <hr>
                    <div class="change-pass-area">
                        <div class="row">
                            <div class ="col-md-12">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Name on Card</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="E.g. Adam Smith">
                                </div>
                            </div>
                            <div class ="col-md-12">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Card Number</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="E.g. XXXX-XXXX-XXXX-1243">
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                <label for="formGroupExampleInput">Expiry Date</label>
                                <input type="date" class="form-control" id="formGroupExampleInput" placeholder="MM/YYYY">
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                <label for="formGroupExampleInput">CVV</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="E.g. 123">
                                </div>
                            </div>
                            <div class ="col-md-6">
                                <button type="button" class="sign-bt">SUBMIT</button>
                            </div>
                              <div class ="col-md-6">
                                <button type="button" class="sign-bt-cancel">CANCEL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
