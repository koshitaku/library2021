<?php
session_start();
include("top.php");
include("config.php");

?>
<style>
/* Extra small devices (phones, 600px and down) */

@media only screen and (max-width: 600px) {
    .example { 
		margin: 2px;
		width:300px;
		height:50px;
	 }
	 .example td{  padding:0;}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .example {
		width:594px;
		height:50px;}
	 .example td{  padding:0;}
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .example {
		width:760px;
		height:50px;}
	 .example td{  padding:0;}
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    .example {margin: 2px;
		width:100%;}
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .example {
     width:100%;}
}
</style>
<script>
    function checkreg()
        {
            if (form1.name.value == "")
            {
                alert("名前を入力してください");
                form1.name.focus();
                return false;
            }
            if (form1.email.value == "")
            {
                alert("メールアドレスを入力してください");
                form1.email.focus();
                return false;
            } else if (form1.email.value.charAt(0) == "." ||
                    form1.email.value.charAt(0) == "@" ||
                    form1.email.value.indexOf('@', 0) == -1 ||
                    form1.email.value.indexOf('.', 0) == -1 ||
                    form1.email.value.lastIndexOf("@") == form1.email.value.length - 1 ||
                    form1.email.value.lastIndexOf(".") == form1.email.value.length - 1)
            {
                alert("正しいメールアドレスを入力してくさい");
                form1.email.select();
                return false;
            }
            return true;

        }
</script>
  <?php
    $id = $_GET['id'];
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password_old = $_POST['password_old'];
        $password_new = $_POST['password'];
		if(!empty($password_new)){
			 $password = md5($password_new);
		}else{
			 $password = $password_old;
		}
       
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];
        $sql = "UPDATE `user` SET 
			`name`='{$name}' 
		,	`password`='{$password}' 
		,	`email`='{$email}' 
		,	`tel`='{$tel}' 
		,	`address`='{$address}' 
		WHERE (`id`='{$id}') ";
       
	   $conn->exec($sql) or die("失敗しました: " . errorInfo());

        $result = $conn->query("select last_insert_id()");
        $re_arr = $result->fetch();
        $id = $re_arr[0];
       // $_SESSION['user'] = $user;
        $user = $id;
        echo ( "<script language=javascript>alert('変更しました。');window.location='landing.php'</script>");
    }
	$user = array();
	$sql = "select * from user where id='{$id}'";
	//echo $sql;exit();
	$re = $conn->query($sql);
	$result = $re->fetch();
	if (!empty($result)) {
		$user = $result;
	}
	//var_dump($user);
    ?>
    </section>
    <section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
					<div class="dashboard-nav">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="dashboard-nav-area">
										<ul class="nav" id="dashboard-tabs" role="tablist">
											<li class="nav-item">
												<a href="user.php" class="nav-link">ユーザー情報</a>
											</li>
											<li class="nav-item">
												<a class="nav-link  active">閲覧リスト</a>
											</li>
											<li class="nav-item">
												<a href="yoyaku_list.php" class="nav-link">予約リスト</a>
											</li>
										</ul>
									</div>
								</div><!-- ends: .col-lg-12 -->
							</div>
						</div>
					</div><!-- ends: .dashboard-nav -->
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>閲覧リスト</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                          
							<div class="row">
								<div class="col-lg-12">
									<div class="checkout-form">
										<form action="/">
											<div class="checkout-table table-responsive">
											<table id="directorist-checkout-table" class="table-bordered example" >
													<thead>
														<tr>
															<th colspan="2">図書</th>
															<th  width="18%"><strong width="15%">貸し出し日</strong></th>
															<th width="18%"><strong1>返却予定日</strong1></th>
														</tr>
													</thead>
													<tbody><?php
													$sql = "select * from lend where  user_id='" . $_SESSION['id'] . "'";
													$rs = $conn->query($sql);
													while ($rows = $rs->fetch()) {
														if ($rows['book_id']) {
															
													?>
														<tr>
															<td>
															
													<div class="custom-control custom-checkbox checkbox-outline checkbox-outline-primary custom-control-inline">
														<a href="kaesu.php?book_id=<?php echo $rows['book_id'];?>" class="btn btn-sm btn-outline-secondary dropdown-toggle">返す</a>
													</div>
													
																		
													</td>
													<td>
															<?php
															$sql2 = "select * from yx_books where id='{$rows['book_id']}'";
															$rs2 = $conn->query($sql2);
															while ($rows2 = $rs2->fetch()) {?>
																<h4><?php echo $rows2['name'];?></h4>
																<p>
																価格:<?php echo $rows2["price"];?> / 
																タイプ:<?php echo $rows2["type"];?> / 
																著者:<?php echo $rows2["writer"];?> / 
																出版者:<?php echo $rows2["publisher"];?> / 
																ISBN:<?php echo $rows2["ISBN"];?>
																</p>
															<?php }?>
																
																
															</td>
															<td>
															<?php echo $rows['lend_time'];?>
															</td>

															<td>
															
                                                        	<?php 

															$aaa = $rows['return_time'];
															
                                                            $now = date("Y-m-d");
                                                            $bbb = date("Y-m-d",strtotime("-1 day", strtotime($now)));
                                                            if($aaa > $bbb): ?>
                                                            
																<?php echo $rows['return_time'];?>
															
                                                                <?php else: ?>
                                                            
															<font color='red'><?php echo $rows['return_time'];?></font>
																
                                                        		<?php endif; ?>

															</td>
														</tr><?php }
													}
												?> 
														
														
													</tbody>
												</table>
											</div><!-- ends: .checkout-table -->
										  
										</form>
									</div><!-- ends: .checkout-form -->
								</div><!-- ends: .col-lg-12 -->
							</div>
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->
              
            </div>
        </div>
    </section><!-- ends: .add-listing-wrapper -->
    <?php
include("footer.php");
?><!-- inject:js-->
   <!-- inject:js-->
    <script src="./js/jquery/jquery-1.12.3.js"></script>
    <script src="./js/bootstrap/popper.js"></script>
    <script src="./js/bootstrap/bootstrap.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/jquery.barrating.min.js"></script>
    <script src="./js/jquery.counterup.min.js"></script>
    <script src="./js/jquery.magnific-popup.min.js"></script>
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="./js/jquery.waypoints.min.js"></script>
    <script src="./js/masonry.pkgd.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/select2.full.min.js"></script>
    <script src="./js/slick.min.js"></script>
    <!-- endinject-->
</body>

</html>                       