<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('frontend.layout.header')
</head>
<body>
	@include('frontend.layout.navbar')
	@yield('content')
	@include('frontend.layout.footer')
</body>
</html>