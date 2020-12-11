@extends('layouts.app')
@section('title')Single Portfolio @endsection
@section('content')		
@include('layouts.menu')

@foreach ($dbBgimg as $dataBgimg)@endforeach

	<!-- full Title -->
	<div class="full-title" style="background-image: url('../../public/frontend/images/bg/{{$dataBgimg->about_img}}')">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Portfolio Item </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{route('index')}}">Home</a>
					</li>
					<li class="breadcrumb-item active">Portfolio Item</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="item-pro">
		<div class="container">
			<!-- Portfolio Item Row -->
			<div class="row">
				<div class="col-md-8">
					<img class="img-fluid" src={{asset("public/frontend/images/portfoliopage/{$dbSinglePortfolio->img}")}} alt="" />
				</div>
				<div class="col-md-4">
					<h3 class="my-3">{{$dbSinglePortfolio->long_title}}</h3>
					<p>{{$dbSinglePortfolio->short_description}}</p>
					<h3 class="my-3">Project info</h3>
					<ul>
						<li><span>Project Name :</span><span>{{$dbSinglePortfolio->short_title}}</span></li>
						<li><span>Category :</span><span>{{$dbSinglePortfolio->category->name}}</span></li>
						<li><span>Client :</span><span>{{$dbSinglePortfolio->client}}</span></li>
						<li><span>Website :</span><span>{{$dbSinglePortfolio->website}}</span></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p class="mt-3">{{$dbSinglePortfolio->description1}}</p>
					<p class="mt-3">{{$dbSinglePortfolio->description2}}</p>
				</div>
			</div>
			
			<!-- /.row -->
			<div class="related-projects">
				<!-- Related Projects Row -->
				<h3>Related Projects</h3>
				<div class="row">
					@foreach ($dbAllPortfolio as $data)
						<div class="col-md-3 col-sm-6 mb-4">
							<a href="{{url('single_portfolio/'.$data->id.'/'.$data->category_id)}}">
								<img class="img-fluid" src={{asset("public/frontend/images/portfoliopage/{$data->img}")}} alt="" />
							</a>
						</div>
					@endforeach
				</div>
				<!-- /.row -->
			</div>
		</div>
		<!-- /.container -->
	</div>
@endsection