@extends('layouts.app')
@section('title')Contact @endsection
@section('content')		
@include('layouts/menu')

@foreach($dbFooter as $data)@endforeach	
@foreach($dbTopbar as $db)@endforeach	
@foreach($dbBgimg as $dbBgimg)@endforeach	
	<!-- full Title -->
	<div class="full-title" style="background-image: url('public/frontend/images/bg/{{$dbBgimg->contact_img}}')">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Contact </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{route('index')}}">Home</a>
					</li>
					<li class="breadcrumb-item active">Contact</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="contact-main">
		<div class="container">
			<!-- Content Row -->
		  <div class="row">
			<!-- Map Column -->
				<div class="col-lg-8 mb-4 contact-left">
					<h3>Send us a Message</h3>
					<form name="sentMessage" id="contactForm" novalidate>
						<div class="control-group form-group">
							<div class="controls">
								<input type="text" placeholder="Full Name" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<input type="tel" placeholder="Phone Number" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<input type="email" placeholder="Email Address" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<textarea rows="5" cols="100" placeholder="Message" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
							</div>
						</div>
						<div id="success"></div>
						<!-- For success/fail messages -->
						<button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
					</form>
				</div>
				<!-- Contact Details Column -->
				<div class="col-lg-4 mb-4 contact-right">
					<h3>{{$data->title3}}</h3>
					<p><abbr title="Office"><i class="fas fa-home mr-2"></i></abbr>
						{{$data->office}}
					</p>
					<p>
						<abbr title="Phone"><i class="fas fa-phone fa-rotate-90 mr-2"></i></abbr>{{$db->phone}}
					</p>
					<p>
						<abbr title="Email"><i class="fas fa-envelope mr-2"></i></abbr>
						<a href="mailto:{{$data->email}}">{{$data->email}}</a>
					</p>
					<p>
						<abbr title="Hours"><i class="fas fa-calendar-alt mr-2"></i></abbr>{{$data->hours}}
					</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	
	<div class="map-main">
		<!-- Embedded Google Map -->
		<iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
	</div>
@endsection