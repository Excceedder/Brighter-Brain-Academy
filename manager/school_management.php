<!doctype html>
<html lang="en">

<?php include "./_elements/client/redirect.php" ?>

<head>
    <meta charset="utf-8" />
    <title>Brighter Brain Academy | School Management</title>
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
                                        <li class="breadcrumb-item"><a href="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>" class="text-success" style="border-bottom: 1px dashed #34c38f;"> <i class='bx bx-link-alt'></i> School Management</a></li>
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

                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-outline-dark me-auto mb-3" type="button" data-bs-toggle="modal" data-bs-target="#update_sessions_and_terms" style="border: 1px dashed #343a40;"><i class='bx bx-calendar-plus'></i> Update Sessions & Terms</button>
                            <div class="card" style="border: 1px dashed #343a40;">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Main Campus</th>
                                                <th>Session Tag</th>
                                                <th>Session Start</th>
                                                <th>Session Stop</th>
                                                <th>Term Tag</th>
                                                <th>Term Start</th>
                                                <th>Term Stop</th>
                                                <th>Action Buttons</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $db_conn = connect_to_database();
                                            $main_campus = "BBA Ughelli";

                                            $stmt = $db_conn->prepare("SELECT * FROM `sessions_and_terms` WHERE JSON_EXTRACT(UNHEX(`session_and_term_data`), '$.main_campus') = ?");
                                            $stmt->bind_param("s", $main_campus);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $session_and_term_id = $row['session_and_term_id'];
                                                    $session_and_term_data = json_decode(hex2bin($row['session_and_term_data']), true);
                                            ?>
                                                    <tr>
                                                        <td><?php echo $session_and_term_data["main_campus"] ?></td>
                                                        <td><?php echo $session_and_term_data["session_tag"] ?></td>
                                                        <td><?php echo $session_and_term_data["session_start"] ?></td>
                                                        <td><?php echo $session_and_term_data["session_stop"] ?></td>
                                                        <td><?php echo $session_and_term_data["term_tag"] ?></td>
                                                        <td><?php echo $session_and_term_data["term_start"] ?></td>
                                                        <td><?php echo $session_and_term_data["term_stop"] ?></td>
                                                        <td>
                                                            <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)) ?>" method="post">
                                                                <input type="hidden" name="session_and_term_id" value="<?php echo $session_and_term_id ?>">
                                                                <?php
                                                                if ($session_and_term_data["session_and_term_status"] == "Active") {
                                                                ?>
                                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#update_sessions_and_terms" style="border: 1px dashed #556ee6; color: #556ee6; background-color: transparent;border-radius: 5px;"><i class='bx bx-edit'></i> Manage</button>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <button style="border: 1px dashed #34c38f; color: #34c38f; background-color: transparent;border-radius: 5px; " type="submit" name="activate_session_and_term"><i class='bx bx-pulse'></i> Activate</button>
                                                                <?php
                                                                }
                                                                ?>
                                                                <button style="border: 1px dashed #f46a6a; color: #f46a6a; background-color: transparent;border-radius: 5px; " name="delete_session_and_term" onclick="return confirm('Do you confirm that you intend to delete this Session/Term?');" type="submit"><i class='bx bx-trash bx-tada'></i></button>
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