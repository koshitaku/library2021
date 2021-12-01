<?php
include("../config.php");
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
        <title>図書館貸し出しシステム</title>
        <link rel="stylesheet" href="images/css.css" type="text/css">
    </head>
    <body>
        <?php
        $pagesize = 10;
        $sql = "select * from yx_books";
        $rs = $conn->query($sql);
        $recordcount = $rs->rowCount();
        $pagecount = ($recordcount - 1) / $pagesize + 1;
        $pagecount = (int) $pagecount;
        $pageno = $_GET["pageno"];
        if ($pageno == "") {
            $pageno = 1;
        }
        if ($pageno < 1) {
            $pageno = 1;
        }
        if ($pageno > $pagecount) {
            $pageno = $pagecount;
        }
        $startno = ($pageno - 1) * $pagesize;
        $sql = "select * from yx_books order by id desc limit $startno,$pagesize";
        $rs = $conn->query($sql);
        ?>
        <table width="1200" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
            <tr>
                <td height="27" colspan="10" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;admin&nbsp;&gt;&gt;&nbsp;図書管理</td>
            </tr>
            <tr>
                <td width="32" height="35" align="center" bgcolor="#FFFFFF">ID</td>
                <td width="120" align="center" bgcolor="#FFFFFF">タイトル</td>	
                <td width="40" align="center" bgcolor="#FFFFFF">価格</td>
                <td width="80" align="center" bgcolor="#FFFFFF">写真</td>
                <td width="80" align="center" bgcolor="#FFFFFF">タイプ</td>
                <td width="5" align="center" bgcolor="#FFFFFF">在庫数</td>
                <td width="5" align="center" bgcolor="#FFFFFF">貸し出す数</td>
                <td width="80" align="center" bgcolor="#FFFFFF">著者</td>
                <td width="250" align="center" bgcolor="#FFFFFF">出版者</td>

                <td width="100" align="center" bgcolor="#FFFFFF">ISBN</td>
                <td width="100" align="center" bgcolor="#FFFFFF">入庫時間</td>
                <td width="100" align="center" bgcolor="#FFFFFF">リンク</td>

                <td width="50" align="center" bgcolor="#FFFFFF">変更</td>
            </tr>
            <?php
            while ($rows = $rs->fetch()) {
                ?>
                <tr align="center">
                    <td class="td_bg" width="32"><?php echo $rows["id"] ?></td>
                    <td class="td_bg" width="100" height="26"><?php echo $rows["name"] ?></td>
                    <td class="td_bg" width="40" height="26"><?php echo $rows["price"] ?>円</td>
                    <td class="td_bg" width="80" height="26"><?php echo $rows["images"] ?></td>
                    <td width="80" height="26" class="td_bg"><?php echo $rows["type"] ?></td>
                    <td width="30" height="26" class="td_bg"><?php echo $rows["total"] ?>冊</td>
                    <td width="30" height="26" class="td_bg"><?php echo $rows["borrow"] ?>冊</td>
                    <td class="td_bg" width="80" height="26"><?php echo $rows["writer"] ?></td>
                    <td class="td_bg" width="100" height="26"><?php echo $rows["publisher"] ?></td>
                    <td class="td_bg" width="100" height="26"><?php echo $rows["ISBN"] ?></td>
                    <td class="td_bg" width="100" height="26"><?php echo $rows["uploadtime"] ?></td>
                    <td class="td_bg" width="200" height="26"><?php echo $rows["link"] ?></td>
                    <td class="td_bg" width="100">
                        <a href="update.php?id=<?php echo $rows[id] ?>" class="trlink">編集</a>&nbsp;&nbsp;<a href="del.php?id=<?php echo $rows[id] ?>" class="trlink">削除</a></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <th height="25" colspan="100" align="center" class="bg_tr">
                    <?php
                    if ($pageno == 1) {
                        ?>
                        ホーム | 前へ | <a href="?pageno=<?php echo $pageno + 1 ?>&id=<?php echo $id ?>">次へ</a> | <a href="?pageno=<?php echo $pagecount ?>&id=<?php echo $id ?>">最後</a>
                        <?php
                    } else if ($pageno == $pagecount) {
                        ?>
                        <a href="?pageno=1&id=<?php echo $id ?>">ホーム</a> | <a href="?pageno=<?php echo $pageno - 1 ?>&id=<?php echo $id ?>">前へ</a> | 次へ | 最後
                        <?php
                    } else {
                        ?>
                        <a href="?pageno=1&id=<?php echo $id ?>">ホーム</a> | <a href="?pageno=<?php echo $pageno - 1 ?>&id=<?php echo $id ?>">前へ</a> | <a href="?pageno=<?php echo $pageno + 1 ?>&id=<?php echo $id ?>" class="forumRowHighlight">次へ</a> | <a href="?pageno=<?php echo $pagecount ?>&id=<?php echo $id ?>">最後</a>
                        <?php
                    }
                    ?>
                    &nbsp;<?php echo $pageno ?>/<?php echo $pagecount ?>ページ&nbsp;<?php echo $recordcount ?>冊 </th>
            </tr>
        </table>
    </body>
</html>