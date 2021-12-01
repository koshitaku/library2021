<?php
session_start();
include("top.php");
include("config.php");
?><script>
    function checkreg()
        {
            if (form1.name.value == "")
            {
                alert("名前を入力してください");
                form1.name.focus();
                return false;
            }
            if (form1.number.value == "")
            {
                alert("学籍番号を入力してください");
                form1.number.focus();
                return false;
            }
            if (form1.password_old.value == "")
            {
                alert("パスワードを入力してください");
                form1.password_old.focus();
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
        $number = $_POST['number'];
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
        ,	`number`='{$number}' 
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
												<a class="nav-link active">ユーザー情報</a>
											</li>
											<li class="nav-item">
												<a href="lend_list.php" class="nav-link">閲覧リスト</a>
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
                                <h4><span class="la la-user"></span>ユーザー情報</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                          
							 <form name="form1" method="post" action="" enctype='multipart/form-data' onSubmit="return checkreg()" >
                                <div class="form-group">
                                    <label  class="form-label">名前:</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $user['name'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">学籍番号:</label>
                                    <input type="text" class="form-control" name="number"  value="<?php echo $user['number'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">パスワード:</label>
									<input type="hidden" name="password_old" value="<?php echo $user['password'];?>"/>
                                    <input type="password" class="form-control" name="password"  value="">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">メールアドレス:</label>
                                    <input type="text" class="form-control" name="email"  value="<?php echo $user['email'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">電話番号:</label>
                                    <input type="text" class="form-control" name="tel"  value="<?php echo $user['tel'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">住所:</label>
                                    <input type="text" class="form-control" name="address"  value="<?php echo $user['address'];?>" >
                                </div>
								
               
								<div class="col-lg-10 offset-lg-1 text-center">
								   
									<div class="btn_wrap list_submit m-top-25">
									           
										<button type="submit" name="submit" class="btn btn-primary btn-lg listing_submit_btn">変更</button>
										<input type="hidden" name="id" value="<?php echo $id;?>"/>
										
									</div>
								</div><!-- ends: .col-lg-10 -->
                            </form>
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