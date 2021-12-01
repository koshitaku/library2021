<?php
session_start();
include("config.php");
include("top.php");
?>
    </section>
	<?php
        if (isset($_POST["send"])) {
            require_once ("lib/class.smtp.php");
            require_once("lib/class.phpmailer.php");
            $mail = new PHPMailer;                              // Passing `true` enables exceptions
            //Server settings
            try {
                $mail->isSMTP();
                $mail->CharSet = "UTF-8"; // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'zhuozhuodeyouxiang@qq.com';      // SMTP username
                $mail->Password = 'fshaljmkgdoobdbj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->isHTML(true);
                $mail->setFrom('systemtest@gmail.com', '問い合わせの内容');
                $mail->addAddress("zhuozhuodeyouxiang@qq.com", 'admin');     // Add a recipient
                $mail->Subject = "タイトル：" . $_POST["subject"];
                $mail->Body = "<br>名前：" . $_POST["name"] . "<br>電話番号：" . $_POST["tel"] . "<br>メール：" . $_POST["mail"] . "<br>内容：" . $_POST["content"];
                $mail->SMTPDebug = 0;
                $mail->send();
                echo '<center>お問い合わせを受け付けました。</center>';
            } catch (Exception $e) {
                echo '送信ができませんでした. Mailer エラー: ', $mail->ErrorInfo;
            }
//                print ('<A HREF="index.php"> <h2> トップページに戻る </h2></A> <BR>');
        }
        ?>
    <section class="contact-area section-bg p-top-100 p-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="widget atbd_widget widget-card contact-block">
                        <div class="atbd_widget_title">
                            <h4><span class="la la-envelope"></span> お問い合わせの内容入力</h4>
                        </div><!-- ends: .atbd_widget_title -->
                        <div class="atbdp-widget-listing-contact contact-form">
                            <form id="atbdp-contact-form" class="form-vertical" role="form">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="名前" class="form-control" id="atbdp-contact-name" >
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="tel" placeholder="電話番号"class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <input type="email" name="mail" placeholder="メールアドレス"class="form-control" >
                                </div>
                                <div class="form-group">
                                    <input type="TEXT" name="subject" placeholder="タイトル"class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="atbdp-contact-message" rows="6" placeholder="お問い合わせ内容"></textarea>
                                </div>
                                <button type="submit" NAME="send" class="btn btn-primary btn-lg listing_submit_btn">お問い合わせ</button>
                                <button type="button" onclick="history.back();" class="btn btn-primary btn-lg listing_submit_btn">キャンセル</button>
                            </form>
                        </div><!-- ends: .atbdp-widget-listing-contact -->
                    </div><!-- ends: .widget -->
                </div><!-- ends: .col-lg-8 -->
               
            </div>
        </div>
    </section><!-- ends: .contact-area -->
<?php
include("footer.php");
?>
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