<!doctype html>
<html lang="en">

<?php include "./_elements/authn/redirect.php" ?>

<head>

    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Login</title>
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
                                        <h5 class="text-success">Account Login</h5>
                                        <p>Please, input your email address into the field below.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="POST" novalidate action="./login">

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

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label><a href="./password_recovery" class="float-end fw-medium text-success">Forgot your password ?</a>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                    <div class="invalid-feedback">
                                        Please Enter Password
                                    </div>
                                </div>

                                <div class="mt-4 d-grid">
                                    <button class="btn btn-success waves-effect waves-light" name="authenticate_login" type="submit">Authenticate Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

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