<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>図書館</title>
 
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,700" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./css/brands.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="./css/line-awesome.min.css">
    <link rel="stylesheet" href="./css/magnific-popup.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/select2.min.css">
    <link rel="stylesheet" href="./css/slick.css">
    <link rel="stylesheet" href="./css/base.css">
    <!-- endinject -->
</head>
<body>
    <section class="header-breadcrumb bgimage overlay overlay--dark">
        <div class="bg_image_holder"></div>
        <div class="mainmenu-wrapper">
            <div class="menu-area menu1 menu--light">
                <div class="top-menu-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="menu-fullwidth">
                                    <div class="logo-wrapper order-lg-0 order-sm-1">
                                        <div class="logo logo-top">
                                            <a href="index.php">図書館</a>
                                        </div>
                                    </div><!-- ends: .logo-wrapper -->
                                    <div class="menu-container order-lg-1 order-sm-0">
                                        <div class="d_menu">
                                            <nav class="navbar navbar-expand-lg mainmenu__menu">
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#direo-navbar-collapse" aria-controls="direo-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon icon-menu"><i class="la la-reorder"></i></span>
                                                </button>
                                                <!-- Collect the nav links, forms, and other content for toggling -->
                                                <div class="collapse navbar-collapse" id="direo-navbar-collapse">
                                                    <ul class="navbar-nav">
                                                        <li>
                                                            <a href="tulinmedia.php">図書一覧</a>
                                                        </li>
														<?php if(isset($_SESSION['id'])&&!empty($_SESSION['id'])){?>
														<li class="dropdown has_dropdown">
                                                            <a class="dropdown-toggle" href="#" id="drop2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                メーニュー
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="drop2">
                                                                <li><a href="tulinmedia.php?proid=<?php echo urlencode('語学'); ?>">語学系</a></li>
                                                                <li><a href="tulinmedia.php?proid=<?php echo urlencode('商学'); ?>">商学系</a></li>
                                                                <li><a href="tulinmedia.php?proid=<?php echo urlencode('プログラミング'); ?>">プログラミング系</a></li>
                                                                <li><a href="tulinmedia.php?proid=<?php echo urlencode('技術'); ?>">技術系</a></li>
                                                                <li><a href="tulinmedia.php?proid=<?php echo urlencode('経済'); ?>">経済系</a></li>
                                                             
                                                            </ul>
                                                        </li>
                                                        
														<?php }?>
                                                        <li>
                                                            <a href="reg.php">新規登録</a>
                                                        </li>

														<?php if(isset($_SESSION['id'])&&!empty($_SESSION['id'])){?>
															<li>
                                                            <a href="user.php?id=<?php echo $_SESSION['id'];?>">
															ユーザー:<?php echo $_SESSION['username'];?></a>
                                                           |  <a href="landing.php?tj=out">[ログアウト]</a>
                                                        </li>
                                                        <li>
                                                            <a href="contact.php">問い合わせ</a>
                                                        </li>
                                                        <?php 
                                                            //returntimes
														    $rs70 = $conn->query("select min(return_time) from(select id,book_id,book_title,lend_time,return_time,user_id,row_number()over(partition by book_id order by id asc) rank
                                                            from lend)tablename
                                                            where  user_id='" . $_SESSION['id'] . "'");
														    $rows2 = $rs70->fetch();
															$aaaa = $rows2['min(return_time)'];
															
                                                            $now = date("Y-m-d");
                                                            $bbbb = date("Y-m-d",strtotime("-1 day", strtotime($now)));
                                                            if( $aaaa == null || $aaaa >= $bbbb ) {?>
                                                            <li>
                                                                <a href="lend_list.php">
                                                                 <img src="images/mail.png" style="width: auto;height: 100px; max-width: 25%; max-height: 25%; ">
                                                                </a>
                                                            </li>
                                                                <?php }else{ ?>
                                                            <li>
                                                                <a href="lend_list.php">
                                                                <img src="images/mail1.png" style="width: auto;height: 100px; max-width: 25%; max-height: 25%; ">
                                                                </a>
                                                                </li>
                                                        <?php }?>

														<?php }else{?>
														
                                                        <li>
                                                            <a href="landing.php">ログイン</a>
                                                        </li>
														<?php }?>
                                                      

                                                        

                                                     
                                                        
                                                        
                                                    </ul>
                                                </div>
                                                <!-- /.navbar-collapse -->
                                            </nav>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- end /.row -->
                    </div>
                    <!-- end /.container -->
                </div>
                <!-- end  -->
            </div>
        </div><!-- ends: .mainmenu-wrapper -->
