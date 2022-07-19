<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin VKU News</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/Backend/assets/images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('public/Backend/assets/plugins/wysihtml5/css/bootstrap-wysihtml5.css')}}">
    <link href="{{asset('public/Backend/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('public/Backend/js/modernizr-3.6.0.min.js')}}"></script>
</head>

<?php
  $name = Session::get('name_admin');
  $id = Session::get('id_admin');
?>

<body class="v-light vertical-nav fix-header fix-sidebar">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/></svg>
        </div>
    </div>
    <div id="main-wrapper">
        <!-- header -->
        <div class="header">
            <div class="nav-header">
                <div class="brand-logo"><a href="{{URL::to('/')}}"><b><img src="{{asset('public/Backend/assets/images/logo.png')}}" alt=""> </b></a>
                </div>
                <div class="nav-control">
                    <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
                    </div>
                </div>
            </div>
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
                        <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i></a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                       <?php
                                        if($name){
                                          echo '<li><a href=""><span>'.$name.'</span></a>';
                                          Session::put('message', null);
                                        }
                                       ?>
                                        <li><a href="{{URL::to('/logout')}}"><i class="icon-power"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #/ header -->
        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Main</li>
                    <li><a href="{{URL::to('/dashboard')}}"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                    </li>


                    <li class="nav-label">Features</li>
                    </li>
                    <li><a href="{{URL::to('/customer')}}"><i class="mdi mdi-account-multiple-check"></i> <span class="nav-text">Cutomers</span></a></li>
                    <li><a href="{{URL::to('/category')}}"><i class="mdi mdi-apps"></i> <span class="nav-text">Category</span></a></li>
                    <li><a href="{{URL::to('/posts')}}"><i class="mdi mdi-book"></i> <span class="nav-text">Posts</span></a>
                    <!-- <li><a href="{{URL::to('/a')}}"><i class="mdi mdi-comment"></i> <span class="nav-text">Comment</span></a> -->
                    </li>
                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->
        <!-- content body -->
        <div class="content-body">
            @yield('admin_content')
        </div>
        <!-- #/ content body -->
        <!-- footer -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; <a href="#">Thien</a> 2021</p>
            </div>
        </div>
        <!-- #/ footer -->
    </div>
    <script src="{{asset('public/Backend/assets/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('public/Backend/js/custom.min.js')}}"></script>
    <script src="{{asset('public/Backend/assets/plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="{{asset('public/Backend/js/dashboard-1.js')}}"></script>
    <script src="{{asset('public/Backend/assets/plugins/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/Backend/assets/plugins/validation/jquery.validate-init.js')}}"></script>
    <script src="{{asset('public/Backend/assets/plugins/wysihtml5/js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('public/Backend/assets/plugins/wysihtml5/js/bootstrap-wysihtml5.js')}}"></script>
    <script src="{{asset('public/Backend/assets/plugins/wysihtml5/js/wysihtml5-init.js')}}"></script>
</body>

</html>
