<?php
session_start();
//Server detail
$db_user = "root";
$db_password = "";
$db_name = "yrc_dpste66";
// $db_user = "root_yrc_dpste66";
// $db_password = "4efJ083d#";
// $db_name = "yrc_dpste66";
$server_name = "localhost";
$db_char_code = "utf8";
$db_collation = "utf8_general_ci";
date_default_timezone_set('Asia/Bangkok');

//Connect to database
$conn = mysqli_connect($server_name, $db_user, $db_password, $db_name);

if (mysqli_connect_errno()) {
    die("Can not connect to DB Server : " . mysqli_connect_error());
}
//Set UTF8
mysqli_query($conn, "SET NAMES $db_char_code") or die(mysqli_error($conn));
mysqli_query($conn, "SET collation_connection = '$db_collation' ");
