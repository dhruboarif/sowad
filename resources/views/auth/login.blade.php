<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:title" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:description" content="Zenix - Crypto Admin Dashboard">
	<meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
    <title>Sowad.net</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('custom/images/favicon.png')}}">
	<link href="{{asset('custom/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('custom/css/style.css')}}" rel="stylesheet">

</head>
        <div id="video-background">
         <!--Video Library -->
        <!--<img src="{{asset('app-assets/images/networking.jpeg')}}">-->
    </div>
<body class="vh-100 bg">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<img src="{{asset('storage/Logo/'.basic_settings()[0]->image)}}" style="width: 152px;" alt="">
									</div>
                                    <h4 class="text-center text-white mb-4">Sign in your account</h4>
                                    @if(Session::has('user_blocked'))
                                  <div class="alert alert-danger" role="alert">

                                      <div class="alert-body">
                                          {{Session::get('user_blocked')}}
                                      </div>
                                  </div>
                                  @endif
                                    <form action="{{ route('login') }}" method="POST">
                                      @csrf
                                        <div class="form-group text-white">
                                            <label class="mb-1"><strong>UserName</strong></label>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" :value="old('user_name')" required autofocus  aria-describedby="login-email" tabindex="1" autofocus />
                                              @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" tabindex="2"  aria-describedby="login-password" />
                                          
                                              @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                              @if (Route::has('password.request'))
                                              <a class="text-right" href="{{ route('password.request') }}">
                                                  <small>Forgot Password?</small>
                                              </a>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{route('register')}}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('custom/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('custom/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('custom/js/custom.min.js')}}"></script>
	<script src="{{asset('custom/js/deznav-init.js')}}"></script>
    <script src="{{asset('custom/js/demo.js')}}"></script>
    <script src="{{asset('custom/js/styleSwitcher.js')}}"></script>
</body>
</html>
