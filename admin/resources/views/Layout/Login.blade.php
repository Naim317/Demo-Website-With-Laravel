

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>

<link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.8.2/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
	<link rel="stylesheet" href="{{asset('css/customLogin.css')}}">
	
</head>

<body>

@yield('content')


<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript"  src="{{asset('js/mdb.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"> </script>
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<script src="{{asset('js/sticky-kit.min.js')}}"></script>
<script src="{{asset('js/custom.min-2.js')}}"> </script>
<script src="{{asset('js/datatables.min.js')}}"> </script>
<script src="{{asset('js/datatables-select.min.js')}}"> </script>
<script src="{{asset('js/custom.js')}}"> </script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>

@yield('script')
</body>


</html>