<?php
require_once("../config.php");
?>
<?php
if ($_POST["Submit"]) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $code = $_POST["code"];
    if ($code <> $_SESSION["auth"]) {
        echo "<script language=javascript>alert('確認コードは正しくありません');window.location='login.php'</script>";
        ?>
        <?php
        die();
    }
    $sql = "select * from admin where username='$username' and password='$pwd'";
    $rs = $conn->query($sql);
    if ($rs->rowCount() == 1) {
        $_SESSION["pwd"] = $_POST["pwd"];
        $_SESSION["admin"] = session_id();
        echo "<script language=javascript>window.location='admin_index.php'</script>";
    } else {
        echo "<script language=javascript>alert('ユーザを入力してください');window.location='login.php'</script>";
        ?>
        <?php
        die();
    }
}
?>
<?php
//if ($_GET['tj'] == 'out') {
//    session_destroy();
//    echo "<script language=javascript>window.location='login.php'</script>";
//}
//?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
        <title>図書館貸し出しシステム</title>
        <link rel="stylesheet" type="text/css" href="images/style.css"/>
    </head>
    <body>
        <div id="top"> </div>
        <form id="frm" name="frm" method="post" action="" onSubmit="return check()">
            <div id="center">
                <div id="center_left"></div>
                <div id="center_middle">
                    <div class="user">
                        <label>admin：
                            <input type="text" name="username" id="username" />
                        </label>
                    </div>
                    <div class="user">
                        <label>パスワード：
                            <input type="password" name="pwd" id="pwd" />
                        </label>
                    </div>
                    <div class="chknumber">
                        <label>確認コード：
                            <input name="code" type="text" id="code" maxlength="4" class="chknumber_input" />
                        </label>
                        <img src="verify.php" style="vertical-align:middle" />
                    </div>
                </div>
                <div id="center_middle_right"></div>
                <div id="center_submit">
                    <div class="button"> <input type="submit" name="Submit" class="submit" value="&nbsp;">
                    </div>	  
                    <div class="button"><input type="reset" name="Submit" class="reset" value=""> </div>
                </div>
            </div>
        </form>
        <div id="footer"></div>


    </body>
</html>