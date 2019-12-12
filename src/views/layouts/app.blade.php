<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('SearchStyles/css/bootstrap.css')}}"> 
	<link rel="stylesheet" href="{{asset('SearchStyles/css/tabulator_bootstrap.css')}}">
</head>

<body>

	@yield('main')
	
	
	<script src="{{asset('SearchStyles/js/jquery-3.4.1.js')}}"></script>
	<script src="{{asset('SearchStyles/js/bootstrap.js')}}"></script>
	<script src="{{asset('SearchStyles/js/tabulator.js')}}"></script>
	@stack('jsCode')
	

</body>
</html>

   
   
