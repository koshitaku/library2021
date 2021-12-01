<?php
session_start();
include("config.php");
include("top.php");
?>
<script>
    function checkreg()
        {
            if (form1.name.value == "")
            {
                alert("名前を入力してください");
                form1.name.focus();
                return false;
            }
            if (form1.password.value == "")
            {
                alert("パスワードを入力してください");
                form1.password.focus();
                return false;
            }
            return true;
        }
</script>
<?php
if ($_GET['tj'] == 'out') {
	session_destroy();
	echo "<script language=javascript>alert('ログアウトしました');window.location='landing.php'</script>";
}
?>
<?php
 if (!empty($_POST)) {
	if (isset($_SESSION['id'])) {
		echo "<script language=javascript>window.location='tulinmedia.php'</script>";
		exit;
	}
	$nickname = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);

	$sql = "select * from user where name='$nickname' and password='$password'";
	//echo $sql;
	$re = $conn->query($sql);
	$result = $re->fetch();
	if (!empty($result)) {
		
		//セッション保存
		$_SESSION['id'] = $result['id'];
		$_SESSION['username'] = $nickname;
		$_SESSION['info'] = $result;
		//echo '<pre>';
		//var_dump($_SESSION);
		//echo '</pre>';
		//exit();
		echo "<script language=javascript>alert('{$nickname}さんログインしました');window.location='tulinmedia.php'</script>";
	} else {
		echo "<script language=javascript>alert('失敗しました');</script>";
	}
}
?>
    </section>
    <section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
             <form action="" method="post"  onSubmit="return checkreg()" >
			 <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>ユーザ登録画面</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                           
                                <div class="form-group">
                                    <label for="title" class="form-label">名前:</label>
                                    <input type="text" class="form-control"  name="username" value="">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">パスワード:</label>
                                    <input type="password" class="form-control"name="password"  value="">
                                </div>
                           
                        </div><!-- ends: .atbdb_content_module_contents -->
                    </div><!-- ends: .atbd_content_module -->
                </div><!-- ends: .col-lg-10 -->
              
               
                <div class="col-lg-10 offset-lg-1 text-center">
                   
                    <div class="btn_wrap list_submit m-top-25">
					
                      <a href="reg.php" id="listing_image_btn" class="btn btn-outline-primary m-right-10">
                       <span class="dashicons dashicons-format-image"></span> 新規登録
                      </a>                 
                        <button type="submit" class="btn btn-primary btn-lg listing_submit_btn">ログイン</button>
                    </div>
                </div><!-- ends: .col-lg-10 -->
            </div> </form>
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