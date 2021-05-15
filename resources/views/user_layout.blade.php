<!DOCTYPE html>
<head>
<title>User-Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/frontend/css/style1.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/frontend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/png" href="https://chamsocmevabe.110.vn/files/default/1258/5555_PUo9z7s0.png"/>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/frontend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/frontend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/frontend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/frontend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('public/frontend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/frontend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/frontend/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('my-dashboard')}}" class="logo">
        Dashboard
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<!--Notifi-->

@yield('user_header')

<!--Notifi-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown"  href="#">
                <img alt="" src="{{asset('public/frontend/images/2.png')}}">
                <span class="username">
                    <?php
                        $hoten= Session::get('hoten');
                        if($hoten)
                        {
                            echo $hoten;
                        }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{URL::to('/quan-li-tai-khoan')}}"><i class=" fa fa-suitcase"></i>Thông tin cá nhân</a></li>
                <li><a href="{{URL::to('/doi-mat-khau')}}"><i class="fa fa-key"></i>Đổi mật khẩu</a></li>
                <li><a href="{{URL::to('/logout-user')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('my-dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Nhà của tôi</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/v1/user/form')}}" method="get">
                        <i class="fa fa-plus"></i>
                        <span> Đánh giá </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/v1/user/score')}}" method="get">
                        <i class="fa fa-users"></i>
                        <span> Kết quả đánh giá </span>
                    </a>
                </li>
                  @foreach($user as $key => $user_check) 
                <li class="sub-menu">
                    <a href="{{URL::to('/v1/user/'.$user_check->ma_user)}}" method="get">
                        <i class="fa fa-book"></i>
                        <span>Thông tin cá nhân</span>
                    </a>
                </li>
                @endforeach
                 <!-- Trần Hiếu code tại đây -->
                <li>
                    <a href="{{URL::to('/xem-tintuc')}}">
                        <i class="fa fa-bullhorn"></i>
                        <span>Tin tức</span>
                    </a>
                </li>
                <!-- end -->
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		@yield('user_content')
		<!-- //market-->	
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2020 DHHTTT13-IUH | Design by <a href="http://w3layouts.com">HIEU-HUY</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/frontend/js/scripts.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/frontend/js/jquery.scrollTo.js')}}"></script>
<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!-- morris JavaScript -->	
</body>
</html>
