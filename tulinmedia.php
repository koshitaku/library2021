<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set('Asia/Tokyo');

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);




?>
<?php


include("top.php");?>
<style>
  .carousel-inner img {
      width: 100%;
      height: 10%;
  }
</style></section><div id="demo" class="carousel slide" data-ride="carousel">
<!-- 指示符 -->
 <ul class="carousel-indicators">
   <li data-target="#demo" data-slide-to="0" class="active"></li>
   <li data-target="#demo" data-slide-to="1"></li>
   <li data-target="#demo" data-slide-to="2"></li>
   <li data-target="#demo" data-slide-to="3"></li>
   <li data-target="#demo" data-slide-to="4"></li>
 </ul>
 <!-- 轮播图片 -->
 <div class="carousel-inner">
   <div class="carousel-item active">
     <a><img src="images/bg.jpg"></a>
   </div>
   <div class="carousel-item">
     <a><img src="images/library2.jpg"></a>
   </div>
   <div class="carousel-item">
     <a><img src="images/library3.jpg"></a>
   </div>
   <div class="carousel-item">
     <a><img src="images/library6.jpg"></a>
   </div>
   <div class="carousel-item">
     <a><img src="images/library5.jpg"></a>
   </div>
 </div>
 <!-- 左右切换按钮 -->
 <a class="carousel-control-prev" href="#demo" data-slide="prev">
   <span class="carousel-control-prev-icon" style="
    left: 0;
    position: absolute;"></span>
 </a>
 <a class="carousel-control-next" href="#demo" data-slide="next">
   <span class="carousel-control-next-icon" style="
    right: 0;
    position: absolute;"></span>
 </a>
</div>
</div>
    <section class="dashboard-wrapper section-bg p-bottom-15">
        <div class="tab-content p-top-50" id="dashboard-tabs-content">
            <div class="tab-pane fade show active" id="listings" role="tabpanel" aria-labelledby="all-listings">
                <div class="container"> 
				<div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="page-title">図書一覧</h1>
                    </div>
                </div>
                <!--検索機能-->
				<div class="row p-top-10">
                   <?php 
				   $seltype = '';
				   $coun = '';
				   include("head.php"); ?>　
                </div>
                    <div class="row p-top-30">
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
					?>  <?php
					while ($rows = $rs->fetch()) {
						?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="atbd_single_listing atbd_listing_card">
                                <article class="atbd_single_listing_wrapper ">
                                    <figure class="atbd_listing_thumbnail_area">
                                        <div class="atbd_listing_image">
                                            <a href="<?php echo $rows['link'];?>" target="_blank">
											<img src="admin/uploads/<?php echo $rows['images'];?>" alt="listing image"
											style="width: auto;height: 300px; max-width: 100%; max-height: 100%; "
											></a>
                                        </div>
                                    </figure>
                                    <div class="atbd_listing_info">
                                        <div class="atbd_content_upper">
                                            <div class="atbd_dashboard_tittle_metas">
                                                <h4 class="atbd_listing_title">
                                                    <a href=""><?php echo $rows['name'];?></a>
                                                </h4>
                                            </div><!-- ends: .atbd_dashboard_tittle_metas -->
                                            <div class="atbd_card_action">
                                            <div class="atbd_listing_meta">
                                                   
                                                   </div><!-- ends: .atbd listing meta -->
                                                <div class="db_btn_area">
										<?php
										$rs2 = $conn->query( "select * from lend where book_id='" . $rows['id'] . "' and user_id='" . $_SESSION['id'] . "'");
										$rows2 = $rs2->fetch();
                                        $rs3 = $conn->query( "select * from yoyaku where book_id='" . $rows['id'] . "' and user_id='" . $_SESSION['id'] . "'");
										$rows3 = $rs3->fetch();
											if ($rows2['book_id']): ?>
											    <font color='red'>( 借りてる )</font>&nbsp;&nbsp;
												
											<?php elseif($rows["total"] != 0): ?>
                                              
                                                <a href="kasu.php?book_id=<?php  echo $rows['id'];?>" class="directory_remove_btn btn btn-sm btn-outline-danger">借りる</a>
                                        <?php
                                                elseif($rows3['book_id']): ?>
                                              
                                              <font color='red'> 予約中 </font>&nbsp;&nbsp;
                                                        
                                                 

													<?php else: ?>
                                                        <font color='red'>　貸出中 </font>&nbsp;&nbsp;
                                                            <a href="yoyaku.php?book_id=<?php echo $rows['id'];?>" class="btn btn-sm btn-outline-secondary dropdown-toggle">予約</a>
                                                            
                                                    <?php endif; ?>


                                        
                                        
                                                </div>
                                                <!--ends .db_btn_area-->
                                            </div>
                                        </div><!-- end .atbd_content_upper -->
                                        <div class="atbd_listing_bottom_content">
                                            <div class="listing-meta">
                                                <p><span>価格:</span> <?php echo $rows["price"];?></p>
                                                <p><span>登録時間:</span> <?php echo $rows["uploadtime"];?></p>
                                                <p><span>タイプ:</span> <?php echo $rows["type"];?></p>
                                                <p><span>在庫数:</span> <b style="color:red"><?php echo $rows["total"];?></b></p>
                                                <p><span>著者:</span><?php echo $rows["writer"];?></p>
                                                <p><span>出版者:</span><?php echo $rows["publisher"];?></p>
                                                <p><span>ISBN:</span><?php echo $rows["ISBN"];?></p>
                                            </div>
                                        </div><!-- end .atbd_listing_bottom_content -->
                                    </div><!-- ends: .atbd_listing_info -->
                                </article>
                            </div><!-- ends: .atbd_single_listing -->
                        </div><!-- ends: .col-lg-4 -->
                      <?php } ?> 
                    </div>
                                         
					<div class="row">
					 <p class="">&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
						if ($pageno == 1) {
							?>
							
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

						&nbsp;<?php echo $pageno ?>/<?php echo $pagecount ?>ページ&nbsp;<!--<?php echo $recordcount ?>冊-->
					 </p>
						
					</div>
                </div>
            </div><!-- ends: .tab-pane -->
          </div>
        <!-- Modal -->
       
    </section>

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
    <script src="./js/slick.min.js"></script><?php
include("scroll.php");
include("footer.php");
?>
    <!-- endinject-->
</body>

</html>
