<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Site Metas -->
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />


		<!-- Title -->
        <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>

		<!-- Favicon -->
        <link rel="icon" href="/img/favicon.png">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="/css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="/css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="/css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="/css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="/css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="/css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="/css/magnific-popup.css">

		<!-- Medipro CSS -->
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive.css">


		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>

		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator">
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->


		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="#" style="text-decoration: none;">About</a></li>
								<li><a href="#" style="text-decoration: none;">Doctors</a></li>
								<li><a href="{{ route('user.contact') }}" style="text-decoration: none;">Contact</a></li>
								<li><a href="#" style="text-decoration: none;">FAQ</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i>+880 1234 56789</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com" style="text-decoration: none;">support@yourmail.com</a></li>
								@if(Auth::check())
									<li>
										<form action="{{ route('auth.logoutUser') }}" method="POST" style="display: inline;">
											@csrf
											@if(Auth::user()->image)
											<a href="{{ route ('user.profile') }} " class="profile-link mr-2"><img src="{{ asset("images/user/" . Auth::user()->image) }}" class="rounded-circle" alt="" style="width: 50px;"></a>
											@else
											<a href="{{ route ('user.profile') }} " class="profile-link mr-2"><img src="images/user/user_default.png" class="rounded-circle" alt="" style="width: 50px;"></a>
											@endif
										</form>
										<form action="{{ route('auth.logoutUser') }}" method="POST" style="display: inline;">
											@csrf
											<button type="submit" class="btn btn-dark btn-md">Logout</button>
										</form>
									</li>
								@else		
									<li><a href="{{route('auth.login')}}" class="login btn btn-primary">Login</a></li>
								@endif
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="img/logo.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
												<a href="{{ route('user.index') }}" style="text-decoration: none;">Home <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="{{ route('user.index') }}">Home Page 1</a></li>
												</ul>
											</li>
											<li class="{{ request()->routeIs('user.doctors') ? 'active' : '' }}">
												<a href="{{ route('user.doctors') }}" style="text-decoration: none;">Doctors</a>
											</li>
											<li class="{{ request()->routeIs('user.services') ? 'active' : '' }}">
												<a href="#" style="text-decoration: none;">Services</a>
											</li>
											<li class="{{ request()->routeIs('user.pages') ? 'active' : '' }}">
												<a href="#" style="text-decoration: none;">Pages <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="404.html" style="text-decoration: none;">404 Error</a></li>
												</ul>
											</li>
											<li class="{{ request()->routeIs('user.blog') ? 'active' : '' }}">
												<a href="" style="text-decoration: none;">Blogs <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="{{ route('user.blog_detail') }}" style="text-decoration: none;">Blog Details</a></li>
												</ul>
											</li>
											<li class="{{ request()->routeIs('user.contact') ? 'active' : '' }}">
												<a href="{{ route('user.contact') }}" style="text-decoration: none;">Contact Us</a>
											</li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
									<a href="{{ route('user.appointment') }}" class="btn btn-primary">Book Appointment</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->


		@yield('content')

		











		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-vimeo"></i></a></li>
									<li><a href="#"><i class="icofont-pinterest"></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
											<li><a href="#" style="text-decoration: none;"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
								<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
								<ul class="time-sidual">
									<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
									<li class="day">Saturday <span>9.00-18.30</span></li>
									<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Newsletter</h2>
								<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2018  |  All Rights Reserved by <a href="https://www.wpthemesgrid.com" target="_blank">wpthemesgrid.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->

		<!-- jquery Min JS -->
        <script src="/js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="/js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="/js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="/js/easing.js"></script>
		<!-- Color JS -->
		<script src="/js/colors.js"></script>
		<!-- Popper JS -->
		<script src="/js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="/js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="/js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="/js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="/js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="/js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="/js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="/js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="/js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="/js/steller.js"></script>/
		<!-- Wow JS -->
		<script src="/js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="/js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="/js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="/js/main.js"></script>

		<script src="/js/script.js"></script>

		<!-- Bootstrap JS (must be included before your script.js) -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>