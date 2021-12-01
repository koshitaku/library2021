<?php
session_start();
include("config.php");
?>
<div class="col-12 col-md-8 col-lg-10">
  <div class="row">
    <?php
    $pagesize = 12;
    if (!urldecode($_GET[proid])) {
        $sql = "select * from yx_books order by id desc";
    } else {
        $sql = "select * from yx_books where type='" . urldecode($_GET[proid]) . "'";
    }
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
    if (!urldecode($_GET[proid])) {
        $sql = "select * from yx_books order by id desc limit $startno,$pagesize";
    } else {
        $sql = "select * from yx_books where type='" . urldecode($_GET[proid]) . "' order by id desc limit $startno,$pagesize";
    }
    $rs = $conn->query($sql);
    ?>

    <?php
    while ($rows = $rs->fetch()) {
        ?>
        <div class="col-6 col-md-4">
            <div class="card mb-7">
              <div class="card-img">
            <?php
                echo '<a class="card-img-hover" href="' . $rows['link'] . '" target="_blank">';
                ?> 
                 <div class="col-sm-8">
                <p class="lead"><?php echo '<img src="admin/uploads/' . $rows['images'] . '" width="80px" height="100px"/></a><br>'; ?></div>
                        タイトル：<?php echo $rows['name'] . "<br>"; ?>
                        価格：<?php echo $rows["price"] . "<br>"; ?>
                       <!-- 内容：<?php /* echo $rows["detail"] . "<br>"; */ ?>-->
                        登録時間：<?php echo $rows["uploadtime"] . "<br>"; ?>
                        タイプ：<?php echo $rows["type"] . "<br>"; ?>
                        在庫数：<b style="color:red"><?php echo $rows["total"] . "<br>"; ?></b>
                        著者：<?php echo $rows["writer"] . "<br>"; ?>
                        出版者：<?php echo $rows["publisher"] . "<br>"; ?>
                        ISBN：<?php echo $rows["ISBN"];?></p>
                    
                
              </div>
            </div>
            <div class="card-body px-0" style="text-align: center;">
              <div class="font-size-xs">
                <a class="text-muted" href="tulinmedia.php">図書一覧</a>
            　</div>
            　<div class="font-weight-bold">
              <?php echo '<a class="text-body" href="' . $rows['link'] . '">';?>
                      <?php echo $rows["name"]; ?>
                     <?php '</a>' ?>
                    </div>
                <?php
                $rs2 = $conn->query( "select * from lend where book_id='" . $rows['id'] . "' and user_id='" . $_SESSION['id'] . "'");
                $rows2 = $rs2->fetch();
                if ($rows2['book_id']) {
                    echo "<br><font color='red'>( 借りてる )</font>&nbsp;&nbsp;<a class='btn btn-info' role='button' href=kaesu.php?book_id=$rows[id]>返す</a>";
                } else {
                    if ($rows["total"] == 0) {
                        echo "<font color='red'><br>貸出中</font>";
                    } else {
                        echo "<a class='btn btn-info' role='button' href=kasu.php?book_id=$rows[id]>借りる</a>";
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
  </div>
  <div class="container">
    <!--<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
      <tr>
        <td height="35" align="center">-->
           <p class="text-center">
            <?php
            if ($pageno == 1) {
                ?>
                <br>
                図書一覧 | 前のページ | <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=<?php echo $pageno + 1 ?>">次のページ</a> | <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=<?php echo $pagecount ?>">最後ページ</a>
                <?php
            } else if ($pageno == $pagecount) {
                ?>
                <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=1">図書一覧</a> | <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=<?php echo $pageno - 1 ?>">前のページ</a> | 次のページ | 最後ページ
                <?php
            } else {
                ?>
                <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=1">図書一覧</a> | <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=<?php echo $pageno - 1 ?>">前のページ</a> | <a href="tulinmedia.php?proid=<?php echo urlencode($_GET[proid]); ?>&pageno=<?php echo $pageno + 1 ?>" class="forumRowHighlight">次のページ</a> | <a href="?pageno=<?php echo $pagecount ?>">最後ページ</a>
                <?php
            }
            ?>
            &nbsp;ページ：<?php echo $pageno ?>/<?php echo $pagecount ?>ページ&nbsp;<!--<?php echo $recordcount ?>冊-->
        </p>
            <!-- </td>
      </tr>
    </table>-->
</div>
</div>