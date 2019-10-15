<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Klinik Pratama Jemursari Empat</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- SLIDER -->
    <link rel="stylesheet" type="text/css" href="{{ asset('engine1/style.css') }}" />
    <script type="text/javascript" src="{{ asset('engine1/jquery.js') }}"></script>


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medilife-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="h-100 d-md-flex justify-content-between align-items-center">
                            <p></p>
                            <p>Pusat Informasi : <span>(031) 8418414</span></p>
                            <p>Email : <span> klinikjemursari4@gmail.com</span> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="/"><img src="{{ asset('img/core-img/logoklinikjs4.png') }}" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                @if (Route::has('login'))
                        		@if (Auth::check())
                        		<!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ url('/') }}">Beranda <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('antrian') }}">Daftar Antrian Online</a>
                                        </li>                                       
                                        <li class="nav-item">
	                                	<a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out | {{ Auth::user()->username }}</a>
	                                	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                    	{{ csrf_field() }}
	                                	</form>
	                            		</li>
                                    </ul>
		                        @else
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ url('/') }}">Beranda <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('antrian') }}">Daftar Antrian Online</a>
                                        </li>
                                    </ul>
		                        	<!-- Appointment Button -->
                                    <ul>
                                        <li>
                                            <a href="{{ url('login') }}" class="btn medilife-appoint-btn ml-30">MASUK</a>
                                        </li>
                                    </ul>
                                </div>
		                        @endif
		                    @endif
                                    
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

  @yield('content')

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-100">
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-footer-content">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Klinik Pratama Jemursari Empat. All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                      </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('js/jquery/jquery-3.4.0.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>


 <!-- SLIDER -->
    <script type="text/javascript" src="{{ asset('engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('engine1/script.js') }}"></script>

    @yield('script')

</body>

</html>