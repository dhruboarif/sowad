<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="StartBNS - Forex and Crypto Asset Management">
    <meta name="keywords" content="StartBNS - Forex and Crypto Asset Management">
    <meta name="author" content="StartBNS - Forex and Crypto Asset Management">
    <title>Nagatrade - Forex and Crypto Asset Management</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('custom/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('custom/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('custom/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('custom/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('custom/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('custom/css/style.css')}}" rel="stylesheet">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body >
    <!-- BEGIN: Content-->
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
                        <!-- Login v1 -->
                        <div class="d-flex justify-content-center" >
                          <div class="col-md-4">

                          </div>
                          <div class="col-md-4">
                            <div class="card mb-0 mt-5" style="background:black;">

                                <div class="card-body">
                                    <a href="javascript:void(0);" class="d-flex justify-content-center">
                                      <img
                                        src="{{asset('storage/Logo/'.basic_settings()[0]->image)}}"
                                        alt="image"
                                        height="45"
                                        width="180"

                                      />
                                    </a>

                                    <h4 class="card-title mb-1 text-center mt-2">Welcome to Nagatrade</h4>
                                    @if(Session::has('user_blocked'))
                                  <div class="alert alert-danger" role="alert">

                                      <div class="alert-body">
                                          {{Session::get('user_blocked')}}
                                      </div>
                                  </div>
                                  @endif


                                    <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST" >
                                      @csrf

                                         <div class="form-group">
                                            <label for="login-email" class="form-label" value="{{ __('user_name') }}">UserName</label>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" :value="old('user_name')" required autofocus  aria-describedby="login-email" tabindex="1" autofocus />
                                              @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label for="login-password" value="{{ __('Password') }}">Password</label>

                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" tabindex="2"  aria-describedby="login-password" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                </div>
                                                  @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <!-- <input class="custom-control-input" type="checkbox" id="remember_me" name="remember" tabindex="3" />
                                                <label class="custom-control-label" for="remember-me"> Remember Me </label> -->

                                                  <div class="container">
                                              <div class="row">
                                                  <div class="col-md-12 text-right">
                                                    @if (Route::has('password.request'))
                                                    <a class="text-right" href="{{ route('password.request') }}">
                                                        <small>Forgot Password?</small>
                                                    </a>
                                                      @endif

                                                  </div>
                                              </div>
                                                </div>



                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                                    </form>

                                   <p class="text-center mt-2">
                                        <span>New on our platform?</span>
                                        <a href="{{route('register')}}">
                                            <span>Create an account</span>
                                        </a>
                                    </p>

                                  <!--  <div class="divider my-2">
                                        <div class="divider-text">or</div>
                                    </div>-->

                                  <!--  <div class="auth-footer-btn d-flex justify-content-center">
                                        <a href="javascript:void(0)" class="btn btn-facebook">
                                            <i data-feather="facebook"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-twitter white">
                                            <i data-feather="twitter"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-google">
                                            <i data-feather="mail"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-github">
                                            <i data-feather="github"></i>
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                          </div>
                          <div class="col-md-4">

                          </div>
                        </div>


                          </div>
                        <!-- /Login v1 -->


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{asset('custom/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('custom/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('custom/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{asset('custom/vendor/peity/jquery.peity.min.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{asset('custom/vendor/apexchart/apexchart.js')}}"></script>


    <!-- Dashboard 1 -->
    <script src="{{asset('custom/js/dashboard/my-wallet.js')}}"></script>
    <script src="{{asset('custom/vendor/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('custom/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('custom/js/custom.min.js')}}"></script>
    <script src="{{asset('custom/js/deznav-init.js')}}"></script>
    <script src="{{asset('custom/js/demo.js')}}"></script>
    <script src="{{asset('custom/js/styleSwitcher.js')}}"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('app-assets/js/custom.js')}}"></script>
</body>
<!-- END: Body-->

</html>
