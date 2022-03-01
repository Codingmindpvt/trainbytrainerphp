<!--start footer area here -->
<footer class="footer">
        <div class="container">
            @if((Auth::check() && !empty(Auth::user()->account_complete==1) || !Auth::check()))
            <div class="row">
                <aside class="col-md-3 col-6">
                    <h3 class="oswald-font">Company</h3>
                    <ul class="footer-nav-list">
                        <li><a href="{{ route ('aboutus') }}">About Us</a></li>
                        <li><a href="{{ route('termscondition') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('blogs') }}">Blogs</a></li>
                        <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                    </ul>
                </aside>
                <aside class="col-md-3 col-6">
                    <h3 class="oswald-font">Discovery</h3>
                    <ul class="footer-nav-list">
                        <li><a href="{{ route('howitwork') }}">How It Works</a></li>
                        <li><a href="{{ route('popular.Program') }}">Popular Workout Programs</a></li>
                        <li><a href="{{ route('popular.Class') }}">Popular Classes</a></li>
                    </ul>
                </aside>
                <aside class="col-md-3 col-6">
                    <h3 class="oswald-font">Coaches</h3>
                    <ul class="footer-nav-list">
                        <li><a href="{{ route('help.Support') }}">Help & Support</a></li>
                        <li><a href="{{ route('createManage.Account') }}">Creating Accounts</a></li>
                        <li><a href="{{ route('createManage.Account') }}">Managing Accounts</a></li>
                        <li><a href="{{ route('selling.Product') }}">Selling Products</a></li>
                    </ul>
                </aside>
                <aside class="col-md-3 col-6">
                    <h3 class="oswald-font">Contact With Us</h3>
                    <ul class="footer-nav-list">
                        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a></li>
                    </ul>
                </aside>
            </div>
            @endif
            <p class="copyright-p">&copy; 2021 Train By Trainer. All Rights Reserved</p>
        </div>
    </footer>
<!--end footer area here -->
