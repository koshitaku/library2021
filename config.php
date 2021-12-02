<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set('Asia/Tokyo');
$DBHOST = "us-cdbr-east-04.cleardb.com";
$DBPORT = "3306";
$DBNAME = "heroku_b718dc87871f12f";
$DBUSER = "b65770169c839b";
$DBPASS = "16639ad0";
//2021/3/17 pg_connectに修正 
$connStr = "host=$DBHOST port=$DBPORT dbname=$DBNAME user=$DBUSER password=$DBPASS";
$conn = pg_connect($connStr) or die("can't connect db");
//var_dump($conn);

/* try {$conn = new PDO("pgsql:host=$DBHOST;port=$DBPORT;dbname=$DBNAME;user=$DBUSER;password=$DBPASS");}
catch (PDOException $e) {
	echo 'DB接続エラー： ' . $e->getMessage();
} */
?>
