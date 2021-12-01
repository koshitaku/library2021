<?php include("config.php"); ?>

<html>
    <body>
        <?php

       

			
$now = date("Y-m-d");
$book_id = $_GET['book_id'];

function count_num($conn){
	$count_num = 0;
	$sql_num = "select number from user where id='".$_SESSION['id']."'";
	$rs = $conn->query($sql_num);
	while ($rows = $rs->fetch()) {
		$count_num = $rows['number'];
	}
	return $count_num;
}
$c_number = count_num($conn);

function count_ema($conn){
	$count_ema = 0;
	$sql_ema = "select email from user where id='".$_SESSION['id']."'";
	$rs = $conn->query($sql_ema);
	while ($rows = $rs->fetch()) {
		$count_ema = $rows['email'];
	}
	return $count_ema;
}
$c_email = count_ema($conn);


function count_tit($conn){
	$count_tit = 0;
	$sql_tit = "select name from yx_books where id='".$_GET['book_id']."'";
	$rs = $conn->query($sql_tit);
	while ($rows = $rs->fetch()) {
		$count_tit = $rows['name'];
	}
	return $count_tit;
}
$c_title = count_tit($conn);

function count_w($conn){
	$count_w = 0;
	$sql_w = "select writer from yx_books where id='".$_GET['book_id']."'";
	$rs = $conn->query($sql_w);
	while ($rows = $rs->fetch()) {
		$count_w = $rows['writer'];
	}
	return $count_w;
}
$c_w = count_w($conn);







					$lendsql = "insert into yoyaku(book_id, user_id,user_number,booking_time,user_email,book_title,book_w)
					 values('".$_GET['book_id']."','" . $_SESSION['id'] . "','$c_number','$now','$c_email','$c_title','$c_w')";
					$conn->exec($lendsql) or die("予約失敗しました：" . errorInfo());

                    echo "<script language=javascript>alert('                                 予約しました\\n【予約情報の詳細については、予約リストをご確認ください】');window.location='tulinmedia.php'</script>";

					
					
						


        ?>

    </body>

</html>