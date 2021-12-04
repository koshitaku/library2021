<?php
session_start();
include("config.php");
?><!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
	  <meta name="Keywords" content="">
	  <meta name="Description" content="">
  <title>Library2020</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script src="js/jquery-3.5.1.min.js"></scsript>
<script type="text/javascript">
        $(document).ready(function(){
            $(".list").click(function() {
                var index = $(this).index();
                
                $(this).stop().animate({
                    width: "70%"
                },500).siblings(".list").stop().animate({
                    width: "9%"
            },500);
            $(".wrap").eq(index).fadeIn().siblings(".wrap").fadeOut();
            })
        })
</script>
  </head>
  <body>

  <div class="wrap"></div>
  <div class="wrap"></div>
  <div class="wrap"></div>
  <div class="wrap"></div>
  <div class="nav">
    <ul>
      <li class="list">
        <div>
        <?php if ($_SESSION['id']) {
                    echo '<a  href="landing.php?tj=out"  title="ログアウト画面">ログアウト</a>';
                } else {

                    echo '<a  href="landing.php">ログイン</a>';
                }
                ?>
        </div>
      </li>
      <li class="list">
        <div>
          <a href="tulinmedia.php">図書一覧</a>
        </div>
      </li>
      <li class="list">
        <div>
          <a href="contact.php">問い合わせ</a>
        </div>
      </li>
      <li class="list">
        <div>
          <a href="index.php">図書館システム</a>
        </div>  
      </li>
    </ul>
  </div>
  </body>
</html>
