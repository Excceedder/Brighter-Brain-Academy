<?php
session_start();
unset($_SESSION['termly_report_id']);
header('location: ./verify_credentials');
exit();
