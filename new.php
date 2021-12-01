<?php
session_start();
include("config.php");
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
	  <meta name="Keywords" content="">
	  <meta name="Description" content="">
  <title>図書一覧</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>


<style>
  .carousel-inner img {
      width: 100%;
      height: 400px;
  }
  .test{ height:100%;} 
.float{ width:150px; height:660px; background: red no-repeat; position:absolute; right:10px; top:100px;} 
</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">図書館</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

      </li>
      <li class="nav-item">
        <a class="nav-link" href="tulinmedia.php">図書一覧</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lend_list.php">通知一覧</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="contact.php">問い合わせ</a>
      </li>    
	  <li class="nav-item">
	  <a class="nav-link" href="reg.php" >新規登録</a>
	  </li>
    </ul>
  </div> 
  
</nav>

    </body>
        <?php include ("footer.php");?>
</html>