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
                         <a href="downloadable-product.html" class="active"><i class="fa fa-download mr-3" aria-hidden="true"></i> MY DOWNLOADABLE PRODUCTS</a>
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
                        <a href="saved-card.html"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i> SAVED CREDIT CARD</a>
                   </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>My Downloadable Products</h3>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search">
                    </div>
                    <hr>
                    <div class="downloadable-page-area">
                        <h4>5 Barbell Workouts</h4>
                        <div class="image-product-tb  mb-3">
                            <img src="images/pdf.png" alt="">
                            <div>
                                <p>Product Title Here</p>
                            <a href="">Download</a>
                            </div>
                        </div>
                        <div class="image-product-tb mb-4">
                            <img src="images/doc.png" alt="">
                            <div>
                                <p>Product Title Here</p>
                            <a href="">Download</a>
                            </div>
                        </div>
                        <hr>
                        <h4>90 Bodyweight Workouts (No Equipment Required)</h4>
                        <div class="image-product-tb mb-4">
                            <img src="images/doc.png" alt="">
                            <div>
                                <p>Product Title Here</p>
                            <a href="">Download</a>
                            </div>
                        </div>
                        <hr>
                        <h4>5 Barbell Workouts</h4>
                        <div class="image-product-tb  mb-3">
                            <img src="images/pdf.png" alt="">
                            <div>
                                <p>Product Title Here</p>
                            <a href="">Download</a>
                            </div>
                        </div>
                        <div class="image-product-tb mb-4">
                            <img src="images/doc.png" alt="">
                            <div>
                                <p>Product Title Here</p>
                            <a href="">Download</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection