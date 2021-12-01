<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set('Asia/Tokyo');
try {$conn = new PDO('mysql:dbname=library2021;
host=localhost;charset=utf8', 'root', '');}
catch (PDOException $e) {
	echo 'DB接続エラー： ' . $e->getMessage();
}
?>