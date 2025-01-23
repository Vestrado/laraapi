<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap Admin Dashboards">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- Title -->
    <title>Web API</title>

    <!-- *************
			************ Common Css Files *************
		************ -->

    <!-- Animated css -->
    <link href="{{asset('/assets/css/animate.css')}}" rel="stylesheet">

    <!-- Bootstrap font icons css -->
    <link href="{{asset('/assets/fonts/bootstrap/bootstrap-icons.css')}}" rel="stylesheet">

    <!-- Main css -->
    <link href="{{asset('/assets/css/main.min.css')}}" rel="stylesheet">


  </head>

  <body>

    <!-- Loading wrapper start -->
    <!-- <div id="loading-wrapper">
			<div class="spinner">
                <div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
            </div>
		</div> -->
    <!-- Loading wrapper end -->

    <!-- Container startss -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">

          <div class="login-container">
            <!-- Login box start -->
            @yield('content_login')

            <!-- Login box end -->
          </div>

        </div>
      </div>
    </div>
    <!-- Container ends -->

    <!-- *************
			************ Required JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.js') }}"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Main Js Required -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

  </body>

</html>
