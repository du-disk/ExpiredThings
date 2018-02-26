@extends('frontend.layout.main')
@section('content')
	<div class="container">
		<div class="row top3">
			<div class="col s12 m6">
				<h4 class="header">Add Data Expired</h4>				
			</div>
			<div class="col s12 m6">
				<nav class="transparent">
				    <div class="nav-wrapper">
				      <div class="col s12">
				        <a href="{{route('add_data_expired')}}" class="breadcrumb light-blue-text lighten-1 right">Add Data Expired</a>
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
						<form action="{{route('saveAddExpired')}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="id" id="id">
							<div class="row">
								<div class="col m3 s12">
									<div class="frame">
									</div>
								</div>
								<div class="input-field col m4 s12">
									<input type="text" name="name" id="kode" class="validate" required="">
									<label for="kode">Name Product</label>
								</div>
								<div class="input-field col m4 s12">
									<input id="qty" type="number" name="qty" class="validate" required="">
									<label for="qty">Quantity</label>
								</div>
								<div class="input-field col m4 s12">
									<input type="date" name="ex_date" class="datepicker" required="">
								 	<label>Expired Date</label>
								</div>
								<div class="input-field col m4 s12">
									<input type="date" name="buy_date" class="datepicker" required="">
								 	<label>Buy Date</label>
								</div>
								<div class="input-field col m4 s12">
									<input id="location" type="text" name="location" class="validate" required="">
									<label for="location">Location</label>
								</div>
								<div class="input-field col m4 s12">
									<button class="btn right blue" type="submit" name="save"><i class="fa fa-save"></i> Save</button>
									<a class="btn red margin right" href="{{route('index')}}"><i class="fa fa-close"></i> Cancle</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection