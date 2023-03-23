<!doctype html>
<html lang="en">

<?php include "./_elements/authn/redirect.php" ?>

<head>

    <meta charset="utf-8" />
    <title>Brighter Brain Academy | Registration</title>
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
                                        <h5 class="text-success">Account Registration</h5>
                                        <p>Register by inputting your personal credentials below.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="_vendors/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded bg-light shadow shadow-sm m-3">
                                    <img src="_vendors/images/placeholder.jpg" width="100" height="100" id="preview" style="border-radius: 10px;">
                                </span>
                            </div>
                            <div class="p-2">
                                <form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>">

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
                                        <label for="profile_photo" class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control" id="profile_photo" accept="image/jpeg,image/jpg,image/png" name="profile_photo" required>
                                        <div class="invalid-feedback">
                                            Please Select Photo
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required>
                                        <div class="invalid-feedback">
                                            Please Enter First Name
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Last Name
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                        <div class="invalid-feedback">
                                            Please Enter Username
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email_address" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter email address" required>
                                        <div class="invalid-feedback">
                                            Please Enter Email Address
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                        <div class="invalid-feedback">
                                            Please Enter Password
                                        </div>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-success waves-effect waves-light" name="new_manager" type="submit">Register</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to our <a href="#" class="text-success">Terms of Service</a></p>
                                    </div>
                                </form>
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

    <script>
        var profile_photo = document.getElementById("profile_photo");
        var preview = document.getElementById("preview");

        profile_photo.addEventListener("change", function() {
            var file = profile_photo.files[0];
            var reader = new FileReader();
            reader.addEventListener("load", function() {
                preview.src = reader.result;
            });
            reader.readAsDataURL(file);
        });
    </script>

</body>

</html>