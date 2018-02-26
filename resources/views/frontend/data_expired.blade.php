@extends('frontend.layout.main')
@section('content')
	<div class="fixed-action-btn horizontal">
	    <a class="btn-floating btn-large red" href="{{route('index')}}">
	      <i class="large material-icons">replay</i>
	    </a>
	</div>
	<div class="container">
		<div class="row top3">
			<div class="col s12 m6">
				<h4 class="header">Data Expired</h4>				
			</div>
			<div class="col s12 m6">
				<nav class="transparent">
				    <div class="nav-wrapper">
				      <div class="col s12">
				        <a href="{{route('data_expired')}}" class="breadcrumb light-blue-text lighten-1 right">Data Expired</a>
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
			@foreach($ex_date as $show)
				<div class="col m4 s12">
					<div class="card hoverable small">
			          	<div class="card-image">
				            <img src="{{url('dist/img/')}}/{{$show->foto}}">
				            <span class="card-title">{{$show->nama}}</span>
			          	</div>
			          	<div class="card-content">
			          		<span class="blue-text">{{date('M d Y',strtotime($show->ex_date))}}</span>
			         		<div class="fixed-action-btn fix horizontal">
							    <a class="btn-floating btn-small red">
							      <i class="material-icons">menu</i>
							    </a>
							    <ul>
							      <li><a class="btn-floating red" href="{{url('data-expired/delete/')}}/{{$show->id}}"><i class="material-icons">delete</i></a></li>
							      <li><a class="btn-floating blue" href="{{url('data-expired/edit/')}}/{{$show->id}}"><i class="material-icons">edit</i></a></li>
							      <li><a class="btn-floating blue" href="{{url('data-expired/view/')}}/{{$show->id}}"><i class="material-icons">visibility</i></a></li>
							    </ul>
							</div>
			         	</div>
			        </div>
				</div>
		    @endforeach
		</div>
		<center>
			<ul class="actions pagination">
				{{ $ex_date->links()}}
			</ul>
		</center>
	</div>
@endsection