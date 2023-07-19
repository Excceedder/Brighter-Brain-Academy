<?php

$db_conn_details = [
    'host' => 'srv710.hstgr.io',
    'user' => 'u107856230_bba_data',
    'password' => 'Southecured@072##@!',
    'database' => 'u107856230_bba_data',
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
