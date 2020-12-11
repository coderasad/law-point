@extends('layouts.app')
@section('title')Service @endsection
@section('content')		
@include('layouts/menu')	
@php
	$dbService = DB::table('services')->where('status',1)->limit(8)->orderByRaw('title asc')->get();
	$dbCustomer = DB::table('customers')->where('status',1)->get();	
@endphp
@foreach ($dbBgimg as $dataBgimg)@endforeach

	<!-- full Title -->
	<div class="full-title" style="background-image: url('public/frontend/images/bg/{{$dataBgimg->service_img}}')">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">Services</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{route('index')}}">Home</a>
					</li>
					<li class="breadcrumb-item active">Services</li>
				</ol>
			</div>
		</div>
	</div>
	
    
	<div class="services-bar">
		<div class="container">
			<h1 class="py-4">Our Best Services </h1>
			<!-- Services Section -->
			<div class="row">
				@foreach ($dbService as $data)
					<div class="col-lg-4 mb-4">
						<div class="card h-100">
							<div class="card-img">
								<img class="img-fluid" src="public/frontend/images/service/{{$data->img}}" alt="" />
							</div>
							<div class="card-body">
								<h4 class="card-header">{{$data->title}}</h4>
								<p class="card-text">{{$data->description}}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<!-- /.row -->
		</div>
	</div>
	
	<div class="container">
		<!-- Our Customers -->
		<div class="customers-box"> 
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
    </div>
    <!-- /.container -->

@endsection