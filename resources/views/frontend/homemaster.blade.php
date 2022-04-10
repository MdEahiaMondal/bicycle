<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/form.css') }}" rel="stylesheet" type="text/css" media="all" />

    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
    <link href="{{ asset('frontend/css/nav.css') }}" rel="stylesheet" type="text/css" media="all" />



</head>

<body>
    @include('frontend.includes.homeheader')

    @yield('body')

    @include('frontend.includes.footer')
    <!---->
    <script src="{{ asset('frontend/js/jquery.easydropdown.js') }}"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!---- start-smoth-scrolling---->
</body>

</html>
