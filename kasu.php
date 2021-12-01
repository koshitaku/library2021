<?php include("config.php"); 



function count_num($conn){
	$count_num = 0;
	$sql = "select count(*) as count_num from lend where user_id='" . $_SESSION['id'] . "'";
	$rs = $conn->query($sql);
	while ($rows = $rs->fetch()) {
		$count_num = $rows['count_num'];
	}
	return $count_num;
}
?>
<html>
    <body>
        <?php
        $book_id = $_GET['book_id'];
        if ($book_id == "") {
            echo "<script language=javascript>alert('ID正しくありません');window.location='tulinmedia.php'</script>";
            exit();
        } else {
            ?>
            <?php
            if ($_SESSION['id'] == "") {
                echo "<script language=javascript>alert('登録してください');window.location='landing.php'</script>";
                exit();
            } else {

                $now = date("Y-m-d");
                $return = date("Y-m-d",strtotime("+7 day", strtotime($now)));
				
				$ccc = count_num($conn);
				if($ccc<5){
					
					$lendsql = "insert into lend(book_id, book_title, lend_time, return_time,user_id) values('$book_id','$title','$now','$return','" . $_SESSION['id'] . "')";
					$conn->exec($lendsql) or die("失敗しました：" . errorInfo());

					$conn->exec("update yx_books set total=total-1,borrow=borrow+1 where id='$book_id'");
					echo "<script language=javascript>alert('借りました');window.location='tulinmedia.php'</script>";
						
				}else{
					echo "<script language=javascript>alert('最大五冊まで');window.location='tulinmedia.php'</script>";
				}
                ?>
                <?php
            }
        }
        ?>
    </body>
</html>