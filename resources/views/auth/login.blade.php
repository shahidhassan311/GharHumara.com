<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>Login v2</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLESHEETS -->
    <style type="text/css">
        [fuse-cloak],
        .fuse-cloak {
            display: none !important;
        }
    </style>
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/icons/fuse-icon-font/style.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/animate.css/animate.min.css">
    <!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/pnotify/pnotify.custom.min.css">
    <!-- Nvd3 - D3 Charts -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/nvd3/build/nv.d3.min.css" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/fuse-html/fuse-html.min.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/css/main.css">
    <!-- / STYLESHEETS -->

    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/mobile-detect/mobile-detect.min.js"></script>
    <!-- Perfect Scrollbar -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- Popper.js -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/popper.js/index.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/bootstrap/bootstrap.min.js"></script>
    <!-- Nvd3 - D3 Charts -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/d3/d3.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/nvd3/build/nv.d3.min.js"></script>
    <!-- Data tables -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/pnotify/pnotify.custom.min.js"></script>
    <!-- Fuse Html -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/main.js"></script>
    <!-- / JAVASCRIPT -->
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
<main>
    <div id="wrapper">
        <div class="content-wrapper">

            <div class="content custom-scrollbar">

                <div id="login-v2" class="row no-gutters">

                    <div class="intro col-12 col-md light-fg">

                        <div class="d-flex flex-column align-items-center align-items-md-start text-center text-md-left py-16 py-md-32 px-12">

                            <div class="logo bg-secondary mb-8">
                                <span>E</span>
                            </div>

                            <div class="title">
                                Welcome to the EVENTS!
                            </div>

                            <div class="description pt-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ullamcorper nisl erat, vel convallis elit fermentum pellentesque. Sed mollis velit facilisis facilisis viverra.
                            </div>

                        </div>
                    </div>

                    <div class="form-wrapper col-12 col-md-auto d-flex justify-content-center p-4 p-md-0">

                        <div class="form-content md-elevation-8 h-100 bg-white text-auto py-16 py-md-32 px-12">

                            <div class="title h5">User Log in to your account</div>

                            <div class="description mt-2">Sed mollis velit facilisis facilisis viverra</div>

                            <form name="loginForm" novalidate class="mt-8" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group mb-4{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"  id="loginFormInputEmail" aria-describedby="emailHelp" placeholder=" " required autofocus/>
                                    <label for="loginFormInputEmail">Email address</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group mb-4{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" id="loginFormInputPassword" placeholder="Password" name="password" required />
                                    <label for="loginFormInputPassword">Password</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                    <div class="form-check remember-me mb-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-label="Remember Me" name="remember" {{ old('remember') ? 'checked' : ''}}>
                                            <span class="checkbox-icon"></span>
                                            <span class="form-check-description">Remember Me</span>
                                        </label>
                                    </div>

                                    <a href="{{ url('/password/reset') }}" class="forgot-password text-secondary mb-4">Forgot Password?</a>

                                </div>

                                <button type="submit"  class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                                    LOG IN
                                </button>

                            </form>

                            <div class="separator">
                                <span class="text">OR</span>
                            </div>

                            <button type="submit" class="google btn btn-block btn-secondary my-2 mx-auto" aria-label="LOG IN">
                                    <span>
                                        <i class="icon-google-plus s-4"></i>
                                        <span>Log in with Google</span>
                                    </span>
                            </button>

                            <button type="submit" class="facebook btn btn-block btn-secondary my-2 mx-auto" aria-label="LOG IN">
                                    <span>
                                        <i class="icon-facebook s-4"></i>
                                        <span>Log in with Facebook</span>
                                    </span>
                            </button>

                            <div class="register d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                <span class="text mr-sm-2">Don't have an account?</span>
                                <a class="link text-secondary" href="pages-auth-register-v2.html">Create an account</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
</body>

</html>