@extends('layouts.app')
@section('title')Portfolio @endsection
@section('content')		
@include('layouts/menu')	
@foreach ($dbBgimg as $dataBgimg)@endforeach
	<!-- full Title -->
	<div class="full-title" style="background-image: url('public/frontend/images/bg/{{$dataBgimg->portfolio_img}}')">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Portfolio</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{route('index')}}">Home</a>
					</li>
					<li class="breadcrumb-item active">Portfolio</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="portfolio-col">
		<div class="container">
			<div class="row">
				@foreach ($dbPortfolioPage as $data)
					<div class="col-lg-4 col-sm-6 portfolio-item">
						<div class="card h-100">
							<a class="hover-box" href="{{url('single_portfolio/'.$data->id.'/'.$data->category_id)}}">
								<div class="dot-full">
									<i class="fas fa-link"></i>
								</div>
								<img class="card-img-top" src="public/frontend/images/portfoliopage/{{$data->img}}" alt="" />
							</a>
							<div class="card-body">
								<h4><a href="{{url('single_portfolio/'.$data->id.'/'.$data->category_id)}}">{{$data->long_title}}</a></h4>
								<p>{{$data->category->name}}</p>
							</div>
						</div>
					</div>	
				@endforeach
			</div>
			<div class="d-flex justify-content-center">
				{{$dbPortfolioPage->links()}}
			</div>
		</div>
		<!-- /.container -->
	</div>
@endsection