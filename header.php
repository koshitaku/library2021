<?php
session_start();
include("config.php");
?>
 <div id="demo" class="carousel slide" data-ride="carousel">
 
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