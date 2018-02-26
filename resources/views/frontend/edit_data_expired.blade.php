@extends('frontend.layout.main')
@section('content')
	<div class="container">
		<div class="row top3">
			<div class="col s12 m6">
				<h4 class="header">{{$cek}} Data Expired</h4>				
			</div>
			<div class="col s12 m6">
				<nav class="transparent">
				    <div class="nav-wrapper">
				      <div class="col s12">
				        <a href="" class="breadcrumb light-blue-text lighten-1 right">@foreach($ex_date as $d) {{$d->nama}}@endforeach</a>
				        <a href="" class="breadcrumb light-blue-text lighten-1 right">{{$cek}}</a>
				        <a href="{{route('data_expired')}}" class="breadcrumb light-blue-text lighten-1 right">Data Expired</a>
				        <a href="{{route('index')}}" class="breadcrumb light-blue-text lighten-1 right">Home</a>
				      </div>
				    </div>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col m12 s12">
				@if(Session::get("message"))
				<div class="alert">{{Session::get("message")}}</div>
			@endif
				<div class="card animated bounceInLeft">
					<div class="card-content">					
						<form action="{{route('saveEditExpired')}}" method="POST">
							{{csrf_field()}}
							<div class="row">
								@foreach($ex_date as $show)
								<input type="hidden" name="id" value="{{$show->id}}">
								<div class="col m3 s12">
									<div class="frame">
										<img src="{{url('dist/img/')}}/{{$show->foto}}" width="100%">
									</div>
								</div>
								<div class="input-field col m4 s12">
									<input id="name" type="text" name="name" value="{{$show->nama}}" @if($cek=="view")readonly="" @endif>
									<label class="active" for="name">Name Product</label>
								</div>
								<div class="input-field col m4 s12">
									<input id="qty" type="number" name="qty" value="{{$show->qty}}" @if($cek=="view") readonly="" @endif>
									<label class="active" for="qty">Quantity</label>
								</div>
								<div class="input-field col m4 s12">
									<input type="date" name="ex_date" class="datepicker" value="{{$show->ex_date}}" @if($cek=="view") disabled="" @endif">
								 	<label class="active ">Expired Date</label>
								</div>
								<div class="input-field col m4 s12 ">
									<input type="date" name="buy_date" class="datepicker" value="{{$show->buy_date}}" @if($cek=="view") disabled="" @endif>
								 	<label class="active">Buy Date</label>
								</div>
								<div class="input-field col m4 s12">
									<input id="location" type="text" name="location" value="{{$show->location}}" @if($cek=="view") readonly="" @endif>
									<label class="active" for="location">Location</label>
								</div>
								@endforeach
								<div class="input-field col m4 s12">
									@if($cek=="view")
									<a class="btn blue right" href="{{url('/data-expired/edit/')}}/{{$id}}"><i class="fa fa-edit"></i> Edit</a>
									@elseif($cek=="edit")
									<button class="btn right blue" type="submit" name="save"><i class="fa fa-save"></i> Save</button>
									@endif
									<a class="btn red margin right" href="{{route('data_expired')}}"><i class="fa fa-close"></i> Back</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection