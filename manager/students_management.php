<!doctype html>
<html lang="en">

<?php include "./_elements/client/redirect.php" ?>

<head>
    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Students Management</title>
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
                            <div class="page-title-box d-sm-flex align-items-center pb-3 justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Brighter Brain Academy</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']); ?>" class="text-success" style="border-bottom: 1px dashed #34c38f;"> <i class='bx bx-link-alt'></i> Students Management</a></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php
                    if (isset($_SESSION['feedback'])) {
                        $type = $_SESSION['type'];
                        $feedback = $_SESSION['feedback'];
                        unset($_SESSION['feedback'], $_SESSION['type']);
                    ?>
                        <div class="alert alert-<?php echo $type ?> alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-bullseye-arrow me-2"></i>
                            <?php echo $feedback ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['termly_report_id']) && !empty($_GET['termly_report_id']) && isset($_GET['class_placement']) && !empty($_GET['class_placement'])) {
                        $db_conn = connect_to_database();

                        $stmt = $db_conn->prepare("SELECT * FROM `termly_reports` WHERE `termly_report_id` = ?");
                        $stmt->bind_param("s", $_GET['termly_report_id']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $termly_report_id = $row['termly_report_id'];
                            $termly_report_data = json_decode(hex2bin($row['termly_report_data']), true);
                        } else {
                            $_SESSION['feedback'] = "Error: Unable to retrieve termly report.";
                            $_SESSION['type'] = "warning";
                            return false;
                        }
                    ?>
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="border: 1px dashed #343a40;">
                                    <div class="card-body p-3">
                                        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']) ?>" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>CLASS SUBJECTS</th>
                                                            <th>1<sup>st</sup> CA SCORE(20)</th>
                                                            <th>2<sup>nd</sup> CA SCORE(10)</th>
                                                            <th>EXAMINATION SCORE(70)</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php include "./_elements/client/update_termly_report.php" ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex">
                                                <input type="hidden" name="termly_report_id" value="<?php echo $_GET['termly_report_id'] ?>">
                                                <button type="reset" class="me-auto btn btn-secondary"><i class='bx bx-reset'></i> Reset</button>
                                                <button type="submit" class="btn btn-success" name="update_termly_report"><i class='bx bx-save'></i> Save Entries</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else if (isset($_GET['student_id']) && !empty($_GET['student_id'])) {
                        $db_conn = connect_to_database();

                        $stmt = $db_conn->prepare("SELECT * FROM `students_accounts` WHERE `student_id` = ?");
                        $stmt->bind_param("s", $_GET['student_id']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $student_data = json_decode(hex2bin($row['student_data']), true);
                        } else {
                            $_SESSION['feedback'] = "Error: Invalid student ID!";
                            $_SESSION['type'] = "warning";
                            return false;
                        }
                    ?>
                        <div class="row">
                            <div class="col-auto">
                                <div class="card" style="border: 1px dashed #343a40;">
                                    <div class="card-body p-2">
                                        <img src="<?php echo $student_data["profile_photo"] ?>" class="avatar avatar-lg rounded" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="border: 1px dashed #343a40;">
                                    <div class="card-body">
                                        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']) ?>" enctype="multipart/form-data" method="post">
                                            <label for="profile_photo" class="form-label">Update Profile Photo</label>
                                            <div class="input-group">
                                                <input type="file" name="profile_photo" id="profile_photo" required class="form-control">
                                                <input type="hidden" name="student_id" value="<?php echo $_GET['student_id'] ?>">
                                                <button class="btn btn-outline-secondary" name="update_student_profile_photo" type="submit"><i class='bx bx-check-double fw-bold'></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="border: 1px dashed #343a40;">
                                    <div class="card-body">
                                        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']) ?>" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-1">
                                                        <h5 style="text-decoration: underline;"><?php echo $student_data["first_name"] ?>'s Credentials:</h5>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="surname" class="form-label">Surname</label>
                                                        <input type="text" id="surname" name="surname" required value="<?php echo $student_data["surname"] ?>" placeholder="Input value..." class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="first_name" class="form-label">First Name</label>
                                                        <input type="text" id="first_name" name="first_name" required value="<?php echo $student_data["first_name"] ?>" placeholder="Input value..." class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="other_names" class="form-label">Other Names</label>
                                                        <input type="text" id="other_names" name="other_names" value="<?php echo $student_data["other_names"] ?>" placeholder="Input value..." class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                                                        <input type="date" id="date_of_birth" required name="date_of_birth" value="<?php echo $student_data["date_of_birth"] ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label for="country" class="form-label">Country: <span class="fw-bold" style="border-bottom: 1px dashed #343a40;"><?php echo strtoupper($student_data["country"]) ?></span></label>
                                                        <select class="form-control" name="country" id="country">
                                                            <option value="" selected disabled>-- Select --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="region" class="form-label">Region: <span class="fw-bold" style="border-bottom: 1px dashed #343a40;"><?php echo strtoupper($student_data["region"]) ?></span></label>
                                                        <select class="form-control" name="region" id="region">
                                                            <option value="" selected disabled>-- Select --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="city" class="form-label">City: <span class="fw-bold" style="border-bottom: 1px dashed #343a40;"><?php echo strtoupper($student_data["city"]) ?></span></label>
                                                        <select class="form-control" name="city" id="city">
                                                            <option value="" selected disabled>-- Select --</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="gender" class="form-label">Gender: <span class="fw-bold" style="border-bottom: 1px dashed #343a40;"><?php echo strtoupper($student_data["gender"]) ?></span></label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="" selected disabled>-- Select --</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="residential_address" required class="form-label">Residential Address</label>
                                                        <textarea id="residential_address" name="residential_address" class="form-control" rows="1" placeholder="Input value..."><?php echo $student_data["residential_address"] ?></textarea>
                                                    </div>

                                                    <div class="mb-1">
                                                        <h5 style="text-decoration: underline;">Parent's Credentials:</h5>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="parent_full_names" required class="form-label">Full Names</label>
                                                        <input type="text" id="parent_full_names" value="<?php echo $student_data["parent_full_names"] ?>" name="parent_full_names" placeholder="Input value..." class="form-control">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="parent_phone_number" required class="form-label">Phone Number</label>
                                                        <input type="text" id="parent_phone_number" value="<?php echo $student_data["parent_phone_number"] ?>" name="parent_phone_number" placeholder="Input value..." class="form-control">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="parent_occupation" required class="form-label">Ocupation</label>
                                                        <input type="text" id="parent_occupation" value="<?php echo $student_data["parent_occupation"] ?>" name="parent_occupation" placeholder="Input value..." class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex">
                                                <input type="hidden" name="student_id" value="<?php echo $_GET['student_id'] ?>">
                                                <button type="reset" class="me-auto btn btn-secondary float-start"><i class='bx bx-reset'></i> Cancel</button>
                                                <button type="submit" class="btn btn-success" name="update_student_credentials"><i class='bx bx-save'></i> Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-dark mb-3" type="button" data-bs-toggle="modal" data-bs-target="#new_termly_report" style="border: 1px dashed #343a40;"><i class='bx bxs-report'></i> Create Termly Report</button>
                                <div class="card" style="border: 1px dashed #343a40;">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Full Names</th>
                                                    <th>Class Placement</th>
                                                    <th>Session Tag</th>
                                                    <th>Term Tag</th>
                                                    <th>Main Campus</th>
                                                    <th>Action Buttons</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $db_conn = connect_to_database();

                                                $stmt = $db_conn->prepare("SELECT * FROM `termly_reports` WHERE JSON_EXTRACT(UNHEX(`termly_report_data`), '$.student_id') = ?");
                                                $stmt->bind_param("s", $_GET['student_id']);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $termly_report_id = $row['termly_report_id'];
                                                        $termly_report_data = json_decode(hex2bin($row['termly_report_data']), true);
                                                ?>
                                                        <tr>
                                                            <td><?php echo $termly_report_data["full_names"] ?></td>
                                                            <td><?php echo $termly_report_data["class_placement"] ?></td>
                                                            <td><?php echo $termly_report_data["session_tag"] ?></td>
                                                            <td><?php echo $termly_report_data["term_tag"] ?></td>
                                                            <td><?php echo $termly_report_data["main_campus"] ?></td>
                                                            <td>
                                                                <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']) ?>" method="post">
                                                                    <input type="hidden" name="termly_report_id" value="<?php echo $termly_report_id ?>">

                                                                    <a href="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?termly_report_id=' . $termly_report_id) . '&class_placement=' . urlencode($termly_report_data["class_placement"]) ?>" style="border: 1px dashed #556ee6; color: #556ee6; background-color: transparent;border-radius: 5px; padding: 4px 6px 2px;"><i class='bx bx-edit'></i> Edit Report</a>

                                                                    <button style="border: 1px dashed #f46a6a; color: #f46a6a; background-color: transparent;border-radius: 5px; padding: 4px 6px 2px; margin-left: 1px" onclick="return confirm('Do you confirm that you intend to delete this termly report?');" name="delete_termly_report" type="submit"><i class='bx bx-trash bx-tada'></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td style="font-weight: bold;">No records found!</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    <?php
                    } else if (isset($_GET['query_category']) && !empty($_GET['query_category'])) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-dark mb-3" type="button" data-bs-toggle="modal" data-bs-target="#new_admission" style="border: 1px dashed #343a40;"><i class='bx bxs-school'></i> New Admission</button>
                                <div class="card" style="border: 1px dashed #343a40;">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Admission No.</th>
                                                    <th>Surname</th>
                                                    <th>First Name</th>
                                                    <th>Class Placement</th>
                                                    <th>Gender</th>
                                                    <th>Reg. Date</th>
                                                    <th>Action Buttons</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $db_conn = connect_to_database();
                                                $query_category = htmlspecialchars(hex2bin($_GET['query_category']));

                                                $stmt = $db_conn->prepare("SELECT * FROM `students_accounts` WHERE JSON_EXTRACT(UNHEX(`student_data`), '$.query_category') = ?");
                                                $stmt->bind_param("s", $query_category);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $student_id = $row['student_id'];
                                                        $student_data = json_decode(hex2bin($row['student_data']), true);
                                                ?>
                                                        <tr>
                                                            <td><?php echo $student_data["admission_number"] ?></td>
                                                            <td><?php echo $student_data["surname"] ?></td>
                                                            <td><?php echo $student_data["first_name"] ?></td>
                                                            <td><?php echo $student_data["class_placement"] ?></td>
                                                            <td><?php echo $student_data["gender"] ?></td>
                                                            <td><?php echo $student_data["registration_date"] ?></td>
                                                            <td>
                                                                <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']) ?>" method="post">
                                                                    <input type="hidden" name="student_id" value="<?php echo $student_id ?>">

                                                                    <a href="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?student_id=' . $student_id) ?>" style="border: 1px dashed #34c38f; color: #34c38f; background-color: transparent;border-radius: 5px; padding: 1px 6px;" name="" type="submit"><i class='bx bxs-contact'></i> Manage</a>

                                                                    <button style="border: 1px dashed #f46a6a; color: #f46a6a; background-color: transparent;border-radius: 5px; " onclick="return confirm('Do you confirm that you intend to delete this student account?');" type="submit" name="delete_student_account"><i class='bx bx-trash bx-tada'></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td style="font-weight: bold;">No records found!</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    <?php
                    } else {
                        $_SESSION['feedback'] = "Error: The requested URL is not valid!";
                        $_SESSION['type'] = "warning";
                    }
                    ?>

                </div> <!-- container-fluid -->
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