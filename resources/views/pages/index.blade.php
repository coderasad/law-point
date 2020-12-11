@extends('layouts.app')
@section('title')Home @endsection
@section('content')		
@include('layouts/menu')
 	
	<header class="slider-main">
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators">
			@foreach($db as $data)
				@if ($b == 0)
					<li data-target="#carouselExampleIndicators" data-slide-to="{{$b}}" class="active"></li>
				<?php $b++ ?>
				@else
					<li data-target="#carouselExampleIndicators" data-slide-to="{{$b}}"></li>
					<?php $b++ ?>
				@endif					
			@endforeach
			</ol>
			<div class="carousel-inner" role="listbox">
				<!-- Slide One - Set the background image for this slide in the line below -->
				@foreach($db as $data)
				@if ($a == 1)
					<div class="carousel-item active" style="background-image: url('public/frontend/images/slider/{{$data->img}}')">
						<div class="carousel-caption d-none d-md-block">
							<h3>{{$data->title}}</h3>
							<p>{{$data->description}}</p>
						</div>
					</div>
					<?php $a++;?>
				@else
					<div class="carousel-item" style="background-image: url('public/frontend/images/slider/{{$data->img}}')">
						<div class="carousel-caption d-none d-md-block">
							<h3>{{$data->title}}</h3>
							<p>{{$data->description}}</p>
						</div>
					</div>
				@endif						
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</header>

	<!-- Page Content -->
	<div class="container">        
		<!-- About Section -->
		<div class="about-main">
			<div class="row">
			<div class="col-lg-6">				
				@foreach ($welcome as $data)
					<h2>{{$data->title}}</h2>	
					<p>{{$data->description}}</p>
					<h5>{{$data->sub_title}}</h5>	
					<ul>
						<li>{{$data->p1}}</li>
						<li>{{$data->p2}}</li>
						<li>{{$data->p3}}</li>                 
					</ul>			
				@endforeach				
			</div>
			<div class="col-lg-6">				
				@foreach ($welcome as $data)
					<img class="img-fluid rounded" src={{asset("public/frontend/images/welcome/{$data->img}")}} alt="" />
				@endforeach	
				
			</div>
			</div>
			<!-- /.row -->
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
								<img class="img-fluid" src={{asset("public/frontend/images/service/{$data->img}")}} alt="" />
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
		<!-- Portfolio Section -->
		<div class="portfolio-main">
			<h2>Our Portfolio</h2>
			<div class="col-lg-12">
				<div class="project-menu text-center">
					<button class="btn btn-primary active" data-filter="*">All</button>
					@foreach ($dbCategory as $data)
						<button data-filter=".{{$data->id}}" class="btn btn-primary">{{$data->name}}</button>
					@endforeach					
				</div>
			</div>
			<div id="projects" class="projects-main row">
				@foreach ($dbPortfolio as $data)
					<div class="col-lg-4 col-sm-6 pro-item portfolio-item {{$data->category_id}}">
						<div class="card h-100">
							<div class="card-img">
								<a href="public/frontend/images/portfoliopage/{{$data->img}}" data-fancybox="images">
								<img class="card-img-top" src={{asset("public/frontend/images/portfoliopage/{$data->img}")}} alt="" />
								<div class="overlay"><i class="fas fa-arrows-alt"></i></div>
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title">
								<a href="{{route('portfolios')}}">{{$data->short_title}}</a>
								</h4>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<!-- /.row -->
		</div>
	</div>	
@endsection