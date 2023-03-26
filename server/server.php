<?php

include 'process.php';

if (isset($_POST['new_manager'])) {
    create_manager($_POST);
}

if (isset($_POST['authenticate_login'])) {
    authenticate_login($_POST);
}

if (isset($_POST['retrieve_access_token'])) {
    retrieve_access_token($_POST);
}

if (isset($_POST['authorize_login'])) {
    authorize_login($_POST);
}

if (isset($_POST['recover_password'])) {
    recover_password($_POST);
}

if (isset($_POST['authorize_password_recovery'])) {
    authorize_password_recovery($_POST);
}

if (isset($_POST['reset_password'])) {
    reset_password($_POST);
}

if (isset($_POST['update_session_and_term'])) {
    update_session_and_term($_POST);
}

if (isset($_POST['activate_session_and_term'])) {
    activate_session_and_term($_POST);
}

if (isset($_POST['delete_session_and_term'])) {
    delete_session_and_term($_POST);
}

if (isset($_POST['new_admission'])) {
    new_admission($_POST);
}

if (isset($_POST['delete_student_account'])) {
    delete_student_account($_POST);
}

if (isset($_POST['update_student_credentials'])) {
    update_student_credentials($_POST);
}

if (isset($_POST['update_student_profile_photo'])) {
    update_student_profile_photo($_POST);
}

if (isset($_POST['create_termly_report'])) {
    create_termly_report($_POST);
}
