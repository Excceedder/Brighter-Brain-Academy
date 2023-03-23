<?php

function send_mail($mail_data)
{
    include "mail_server.php";
    $template_file = './server/templates/verify.php';
    $swap_var = array(
        "{ORGANISATION}" => "Brighter Brain Academy",
        "{FULL_NAMES}" => $mail_data['full_names'],
        "{ROLE}" => $mail_data['account_role'],
        "{URL}" => "https://manager.brighterbrainacademy.com/verify?designated_manager_id={$mail_data['designated_manager_id']}",
    );

    $message = file_get_contents($template_file);
    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $message = str_replace($key, $swap_var[$key], $message);
        }
    }

    $mail->addAddress($mail_data['email_address']);
    $mail->Subject = 'Email Verification';
    $mail->Body    = $message;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}
