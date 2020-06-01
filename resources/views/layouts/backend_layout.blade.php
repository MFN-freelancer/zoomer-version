<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Zoomers Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/images/favicon.png")}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">
    <link href="{{asset("assets/plugins/datatables/css/jquery.dataTables.min.css")}}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
@php
    $user = Auth::user();
@endphp
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="/">
            <b><img src="{{asset("assets/images/logo.png")}}" style="height: 70px; width: auto;" alt=""></b>
            </a>
        </div>
        </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <div class="header-left">
                <ul>
                    <li class="icons position-relative"><a href="javascript:void(0)"><i class="icon-magnifier f-s-16"></i></a>
                        <div class="drop-down animated bounceInDown">
                            <div class="dropdown-content-body">
                                <div class="header-search" id="header-search">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-append"><span class="input-group-text"><i class="icon-magnifier"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <ul>
                    @auth
                    <li class="icons">
                        <a href="javascript:void(0)" class="log-user">
                            <img src="{{asset("assets/images/avatar/1.jpg")}}" alt=""> <span>{{Auth::user()->name}} </span>  <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                        </a>
                        <div class="drop-down dropdown-profile animated bounceInDown">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-power"></i> <span>Logout</span>
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
        Header end
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                @if($user->is_admin())
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/admin" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i><span class="nav-text"> Video Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="{{route("edit-delete")}}" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i> <span class="nav-text">Edit/Delete Videos</span></a>
                </li>
                <li><a class="has-arrow" href="{{route('user-manage')}}" aria-expanded="false">
                        <i class="mdi mdi-application"></i><span class="nav-text">Manage Users</span>
                    </a>
                </li>
                <li><a class="has-arrow" href="{{route('subscribe')}}" aria-expanded="false">
                        <i class="mdi mdi-application"></i><span class="nav-text">Newsletter</span>
                    </a>
                </li>
                @endif

                @if($user->is_user())
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="{{route('downloaded-video')}}" aria-expanded="false">
                        <i class="mdi mdi-chart-bar"></i> <span class="nav-text">View Downloaded Videos</span></a>
                </li>
                @endif
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="{{route('add-video')}}" aria-expanded="false">
                        <i class="mdi mdi-page-layout-body"></i><span class="nav-text">Add Videos</span>
                    </a>
                </li>
                <li><a class="has-arrow" href="{{route('change-password')}}" aria-expanded="false">
                        <i class="mdi mdi-ticket"></i><span class="nav-text">Change password</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
    @yield('content')

<!--**********************************
            Footer start
        ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed by <a href="#">M.F.N</a>, Developed by <a href="">M.F.N</a> 2020</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{asset("assets/plugins/common/common.min.js")}}"></script>
<script src="{{asset("assets/js/custom.min.js")}}"></script>
<script src="{{asset("assets/js/settings.js")}}"></script>
<script src="{{asset("assets/js/gleek.js")}}"></script>
<script src="{{asset("assets/js/styleSwitcher.js")}}"></script>
<script src="{{asset("assets/plugins/raphael/raphael.min.js")}}"></script>
<!-- <script src="../../assets/plugins/morris/morris.min.js"></script> -->
<script src="{{asset("assets/plugins/circle-progress/circle-progress.min.js")}}"></script>
<script src="{{asset("assets/plugins/chart.js/Chart.bundle.min.js")}}"></script>
<script src="{{asset("assets/plugins/datatables/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/js/plugins-init/datatables.init.js")}}"></script>
<!-- <script src="../js/dashboard/dashboard-19.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>