<?php

include "../server/server.php";

if (isset($_SESSION['authorized'])) {
    header('Location: ./');
}
