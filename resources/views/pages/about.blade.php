@extends('layouts.app')
@section('title')About @endsection
@section('content')		
@include('layouts/menu')	

@php		
	$dbTeam = DB::table('teams')->where('status',1)->get();	
	$dbCustomer = DB::table('customers')->where('status',1)->get();	
@endphp
@foreach ($dbAbout as $dataAbout)@endforeach
@foreach ($dbMission as $dataMission)@endforeach
@foreach ($dbVission as $dataVision)@endforeach
@foreach ($dbBgimg as $dataBgimg)@endforeach
	<!-- full Title -->
	<div class="full-title" style="background-image: url('public/frontend/images/bg/{{$dataBgimg->about_img}}')">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> About Us</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{route('index')}}">Home</a>
					</li>
					<li class="breadcrumb-item active"> About Us </li>
				</ol>
			</div>
		</div>
	</div>

    <div class="container">
		<!-- About Content -->
		<div class="about-main">
			<div class="row">
				<div class="col-lg-6">
					<img class="img-fluid rounded mb-4" src="public/frontend/images/about/{{$dataAbout->img}}" alt="" />
				</div>
				<div class="col-lg-6">
					<h2>{{ $dataAbout->title}}</h2>
					{{-- <h2>{{ Str::substr($dataAbout->title, 0, -1) }}</h2> --}}
					<p>{{ $dataAbout->description}}</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	<div class="about-inner services-bar">
		<div class="container">
			<div class="row mb-4">
				<div class="col-lg-6">
					<div class="left-ab">
						<h3>{{ $dataMission->title}}</h3>
						<p>{{ $dataMission->description}}</p>
						<ul>
							<li>{{ $dataMission->p1}}</li>
							<li>{{ $dataMission->p2}}</li>
							<li>{{ $dataMission->p3}}</li>
							<li>{{ $dataMission->p4}}</li>
							<li>{{ $dataMission->p5}}</li>							
					  </ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="right-ab">
						<img class="img-fluid rounded mb-4" src="public/frontend/images/about/{{$dataMission->img}}" alt="" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="right-ab">
						<img class="img-fluid rounded mb-4" src="public/frontend/images/about/{{$dataVision->img}}" alt="" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="left-ab">
						<h3>{{$dataVision->title}}</h3>
						<p>{{$dataVision->description}}</p>
						<ul>
							<li>{{$dataVision->p1}}</li>
							<li>{{$dataVision->p2}}</li>
							<li>{{$dataVision->p3}}</li>
							<li>{{$dataVision->p4}}</li>
							<li>{{$dataVision->p5}}</li>						
					  	</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<!-- Team Members -->
		<div class="team-members-box">  
			<h2>Our Team</h2>
			<div class="row">
				<div class="col-lg-12">					
					<div id="team-slider" class="owl-carousel">
						@foreach ($dbTeam as $data)
							<div class="card h-100 text-center mr-3 mb-4">
								<div class="our-team">
									<img class="img-fluid" src="public/frontend/images/about/{{$data->img}}" alt="" />
									<div class="team-content">
										<h3 class="title">{{$data->name}}</h3>
										<span class="post">{{$data->title}}</span>
										<ul class="social">
											<li><a href="{{$data->fb_link}}"><i class="fab fa-facebook"></i></a></li>
											<li><a href="{{$data->tw_link}}"><i class="fab fa-twitter"></i></a></li>
											<li><a href="{{$data->in_link}}"><i class="fab fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach						
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	
	<div class="customers-box services-bar"> 
		<div class="container">
			<!-- Our Customers -->
			<h2>Our Customers</h2>
			<div class="row">
				<div class="col-lg-12">
					<div id="customers-slider" class="owl-carousel">
						@foreach ($dbCustomer as $data)							
							<div class="mb-4">
								<img class="img-fluid" src="public/frontend/images/about/{{$data->img}}" alt="" />
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>

@endsection