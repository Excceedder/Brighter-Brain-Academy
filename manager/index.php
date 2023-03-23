<!doctype html>
<html lang="en">

<?php include "./_elements/client/redirect.php" ?>

<head>
    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include favicons module -->
    <?php include "./_elements/client/favicons.php" ?>

    <!-- Include styles module -->
    <?php include "./_elements/client/styles.php" ?>
</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Include navbar module -->
        <?php include "./_elements/client/navbar.php" ?>

        <!-- Include sidebar module -->
        <?php include "./_elements/client/sidebar.php" ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box pb-3 d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Brighter Brain Academy</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="./" class="text-success" style="border-bottom: 1px dashed #34c38f;"> <i class='bx bx-link-alt'></i> Dashboard</a></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card overflow-hidden" style="border: 1px dashed #34c38f;">
                                <div class="bg-success bg-soft">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="text-success p-3">
                                                <h5 class="text-dark" style="margin-bottom: 2px;"><?php echo $designated_manager_data["greeting"] ?></h5>
                                                <p class="mb-0 text-trucate"><?php echo $designated_manager_data["first_name"] . " " . $designated_manager_data["last_name"] ?></p>
                                                <p class="mb-0 text-truncate"><a href="mailto:<?php echo $designated_manager_data["email_address"] ?>" class="text-dark"><?php echo $designated_manager_data["email_address"] ?></a></p>
                                            </div>
                                        </div>
                                        <div class="col-5 align-self-end">
                                            <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pt-3">
                                                <a href="https://www.brighterbrainacademy.com" target="_blank" class="btn btn-success waves-effect w-100 waves-light">Visit the Official Website <i class='bx bx-globe'></i></a>
                                            </div>
                                            <div class="pt-3">
                                                <a href="mailto:official.excceedder@gmail.com" class="btn btn-success waves-effect w-100 waves-light">Contact Web Developer <i class='bx bx-command'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid" style="border: 1px dashed #74788d;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Account Status</p>
                                                    <div class="d-flex">
                                                        <div class="spinner-grow text-secondary" style="width: 8px; height: 8px;" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                        <h5 class="mb-0"><?php echo $designated_manager_data["account_status"] ?></h5>
                                                    </div>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-secondary">
                                                            <i class="bx bx-pulse font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid" style="border: 1px dashed #74788d;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Active Term</p>
                                                    <h5 class="mb-0">2nd Term</h5>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-secondary">
                                                            <i class="bx bxs-school font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid" style="border: 1px dashed #74788d;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Active Session</p>
                                                    <h5 class="mb-0">2023/24</h5>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-secondary">
                                                            <i class="bx bxs-school font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid" style="border: 1px dashed #74788d;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">No. of Students</p>
                                                    <h5 class="mb-0">157</h5>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-secondary">
                                                            <i class="bx bxs-user-detail font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid" style="border: 1px dashed #74788d;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">No. of Employees</p>
                                                    <h5 class="mb-0">30</h5>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-secondary">
                                                            <i class="bx bxs-user-detail font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid" style="border: 1px dashed #74788d;">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Pending Wages</p>
                                                    <h5 class="mb-0">₦350,723</h5>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-secondary">
                                                            <i class="bx bx-wallet font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Require footer module -->
            <?php require "./_elements/client/footer.php" ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Require scripts module -->
    <?php require "./_elements/client/scripts.php" ?>

</body>

</html>