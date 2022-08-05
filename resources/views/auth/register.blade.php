<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('dashboard')}}/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('dashboard')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/css/style.css" rel="stylesheet" type="text/css" />

         {{-- custom css code start here --}}
         <link href="{{asset('dashboard')}}/css/custom.css" rel="stylesheet" type="text/css" />
         {{-- custom css code end here --}}

        <script src="{{asset('dashboard')}}/js/modernizr.min.js"></script>

    </head>


    <body class="account-pages">

        <!-- Begin page -->
        <div class="wrapper-page account-page-full login_register_css">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="index.html" class="text-success">
                                    <span><img src="{{asset('dashboard')}}/images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="username">Full Name</label>
                                        <input name="name" class="form-control" type="text" id="name" value="{{ old('name') }}"  placeholder="Enter your name">
                                        @if($errors->has('name'))
                                            <div class="error text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input name="email" class="form-control" type="email" id="email" value="{{ old('email') }}" placeholder="Enter your email">
                                        @if($errors->has('email'))
                                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input name="password" class="form-control" type="password"  id="password" placeholder="Enter your password">
                                        @if($errors->has('password'))
                                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Confirm Password</label>
                                        <input name="password_confirmation" class="form-control" type="password"  id="password" placeholder="Enter your confirm password">
                                        @if($errors->has('password_confirmation'))
                                            <div class="error text-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">

                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                I accept <a href="#" class="text-custom">Terms and Conditions</a>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign Up</button>
                                    </div>
                                </div>

                            </form>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Already have an account?  <a href="{{route('login')}}" class="text-dark m-l-5"><b>Sign In</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright copyright_register_responsive">{{date('Y')}} &copy; {{env('APP_NAME')}}</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="{{asset('dashboard')}}/js/jquery.min.js"></script>
        <script src="{{asset('dashboard')}}/js/popper.min.js"></script>
        <script src="{{asset('dashboard')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('dashboard')}}/js/metisMenu.min.js"></script>
        <script src="{{asset('dashboard')}}/js/waves.js"></script>
        <script src="{{asset('dashboard')}}/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="{{asset('dashboard')}}/js/jquery.core.js"></script>
        <script src="{{asset('dashboard')}}/js/jquery.app.js"></script>

    </body>
</html>
