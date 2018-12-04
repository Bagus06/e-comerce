<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    		
	{{-- style --}}
	<link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css')}}">
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" href="{{ asset ('css/custom.css')}}">
	<link rel="stylesheet" href='{{asset('css/sweetalert2.min.css')}}' rel='shortcut icon'>
	<link href='{{asset('logo/dcnewif.png')}}' rel='shortcut icon'>
	@yield('styles')
</head>
<body>
	@include('partials.header')
	
	<div class="container-fluid">
		@yield('content')
	</div>

	{{-- script --}}
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="{{asset('js/sweetalert2.min.js')}}"></script>
	<script src="{{asset('js/custom.js')}}"></script>
	@include('flash-message')
	<script type="text/javascript">
		function tes(){
			alert('hhh');
		}

		function del() {
			swal({
			  title: 'Are you sure?',
			  text: "",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	location.href = '';
			  }
			});
		}
	</script>
	@yield('scripts')
</body>
</html>