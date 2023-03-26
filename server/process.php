<?php

session_start();

include 'db_conn.php';
include "send_mail.php";

function create_manager($form_data)
{
    $db_conn = connect_to_database();
    $cipher_algorithm = "AES-256-CBC";
    $designated_manager_id = bin2hex(random_bytes(32));

    if ($_FILES["profile_photo"]["size"] > 1000000) {
        $_SESSION['feedback'] = "Error: File is too large. Maximum file size is 1mb.";
        $_SESSION['type'] = "warning";
        return false;
    }

    $designated_manager_data = array(
        "account_role" => "Manager",
        "reg_date" => date('M jS Y'),
        "last_name" => $form_data["last_name"],
        "first_name" => $form_data["first_name"],
        "profile_photo" => '../server/data_entries/managers/' . bin2hex(random_bytes(32)) . '.' . pathinfo($_FILES["profile_photo"]["name"], PATHINFO_EXTENSION),
    );

    $designated_manager_pass = array(
        "account_status" => "Dormant",
        "username" => $form_data["username"],
        "encryption_key" => random_bytes(32),
        "access_token" => bin2hex(random_bytes(32)),
        "initialization_vector" => random_bytes(16),
        "email_address" => $form_data["email_address"],
        "password" => password_hash($form_data["password"], PASSWORD_BCRYPT),
    );

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.username') = ? OR JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.email_address') = ?");
    $stmt->bind_param("ss", $designated_manager_pass['username'], $designated_manager_pass['email_address']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['feedback'] = "Error: Email or Username exists already.";
        $_SESSION['type'] = "warning";
        return false;
    }

    $mail_data = array(
        "designated_manager_id" => $designated_manager_id,
        "account_role" => $designated_manager_data["account_role"],
        "email_address" => $designated_manager_pass["email_address"],
        "full_names" => $designated_manager_data["first_name"] . " " . $designated_manager_data["last_name"],
    );

    if (!send_mail($mail_data)) {
        $_SESSION['feedback'] = "Error: Unable to send email.";
        $_SESSION['type'] = "danger";
        return false;
    }

    if (!move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $designated_manager_data["profile_photo"])) {
        $_SESSION['feedback'] = "Error: Unable to upload image.";
        $_SESSION['type'] = "danger";
        return false;
    }

    $designated_manager_data = bin2hex(openssl_encrypt(json_encode($designated_manager_data), $cipher_algorithm, $designated_manager_pass["encryption_key"], 0, $designated_manager_pass["initialization_vector"]));
    $designated_manager_pass["encryption_key"] = bin2hex($designated_manager_pass["encryption_key"]);
    $designated_manager_pass["initialization_vector"] = bin2hex($designated_manager_pass["initialization_vector"]);
    $designated_manager_pass = bin2hex(json_encode($designated_manager_pass));

    $stmt = $db_conn->prepare("INSERT INTO `managers_accounts`(`designated_manager_id`, `designated_manager_pass`, `designated_manager_data`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $designated_manager_id, $designated_manager_pass, $designated_manager_data);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['feedback'] = "Account created successfully.";
        $_SESSION['type'] = "success";
        return true;
    } else {
        $_SESSION['feedback'] = "Error: Unable to create account.";
        $_SESSION['type'] = "danger";
        return false;
    }
}

function verify_email_address($designated_manager_pass)
{
    $db_conn = connect_to_database();
    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE `designated_manager_id` = ? AND JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.account_status') = ?");
    $stmt->bind_param("ss", $designated_manager_pass['designated_manager_id'], $designated_manager_pass['dormant_status']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $db_conn->prepare("UPDATE `managers_accounts` SET `designated_manager_pass` = HEX(JSON_SET(UNHEX(`designated_manager_pass`), '$.account_status', ?)) WHERE designated_manager_id = ?");
        $stmt->bind_param("ss", $designated_manager_pass['active_status'], $designated_manager_pass['designated_manager_id']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "Email has been successfully verified.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Unable to update data.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE `designated_manager_id` = ? AND JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.account_status') = ?");
        $stmt->bind_param("ss", $designated_manager_pass['designated_manager_id'], $designated_manager_pass['active_status']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['feedback'] = "Email has already been verified.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Invalid account data.";
            $_SESSION['type'] = "warning";
            return false;
        }
    }
}

function authenticate_login($form_data)
{
    $db_conn = connect_to_database();

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.username') = ? OR JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.email_address') = ?");
    $stmt->bind_param("ss", $form_data["account_holder"], $form_data["account_holder"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $designated_manager_pass = json_decode(hex2bin($row['designated_manager_pass']), true);

        if (password_verify($form_data["password"], $designated_manager_pass['password'])) {
            $_SESSION['designated_manager_id'] = $row['designated_manager_id'];
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Password is invalid.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Account does not exist in the system.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function retrieve_access_token($form_data)
{
    $db_conn = connect_to_database();

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.username') = ? OR JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.email_address') = ?");
    $stmt->bind_param("ss", $form_data["account_holder"], $form_data["account_holder"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $designated_manager_pass = json_decode(hex2bin($row['designated_manager_pass']), true);

        $access_token = $designated_manager_pass['access_token'];
        $access_token = password_hash($access_token, PASSWORD_BCRYPT);
        $access_token = urlencode($access_token);

        $encoded_access_token = "https://api.qrserver.com/v1/create-qr-code/?data=$access_token&size=250x250&color=000000";
        $_SESSION['encoded_access_token'] = $encoded_access_token;
        return true;
    } else {
        $_SESSION['feedback'] = "Error: Invalid account credentials.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function authorize_login($form_data)
{
    $db_conn = connect_to_database();

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE `designated_manager_id` = ?");
    $stmt->bind_param("s", $form_data["designated_manager_id"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $designated_manager_pass = json_decode(hex2bin($row['designated_manager_pass']), true);

        if (password_verify($designated_manager_pass["access_token"], $form_data['authorize_login'])) {
            $access_token = bin2hex(random_bytes(32));

            $stmt = $db_conn->prepare("UPDATE `managers_accounts` SET `designated_manager_pass` = HEX(JSON_SET(UNHEX(`designated_manager_pass`), '$.access_token', ?)) WHERE designated_manager_id = ?");
            $stmt->bind_param("ss", $access_token, $form_data['designated_manager_id']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $_SESSION['authorized'] = $form_data['designated_manager_id'];
                header("location: ./");
                return true;
            } else {
                $_SESSION['feedback'] = "Error: Unable to update data.";
                $_SESSION['type'] = "warning";
                return false;
            }
        } else {
            $_SESSION['feedback'] = "Error: Access token is invalid.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Account does not exist in the system.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function recover_password($form_data)
{
    $db_conn = connect_to_database();

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.username') = ? OR JSON_EXTRACT(UNHEX(`designated_manager_pass`), '$.email_address') = ?");
    $stmt->bind_param("ss", $form_data["account_holder"], $form_data["account_holder"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['designated_manager_id'] = $row['designated_manager_id'];
        return true;
    } else {
        $_SESSION['feedback'] = "Error: Account does not exist in the system.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function authorize_password_recovery($form_data)
{
    $db_conn = connect_to_database();

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE `designated_manager_id` = ?");
    $stmt->bind_param("s", $form_data["designated_manager_id"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $designated_manager_pass = json_decode(hex2bin($row['designated_manager_pass']), true);

        if (password_verify($designated_manager_pass["access_token"], $form_data['authorize_password_recovery'])) {
            $_SESSION['reset_password'] = $form_data['designated_manager_id'];
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Access token is invalid.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Account does not exist in the system.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function reset_password($form_data)
{
    $db_conn = connect_to_database();

    if (strcmp($form_data['password'], $form_data['confirm_password']) == 0) {
        $access_token = bin2hex(random_bytes(32));
        $form_data["password"] = password_hash($form_data["password"], PASSWORD_BCRYPT);

        $stmt = $db_conn->prepare("UPDATE `managers_accounts` SET `designated_manager_pass` = HEX(JSON_SET(UNHEX(`designated_manager_pass`), '$.password', ?, '$.access_token', ?)) WHERE designated_manager_id = ?");
        $stmt->bind_param("sss", $form_data['password'], $access_token, $form_data['designated_manager_id']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['password_updated'] = $form_data['designated_manager_id'];
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Unable to update data.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Passwords do not match.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function fetch_designated_manager_data($designated_manager_id)
{
    $db_conn = connect_to_database();
    $cipher_algorithm = "AES-256-CBC";

    if (date('H') < 12) {
        $greeting = 'Good morning!';
    } else if (date('H') < 18) {
        $greeting = 'Good afternoon!';
    } else {
        $greeting = 'Good evening!';
    }

    $stmt = $db_conn->prepare("SELECT * FROM `managers_accounts` WHERE `designated_manager_id` = ?");
    $stmt->bind_param("s", $designated_manager_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $designated_manager_pass = json_decode(hex2bin($row['designated_manager_pass']), true);
        $designated_manager_data = openssl_decrypt(hex2bin($row['designated_manager_data']), $cipher_algorithm, hex2bin($designated_manager_pass["encryption_key"]), 0, hex2bin($designated_manager_pass["initialization_vector"]));
        $designated_manager_data = array('designated_manager_pass' => $designated_manager_pass, 'designated_manager_data' => json_decode($designated_manager_data, true));
        $designated_manager_data = array_merge($designated_manager_data['designated_manager_pass'], $designated_manager_data['designated_manager_data']);
        $designated_manager_data['greeting'] = $greeting;
        return $designated_manager_data;
    } else {
        $_SESSION['feedback'] = "Error: Account does not exist in the system.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function update_session_and_term($form_data)
{
    $db_conn = connect_to_database();
    $designated_session_and_term_id = bin2hex(random_bytes(32));

    $designated_session_and_term_data = array(
        "session_tag" => $form_data["session_tag"],
        "term_tag" => $form_data["term_tag"],
        "main_campus" => "BBA Ughelli",
        "session_start" => date("d, M Y", strtotime($form_data["session_start"])),
        "session_stop" => date("d, M Y", strtotime($form_data["session_stop"])),
        "term_start" => date("d, M Y", strtotime($form_data["term_start"])),
        "term_stop" => date("d, M Y", strtotime($form_data["term_stop"])),
        "session_and_term_status" => "Active",
    );

    $stmt = $db_conn->prepare("SELECT * FROM `sessions_and_terms` WHERE JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.session_tag') = ? AND JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.term_tag') = ?");
    $stmt->bind_param("ss", $designated_session_and_term_data['session_tag'], $designated_session_and_term_data['term_tag']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $db_conn->prepare("UPDATE `sessions_and_terms` SET `designated_session_and_term_data` = HEX(JSON_SET(UNHEX(`designated_session_and_term_data`), '$.session_start', ?, '$.session_stop', ?, '$.term_start', ?, '$.term_stop', ?)) WHERE JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.session_tag') = ? AND JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.term_tag') = ?");

        $stmt->bind_param("ssssss", $designated_session_and_term_data['session_start'], $designated_session_and_term_data['session_stop'], $designated_session_and_term_data['term_start'], $designated_session_and_term_data['term_stop'], $designated_session_and_term_data['session_tag'], $designated_session_and_term_data['term_tag']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "Current Session/Term updated successfully.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Unable to update current Session/Term.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $dormant_status = "Dormant";
        $stmt = $db_conn->prepare("UPDATE `sessions_and_terms` SET `designated_session_and_term_data` = HEX(JSON_SET(UNHEX(`designated_session_and_term_data`), '$.session_and_term_status', ?)) WHERE JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.session_and_term_status') = ?");
        $stmt->bind_param("ss", $dormant_status, $designated_session_and_term_data['session_and_term_status']);
        $stmt->execute();

        $designated_session_and_term_data = bin2hex(json_encode($designated_session_and_term_data));
        $stmt = $db_conn->prepare("INSERT INTO `sessions_and_terms`(`designated_session_and_term_id`, `designated_session_and_term_data`) VALUES (?, ?)");
        $stmt->bind_param("ss", $designated_session_and_term_id, $designated_session_and_term_data);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "New Session/Term created successfully.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Unable to create new Session/Term.";
            $_SESSION['type'] = "danger";
            return false;
        }
    }
}

function activate_session_and_term($form_data)
{
    $db_conn = connect_to_database();
    $dormant_status = "Dormant";
    $active_status = "Active";

    $stmt = $db_conn->prepare("UPDATE `sessions_and_terms` SET `designated_session_and_term_data` = HEX(JSON_SET(UNHEX(`designated_session_and_term_data`), '$.session_and_term_status', ?)) WHERE JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.session_and_term_status') = ?");
    $stmt->bind_param("ss", $dormant_status, $active_status);
    $stmt->execute();

    $stmt = $db_conn->prepare("UPDATE `sessions_and_terms` SET `designated_session_and_term_data` = HEX(JSON_SET(UNHEX(`designated_session_and_term_data`), '$.session_and_term_status', ?)) WHERE `designated_session_and_term_id` = ?");
    $stmt->bind_param("ss", $active_status, $form_data['designated_session_and_term_id']);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['feedback'] = "Session/Term activated successfully.";
        $_SESSION['type'] = "success";
        return true;
    } else {
        $_SESSION['feedback'] = "Error: Unable to activate Session/Term.";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function delete_session_and_term($form_data)
{
    $db_conn = connect_to_database();
    $active_status = "Active";

    $stmt = $db_conn->prepare("SELECT * FROM `sessions_and_terms` WHERE `designated_session_and_term_id` = ? AND JSON_EXTRACT(UNHEX(`designated_session_and_term_data`), '$.session_and_term_status') = ?");
    $stmt->bind_param("ss", $form_data['designated_session_and_term_id'], $active_status);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['feedback'] = "Error: Active Sessions/Terms can't be deleted!";
        $_SESSION['type'] = "warning";
        return false;
    } else {
        $stmt = $db_conn->prepare("DELETE FROM `sessions_and_terms` WHERE `designated_session_and_term_id` = ?");
        $stmt->bind_param("s", $form_data['designated_session_and_term_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "Session/Term deleted successfully.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Unable to delete Session/Term.";
            $_SESSION['type'] = "warning";
            return false;
        }
    }
}

function new_admission($form_data)
{
    $db_conn = connect_to_database();
    $designated_student_id = bin2hex(random_bytes(32));
    $school_prefix = "BBA--";

    if ($_FILES["profile_photo"]["size"] > 1000000) {
        $_SESSION['feedback'] = "Error: File is too large. Maximum file size is 1mb.";
        $_SESSION['type'] = "warning";
        return false;
    }

    $stmt = $db_conn->prepare("SELECT MAX(CAST(JSON_EXTRACT(`designated_student_data`, '$.admission_number') AS UNSIGNED)) AS `current_admission_number` FROM `students_accounts`");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_admission_number = $row['current_admission_number'];
        $new_admission_number = $current_admission_number + 1;
    } else {
        $new_admission_number = 1;
    }

    $designated_student_data = array(
        "surname" => $form_data["surname"],
        "first_name" => $form_data["first_name"],
        "other_names" => $form_data["other_names"],
        "date_of_birth" => $form_data["date_of_birth"],
        "gender" => $form_data["gender"],
        "class_placement" => $form_data["class_placement"],
        "country" => $form_data["country"],
        "region" => $form_data["region"],
        "city" => $form_data["city"],
        "admission_number" => sprintf("%s%03d", $school_prefix, $new_admission_number),
        "residential_address" => $form_data["residential_address"],
        "parent_full_names" => $form_data["parent_full_names"],
        "parent_phone_number" => $form_data["parent_phone_number"],
        "parent_occupation" => $form_data["parent_occupation"],
        "query_category" => $form_data["query_category"],
        "registration_date" => date('M jS Y'),
        "admission_status" => "Active",
        "profile_photo" => '../server/data_entries/students/' . bin2hex(random_bytes(32)) . '.' . pathinfo($_FILES["profile_photo"]["name"], PATHINFO_EXTENSION),
    );

    if (!move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $designated_student_data["profile_photo"])) {
        $_SESSION['feedback'] = "Error: Unable to upload image.";
        $_SESSION['type'] = "danger";
        return false;
    }

    $designated_student_data = bin2hex(json_encode($designated_student_data));

    $stmt = $db_conn->prepare("INSERT INTO `students_accounts`(`designated_student_id`, `designated_student_data`) VALUES (?, ?)");
    $stmt->bind_param("ss", $designated_student_id, $designated_student_data);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['feedback'] = "Admission completed successfully!  ";
        $_SESSION['type'] = "success";
        return true;
    } else {
        $_SESSION['feedback'] = "Error: Admission process could not be completed.";
        $_SESSION['type'] = "danger";
        return false;
    }
}

function delete_student_account($form_data)
{
    $db_conn = connect_to_database();

    $stmt = $db_conn->prepare("SELECT * FROM `students_accounts` WHERE `designated_student_id` = ?");
    $stmt->bind_param("s", $form_data['designated_student_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $db_conn->prepare("DELETE FROM `students_accounts` WHERE `designated_student_id` = ?");
        $stmt->bind_param("s", $form_data['designated_student_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "Student account deleted successfully.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Error: Unable to delete student account.";
            $_SESSION['type'] = "warning";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Invalid student ID!";
        $_SESSION['type'] = "warning";
        return false;
    }
}

function update_student_credentials($form_data)
{
    $db_conn = connect_to_database();
    unset($form_data['update_student_credentials']);

    foreach ($form_data as $key => $value) {
        if (empty($value)) {
            unset($form_data[$key]);
        }
    }

    $stmt = $db_conn->prepare("SELECT * FROM `students_accounts` WHERE `designated_student_id` = ?");
    $stmt->bind_param("s", $form_data['designated_student_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sql = "UPDATE `students_accounts` SET `designated_student_data` = HEX(JSON_SET(UNHEX(`designated_student_data`), ";
        $params = array();
        foreach ($form_data as $key => $value) {
            $sql .= "'$." . $key . "', ?, ";
            $params[] = $value;
        }
        $sql = rtrim($sql, ", ");
        $sql .= ")) WHERE `designated_student_id` = ?";
        $params[] = $form_data['designated_student_id'];

        $stmt = $db_conn->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($params)), ...$params);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "The updates to the student's credentials have been saved successfully.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Information: The records were already up to date, so no changes were made.";
            $_SESSION['type'] = "primary";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Invalid student ID!";
        $_SESSION['type'] = "danger";
        return false;
    }
}

function update_student_profile_photo($form_data)
{
    $db_conn = connect_to_database();
    foreach ($form_data as $key => $value) {
        if (empty($value)) {
            unset($form_data[$key]);
        }
    }

    if ($_FILES["profile_photo"]["size"] > 1000000) {
        $_SESSION['feedback'] = "Error: File is too large. Maximum file size is 1mb.";
        $_SESSION['type'] = "warning";
        return false;
    }

    $stmt = $db_conn->prepare("SELECT * FROM `students_accounts` WHERE `designated_student_id` = ?");
    $stmt->bind_param("s", $form_data['designated_student_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $designated_student_data = json_decode(hex2bin($row['designated_student_data']), true);

        if (!unlink($designated_student_data['profile_photo'])) {
            $_SESSION['feedback'] = "Error: Unable to update phofile photo.";
            $_SESSION['type'] = "danger";
            return false;
        }

        $new_profile_photo = '../server/data_entries/students/' . bin2hex(random_bytes(32)) . '.' . pathinfo($_FILES["profile_photo"]["name"], PATHINFO_EXTENSION);

        if (!move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $new_profile_photo)) {
            $_SESSION['feedback'] = "Error: Unable to upload image.";
            $_SESSION['type'] = "danger";
            return false;
        }

        $stmt = $db_conn->prepare("UPDATE `students_accounts` SET `designated_student_data` = HEX(JSON_SET(UNHEX(`designated_student_data`), '$.profile_photo', ?)) WHERE `designated_student_id` = ?");
        $stmt->bind_param("ss", $new_profile_photo, $form_data['designated_student_id']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['feedback'] = "The updates to the student's profile photo have been saved successfully.";
            $_SESSION['type'] = "success";
            return true;
        } else {
            $_SESSION['feedback'] = "Information: The records were already up to date, so no changes were made.";
            $_SESSION['type'] = "primary";
            return false;
        }
    } else {
        $_SESSION['feedback'] = "Error: Invalid student ID!";
        $_SESSION['type'] = "danger";
        return false;
    }
}
