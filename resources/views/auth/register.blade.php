<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>VanTrack - School Van Fleet Tracking Management System</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('homepage/img/web-icon.png') }}">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('homepage/img/web-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('homepage/img/web-icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('homepage/img/web-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('homepage/img/web-icon.png') }}">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../../assets/js/config.js"></script>
    <script src="../../../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../../../vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../../../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../../../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../../../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row min-vh-100 bg-100">
                <div class="col-6 d-none d-lg-block position-relative">
                    <div class="bg-holder" style="background-image:url(../../../homepage/img/carousel-2.jpeg);">
                    </div>
                    <!--/.bg-holder-->

                </div>
                <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-9 col-xl-8 col-xxl-6">
                            <div class="card">
                                <div class="card-header bg-circle-shape bg-shape text-center p-2"><a
                                        class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light"
                                        href="/">VanTrack</a></div>
                                <div class="card-body p-4">
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h3>Register</h3>
                                        </div>
                                        <div class="col-auto fs--1 text-600"><span class="mb-0 fw-semi-bold">Already
                                                User?</span> <span><a href="/login">Login</a></span>
                                        </div>
                                    </div>

                                    <x-validation-errors class="" />

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="split-name">Name</label>
                                            <input class="form-control" type="text" autocomplete="on" id="split-name"
                                                name="name" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="split-email">Email address</label>
                                            <input class="form-control" type="email" autocomplete="on"
                                                id="split-email" name="email" />
                                        </div>
                                        <div class="row gx-2">
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label" for="split-password">Password</label>
                                                <input class="form-control" type="password" autocomplete="on"
                                                    id="split-password" name="password" />
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label" for="split-confirm-password">Confirm
                                                    Password</label>
                                                <input class="form-control" type="password" autocomplete="on"
                                                    id="split-confirm-password" name="password_confirmation" />
                                            </div>
                                        </div>
                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="cover-register-checkbox" />
                                            <label class="form-label" for="cover-register-checkbox">I accept the <a
                                                    href="#!">terms </a>and <a href="#!">privacy
                                                    policy</a></label>  
                                        </div> --}}
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                name="submit">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../../../vendors/popper/popper.min.js"></script>
    <script src="../../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../../vendors/is/is.min.js"></script>
    <script src="../../../vendors/fontawesome/all.min.js"></script>
    <script src="../../../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../../../vendors/list.js/list.min.js"></script>
    <script src="../../../assets/js/theme.js"></script>

</body>

</html>
