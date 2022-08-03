<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<!-- Font Awesome CSS -->
    <link rel='stylesheet' type="text/css" href='{{ asset("css/font-awesome.min.css")   }}' />	
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' type="text/css" href='{{ asset("css/bootstrap.min.css") }}'  />    
    <!-- Custom css -->
    <link href="{{ asset('css/custom-style.css')}}" type="text/css" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="page-wrapper">
        <!-- Header -->
        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-title">
						@auth("admin")
					
							<ul class="d-flex align-items-center flex-wrap">
                           		<li>
									<a href="{{ route('users.index') }}"><i class="fa fa-trophy" aria-hidden="true"></i></a>
								</li>
								<li>
									<a href="{{ route('activitylogs.index') }}">API Logs</a>
								</li>
								<li>
									<a href="{{ route('invitecodes.index') }}">Invite Codes</a>
								</li>
								<li>
									<a href="{{ route('settings.index') }}">Site Settings</a>
								</li>
								<li>
									<a href="{{ route('adminLogout') }}">Logout</a>
								</li>
                            </ul>
						@else
						License Api Admin | Login
                        @endauth

                        </div>
                    </div>
                </div>
            </div>
        </header>
       	<!-- Comman Section -->
		<section class="defult-wrap-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                             @yield('content')
                        </div>
					</div>
				</div>
			</div>
		</section>
		<!-- Comman Section End -->
		<!-- Footer -->
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyright-footer">
							<p>License API</p>
							<p>&copy 2022</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer End -->
</body>
</html>
