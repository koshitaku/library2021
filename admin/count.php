<?php
include("../config.php");
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <title>図書館貸し出しシステム</title>
        <link rel="stylesheet" href="images/css.css" type="text/css">
    </head>
    <body>
        <table width="799" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table">
            <tr>
                <td height="27" colspan="2" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;admin&nbsp;&gt;&gt;&nbsp;在庫</td>
            </tr>
            <tr>
                <td align="center" bgcolor="#FFFFFF" height="27">タイプ</td>
                <td align="center" bgcolor="#FFFFFF">在庫数</td>
            </tr>
            <?php
            $sql = "select type, sum(total) from yx_books group by type";
            $val = $conn->query($sql);
            while ($arr = $val->fetch()) {
                echo "<tr height='30'>";
                echo "<td align='center' bgcolor='#FFFFFF'>" . $arr[0] . "</td>";
                echo "<td align='center' bgcolor='#FFFFFF'>" . $arr[1] . "&nbsp;冊</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>