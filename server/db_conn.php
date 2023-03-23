<?php

$db_conn_details = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'school-website'
];

function connect_to_database()
{
    global $db_conn_details;
    $db_conn = new mysqli(
        $db_conn_details['host'],
        $db_conn_details['user'],
        $db_conn_details['password'],
        $db_conn_details['database']
    );
    return $db_conn;
}
