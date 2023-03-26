<?php

include "../server/server.php";

if (isset($_SESSION['authorized'])) {
    $manager_data = fetch_manager_data($_SESSION['authorized']);
} else {
    header('Location: ./login');
    exit();
}
