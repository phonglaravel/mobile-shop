
<!DOCTYPE html>
<head>
@yield('title')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
@include('admin.layouts.style')
@stack('styles')
</head>
<body>
<section id="container">
<!--header start-->
@include('admin.layouts.nav')
<!--header end-->
<!--sidebar start-->
@include('admin.layouts.menu')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('content')
</section>
 
</section>
<!--main content end-->
</section>
@include('admin.layouts.script')
@stack('scripts')
</body>
</html>
