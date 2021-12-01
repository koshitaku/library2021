<?php require_once('ly_check.php'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8">
        <title>図書館貸し出しシステム</title>
        <link href="images/css.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        $password = $_SESSION["pwd"];
        $sql = "select * from admin where password='$password'";
        $rs = $conn->query($sql);
        $rows = $rs->fetch();
        if ($_POST["Submit"]) {
            if ($rows["password"] == $_POST["password"]) {
                $password2 = $_POST["password2"];
                $sql = "update admin set password='$password2' where id=1";
                $conn->exec($sql);
                echo "<script language=javascript>alert('変更しました');window.location='login.php'</script>";
                exit();
            } else
                
                ?>
            <?php {
                ?>
                <script language="javascript">
                    alert("元のパスワードが正しくありません")
                    location.href = "renpassword.php";
                </script>
                <?php
            }
        }
        ?>

        <table cellpadding="3" cellspacing="1" border="0" width="100%" class="table" align=center>
            <form name="renpassword" method="post" action="">
                <tr> 
                    <th height=25 colspan=4 align="center" class="bg_tr">パスワードを変更する</th>
                </tr>
                <tr> 
                    <td width="40%" align="right" class="td_bg">ユーザ：</td>
                    <td width="60%" class="td_bg"><?php echo $rows["username"] ?></td>
                </tr>
                <tr> 
                    <td align="right" class="td_bg">元のパスワード：</td>
                    <td class="td_bg"><input name="password" type="password" id="password" size="20"></td>
                </tr>
                <tr> 
                    <td align="right" class="td_bg">新しいパスワード：</td>
                    <td class="td_bg"><input name="password1" type="password" id="password1" size="20"></td>
                </tr>
                <tr> 
                    <td align="right" class="td_bg">もう一度確認してください：</td>
                    <td class="td_bg"><input  name="password2" type="password" id="password2" size="20"></td>
                </tr>
                <tr> 
                    <td colspan="2" align="center" class="td_bg"> 
                        <input class="button" onClick="return check();" type="submit" name="Submit" value="変更する">
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>
<script LANGUAGE="javascript">
<!--
    function checkspace(checkstr) {
        var str = '';
        for (i = 0; i < checkstr.length; i++) {
            str = str + ' ';
        }
        return (str == checkstr);
    }
    function check()
    {
        if (checkspace(document.renpassword.password.value)) {
            document.renpassword.password.focus();
            alert("元のパスワードを入力してください");
            return false;
        }
        if (checkspace(document.renpassword.password1.value)) {
            document.renpassword.password1.focus();
            alert("新しいパスワードを入力してください");
            return false;
        }
        if (checkspace(document.renpassword.password2.value)) {
            document.renpassword.password2.focus();
            alert("新しいパスワードを入力してください");
            return false;
        }
        if (document.renpassword.password1.value != document.renpassword.password2.value) {
            document.renpassword.password1.focus();
            document.renpassword.password1.value = '';
            document.renpassword.password2.value = '';
            alert("もう一度入力してください");
            return false;
        }
        document.admininfo.submit();
    }
//-->
</script> 
