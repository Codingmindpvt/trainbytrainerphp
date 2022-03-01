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
                         <a href="downloadable-product.html" ><i class="fa fa-download mr-3" aria-hidden="true"></i> MY DOWNLOADABLE PRODUCTS</a>
                    </li>
                    <li>
                         <a href="address-book.html"><i class="fa fa-address-book mr-3" aria-hidden="true"></i> ADDRESS BOOK</a>
                    </li>
                    <li>
                         <a href="my-review.html"><i class="fa fa-star mr-3" aria-hidden="true"></i> MY REVIEWS</a>
                    </li>
                    <li>
                        <a href="chat-notification.html" class="active"><i class="fa fa-comments mr-3" aria-hidden="true"></i> CHAT NOTIFICATIONS</a>
                   </li>
                   <li>
                        <a href="saved-card.html"><i class="fa fa-credit-card-alt mr-3" aria-hidden="true"></i> SAVED CREDIT CARD</a>
                   </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="user-profle-right-side">
                    <div class="info-profile-head">
                        <h3>Chat Notifications</h3>
                        <a class="clear-notification" href=""><i class="fa fa-trash" aria-hidden="true"></i> CLEAR NOTIFICATIONS</a>
                    </div>
                    <hr>
                   <div class="notification-page">
                       <h4>Today</h4>
                       <div class="notification-box">
                           <div class="notification-person">
                               <img src="images/man.png" alt="man">
                           </div>
                           <div class="notification-content-text">
                               <p>You have a message from <b>“Adam Smith”.</b></p>
                               <p>9:17 PM</p>
                           </div>
                       </div>
                       <div class="notification-box">
                            <div class="notification-person">
                                <img src="images/chat2.png" alt="man">
                            </div>
                            <div class="notification-content-text">
                                <p>You have a message from <b>“Maria Roy”.</b></p>
                                <p>9:17 PM</p>
                            </div>
                        </div>
                   </div>
                   <div class="notification-page">
                    <h4>Yesterday</h4>
                    <div class="notification-box">
                        <div class="notification-person">
                            <img src="images/man.png" alt="man">
                        </div>
                        <div class="notification-content-text">
                            <p>You have a message from <b>“Adam Smith”.</b></p>
                            <p>9:17 PM</p>
                        </div>
                    </div>
                    <div class="notification-box">
                         <div class="notification-person">
                             <img src="images/chat2.png" alt="man">
                         </div>
                         <div class="notification-content-text">
                             <p>You have a message from <b>“Maria Roy”.</b></p>
                             <p>9:17 PM</p>
                         </div>
                     </div>
                </div>
                <div class="notification-page">
                    <h4>Week Ago</h4>
                    <div class="notification-box">
                        <div class="notification-person">
                            <img src="images/man.png" alt="man">
                        </div>
                        <div class="notification-content-text">
                            <p>You have a message from <b>“Adam Smith”.</b></p>
                            <p>9:17 PM</p>
                        </div>
                    </div>
                    <div class="notification-box">
                         <div class="notification-person">
                             <img src="images/chat2.png" alt="man">
                         </div>
                         <div class="notification-content-text">
                             <p>You have a message from <b>“Maria Roy”.</b></p>
                             <p>9:17 PM</p>
                         </div>
                     </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection