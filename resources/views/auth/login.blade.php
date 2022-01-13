<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="zendash - Admin Dashboard HTML Template" name="description">
        <meta content="Spruko Technologies Private Limited" name="author">
        <meta name="keywords" content="admin, bootstrap admin template, bootstrap dashboard, dashboard, panel, simple dashboard html template, dashboard template bootstrap 4, simple admin panel template, bootstrap 4 admin dashboard, html css dashboard template, themeforest admin template, premium bootstrap template, admin panel html template, admin template design, dark admin template, admin dashboard ui, css admin template, cool admin template, nice admin template"/>

        <!-- Title -->
        <title>{{ config('site.site_title') }} - Login</title>

        <!--Favicon -->
        <link rel="icon" href="/backend/assets/images/brand/favicon.ico" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="/backend/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

        <!-- Style css -->
        <link href="/backend/assets/css/style.css" rel="stylesheet" />

        <!-- Dark css -->
        <link href="/backend/assets/css/dark.css" rel="stylesheet" />

        <!-- Skins css -->
        <link href="/backend/assets/css/skins.css" rel="stylesheet" />

        <!-- Animate css -->
        <link href="/backend/assets/css/animated.css" rel="stylesheet" />

        <!---Icons css-->
        <link href="/backend/assets/css/icons.css" rel="stylesheet" />

    </head>

    <body class="h-100vh page-style1">
        
        <!---Global-loader-->
        <div id="global-loader" >
            <img src="/backend/assets/images/svgs/loader.svg" alt="loader">
        </div>
        <!---/Global-loader-->

        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-md-7 col-lg-4">
                                    <div class="error-logo">
                                        <a href="{{ route('login') }}"><img src="/backend/assets/images/brand/note-01.png" class="header-brand-img dark-logo" alt="logo"></a>
                                    </div>
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="text-center  mb-6">
                                                <h2 class="mb-2">Login</h2>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                         <div class="input-group mb-4">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                        </div>
                                            <div class="input-group mb-4">
                                                <input  id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                            </div>

                       {{--  <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                </div>
                            </div>
                        </div> --}}
                                                 <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mb-0">
                                                        <label class="custom-control custom-checkbox mb-0">
                                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                                                            <span class="custom-control-label text-muted form-check-label" for="remember">{{ __('Remember Me') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-6 text-right mt-1">
                                                    <a href="forgot-password-1.html" class="text-muted">Forgot password?</a>
                                                </div> --}}
                                                <div class="col-12 mt-5">
                                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                                                </div>
                                            </div>
                                           {{--  <div class="text-center mt-7 mb-5">
                                                <div class="font-weight-normal fs-16 text-muted">You Don't have an account <a class="btn-link font-weight-normal" href="#">Register Here</a></div>
                                            </div> --}}

                       {{--  <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery js-->
        <script src="/backend/assets/js/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap4 js-->
        <script src="/backend/assets/plugins/bootstrap/popper.min.js"></script>
        <script src="/backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!--Othercharts js-->
        <script src="/backend/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

        <!-- Circle-progress js-->
        <script src="/backend/assets/js/circle-progress.min.js"></script>

        <!-- Loader js-->
        <script src="/backend/assets/js/loader.js"></script>

        <!-- Jquery-rating js-->
        <script src="/backend/assets/plugins/rating/jquery.rating-stars.js"></script>

    </body>
</html>
