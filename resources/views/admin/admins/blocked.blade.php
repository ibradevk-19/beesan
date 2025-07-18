<!doctype html>
<html lang="ar" dir="rtl">

    <head>

        <meta charset="utf-8" />
        <title>Blocked</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="">
        <div class="my-5 pt-5">
            <!-- error page content -->
            <div class="w-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="text-center">
                                <div>
                                    <h1 class="display-2 error-text fw-bold">403</h1>
                                </div>
                                <div>
                                    <h4 class="text-uppercase mt-4">لقد تم إيقاف حسابك من طرف المسؤول مؤقتاً يرجى المحاولة فيما بعد</h4>
                                    {{-- <p>يرجى التواصل</p> --}}
                                    <div class="mt-4">
                                        <a href="{{route('login.get')}}" class="btn btn-primary"><i class="ri-arrow-left-line align-bottom me-2"></i>الرجوع إلى صفحة تسجيل الدخول</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- error auth page content -->

        </div>
        <!-- end error page -->

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <script src="/assets/js/app.js"></script>

    </body>
</html>
