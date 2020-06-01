<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="video free download">
    <meta name="author" content="Ansonika">
    <title>Zoomers</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset("front_assets/img/favicon.png")}}" type="image/x-icon">
    <!-- BASE CSS -->
    <link href="{{asset("front_assets/css/base.css")}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <!-- Modernizr -->
    <script src="{{asset("front_assets/js/modernizr.js")}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('front_assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('front_assets/js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a>.</p>
<![endif]-->

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<!-- Header ================================================== -->
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3">
                <a href="/" id="logo">
                    <img src="{{asset("front_assets/img/logo.png")}}" width="95" height="27" alt="" data-retina="true"
                         class="logo_normal">
                    <img src="{{asset("front_assets/img/logo_sticky.png")}}" width="95" height="27" alt=""
                         data-retina="true" class="logo_sticky">
                </a>
            </div>
            <nav class="col-xs-9">
                @if(!Auth::check())
                <ul id="access_top">
                    <!--<li><a href="#" class="search-overlay-menu-btn"><i class="icon-search-6"></i></a>-->
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#login" class="hidden-xs">Login</a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#register" class="hidden-xs">Register now</a>
                    </li>
                </ul>
                @endif
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{asset("front_assets/img/logo.png")}}" width="95" height="27" alt="Lovefit"
                             data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/whats-new">What’s new</a></li>
                        <li><a href="/whats-hot">What’s hot</a></li>
                        <li><a href="/contact-us">Contact us</a></li>
                        @if(Auth::check())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="drop-down-item" href="/admin">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- End main-menu -->
            </nav>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</header>
<!-- End Header =============================================== -->
@yield('content')

<footer>
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-6">
                <p>
                    <img src="{{asset("front_assets/img/logo.png")}}" style="height: 95px; width: auto;" alt="ZOOMERS'"
                         data-retina="true">
                </p>

            </div>
            <div class="col-md-9 col-sm-6">
                <ul>
                    <li><a href="#">Home</a>
                    </li>
                    <li><a href="#">What’s new</a>
                    </li>
                    <li><a href="#">Login</a>
                    </li>
                    <li><a href="#">Register</a>
                    </li>
                    <li><a href="#">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</footer>
<!-- End footer -->
<div id="copy">
    <div class="container">
        © Zoomersbackgrounds 2020 - All rights reserved.
    </div>
</div>
<!-- End copy -->

<div id="toTop"></div>
<!-- Back to top button -->

<!-- Login modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="{{ route('login') }}" method="post" class="popup-form" id="myLogin">
                @csrf
                <input type="email" class="form-control form-white {{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" placeholder="User email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
                <input type="password"
                       class="form-control form-white {{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">Login</button>
                {{--<div class="form-group row">--}}
                    <a href="#" class="btn btn-submit" data-toggle="modal" data-target="#register" class="hidden-xs">Register now</a>
                {{--</div>--}}

            </form>

        </div>
    </div>
</div>

<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="{{ route('register') }}" method="post" class="popup-form" id="myRegister">
                @csrf
                <input type="text" class="form-control form-white {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                       value="{{ old('name') }}" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <input id="email" type="email" class="form-control form-white {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
                <input id="password" type="password" class="form-control form-white {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <input id="password-confirm" type="password" class="form-control form-white" name="password_confirmation" placeholder="confirm password" required>

                <div class="checkbox-holder text-left">
                    <div class="checkbox">
                        <input type="checkbox" value="accept_2" id="check_2" name="check_2"/>
                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit">Register Now</button>
            </form>
        </div>
    </div>
</div>

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><i class="icon_close"></i></span>
    <form role="search" id="searchform" method="get">
        <input value="" name="q" type="search" placeholder="Search..."/>
        <button type="submit"><i class="icon-search-6"></i>
        </button>
    </form>
</div>
<!-- End Search Menu -->

<!-- COMMON SCRIPTS -->
<script src="{{asset("front_assets/js/jquery-2.2.4.min.js")}}"></script>
<script src="{{asset("front_assets/js/common_scripts_min.js")}}"></script>
<script src="{{asset("front_assets/assets/validate.js")}}"></script>
<script src="{{asset("front_assets/js/functions.js")}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset("front_assets/js/bootstrap-portfilter.min.js")}}"></script>
<script src="{{asset("front_assets/js/video_header.js")}}"></script>
<script>
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
</script>
<script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
</body>

</html>