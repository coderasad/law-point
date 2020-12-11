<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@php
		$db_seo = DB::table('logos')->get();
	@endphp
	@foreach ($db_seo as $data)
	<meta name="description" content="{{$data->seo_des}}">	
	@endforeach	
	<meta name="author" content="">
	<title> @yield('title') | Law Point </title>
	
	<link href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/all.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/jquery.fancybox.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
</head>
<body>
<div class="wrapper-main">
	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="row">				
				@php
                	$db = DB::table('topbars')->get();
				@endphp          
				@foreach ($db as $data)
					<div class="col-lg-3">
						<div class="social-media">
							<ul>
								<li><a href="{{$data->fb_link}}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{$data->tw_link}}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{$data->in_link}}"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<a class="marquee d-flex" href="#">
							<marquee behavior="scroll" scrollamount="3" direction="left" style="color:#ffeb00;">{{$data->news}}</marquee>
						</a>
					</div>
					<div class="col-lg-3">
						<div class="contact-details">
							<ul>
								<li><i class="fas fa-phone fa-rotate-90"></i> {{$data->phone}}</li>
							</ul>
						</div>
					</div>
				@endforeach	
			</div>				
		</div>
	</div>
    <!-- Navigation -->

	@yield('content')
		
	<!-- Contact Us -->
	<div class="touch-line">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				   <p>{{$data->footer_des}}</p>
				</div>
				<div class="col-md-4">
				   <a class="btn btn-lg btn-secondary btn-block" href="{{route('contact')}}"> Contact Us </a>
				</div>
			</div>
		</div>
	</div>
	<!--footer starts from here-->
	@php
		$db = DB::table('footers')->get();
	@endphp
	@foreach($db as $db)
	@endforeach
    <footer class="footer" style="background-image: url('public/frontend/images/bg/{{$db->img}}')">
        <div class="container bottom_border">
            <div class="row">				
				<div class="col-lg-4 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">{{$db->title1}}</h5>
					<!--headin5_amrc-->
					<p class="mb10">{{$db->description}}</p>
				</div>	
				<div class="col-lg-4 col-md-6 col-sm-6 text-center">
					<h5 class="headin5_amrc col_white_amrc pt2">{{$db->title2}}</h5>
					<!--headin5_amrc-->					
					<ul class="footer-social">
						<li><a class="facebook hb-xs-margin" href="{{$data->fb_link}}"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
						<li><a class="twitter hb-xs-margin" href="{{$data->tw_link}}"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
						<li><a class="dribbble hb-xs-margin" href="{{$data->in_link}}"><span class="hb hb-xs spin hb-dribbble"><i class="fab fa-linkedin"></i></span></a></li>
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">{{$db->title3}}</h5>
					<!--headin5_amrc ends here-->
					<p><abbr title="Office"><i class="fas fa-home mr-2"></i></abbr>
						{{$db->office}}
					</p>
					<p>
						<abbr title="Phone"><i class="fas fa-phone fa-rotate-90 mr-2"></i></abbr>{{$data->phone}}
					</p>
					<p>
						<abbr title="Email"><i class="fas fa-envelope mr-2"></i></abbr>
						<a href="mailto:{{$db->email}}">{{$db->email}}</a>
					</p>
					<p>
						<abbr title="Hours"><i class="fas fa-calendar-alt mr-2"></i></abbr>{{$db->hours}}
					</p>
					<!--footer_ul2_amrc ends here-->
				</div>
			</div>
		</div>
        <div class="container">
            <p class="copyright text-center">All Rights Reserved. &copy; 2020 <a href="{{route('index')}}">Law Point</a> Design By : 
				<a href="https://coderasad.com/">Coderas@d</a>
            </p>
		</div>
		<div class="scrollup">
			<img src="{{asset('public/frontend/images/arrow.png')}}" alt="">
		</div>
    </footer>
</div>
	  
<!-- Bootstrap core JavaScript -->
<script src="{{asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('public/frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('public/frontend/js/filter.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.appear.js')}}"></script>
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('public/frontend/js/script.js')}}"></script>
</body>
</html>