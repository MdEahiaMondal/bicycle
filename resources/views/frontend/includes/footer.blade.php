<script src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>

<div class="footer">
     <div class="container wrap">
        <div class="logo2">
             <a href="{{ route('home') }}"><img src="{{ asset('/') }}frontend/images/logo2.png" alt=""/></a>
        </div>
        <div class="ftr-menu">
             <ul>
                 <li><a href="">BICYCLES</a></li>
                 <li><a href="">PARTS</a></li>
                 <li><a href="">ACCESSORIES</a></li>
                 <li><a href="">EXTRAS</a></li>
             </ul>
        </div>
        <div class="clearfix"></div>
     </div>
</div>
