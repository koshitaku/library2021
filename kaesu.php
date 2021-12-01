<?php
include("config.php");
if ($_SESSION['id'] == "") {
    echo "<script language=javascript>alert('登録してください');window.location='landing.php'</script>";
    exit();
}
$book_id = $_GET[book_id];
 
$returnsql = "delete from lend where book_id='$book_id' and user_id=" . $_SESSION['id'];
$conn->exec($returnsql) or die("失敗しました：" . errorInfo());
//	$booksql="update yx_books set leave_number=leave_number - 1 where id='$book_id'";
$conn->exec("update yx_books set total=total+1 where id='$book_id'");
echo "<script language=javascript>alert('返しました');window.location='tulinmedia.php'</script>";
//$conn->exec($booksql) or die("失敗しました：" . errorInfo());
?>

