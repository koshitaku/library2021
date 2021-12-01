<?php
session_start();
include("config.php");
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
