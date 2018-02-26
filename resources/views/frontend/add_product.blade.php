@extends('frontend.layout.main')
@section('content')
	<div class="container">
		<div class="row top3">
			<div class="col s12 m6">
				<h4 class="header">Add Product</h4>				
			</div>
			<div class="col s12 m6">
				<nav class="transparent">
				    <div class="nav-wrapper">
				      <div class="col s12">
				        <a href="{{route('add_product')}}" class="breadcrumb light-blue-text lighten-1 right">Add Product</a>
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
						<form action="{{route('save')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row">
								<div class="input-field col m3 s12">
									<div class="frame">
										<img id="uploadPreview" width="100%" height="100%">
									</div>
								</div>
								<div class="input-field col m9 s12">
									<input id="name" type="text" class="validate" name="nama">
									<label for="name">Name Product</label>
								</div>
								<div class="file-field input-field col m9 s12">
									<div class="btn blue">
										<span>File</span>
										<input type="file" name="foto" id="uploadImage" onchange="PreviewImage();"> 
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload files">
									</div>
								</div>
								<div class="input-field col m9 s12">
									<button class="btn right blue" type="submit" name="save_product"><i class="fa fa-save"></i> Save</button>
									<a class="btn  red margin right" href="{{route('index')}}"><i class="fa fa-close"></i> Cancle</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection