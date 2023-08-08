<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Auth::user()->name }}-DashBoard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- <link rel="stylesheet" href="assets/css/jquery-ui.css"> -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/pageCustomization/range-slider.css">
    <link rel="stylesheet" href="assets/css/pageCustomization/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/pageCustomization/bootstrap-colorpicker.css"/>
    <link rel="stylesheet" href="assets/css/pageCustomaization.css">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <style type="text/css">
        /* priority sorting */


    </style>
    @stack('style')
</head>

<body>
    <section class="bg-light vh-100 overflow-hidden ovrflw-wppr ">
        <div class="ovrly-pop"></div>
        <!-- <div class="container-fluid"> -->
            <div class="row h-100">
                <div class="col-md-2 bg-white py-4 h-100">
                    @include('layouts.sidebar')
                </div>
                <div class="col-md-10 px-2 h-100 overflow-auto">
                    @yield('content')
                </div>
            </div>
        <!-- </div> -->
    </section>

    @stack('script')
    <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.1.0/resumable.min.js"></script> -->
    <script src="{{asset('assets/js/pageCustomization/range-slider.js')}}"></script>
    <script src = "{{asset('assets/js/pageCustomization/bootstrap-colorpicker.min.js')}}" > </script>
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/pageCustomization/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/pageCustomization/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/pageCustomization/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/pageCustomization/pageCustomaization.js')}}"></script>
    <script>
        /*js comment*/
        var api_url = "{{ config('global.api_url') }}";
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $(document).ready(function() {
            $('.prnt_cls').parent('.cursor').on('click', function() {
                $(this).parent('li').siblings().find('.cursor').removeClass('act');
                $(this).parent('li').siblings().find('.submenu').slideUp('slow');
                $(this).addClass('act');
                $(this).siblings('.submenu').slideDown('slow')
            });
            menuLoadOpn()
        })
        function menuLoadOpn(){
            $('.menuID').each(function(){
                var menuid = $(this).data('menu');
                var icon = $(this).data('icon');
                if($(this).hasClass('act')){
                    // $(this).parents('li').siblings().find('.prnt_cls').removeClass('act');
                    $(this).parents('li').find('.prnt_cls').parent('.cursor').addClass('act');
                    $(this).parents('.submenu').slideDown('slow');
                }
            });
        }

        $(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    // $('#fileupload').fileupload({
    //     // Uncomment the following to send cross-domain cookies:
    //     //xhrFields: {withCredentials: true},
    //     url: '{{route("media_file_upload")}}'
    // });

    // Enable iframe cross-domain access via redirect option:
    // $('#fileupload').fileupload(
    //     'option',
    //     'redirect',
    //     window.location.href.replace(
    //         /\/[^\/]*$/,
    //         '/cors/result.html?%s'
    //     )
    // );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        // $('#fileupload').fileupload('option', {
        //     url: '//jquery-file-upload.appspot.com/',
        //     // Enable image resizing, except for Android and Opera,
        //     // which actually support image resizing, but fail to
        //     // send Blob objects via XHR requests:
        //     disableImageResize: /Android(?!.*Chrome)|Opera/
        //         .test(window.navigator.userAgent),
        //     maxFileSize: 999000,
        //     acceptFileTypes: /(\.|\/)(gif|png)$/i
        // });
        // // Upload server status check for browsers with CORS support:
        // if ($.support.cors) {
        //     $.ajax({
        //         url: '//jquery-file-upload.appspot.com/',
        //         type: 'HEAD'
        //     }).fail(function () {
        //         $('<div class="alert alert-danger"/>')
        //             .text('Upload server currently unavailable - ' +
        //                     new Date())
        //             .appendTo('#fileupload');
        //     });
        // }
    } else {
        // Load existing files:
        // $('#fileupload').addClass('fileupload-processing');

        // $.ajax({
        //     // Uncomment the following to send cross-domain cookies:
        //     //xhrFields: {withCredentials: true},
        //     url: $('#fileupload').fileupload('option', 'url'),
        //     dataType: 'json',
        //     context: $('#fileupload')[0]
        // }).always(function () {
        //     $(this).removeClass('fileupload-processing');
        // }).done(function (result) {
        //     $(this).fileupload('option', 'done')
        //         .call(this, $.Event('done'), {result: result});
        // });
    }

});
    </script>
</body>
</html>
