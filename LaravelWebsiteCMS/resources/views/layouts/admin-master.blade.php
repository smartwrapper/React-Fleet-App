<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Admin | Dashboard</title>
	<meta name="description" content="Updates and statistics" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{csrf_token()}}" />
	<link href="{{asset('assets/css/style.css?v=1.0')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/api/pace/pace-theme-flat-top.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/api/datatable/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{asset('assets/images/misc/r.png')}}" />
</head>

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed ">
{{-- aside-minimize --}}
	  <div id="kundol-body" class="h-100">
	  <router-view></router-view>
	  </div>
	<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
	<script src="{{asset('assets/js/plugin.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/script.bundle.js')}}"></script>
</body>
</html>
