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
                        
                            @if (Auth::check()) 
                                <ul class="d-flex align-items-center flex-wrap">
                                    <li>
                                        Welcome, {{ Auth::user()->email }}
                                    </li>
                                    <li>
                                        Your Credit:  {{Auth::user()->api_key_limit}} 
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-primary btn-sm">Create New</a>
                                    </li>
                                    <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            @else
                                License API | Login
                            @endif
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
                    <div class="getapikey-div">
                        <h2>Get your API key</h2>
                        <p>here is your description</p>
                        <div class="apilogin-btn">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                Login / Register
                            </a>
                            <a href="#" class="btn telegram-btn">
                                <i class="fa fa-telegram"></i> Contact via Telegram
                            </a>
                        </div>
                    </div>
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
