<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="./">Overview</a></li>
                    </ul>
                </li>

                <li class="menu-title">School Management</li>

                <li>
                    <a href="./school_management" class="waves-effect">
                        <i class='bx bx-customize'></i> <span>Sessions & Terms</span>
                    </a>
                </li>

                <li>
                    <a href="./termly_serial_number_and_pin" class="waves-effect">
                        <i class='bx bx-customize'></i> <span>Termly S/N & Pin</span>
                    </a>
                </li>

                <li class="menu-title">Student Management</li>

                <li>
                    <a href="./students_management?query_category=<?php echo bin2hex(urlencode('pre_kindergarten')); ?>" class="waves-effect">
                        <i class='bx bxs-book-content'></i> <span>Pre Kindergarten</span>
                    </a>
                </li>

                <li>
                    <a href="./students_management?query_category=<?php echo bin2hex(urlencode('kindergarten')); ?>" class="waves-effect">
                        <i class='bx bxs-book-content'></i> <span>Kindergarten</span>
                    </a>
                </li>

                <li>
                    <a href="./students_management?query_category=<?php echo bin2hex(urlencode('primary')); ?>" class="waves-effect">
                        <i class='bx bxs-book-content'></i> <span>Primary Sch.</span>
                    </a>
                </li>

                <li>
                    <a href="./students_management?query_category=<?php echo bin2hex(urlencode('junior_secondary')); ?>" class="waves-effect">
                        <i class='bx bxs-book-content'></i> <span>Jr. Secondary</span>
                    </a>
                </li>

                <li>
                    <a href="./students_management?query_category=<?php echo bin2hex(urlencode('senior_secondary')); ?>" class="waves-effect">
                        <i class='bx bxs-book-content'></i> <span>Sr. Secondary</span>
                    </a>
                </li>

                <li class="menu-title">Employee Management</li>

                <li>
                    <a href="./employee_management?query_category=<?php echo bin2hex(urlencode('Employee')); ?>" class="waves-effect">
                        <i class='bx bx-briefcase-alt-2'></i> <span>Employee</span>
                    </a>
                </li>

                <li>
                    <a href="./employee_management?query_category=<?php echo bin2hex(urlencode('Payroll')); ?>" class="waves-effect">
                        <i class='bx bx-wallet'></i> <span>Payroll Log</span>
                    </a>
                </li>

                <li class="menu-title">Account Management</li>

                <li>
                    <a href="./settings" class="waves-effect">
                        <i class='bx bx-cog'></i> <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a href="./logout" class="waves-effect">
                        <i class='bx bx-log-out'></i> <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="_vendors/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>
            <div class="mb-2">
                <img src="_vendors/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>