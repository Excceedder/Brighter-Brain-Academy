<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="./" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="_vendors/images/logo.png" alt="" height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="_vendors/images/logo.png" alt="" height="35"> <span style="color: #ffffff !important;">Brighter Brain Academy</span>
                    </span>
                </a>

                <a href="./" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="_vendors/images/logo.png" alt="" height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="_vendors/images/logo.png" alt="" height="35"> <span style="color: #ffffff !important;">Brighter Brain Academy</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo $designated_manager_data["profile_photo"] ?>" alt="#">
                    <span class="d-none d-xl-inline-block ms-1"><?php echo $designated_manager_data["username"] ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="./settings"><i class="bx bx-cog font-size-16 align-middle me-1"></i> <span>Settings</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="./logout"><i class="bx bx-log-out font-size-16 align-middle me-1 text-danger"></i> <span>Logout</span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class='bx bx-analyse bx-tada'></i>
                </button>
            </div>
        </div>
    </div>
</header>