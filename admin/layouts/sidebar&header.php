</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand d-flex justify-content-center" href="javascript:void(0)">
          <span id="logoWord"><span class="text-danger">HAMK</span> Hotel</span>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rooms.php">
              <i class="fas fa-hotel text-primary"></i>
                <span class="nav-link-text">Rooms</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="applications.php">
                <i class="fas fa-book-open text-primary"></i>
                <span class="nav-link-text">Applications</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

          <!-- Navbar links -->

          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>


          </ul>
          <ul class="navbar-nav align-items-center ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="sidebar&header.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../../images/icons/user-circle-icon.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">XUSH KELIBSIZ!</h6>
                </div>
                <!-- <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a> -->
                <a href="#" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Ma'lumotlarni o'zgartirish</span>
                </a>
                <!-- <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a> -->
                <!-- <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="/admin/app/logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Chiqish</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->