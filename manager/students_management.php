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
                    if (isset($_GET['query_category']) && !empty($_GET['query_category'])) {
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-success mb-3" type="button" data-bs-toggle="modal" data-bs-target="#new_admission" style="border: 1px dashed #34c38f;"><i class='bx bxs-school'></i> New Admission</button>
                                <div class="card" style="border: 1px dashed #34c38f;">
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

                                                $stmt = $db_conn->prepare("SELECT * FROM `students_accounts` WHERE JSON_EXTRACT(UNHEX(`designated_student_data`), '$.query_category') = ?");
                                                $stmt->bind_param("s", $query_category);
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $designated_student_id = $row['designated_student_id'];
                                                        $designated_student_data = json_decode(hex2bin($row['designated_student_data']), true);
                                                ?>
                                                        <tr>
                                                            <td><?php echo $designated_student_data["admission_number"] ?></td>
                                                            <td><?php echo $designated_student_data["surname"] ?></td>
                                                            <td><?php echo $designated_student_data["first_name"] ?></td>
                                                            <td><?php echo $designated_student_data["class_placement"] ?></td>
                                                            <td><?php echo $designated_student_data["gender"] ?></td>
                                                            <td><?php echo $designated_student_data["registration_date"] ?></td>
                                                            <td>
                                                                <button style="border: 1px dashed #34c38f; color: #34c38f; background-color: transparent;border-radius: 5px; " name="" type="submit"><i class='bx bxs-contact'></i> Manage</button>
                                                                <button style="border: 1px dashed #f46a6a; color: #f46a6a; background-color: transparent;border-radius: 5px; " type="submit" name=""><i class='bx bx-trash bx-tada'></i></button>
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
                        $_SESSION['feedback'] = "Error: Invalid query category!";
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