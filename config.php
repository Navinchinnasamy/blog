<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

$environment = "development";

if ($environment == "development") {
    $host = 'localhost';
    $user = 'navin';
    $password = 'navin21594';
    $db_name = 'myblog';
} else {
    $host = 'localhost';
    $user = 'id231495_navin';
    $password = 'navin21594';
    $db_name = 'id231495_navin';
}


$conn = mysqli_connect($host, $user, $password) or die ("could not connect to mysql");
mysqli_select_db($conn, $db_name) or die ("no database");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$client_ip = get_client_ip();

$usr_log = mysqli_query($conn, "INSERT INTO users_log(ip, agent, created_at) VALUES('{$client_ip}', '{$_SERVER['HTTP_USER_AGENT']}', '" . date('Y-m-d H:i:s') . "')");

if (!$usr_log) {
    echo "Error in insertion " . mysqli_error($conn);
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

?>