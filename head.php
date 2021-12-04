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

<div class="search" style="width:98%;float:right;">
    <form action="search.php" method="post" >
        <table class="vtt" style="float:right;margin:0 1%;">
            <tr>
                <td>&nbsp;&nbsp;&nbsp;
                    <select name="seltype" id="seltype" style="height:29px;">
                        <option value="name" <?php if($seltype=='name'){echo 'selected';}?>>タイトル</option>
                        <option value="writer" <?php if($seltype=='writer'){echo 'selected';}?>>著者</option>
                        <option value="price" <?php if($seltype=='price'){echo 'selected';}?>>価格</option>
                        <option value="uploadtime" <?php if($seltype=='uploadtime'){echo 'selected';}?>>入庫時間</option>
                        <option value="type" <?php if($seltype=='type'){echo 'selected';}?>>タイプ</option>
                    </select>          
                </td>
                <td>
                    <input type="text" name="coun" value="<?php echo stristr($coun).$_SESSION['coun'];?>" id="coun">
                </td>
                <td>
                    <input type="submit" name="button" id="button" value="検索する" onClick="return q_cont();" />         
                </td>
            </tr>
        </table>
    </form>
</div>
