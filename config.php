
<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set('Asia/Tokyo');
$DBHOST = "us-cdbr-east-04.cleardb.com";
$DBPORT = "3306";
$DBNAME = "heroku_1bdb8dde0683137";
$DBUSER = "b9cf8537cbb86a";
$DBPASS = "13f5bfba";
//2021/3/17 pg_connect‚ÉC³ 
$connStr = "host=$DBHOST port=$DBPORT dbname=$DBNAME user=$DBUSER password=$DBPASS";
$conn = pg_connect($connStr) or die("can't connect db");
//var_dump($conn);

/* try {$conn = new PDO("pgsql:host=$DBHOST;port=$DBPORT;dbname=$DBNAME;user=$DBUSER;password=$DBPASS");}
catch (PDOException $e) {
	echo 'DBÚ‘±ƒGƒ‰[F ' . $e->getMessage();
} */
?>
