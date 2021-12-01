<?php
session_start();
include("config.php");
include("top.php");
?><style>
  .carousel-inner img {
      width: 100%;
      height: 10%;
  }
  .example {
    margin: 2px 2px 2px 5px;
     width:100px;
	 height:150px;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .example { 
		margin: 2px 2px 2px 5px;
		width:30px;
		height:50px;
	 }
	 .table td{  padding:0;}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .example {margin: 2px 2px 2px 5px;
		width:30px;
		height:50px;}
	 .table td{  padding:0;}
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .example {margin: 2px 2px 2px 5px;
		width:30px;
		height:50px;}
	 .table td{  padding:0;}
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    .example {margin: 2px 2px 2px 2px;
		width:30px;
		height:50px;;}
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .example { margin: 2px 2px 2px 2px;
     width:105px;
	 height:150px;}
}
</style>
</section>

	<div id="demo" class="carousel slide" data-ride="carousel">
  
		<div class="row p-top-10" style="text-align:right;">
			<?php 
			//搜索机能
			$where = " where 1=1";
			$seltype = '';
			$coun = '';
			
			if(!empty($_POST)){
				if(!empty($_POST['coun'])){
					$_SESSION['seltype'] = $_POST[seltype];
					$_SESSION['coun'] = $_POST[coun];
					if($_POST[seltype]=='price'){//
						 $where = " where " . $_POST[seltype]  . " <='" . $_POST[coun] . "'";
					}else{
						 $where = " where " . $_POST[seltype]  . " like ('%" . $_POST[coun] . "%')";
					}
					$seltype = $_POST[seltype];
					$coun = $_POST[coun];
					
				}else{
					$_SESSION['coun'] = '';
					$where = " where 1=1";
				}
			}
			
			if(isset($_SESSION['coun'])&&!empty($_SESSION['seltype'])&&!empty($_SESSION['coun'])){
				
				if($_SESSION['seltype']=='price'){//
					 $where = " where " . $_SESSION['seltype']  . " <='" . $_SESSION['coun'] . "'";
				}else{
					 $where = " where " . $_SESSION['seltype']  . " like ('%" . $_SESSION['coun'] . "%')";
				}
				
				$seltype = $_SESSION[seltype];
				$coun = strtoupper($_SESSION[coun]);
				
				
			}
			
			include("head.php");
				
			?>
				   
                </div>
<div class="search">
        <table  border="1" align="center"  cellpadding="0" cellspacing="1" bgcolor="#ffffff" class="table" style="margin:1px 0px;">

            <tr>
                
                <td width="3%" height="35" align="center"  bgcolor="#cccccc">ID</td>
                <td width="12%" align="center"  bgcolor="#cccccc">カバー</td>
				<td width="4%" align="center"  bgcolor="#cccccc">在庫数</td>
				<td width="4%" align="center"  bgcolor="#cccccc">状態</td>
                <td width="28%" align="center"  bgcolor="#cccccc">タイトル</td>
				<td width="7%" align="center"  bgcolor="#cccccc">著者</td>
                <td width="7%" align="center"  bgcolor="#cccccc">価格</td>
                <td width="12%" align="center"  bgcolor="#cccccc">入庫時間</td>
                <td width="12%" align="center"  bgcolor="#cccccc">タイプ</td>
				
            </tr>
            <?php
			
			$pagesize = 5;//每页记录数
			$totalNum = 0;//总数
			$sqlstr='SELECT count(id) as num FROM yx_books '.$where; //统计记录个数的sql语句

			$rs = $conn->query($sqlstr);
			while ($rows = $rs->fetch()) {
				 $totalNum = $rows['num'];
			}

			$pagecount = ceil($totalNum/$pagesize);//总页数
			$page=(!isset($_GET['page']))? 1 : $_GET['page'];//当前页

			$page=($page<=$pagecount)?$page:$pagecount;//当前页
			$f_pageNum = $pagesize *($page-1);//当前页第一条记录
			$sql = 'SELECT * FROM yx_books '.$where.' order by price asc,id desc limit '.$f_pageNum.','.$pagesize;
						
        
            $rs = $conn->query($sql);
			
			
			if($totalNum==0){
				?>
				<tr align="center">
                    <td class="td_bg" colspan="6">対象データがありません</td>
                </tr>
				<?php 
			}
            while ($rows = $rs->fetch()) {
                ?>
                <tr align="center"  >
                    <td  class="td_bg" width="4%"><?php echo $rows["id"] ?></td>
                    <td  class="td_bg" width="12%" height="26"><img src="admin/uploads/<?php echo $rows['images'];?>" class="example"></td>
					<td  class="td_bg" width="4%" height="26"><?php echo $rows["total"] ?></td>
					<td  class="td_bg" width="7%" height="26"> <div class="db_btn_area">
										<?php
										$rs2 = $conn->query( "select * from lend where book_id='" . $rows['id'] . "' and user_id='" . $_SESSION['id'] . "'");
										$rows2 = $rs2->fetch();
                                        $rs2 = $conn->query( "select * from yoyaku where book_id='" . $rows['id'] . "' and user_id='" . $_SESSION['id'] . "'");
										$rows3 = $rs2->fetch();
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
                                                </div></td>
                    <td  class="td_bg" width="12%" height="26"><?php echo $rows["name"] ?></td>
					<td  class="td_bg" width="4%" height="26"><?php echo $rows["writer"] ?></td>
                    <td  class="td_bg" width="4%" height="26"><?php echo $rows["price"] ?></td>
                    <td  class="td_bg" width="7%" height="26"><?php echo date('Y-m-d',strtotime($rows["uploadtime"])); ?></td>
                    <td  class="td_bg" width="12%" height="26"><?php echo $rows["type"] ?></td>	
                </tr>
                <?php
            }
            ?>

        </table>
		<div class="row" style="text-align:left;">
<p >&nbsp;&nbsp;&nbsp;&nbsp;
<?php
print '<div class="page">全部'.$totalNum.'件&nbsp;&nbsp;&nbsp;'.$page.'ページ'.'&nbsp;&nbsp;&nbsp;';
for($i=1;$i<=$pagecount;$i++){
if($i!=$page)print "<a href=search.php?page=$i style=\"display:inline-block\">&nbsp;$i&nbsp;</a>&nbsp;";
else print '&nbsp;<span>'.$i .'</span>&nbsp;&nbsp;';
}
print '</div>';?>
</p>

</div>
		
</div>
 
		<?php 
		include("footer.php");
		?>