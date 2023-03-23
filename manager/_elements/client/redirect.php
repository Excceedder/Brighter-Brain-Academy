<?php

include "./server/server.php";

if (isset($_SESSION['authorized'])) {
    $designated_manager_data = fetch_designated_manager_data($_SESSION['authorized']);
} else {
    header('Location: ./login');
    exit();
}
