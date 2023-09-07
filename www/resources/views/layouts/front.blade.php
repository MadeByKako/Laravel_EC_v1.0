<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  
    Document Title
    =============================================
    -->
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Default stylesheets-->
  <link href="{{ asset('style/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Template specific stylesheets-->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700') }}" rel="stylesheet">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Volkhov:400i') }}" rel="stylesheet">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/animate.css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/et-line-font/et-line-font.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/flexslider/flexslider.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/owl.carousel/dist/style/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/owl.carousel/dist/style/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('style/lib/simple-text-rotator/simpletextrotator.css') }}" rel="stylesheet">
  <!-- Main stylesheet and color file-->
  <link href="{{ asset('style/css/style.css') }}" rel="stylesheet">
  <link id="color-scheme" href="{{ asset('style/css/colors/default.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
  <main>
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>
    @component('components.header')
    @endcomponent
    <div class="main">
      @yield('content')
      @component('components.footer')
      @endcomponent
    </div>
    <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
  </main>
  <!--  
    JavaScripts
    =============================================
    -->
  <script src="{{ asset('style/lib/jquery/dist/jquery.js') }}"></script>
  <script src="{{ asset('style/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('style/lib/wow/dist/wow.js') }}"></script>
  <script src="{{ asset('style/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js') }}"></script>
  <script src="{{ asset('style/lib/isotope/dist/isotope.pkgd.js') }}"></script>
  <script src="{{ asset('style/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
  <script src="{{ asset('style/lib/flexslider/jquery.flexslider.js') }}"></script>
  <script src="{{ asset('style/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('style/lib/smoothscroll.js') }}"></script>
  <script src="{{ asset('style/lib/magnific-popup/dist/jquery.magnific-popup.js') }}"></script>
  <script src="{{ asset('style/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}"></script>
  <script src="{{ asset('style/js/plugins.js') }}"></script>
  <script src="{{ asset('style/js/main.js') }}"></script>
</body>

</html>