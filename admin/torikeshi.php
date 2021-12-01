<?php
include("../config.php");
require_once('ly_check.php');
?>

<?php
$id = $_GET['id'];
$conn->exec("update yx_books set where id='$id'");
echo "<script language=javascript>alert('取消しました');window.location='admin_index.php'</script>";
?>
