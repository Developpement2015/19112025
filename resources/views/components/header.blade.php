<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="javascript:void(0)" class="logo logo-normal">
            <img src="/html/assets/img/logo.png" alt="">
        </a>
        <a href="javascript:void(0)" class="logo logo-white">
            <img src="/html/assets/img/logo.png" alt="" style="filter: invert(1);">
        </a>
        <!-- <a href="index.html" class="logo-small">
            <img src="assets/img/logo-small.png" alt="">
        </a> -->
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!--  -->
        <li class="nav-item nav-searchinputs">
            <div class="top-nav-search">

            </div>
        </li>
        <!-- / -->


        <!-- = -->
        <li class="nav-item dropdown has-arrow main-drop select-store-dropdown">

        </li>
        <!--  -->

        <!--  -->
        <li class="nav-item dropdown has-arrow flag-nav nav-item-box">

        </li>
        <!-- / -->

        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen">
                <i data-feather="maximize"></i>
            </a>
        </li>

        <!-- Notifications -->
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i><span class="badge rounded-pill">2</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">John Doe</span> added
                                            new task <span class="noti-title">Patient appointment booking</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </li>
        <!-- /Notifications -->

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="https://cdn-icons-png.flaticon.com/128/10110/10110782.png" alt=""
                            class="img-fluid">
                    </span>
                    <span class="user-detail">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user" style='box-shadow: black -6px 6px 25px;'>
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="https://cdn-icons-png.flaticon.com/128/10110/10110782.png"
                                alt="">
                            <span class="status online"></span></span>
                        <div class="profilesets d-flex align-items-center">
                            <h6>{{ auth()->user()->name }}</h6>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                        data-bs-target="#modifier-profil-modal"> <i class="me-2" data-feather="user"></i> Mes
                        informations</a>

                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"><img
                            src="/html/assets/img/icons/log-out.svg" class="me-2" alt="img">Déconnexion</a>
                </div>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
            data-bs-target="#modifier-profil-modal">Mes informations</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->
