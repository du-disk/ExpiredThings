@extends('frontend.layout.main')
@section('content')
	<div class="fixed-action-btn horizontal">
	    <a class="btn-floating btn-large red" href="{{route('index')}}">
	      <i class="large material-icons">replay</i>
	    </a>
	</div>
	<div class="container">
		<div class="row top3">
			<div class="col s6 m6">
				<h4 class="header">Product</h4>				
			</div>
			<div class="col s6 m6">
				<nav class="transparent">
				    <div class="nav-wrapper">
				      <div class="col s12">
				        <a href="{{route('product')}}" class="breadcrumb light-blue-text lighten-1 right">Product</a>
				        <a href="{{route('index')}}" class="breadcrumb light-blue-text lighten-1 right">Home</a>
				      </div>
				    </div>
				</nav>
			</div>
		</div>
		<div class="row">
			@if(Session::get("message"))
				<div class="alert">{{Session::get("message")}}</div>
			@endif
			@foreach($product as $show)
				<div class="col m4 s12">
					<div class="card hoverable small">
			          	<div class="card-image">
				            <img src="{{url('dist/img/')}}/{{$show->foto}}">
				            <span class="card-title">{{$show->nama}}</span>
			          	</div>
			          	<div class="card-content">
		            	 	<div class="fixed-action-btn fix horizontal">
							    <a class="btn-floating btn-small red">
							      <i class="material-icons">menu</i>
							    </a>
							    <ul>
							      <li><a class="btn-floating red" href="{{url('product/delete/')}}/{{$show->id}}"><i class="material-icons">delete</i></a></li>
							      <li><a class="btn-floating blue" href="{{url('product/edit/')}}/{{$show->id}}"><i class="material-icons">edit</i></a></li>
							    </ul>
							</div>
			         	 </div>
			        </div>
				</div>
			@endforeach
		</div>
		<center>
			<ul class="actions pagination">
				{{ $product->links()}}
			</ul>
		</center>
	</div>
@endsection