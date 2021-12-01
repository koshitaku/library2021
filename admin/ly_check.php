<?php
require_once("../config.php");
if ($_SESSION["admin"] == "") {
    echo "<script language=javascript>alert('登録してください');window.location='login.php'</script>";
}
?>