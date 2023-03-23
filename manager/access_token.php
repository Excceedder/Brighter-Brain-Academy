<!doctype html>
<html lang="en">

<?php include "./_elements/authn/redirect.php" ?>

<head>

    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Access Token</title>
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
                    if (isset($_SESSION['encoded_access_token'])) {
                        $encoded_access_token = $_SESSION['encoded_access_token'];
                        unset($_SESSION['encoded_access_token']);
                    ?>
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Access Token</h5>
                                            <p>Scan the QR code on your second device.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mt-2 text-center">
                                    <img src="<?php echo $encoded_access_token; ?>" class="rounded-5 p-4" style="border: 2px dashed #34c38f;" alt="QR Code">
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Authorize this device</h5>
                                            <p>Input your username or email address into the field below.</p>
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
                                        <button class="btn btn-success waves-effect waves-light" name="retrieve_access_token" type="submit">Retrieve Access Token</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="mt-5 text-center">

                        <div>
                            <p>Don't have an account ? <a href="./register" class="fw-medium text-success"> Register</a> </p>
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