<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{csrf_token()}}">
	{{-- <title>{{config('app.name', 'Support Ticket System')}}</title> --}}
	<title>@yield('title', 'Support Ticket System')</title>
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app" class="d-flex h-screen justify-content-between flex-column">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{url('/')}}">
					{{ config('app.name', 'Support Ticket System')}}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{url('/')}}" title="">HOME</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/about')}}" title="">ABOUT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/contact')}}" title="">CONTACT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/tickets')}}" title="">TICKETS</a>
						</li>
						{{-- <li class="nav-item">
							<form class="form-inline">
								<input class="form-control mr-sm-2" type="search" name="search_product" placeholder="Search a product" aria-label="Search">
								<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
							</form></li>
							<li class="nav-item pl-2"></li>
							<li class="nav-item">
								<form class="form-inline my-2 my-sm-0" id="searching" action="" method="post">
									<input type="search" class="form-control mr-sm-2" name="search_state" id="inputState" placeholder="Enter a state">
									<select id="inputCategory" class="form-control mr-sm-2">
										<option selected>Category</option>
										<option>...</option>
									</select>
									<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
								</form>
							</li> --}}
						</ul>
						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Authentication Links -->
							@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
							</li>
							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
							</li>
							@endif
							@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
							@endguest
						</ul>
					</div>
				</div>
			</nav>
			<main class="py-4">
				@yield('content')
			</main>
			<footer class="bg-white text-center text-black-50 py-3 shadow">
			{{config('app.name')}} | Copyright @ {{date('Y')}}
			</footer>
	</div>
		<!-- Scripts -->
		<script src="{{asset('js/app.js')}}" defer></script>
		{{-- <script type="text/javascript" charset="utf-8" async>
			$(document).ready(function(){
				$('#inputState').keyup(function(){
					.preventDefault();
					var data;
					var states = $(this).val();
					if (states !== ''){
						var _token = $('input[name="_token"]').val();
						$.ajax({
							url:$('#searching').attr('action'),
							method:"POST",
							data:{states:states,_token:_token},
							dataType: "json"
						})
						.done(function (response) {
							if (response.success) {
							swal({
							title: "Hi " + response.name,
							text: response.success,
							timer: 2000,
							showConfirmButton: false,
							type: "success"
							});
							window.location.replace(response.url);
							} else {
							swal("Oops!", response.errors, 'error');
							}
							})
						.fail(function () {
							swal("Fail!", "Cannot register now!", 'error');
							});
					}
				});
			});
		</script> --}}
	</body>
</html>