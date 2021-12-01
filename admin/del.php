<?php
include("../config.php");
require_once('ly_check.php');
$sql = "delete from yx_books where id=" . $_GET[id];
$arry = $conn->exec($sql);
echo "<script> alert('ほんとに削除しますか？')</script>";

if ($arry) {
    echo "<script> alert('削除しました');location='list.php';</script>";
} else
    echo "失敗しました";
?>