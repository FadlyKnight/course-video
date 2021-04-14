<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Pelatihan Bioetika</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Pelatihan Bioetika" />
		<meta name="keywords" content="Pelatihan Bioetika,Pelatihan,Bioetika" />
		<meta name="author" content="ksatriaknight & Dandi Anto" />

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
		
		<!-- Animate.css -->
		<link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="{{ asset('landing/css/icomoon.css') }}">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="{{ asset('landing/css/bootstrap.css') }}">

		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">

		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('landing/css/owl.theme.default.min.css') }}">

		<!-- Flexslider  -->
		<link rel="stylesheet" href="{{ asset('landing/css/flexslider.css') }}">

		<!-- Pricing -->
		<link rel="stylesheet" href="{{ asset('landing/css/pricing.css') }}">

		<!-- Theme style  -->
		<link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

		<!-- Modernizr JS -->
		<script src="{{ asset('landing/js/modernizr-2.6.2.min.js') }}"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="{{ asset('landing/js/respond.min.js') }}"></script>
		<![endif]-->
		<style>
			#fh5co-footer {
			    padding: 4em 0;
			}
		</style>
        @yield('css')
	</head>
	
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">www.yourdomainname.com</p>
						<p class="num">Call: +01 123 456 7890</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="/"><i class="icon-study"></i>Educ<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="#">Beranda</a></li>
							{{--
							<li><a href="#">Artikel</a></li>
							<li><a href="#">Kuesioner</a></li>
							<li><a href="#">Gallery</a></li>
							<li><a href="#">Tentang</a></li>
							 <li class="has-dropdown">
								<a href="#">Blog</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li> 
							<li><a href="#">Kontak</a></li>
							--}}
							@auth
							<li class="btn-cta"><a href="#"><span>Video</span></a></li>
							
							@else

							<li class="btn-cta"><a href="#"><span>Login Wali</span></a></li>
							<li class="btn-cta"><a href="#"><span>Registrasi Wali</span></a></li>
							
							@endauth
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	
    @yield('content')

	<footer id="fh5co-footer" role="contentinfo" style="background-image: url({{ asset('landing/images/img_bg_4.jpg') }});">
		<div class="overlay"></div>
		<div class="container">
			{{-- <div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About Education</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learning</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Course</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learn &amp; Grow</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Engage us</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Legal</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div> --}}

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; {{ date('Y') }} Pelatihan Bioethics.</small> 
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
    @yield('js-top')

	<!-- jQuery -->
	<script src="{{ asset('landing/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('landing/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('landing/js/jquery.waypoints.min.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('landing/js/jquery.stellar.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('landing/js/jquery.flexslider-min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ asset('landing/js/jquery.countTo.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('landing/js/magnific-popup-options.js') }}"></script>
	<!-- Count Down -->
	<script src="{{ asset('landing/js/simplyCountdown.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('landing/js/main.js') }}"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>

    @yield('js-bot')

	</body>
</html>

