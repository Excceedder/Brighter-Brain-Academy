<!doctype html>
<html lang="en">

<?php include "./_elements/authn/redirect.php" ?>

<head>

    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Password Recovery</title>
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
                    <?php
                    if (isset($_SESSION['password_updated'])) {
                        unset($_SESSION['password_updated']);
                    ?>
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Password Updated</h5>
                                            <p>Your account's password has been successfuly updated.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mt-2 d-grid">
                                    <a href="./login" class="btn btn-success waves-effect waves-light">Proceed to Login</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else if (isset($_SESSION['reset_password'])) {
                        $manager_id = $_SESSION['reset_password'];
                        unset($_SESSION['reset_password']);
                    ?>
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Reset Password</h5>
                                            <p>Input your new password into the fields below.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POST" novalidate action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>">

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

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                        <div class="invalid-feedback">
                                            Please Enter Password
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter password" required>
                                        <div class="invalid-feedback">
                                            Please Retype Password
                                        </div>
                                    </div>

                                    <input type="hidden" name="manager_id" value="<?php echo $manager_id ?>" id="manager_id">
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-success waves-effect waves-light" name="reset_password" type="submit">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else if (isset($_SESSION['manager_id'])) {
                        $manager_id = $_SESSION['manager_id'];
                        unset($_SESSION['manager_id']);
                    ?>
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Authorize Password Recovery</h5>
                                            <p>Scan your access token to authorize password recovery.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <form class="needs-validation" method="POST" novalidate action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>">

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

                                    <div class="mt-2">
                                        <video src="" id="preview" width="100%" height="100%"></video>
                                        <input type="hidden" name="authorize_password_recovery" id="access_token">
                                        <input type="hidden" name="manager_id" value="<?php echo $manager_id ?>" id="manager_id">
                                    </div>

                                </form>

                            </div>
                        </div>

                        <script>
                            let scanner = new Instascan.Scanner({
                                video: document.getElementById('preview')
                            });
                            Instascan.Camera.getCameras().then(function(cameras) {
                                if (cameras.length > 0) {
                                    scanner.start(cameras[0])
                                } else {
                                    alert('No cameras found')
                                }
                            }).catch(function(e) {
                                console.error(e);
                            });

                            scanner.addListener('scan', function(c) {
                                document.getElementById('access_token').value = c;
                                document.forms[0].submit();
                            });
                        </script>
                    <?php
                    } else {
                    ?>
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Password Recovery</h5>
                                            <p>Input username or email address into the field below.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POST" novalidate action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>">

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

                                    <div class="mb-3">
                                        <label for="account_holder" class="form-label">Username or Email Address</label>
                                        <input type="text" class="form-control" id="account_holder" name="account_holder" placeholder="Enter username or email address" required>
                                        <div class="invalid-feedback">
                                            Username or Email Address is required
                                        </div>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-success waves-effect waves-light" name="recover_password" type="submit">Recover Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Remembered password ? <a href="./login" class="fw-medium text-success"> Login Instead</a> </p>
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