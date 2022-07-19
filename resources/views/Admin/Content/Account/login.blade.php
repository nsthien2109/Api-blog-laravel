<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Admin VKU news</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/Backend/assets/images/logo.png')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('public/Backend/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('public/Backend/js/modernizr-3.6.0.min.js')}}"></script>
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/></svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="{{asset('public/Backend/assets/images/logo.png')}}" width="30%" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center m-t-15">Log into Admin</h4>
                                <?php
                                  $message = Session::get('message');
                                  if($message){
                                    echo '<div class="text-center">
                                            <p class="m-t-30">'.$message.'</p>
                                          </div>';
                                    Session::put('message', null);
                                  }
                                ?>

                                <form class="m-t-30 m-b-30" action="{{URL::to('/admin-login')}}" method="post">
                                  @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email_admin"  class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password_admin" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="text-center m-b-15 m-t-15">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="m-t-30">Admin account don't have register
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="{{asset('public/Backend/assets/plugins/common/common.min.js')}}"></script>
    <!-- Custom script -->
    <script src="{{('public/Backend/js/custom.min.js')}}"></script>
</body>

</html>
