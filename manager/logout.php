<?php
session_start();
unset($_SESSION['authorized']);
header('location: ./login');
exit();
