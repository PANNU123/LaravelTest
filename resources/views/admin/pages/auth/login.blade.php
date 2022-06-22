<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>Login page | Writer Zet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

{{--toastr link--}}
<link rel="stylesheet" href="{{asset('backend/assets/css/admin/toastr.min.css')}}">

<script src="{{asset('backend/assets/js/admin/toastr.jquary.min.js')}}"></script>
<script src="{{asset('backend/assets/js/admin/toastr.min.js')}}"></script>

</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="" class="text-white router-link-active"><i
                            class="fas fa-home h2"></i></a></div>


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">

                                    <div class="text-center">
                                        <a href="">
                                            <img src="{{asset('backend')}}/assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Morvin.</p>
                                    </div>


                                    <form class="form-horizontal mt-4 pt-2" method="POST" action="{{ route('login.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter password" required>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('backend')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{asset('backend')}}/assets/js/app.js"></script>
    {{-- {!! Toastr::message() !!} --}}
</body>

</html>
