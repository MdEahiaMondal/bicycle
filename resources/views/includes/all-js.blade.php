<script>
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: false,
            controlNav: "thumbnails"
        });
    });
</script>
<!-- Popper.js -->
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

<!-- imagezoom -->
<script src="{{ asset('frontend/assets/js/imagezoom.js') }}"></script>

<!-- flexslider -->
<script src="{{ asset('frontend/assets/js/jquery.flexslider.js') }}"></script>

<!-- All Plugins js -->
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>

<!-- Customs Js-->
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('backend/js/plugins/toastr/toastr.min.js') }}"></script>

<!--Axios-->
<script src="{{ asset('backend/js/axios.js') }}"></script>

{{--Sweetalert--}}
<script src="{{ asset('backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script>
    @foreach(['success', 'warning', 'error', 'info'] as $item)
        @if(session($item))
            toastr['{{ $item }}']('{{ session($item) }}');
        @endif
    @endforeach
</script>
