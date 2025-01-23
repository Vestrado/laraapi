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
    <title>Vestrado Dashboard</title>

    <!-- *************
			************ Common Css Files *************
		************ -->

    <!-- Animated css -->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.min.css">


    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

    <style>
        .image-label img {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="radio"]:checked + .image-label img {
            border-color: #007bff; /* Highlight color */
        }
    </style>

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

    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- Sidebar wrapper start -->
      <nav class="sidebar-wrapper">

        <!-- Sidebar brand starts -->
        <div class="sidebar-brand">
          <a href="mainpage" class="logo">
            <img src="assets/images/logo.png" alt="Max Free Admin Dashboard" />
          </a>
        </div>
        <!-- Sidebar brand starts -->

        <!-- Sidebar menu starts -->
        <div class="sidebar-menu">
          <div class="sidebarMenuScroll">
            <ul>
                <li class="sidebar-dropdown">
                    <a href="#">
                    <i class="bi bi-house"></i>
                    <span class="menu-text">Accounts</span>
                    </a>
                    <div class="sidebar-submenu">
                    <ul>
                        <li>
                        <a href="account-overview">Account Overview</a>
                        </li>
                        {{-- <li>
                        <a href="agreements">My Agreements</a>
                        </li> --}}
                    </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                    <i class="bi bi-gem"></i>
                    <span class="menu-text">Funds</span>
                    </a>
                    <div class="sidebar-submenu">
                    <ul>
                        <li>
                        <a href="deposit-funds">Deposit Funds</a>
                        </li>
                    </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                    <i class="bi bi-person"></i>
                    <span class="menu-text">Profile</span>
                    </a>
                    <div class="sidebar-submenu">
                    <ul>
                        <li>
                        <a href="profile">Profile</a>
                        </li>
                        <li>
                        <a href="agreements">My Agreement</a>
                        </li>
                    </ul>
                    </div>
                </li>
                <li>
                    <a href="starter-page.html">
                    <i class="bi bi-hand-index-thumb"></i>
                    <span class="menu-text">Link</span>
                    </a>
                </li>
            </ul>
          </div>
        </div>
        <!-- Sidebar menu ends -->

      </nav>
      <!-- Sidebar wrapper end -->

      <!-- *************
				************ Main container start *************
			************* -->
      <div class="main-container">

        <!-- Page header starts -->
        <div class="page-header">

          <div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>

          <!-- Breadcrumb start -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="bi bi-house"></i>
            </li>
            <li class="breadcrumb-item breadcrumb-active" aria-current="page">Grid Layout</li>
          </ol>
          <!-- Breadcrumb end -->

          <!-- Header actions ccontainer start -->
          <div class="header-actions-container">

            <!-- Search container start -->
            <div class="search-container">

              <!-- Search input group start -->
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn" type="button">
                  <i class="bi bi-search"></i>
                </button>
              </div>
              <!-- Search input group end -->

            </div>
            <!-- Search container end -->

            <!-- Header actions start -->
            <ul class="header-actions">

              <!-- Messages start -->
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" aria-haspopup="true">
                  <i class="bi bi-bell fs-4 lh-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                  <div class="dropdown-item">
                    <div class="d-flex py-2 border-bottom">
                      <img src="assets/images/user.png" class="img-4x me-3 rounded-3" alt="Free Admin Theme" />
                      <div class="m-0">
                        <h6 class="mb-1">Sophie Michiels</h6>
                        <p class="mb-2">Membership has been ended.</p>
                        <p class="small m-0 text-secondary">Today, 07:30pm</p>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown-item">
                    <div class="d-flex py-2 border-bottom">
                      <img src="assets/images/user2.png" class="img-4x me-3 rounded-3" alt="Free Admin Theme" />
                      <div class="m-0">
                        <h6 class="mb-1">Sophie Michiels</h6>
                        <p class="mb-2">Congratulate, James for new job.</p>
                        <p class="small m-0 text-secondary">Today, 08:00pm</p>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown-item">
                    <div class="d-flex py-2">
                      <img src="assets/images/user3.png" class="img-4x me-3 rounded-3" alt="Free Admin Theme" />
                      <div class="m-0">
                        <h6 class="mb-1">Sophie Michiels</h6>
                        <p class="mb-2">Lewis added new schedule release.</p>
                        <p class="small m-0 text-secondary">Today, 09:30pm</p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Messages end -->

              <li class="dropdown d-none d-md-block">
                <a href="#" id="countries" data-toggle="dropdown" aria-haspopup="true">
                  <img src="assets/images/flags/1x1/gb.svg" class="flag-img" alt="Free Admin Dashboards" />
                </a>
                <div class="dropdown-menu dropdown-menu-end mini" aria-labelledby="countries">
                  <div class="country-container">
                    <a href="index.html">
                      <img src="assets/images/flags/1x1/us.svg" alt="Free Admin Dashboards" />
                    </a>
                    <a href="index.html">
                      <img src="assets/images/flags/1x1/in.svg" alt="Free Google Dashboards" />
                    </a>
                    <a href="index.html">
                      <img src="assets/images/flags/1x1/br.svg" alt="Free Admin Panels" />
                    </a>
                    <a href="index.html">
                      <img src="assets/images/flags/1x1/tr.svg" alt="Free Modern Dashboards" />
                    </a>
                    <a href="index.html">
                      <img src="assets/images/flags/1x1/ca.svg" alt="Free Bootstrap Dashboards" />
                    </a>
                  </div>
                </div>
              </li>
              <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                  <span class="user-name d-none d-md-block">Tony Robbins</span>
                  <span class="avatar">
                    <img src="assets/images/user3.png" alt="Free Admin Templates">
                    <span class="status busy"></span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                  <div class="header-profile-actions">
                    <a href="profile.html">Profile</a>
                    <a href="account-settings.html">Settings</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                  </div>
                </div>
              </li>
            </ul>
            <!-- Header actions end -->

          </div>
          <!-- Header actions ccontainer end -->

        </div>
        <!-- Page header ends -->

        <!-- Content wrapper scroll start -->
        <div class="content-wrapper-scroll">

          <!-- Content wrapper start -->
          <div class="content-wrapper">
                @yield('content')
          </div>
          <!-- Content wrapper end -->

          <!-- App Footer start -->
          <div class="app-footer">
            <span>© Bootstrap Gallery 2023</span>
          </div>
          <!-- App footer end -->

        </div>
        <!-- Content wrapper scroll end -->

      </div>
      <!-- *************
				************ Main container end *************
			************* -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
			************ Required JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/moment.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>


    <!-- Main Js Required -->
    <script src="assets/js/main.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('js')

  </body>

</html>
