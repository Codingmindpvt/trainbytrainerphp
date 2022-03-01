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
                        <a href="my-order.html" class="active"><i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i> MY ORDERS</a>
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
                        <a href="saved-card.html"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i> SAVED CREDIT CARD</a>
                   </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head head-edit-account">
                        <h3>My Orders</h3>
                        <h4> > 5 Barbell Workouts</h4>
                    </div>
                    <hr>
                    <div class="order-id-purchase">
                        <p><span>Order ID:</span> 8668</p>
                        <p><span>Purchased on:</span>  Oct 4, 2021  10:01 AM</p>
                     </div>
                    <div class="details-order-image">
                        <img src="images/barbell.png" alt="" class="mr-3">
                        
                        <div class="detail-order-content">
                            <h2>5 Barbell Workouts</h2>
                            <h5>$10<span>Steven Topalovic</span></h5>
                            <a class="profile-chta-bt" href="">OPEN CHAT</a>
                            <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> (1.2k Reviews)</p>
                            <p>Need to strengthen your core? There are so many workouts
                                you can do that focus on these muscles. These are
                                functional fitness workouts that focus on core strength
                                exercises... <a href="">View Full Details</a></p>
                        </div>
                    </div>
                    <div class="product-downloadable-area">
                        <hr>
                        <h4>Downloadable Products</h4>
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
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing Address</h4>
                                <div class="Billing Address-box">
                                    <h6>Adam Smith</h6>
                                    <p>202 Main Town, Dolphin Tower
                                        Los Angeles, California, 190001
                                        USA
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Payment Method</h4>
                                <div class="Billing Address-box">
                                    <h6>Credit Card</h6>
                                    <p>XXXX-XXXX-XXXX-5567
                                    </p>
                                </div>
                            </div>
                            <div class="offset-6 col-md-6">
                                <div class="total-amount-area billing-payment-area">
                                    <h3>TOTAL AMOUNT</h3>
                
                                    <div class="cart-total">
                                        <p>Cart Total</p>
                                        <p>$60</p>
                                    </div>
                                    <div class="cart-total">
                                        <p>Tax(5%)</p>
                                        <p>$5</p>
                                    </div>
                                    <hr>
                                    <div class="cart-total">
                                        <h5>Order Total</h5>
                                        <p>$63</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection