<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set('Asia/Tokyo');

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("https://www.cleardb.com/database/details?id=7B4B85F84C198768722848FCFFA85F44"));
$cleardb_host = "us-cdbr-east-04.cleardb.com";
$cleardb_username = "b65770169c839b";
$cleardb_password = "16639ad0";
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_host, $cleardb_username, $cleardb_password, $cleardb_db);




?>
