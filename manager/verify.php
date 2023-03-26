<!doctype html>
<html lang="en">

<?php

include "../server/server.php";

if (isset($_GET['manager_id']) && !empty($_GET['manager_id'])) {
    $manager_pass = array(
        'manager_id' => $_GET['manager_id'],
        'active_status' => "Active",
        'dormant_status' => "Dormant",
    );
    verify_email_address($manager_pass);
} else {
    $_SESSION['feedback'] = "Error: URL is invalid.";
    $_SESSION['type'] = "warning";
}

?>

<head>

    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include favicons module -->
    <?php include "./_elements/authn/favicons.php" ?>

    <!-- Include styles module -->
    <?php include "./_elements/authn/styles.php" ?>

</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-success bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-success p-4">
                                        <h5 class="text-success">Email Verification</h5>
                                        <p>Email verification status will be displayed below.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mt-2">
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
                            </div>
                            <div class="mt-2 d-grid">
                                <a href="./login" class="btn btn-success waves-effect waves-light">Proceed to Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Already have an account ? <a href="./login" class="fw-medium text-success"> Login</a> </p>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> BBA. Created with <i class="mdi mdi-heart text-danger"></i> by Excceedder</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Require scripts module -->
    <?php require "./_elements/authn/scripts.php" ?>

</body>

</html>