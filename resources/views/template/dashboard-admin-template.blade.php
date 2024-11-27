<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	 <!-- Include SweetAlert CSS -->
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
	  <!-- Include SweetAlert JavaScript -->
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
	<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<link rel="shortcut icon" href="{{ asset('img/logo/snapcheck logo.png') }}">
	<!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
	@notifyCss
    @vite('resources/css/app.css')
	
   
	<style>
		.notify {
    z-index: 9999; /* Pastikan z-index ini lebih tinggi dari elemen lainnya */
}
	</style>
	
	<title>Learnify</title>
</head>
<body>
	
	<!-- SIDEBAR -->
        @include('admin.layouts.sidebar-dashboard')
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
            @include('admin.layouts.navbar-dashboard')
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			@yield('content')
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	

	<!-- Additional Scripts -->
	@stack('scripts')
	


	<script src="{{ asset('js/dashboard.js') }}"></script>

		@if(session('error'))
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: '{{ session('error') }}',
			});
		</script>
	@endif

	@if(session('success'))
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Success',
				text: '{{ session('success') }}',
			});
		</script>
	@endif


	<x-notify::notify />
    @notifyJs
</body>
</html>