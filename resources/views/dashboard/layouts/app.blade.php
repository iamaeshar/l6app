<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<title>Dashboard Template · Bootstrap 4</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<meta name="theme-color" content="#563d7c">

</head>

<body>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{ env('APP_NAME') }}</a>
		<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
							  document.getElementById('logout-form').submit();">Sign out</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<span data-feather="home"></span>
								Dashboard <span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('users.index') }}">
								<span data-feather="file"></span>
								Users
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('posts.index') }}">
								<span data-feather="shopping-cart"></span>
								Posts
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('roles.index') }}">
								<span data-feather="users"></span>
								Roles
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('pages.index') }}">
								<span data-feather="bar-chart-2"></span>
								Pages
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('categories.index') }}">
								<span data-feather="layers"></span>
								Categorories
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				@yield('content')
			</main>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>