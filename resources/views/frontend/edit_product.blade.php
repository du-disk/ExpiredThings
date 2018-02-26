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
				        <a href="" class="breadcrumb light-blue-text lighten-1 right">@foreach($product as $a) {{$a->nama}}@endforeach</a>
				        <a href="" class="breadcrumb light-blue-text lighten-1 right">edit </a>
				        <a href="{{route('product')}}" class="breadcrumb light-blue-text lighten-1 right">Product</a>
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
						<form action="{{route('saveEdit')}}" method="POST" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row">
								@foreach($product as $show)
								<input type="hidden" name="id" value="{{$show->id}}">
								<div class="input-field col m3 s12">
									<div class="frame">
										<img id="uploadPreview" src="{{url('dist/img/')}}/{{$show->foto}}" width="100%" height="100%">
									</div>
								</div>
								<div class="input-field col m9 s12">
									<input id="name" type="text" class="validate" name="nama" value="{{$show->nama}}">
									<label for="name" class="active">Name Product</label>
								</div>
								<div class="file-field input-field col m9 s12">
									<div class="btn blue">
										<span>File</span>
										<input type="file" name="foto" id="uploadImage" onchange="PreviewImage();" value="{{$show->foto}}"> 
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" value="{{$show->foto}}" placeholder="Upload files">
									</div>
								</div>
								@endforeach
								<div class="input-field col m9 s12">
									<button class="btn right blue" type="submit" name="save_product"><i class="fa fa-save"></i> Save</button>
									<a class="btn  red margin right" href="{{route('product')}}"><i class="fa fa-close"></i> Back</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection