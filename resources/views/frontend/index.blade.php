@extends('frontend.layout.main')
@section('content')
	<div class="container">
		<div class="row top3">
			<div class="col s6">
				<h4 class="header">Dashboard</h4>				
			</div>
			<div class="col s6">
				<nav class="transparent">
				    <div class="nav-wrapper">
				      <div class="col s12">
				        <a href="#!" class="breadcrumb light-blue-text lighten-1 right">Home</a>
				      </div>
				    </div>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col m4 s12">
				<div class="card animated bounceInLeft">
					<div class="card-content height340">
						<div class="center">
							@foreach($product as $show)
								<img src="{{url('dist/img/')}}/{{$show->foto}}" class="wid">
							@endforeach
						</div>
					</div>
					<div class="card-heading center pad10 blue">
						<a href="{{route('product')}}" class="white-text">Product</a>
					</div>
				</div>
			</div>
			<div class="col m8 s12">
				<div class="card animated bounceInRight">
					<div class="card-content">
						<div class="centeer">
							@foreach($ex_date as $show)
								<div class="chip">
								    <img src="{{url('dist/img/')}}/{{$show->foto}}" alt="Contact Person">
								    {{$show->ex_date}}
								</div>
							@endforeach
						</div>
					</div>
					<div class="card-heading center pad10 blue">
						<a href="{{route('data_expired')}}" class="white-text">Data Expired</a>
					</div>
				</div>
			</div>
			<div class="col m4 s12 right">
				<div class="card animated bounceInUp">
					<div class="card-content">
						<i class="fa fa-plus fa-6"></i>
					</div>
					<div class="card-heading center pad10 blue">
						<a href="{{route('add_data_expired')}}" class="white-text">Add Data Expired</a>
					</div>
				</div>
			</div>
			<div class="col m4 s12 right">
				<div class="card animated bounceInDown">
					<div class="card-content">
						<i class="fa fa-plus fa-6"></i>
					</div>
					<div class="card-heading center pad10 blue">
						<a href="{{route('add_product')}}" class="white-text">Add Product</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection