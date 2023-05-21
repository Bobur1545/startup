<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Control panel</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{asset('admin/asset/images/fevicon.png')}}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('admin/asset/css/bootstrap.min.css')}}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{asset('admin/asset/style.css')}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('admin/asset/css/responsive.css')}}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{asset('admin/asset/css/colors.css')}}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{asset('admin/asset/css/bootstrap-select.css')}}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{asset('admin/asset/css/perfect-scrollbar.css')}}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('admin/asset/css/custom.css')}}" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{asset('admin/asset/images/logo/logo_icon.png')}}" alt="#" /></a>
                    </div>
                </div>

                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset('admin/asset/images/layout_img/person.png')}}" alt="#" /></div>
                        <div class="user_info">
                            <h6>{{auth()->user()->name}}</h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                            <li>
                                <a href="#">> <span>Users</span></a>
                            </li>
                            <li>
                                <a href="#">> <span>Referees</span></a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-clock-o orange_color"></i> <span>Add competiotions</span></a></li>

                    <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cog yellow_color"></i> <span>Control</span></a>
                        <ul class="collapse list-unstyled" id="element">
                            <li><a href="#">> <span>Control documents</span></a></li>
                            <li><a href="#">> <span>Control grades</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"> <i class="fa fa-diamond purple_color"></i>  <span>Add news</span></a></li>

                    <li><a href="#"><i class="fa fa-briefcase blue1_color"></i> <span>My documents</span></a></li>

                    <li><a href="#"><i class="fa fa-object-group blue2_color"></i> <span>Share documents</span></a></li>

                    <li><a href="#"><i class="fa fa-table purple_color2"></i> <span>Evaluation</span></a></li>

                    <li><a href="#"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>


                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>

                        <div class="right_topbar">
                            <div class="icon_info">
                                <ul>

                                    <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset('admin/asset/images/layout_img/person.png')}}" alt="#" /><span class="name_user">{{auth()->user()->name}}</span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="profile.html">My Profile</a>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="route('logout')"
                                                   onclick="event.preventDefault();   this.closest('form').submit();" class="dropdown-item">
                                                   <span>Log Out</span> <i class="fa fa-sign-out"></i>
                                                </a>
                                            </form>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end topbar -->






            @yield('content')








            <!-- footer -->
            <div class="container-fluid">
                <div class="footer">
                    <p>Created by Babajanov Boburbek</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- end dashboard inner -->
    </div>
</div>
</div>
<!-- jQuery -->
<script src="{{asset('admin/asset/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/asset/js/popper.min.js')}}"></script>
<script src="{{asset('admin/asset/js/bootstrap.min.js')}}"></script>
<!-- wow animation -->
<script src="{{asset('admin/asset/js/animate.js')}}"></script>
<!-- select country -->
<script src="{{asset('admin/asset/js/bootstrap-select.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('admin/asset/js/owl.carousel.js')}}"></script>
<!-- chart js -->
<script src="{{asset('admin/asset/js/Chart.min.js')}}"></script>
<script src="{{asset('admin/asset/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('admin/asset/js/utils.js')}}"></script>
<script src="{{asset('admin/asset/js/analyser.js')}}"></script>
<!-- nice scrollbar -->
<script src="{{asset('admin/asset/js/perfect-scrollbar.min.js')}}"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="{{asset('admin/asset/js/custom.js')}}"></script>
<script src="{{asset('admin/asset/js/chart_custom_style1.js')}}"></script>
</body>
</html>
