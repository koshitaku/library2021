
<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set('Asia/Tokyo');

$host = "us-cdbr-east-04.cleardb.com";

$db = "heroku_1bdb8dde0683137";
$user = "b9cf8537cbb86a";
$pass = "13f5bfba";
$charset = 'utf8'

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try{
	$pdo = new PDO($dsn.$user,$pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE_EXCEPTION);
	
} catch(PDOException $e) {
	throw new PDOException($e->Message());
}

?>
