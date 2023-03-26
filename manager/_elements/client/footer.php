<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Brighter Brain Academy.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Developed by Excceedder
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="update_sessions_and_terms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Update Sessions & Terms</h1>
                <button type="button" class="border-0" style="border-radius: 5px; padding: 4px 4px 0; background-color: #FF0000;" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x bx-tada text-light' style="font-size: 24px;"></i></button>
            </div>
            <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)) ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="session_tag" class="form-label">Session Tag</label>
                            <input type="text" id="session_tag" name="session_tag" placeholder="e.g. 2023/24" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="term_tag" class="form-label">Term Tag</label>
                            <input type="text" id="term_tag" name="term_tag" placeholder="e.g. 2nd Term" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="main_campus" class="form-label">Main Campus</label>
                            <input type="text" id="main_campus" name="main_campus" placeholder="e.g. BBA Ughelli" readonly value="BBA Ughelli" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="session_start" class="form-label">Session Start</label>
                            <input type="date" id="session_start" name="session_start" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="session_stop" class="form-label">Session Stop</label>
                            <input type="date" id="session_stop" name="session_stop" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="term_start" class="form-label">Term Start</label>
                            <input type="date" id="term_start" name="term_start" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="term_start" class="form-label">Term Stop</label>
                            <input type="date" id="term_start" name="term_stop" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex">
                    <button type="reset" class="me-auto btn btn-secondary float-start"><i class='bx bx-reset'></i> Cancel</button>
                    <button type="submit" class="btn btn-success" name="update_session_and_term"><i class='bx bx-save'></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="new_admission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">New Admission</h1>
                <button type="button" class="border-0" style="border-radius: 5px; padding: 4px 4px 0; background-color: #FF0000;" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x bx-tada text-light' style="font-size: 24px;"></i></button>
            </div>
            <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . '?' . $_SERVER['QUERY_STRING']) ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-1">
                            <h5 style="text-decoration: underline;">Candidate's Credentials:</h5>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <input type="file" id="profile_photo" name="profile_photo" required accept="image/jpeg,image/jpg,image/png" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" id="surname" name="surname" required placeholder="Input value..." class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" required placeholder="Input value..." class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="other_names" class="form-label">Other Names</label>
                            <input type="text" id="other_names" name="other_names" placeholder="Input value..." class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" id="date_of_birth" required name="date_of_birth" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" name="gender" required id="gender">
                                <option value="" disabled selected>-- Select --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="class_placement" class="form-label">Class Placement</label>
                            <select class="form-control" required name="class_placement" id="class_placement">
                                <option value="" disabled selected>-- Select --</option>
                                <?php
                                if (htmlspecialchars(hex2bin($_GET['query_category'])) == "pre_kindergarten") {
                                ?>
                                    <option value="Pre Kindergarten">Pre Kindergarten</option>
                                <?php
                                } else if (htmlspecialchars(hex2bin($_GET['query_category'])) == "kindergarten") {
                                ?>
                                    <option value="Kindergarten 1">Kindergarten 1</option>
                                    <option value="Kindergarten 2">Kindergarten 2</option>
                                    <option value="Kindergarten 3">Kindergarten 3</option>
                                <?php
                                } else if (htmlspecialchars(hex2bin($_GET['query_category'])) == "primary") {
                                ?>
                                    <option value="Primary 1">Primary 1</option>
                                    <option value="Primary 2">Primary 2</option>
                                    <option value="Primary 3">Primary 3</option>
                                    <option value="Primary 4">Primary 4</option>
                                    <option value="Primary 5">Primary 5</option>
                                <?php
                                } else if (htmlspecialchars(hex2bin($_GET['query_category'])) == "junior_secondary") {
                                ?>
                                    <option value="JSS. 1">JSS. 1</option>
                                    <option value="JSS. 2">JSS. 2</option>
                                    <option value="JSS. 3">JSS. 3</option>
                                <?php
                                } else if (htmlspecialchars(hex2bin($_GET['query_category'])) == "senior_secondary") {
                                ?>
                                    <option value="SSS. 1">SSS. 1</option>
                                    <option value="SSS. 2">SSS. 2</option>
                                    <option value="SSS. 3">SSS. 3</option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-control" required name="country" id="country">
                                <option value="" disabled selected>-- Select --</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="region" class="form-label">Region</label>
                            <select class="form-control" required name="region" id="region">
                                <option value="" disabled selected>-- Select --</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-control" required name="city" id="city">
                                <option value="" disabled selected>-- Select --</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="residential_address" required class="form-label">Residential Address</label>
                            <textarea id="residential_address" name="residential_address" class="form-control" rows="1" placeholder="Input value..."></textarea>
                        </div>
                        <div class="mb-1">
                            <h5 style="text-decoration: underline;">Parent's Credentials:</h5>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="parent_full_names" required class="form-label">Full Names</label>
                            <input type="text" id="parent_full_names" name="parent_full_names" placeholder="Input value..." class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="parent_phone_number" required class="form-label">Phone Number</label>
                            <input type="text" id="parent_phone_number" name="parent_phone_number" placeholder="Input value..." class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="parent_occupation" required class="form-label">Ocupation</label>
                            <input type="text" id="parent_occupation" name="parent_occupation" placeholder="Input value..." class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex">
                    <input type="hidden" name="query_category" value="<?php echo htmlspecialchars(hex2bin($_GET['query_category'])); ?>">
                    <button type="reset" class="me-auto btn btn-secondary float-start"><i class='bx bx-reset'></i> Cancel</button>
                    <button type="submit" class="btn btn-success" name="new_admission"><i class='bx bx-save'></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="new_termly_report" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">New Termly Report</h1>
                <button type="button" class="border-0" style="border-radius: 5px; padding: 4px 4px 0; background-color: #FF0000;" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x bx-tada text-light' style="font-size: 24px;"></i></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>CLASS SUBJECTS</th>
                                    <th>1<sup>st</sup> CA(20) SCORE</th>
                                    <th>2<sup>nd</sup> CA(10) SCORE</th>
                                    <th>EXAMINATION(70) SCORE</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                if ($student_data["class_placement"] == "Pre Kindergarten") {
                                ?>
                                    <tr>
                                        <td>English Language</td>
                                        <td><input type="number" name="english_language_first_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="english_language_second_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="english_language_examination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Mathematics</td>
                                        <td><input type="number" name="mathematics_first_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="mathematics_second_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="mathematics_examination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Hand Writing</td>
                                        <td><input type="number" name="hand_writing_first_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="hand_writing_second_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="hand_writing_examination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Rhymes</td>
                                        <td><input type="number" name="rhymes_first_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="rhymes_second_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="rhymes_examination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Coloring</td>
                                        <td><input type="number" name="coloringfirst_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="coloringsecond_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="coloringexamination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Practcal Life</td>
                                        <td><input type="number" name="practcal_life_first_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="practcal_life_second_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="practcal_life_examination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Health Habits</td>
                                        <td><input type="number" name="health_habits_first_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="health_habits_second_ca_score" placeholder="0" class="form-control"></td>
                                        <td><input type="number" name="health_habits_examination_score" placeholder="0" class="form-control"></td>
                                    </tr>
                                <?php
                                } else if ($student_data["class_placement"] == "Kindergarten 1" || $student_data["class_placement"] == "Kindergarten 2" || $student_data["class_placement"] == "Kindergarten 3") {
                                ?>
                                    <h2>Kindergarten</h2>
                                <?php
                                } else if ($student_data["class_placement"] == "Primary 1" || $student_data["class_placement"] == "Primary 2") {
                                ?>
                                    <h2>Lower Primary</h2>
                                <?php
                                } else if ($student_data["class_placement"] == "Primary 3" || $student_data["class_placement"] == "Primary 4" || $student_data["class_placement"] == "Primary 5") {
                                ?>
                                    <h2>Upper Primary</h2>
                                <?php
                                } else if ($student_data["class_placement"] == "JSS 1" || $student_data["class_placement"] == "JSS 2" || $student_data["class_placement"] == "JSS 3") {
                                ?>
                                    <h2>Junior Secondary</h2>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer d-flex">
                    <button type="reset" class="me-auto btn btn-secondary"><i class='bx bx-reset'></i> Reset</button>
                    <button type="submit" class="btn btn-success" name="save_termly_report"><i class='bx bx-save'></i> Save Entries</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="new_employee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">New Employee</h1>
                <button type="button" class="border-0" style="border-radius: 5px; padding: 4px 4px 0; background-color: #FF0000;" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x bx-tada text-light' style="font-size: 24px;"></i></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="term_tag" class="form-label">Term Tag</label>
                            <input type="text" id="term_tag" placeholder="e.g. 2023/24" class="form-control">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="term_start_date" class="form-label">Start Date</label>
                            <input type="date" id="term_start_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="term_stop_date" class="form-label">Stop Date</label>
                            <input type="date" id="term_stop_date" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex">
                <button type="button" class="me-auto btn btn-secondary float-start"><i class='bx bx-reset'></i> Cancel</button>
                <button type="button" class="btn btn-success"><i class='bx bx-save'></i> Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new_payroll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">New Payroll</h1>
                <button type="button" class="border-0" style="border-radius: 5px; padding: 4px 4px 0; background-color: #FF0000;" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x bx-tada text-light' style="font-size: 24px;"></i></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label for="term_tag" class="form-label">Term Tag</label>
                            <input type="text" id="term_tag" placeholder="e.g. 2023/24" class="form-control">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="term_start_date" class="form-label">Start Date</label>
                            <input type="date" id="term_start_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="term_stop_date" class="form-label">Stop Date</label>
                            <input type="date" id="term_stop_date" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex">
                <button type="button" class="me-auto btn btn-secondary float-start"><i class='bx bx-reset'></i> Cancel</button>
                <button type="button" class="btn btn-success"><i class='bx bx-save'></i> Save Changes</button>
            </div>
        </div>
    </div>
</div>