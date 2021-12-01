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
            if (form1.number.value == "")
            {
                alert("学籍番号を入力してください");
                form1.number.focus();
                return false;
            }
            if (form1.password.value == "")
            {
                alert("パスワードを入力してください");
                form1.password.focus();
                return false;
            }
            if (form1.pwd.value == "")
            {
                alert("確認パスワードを入力してください");
                form1.pwd.focus();
                return false;
            }

            if (form1.password.value != form1.pwd.value && form1.password.value != "")
            {
                alert("二回入力パスワードは不一致です");
                form1.password.focus();
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
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $password = $_POST['password'];

        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];
        $password = md5($password);
        $sql = "insert into user(name, number, password, email, tel, address) values('$name','$number','$password','$email', '$tel','$address')";
       

	   $conn->exec($sql) or die("失敗しました: " . errorInfo());

        $result = $conn->query("select last_insert_id()");
        $re_arr = $result->fetch();
        $id = $re_arr[0];
       // $_SESSION['user'] = $user;
        $user = $id;
        echo ( "<script language=javascript>alert('新規しました。');window.location='landing.php'</script>");
    }
    ?>
    </section><section class="add-listing-wrapper border-bottom section-bg section-padding-strict">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="atbd_content_module">
                        <div class="atbd_content_module__tittle_area">
                            <div class="atbd_area_title">
                                <h4><span class="la la-user"></span>新規登録画面</h4>
                            </div>
                        </div>
                        <div class="atbdb_content_module_contents">
                          
							 <form name="form1" method="post" action="" enctype='multipart/form-data' onSubmit="return checkreg()" >
                                <div class="form-group">
                                    <label  class="form-label">名前:</label>
                                    <input type="text"  class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">学籍番号</label>
                                    <input type="text" class="form-control" name="number">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">パスワード:</label>
                                    <input type="password" class="form-control" name="password" >
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">確認パスワード:</label>
                                    <input type="password" class="form-control" name="pwd">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">メールアドレス:</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">電話番号:</label>
                                    <input type="text" class="form-control" name="tel" >
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-label">住所:</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
								
               
								<div class="col-lg-10 offset-lg-1 text-center">
								   
									<div class="btn_wrap list_submit m-top-25">
									           
										<button type="submit" name="submit" class="btn btn-primary btn-lg listing_submit_btn">新規</button>
										<button type="reset" name="submit" class="btn btn-primary btn-lg listing_submit_btn">書き直す</button>
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
?>
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