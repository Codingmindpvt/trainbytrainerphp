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
                    <div class="info-profile-head">
                        <h3>Saved Credit Cards</h3>
                        <a href="add-card.html"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD NEW CARD</a>
                    </div>
                    <hr>
                   <div class="save-card-page">
                       <div class="visa-card-box">
                            <div class="visa-img">
                                <img src="images/visa.png" alt="visa">
                            </div>
                            <div class="visa-card-detail">
                                <h5>VISA <span>ending in 6159</span></h5>
                                <p>Expires: 12/2025</p>
                            </div>
                            <div class="card-delete-box">
                                <a href="" class="edit-card">Edit Card</a>
                                <a href="" class="delete-card">Delete Card</a>
                            </div>
                       </div>
                       <div class="visa-card-box">
                            <div class="visa-img">
                                <img src="images/master.png" alt="visa">
                            </div>
                            <div class="visa-card-detail">
                                <h5>VISA <span>ending in 6159</span></h5>
                                <p>Expires: 12/2025</p>
                            </div>
                            <div class="card-delete-box">
                                <a href="" class="edit-card">Edit Card</a>
                                <a href="" class="delete-card">Delete Card</a>
                            </div>
                        </div>
                        <div class="visa-card-box">
                            <div class="visa-img">
                                <img src="images/visa.png" alt="visa">
                            </div>
                            <div class="visa-card-detail">
                                <h5>VISA <span>ending in 6159</span></h5>
                                <p>Expires: 12/2025</p>
                            </div>
                            <div class="card-delete-box">
                                <a href="" class="edit-card">Edit Card</a>
                                <a href="" class="delete-card">Delete Card</a>
                            </div>
                         </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection