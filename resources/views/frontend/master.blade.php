<!DOCTYPE html>
<html>

<head>
    <title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Bicycles :: w3layouts</title>
    <link href="{{ asset('/') }}frontend/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/') }}frontend/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('/') }}frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/') }}frontend/css/form.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
    <!--webfont-->
    <!-- dropdown -->
    <script src="{{ asset('/') }}frontend/js/jquery.easydropdown.js"></script>
    <link href="{{ asset('/') }}frontend/css/nav.css" rel="stylesheet" type="text/css" media="all" />
    <script src="{{ asset('/') }}frontend/js/scripts.js" type="text/javascript"></script>
    <!--js-->

</head>

<body>
    <!--banner-->
    <script src="{{ asset('/') }}frontend/js/responsiveslides.min.js"></script>
    <script>
        $(function() {
            $("#slider").responsiveSlides({
                auto: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>

    @include('frontend.includes.header')
    <!--/banner-->

    </div>
    @yield('body')
    <!---->

    @include('frontend.includes.footer')
    <!---->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session('success') }}");
        @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.error("{{ session('error') }}");
        @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.info("{{ session('info') }}");
        @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    @stack('scripts')
</body>

</html>
