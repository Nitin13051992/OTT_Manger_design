<!DOCTYPE html>
<html lang="en">

<head>
    <title>OTT Play</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/css/pageCustomaization.css')}}"> -->
</head>

<body>
    <section class="login_page bg-light">
        <div class="row">
            <div class="col-md-5 login_bg text-center">
                <img src="assets/images/logo-w.png" alt="OTT Play" />
            </div>
            <div class="col-md-7 d-flex align-items-center justify-content-center">
                <div class="login_box p-3">
                    <div class="card_loader">
                        <div class="loader-wrap d-flex flex-column align-items-center justify-content-center">
                            <div class="dt-loader sm">
                                <svg class="circular" viewBox="25 25 50 50">
                                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                                        stroke-miterlimit="10"></circle>
                                </svg>
                            </div>
                            <h6>Please wait...</h6>
                        </div>
                    </div>
                    <div class="text-center"><img src="assets/images/logo_icon.png" alt="OTT Play" /></div>
                    <h1 class="text-center font-36">Welcome</h1>
                    <br>
                    @yield('content')
                    <br>
                    <p class="font-16 text-center">Not registred yet? &nbsp;<a href="sign_up.html"
                            class="border-effect text-black font-w-600">Sign Up </a></p>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.not_icon .form-control').each(function(){
                var $ThisVlu = $(this)
                if($($ThisVlu).val() == ''){
                    $(this).siblings('.placeholder').addClass('txt_up')
                }
                else{
                    $(this).siblings('.placeholder').removeClass('txt_up')
                }
            })
        })
    </script>
</body>
</html>
