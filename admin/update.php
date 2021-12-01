<?php
include("../config.php");
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
        <title>図書館貸し出しシステム</title>
        <link rel="stylesheet" href="images/css.css" type="text/css">
            <script Language="JavaScript" Type="text/javascript">
<!--
                function myform_Validator(theForm)
                {

                if (theForm.name.value == "")
                {
                alert("タイトルを入力してください");
                theForm.name.focus();
                return (false);
                }
                if (theForm.price.value == "")
                {
                alert("価格を入力してください");
                theForm.price.focus();
                return (false);
                }
                if (theForm.type.value == "")
                {
                alert("タイプを入力してください");
                theForm.type.focus();
                return (false);
                }

                return (true);
                }

//--></script>
</head>
                <?php
                $sql = "select * from yx_books where id=" . $_GET[id];
                $arr = $conn->query($sql);
                $rows = $arr->fetch();
                ?>
                <?php
                $images = $_FILES['images']['name'];
                $product_image_tmp = $_FILES['images']['tmp_name'];
                move_uploaded_file($product_image_tmp, "uploads/" . $images);
                if ($_POST[action] == "modify") {
                    $sqlstr = "update yx_books set name = '" . $_POST[name] . "',price = '" . $_POST[price] . "',images = '" . $images . "',detail = '" . $_POST[detail] . "',uploadtime = '" . $_POST[uptime] . "',type = '" . $_POST[type] . "',total = '" . $_POST[total] . "',borrow = '" . $_post[borrow] . "',writer = '" . $_POST[writer] . "' ,publisher = '" . $_POST[publisher] . "',ISBN = '" . $_POST[ISBN] . "',link = '" . $_POST[link] . "'where id = " . $_GET["id"];
                    $arry = $conn->exec($sqlstr);
                    echo "<script> alert('ほんとに編集しますか？')</script>";

                    if ($arry) {
                        echo "<script> alert('編集しました');location='list.php';</script>";
                    } else {
                        echo "<script>alert('失敗しました');history.go(-1);</script>";
                    }
                }
                ?>
                <body>
                    <form id="myform" name="myform" method="post" action="" onSubmit="return myform_Validator(this)" language="JavaScript" enctype="multipart/form-data" >
                        <table width="100%" height="173" border="0" align="justify" cellpadding="2" cellspacing="1" class="table">
                            <tr>
                                <td colspan="2" align="left" class="bg_tr">&nbsp;admin&nbsp;&gt;&gt;&nbsp;編集する</td>
                            </tr>
                            <tr>
                                <td width="31%" align="right" class="td_bg">タイトル：</td>
                                <td width="69%" class="td_bg">
                                    <input name="name" type="text"  id="name" value="<?php echo $rows[1] ?>" size="32" maxlength="255" />          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">著者：</td>
                                <td class="td_bg"><label>
                                        <input name="writer" type="text" id="writer" value="<?php echo $rows[10]; ?>" size="32" maxlength="255" />
                                    </label></td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">出版者：</td>
                                <td class="td_bg"><label>
                                        <input name="publisher" type="text" id="publisher" value="<?php echo $rows[11]; ?>" size="32" maxlength="255" />
                                    </label></td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">ISBN：</td>
                                <td class="td_bg"><label>
                                        <input name="ISBN" type="text" id="ISBN" value="<?php echo $rows[12]; ?>" size="32" maxlength="255" />
                                    </label></td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">価格：</td>
                                <td class="td_bg">
                                    <input name="price" type="text" id="price" value="<?php echo $rows[2]; ?>" size="5" maxlength="15" />          </td>
                            </tr>
                            <td align="right" class="td_bg">写真</td>
                            <td class="td_bg"><input type="file"  name="images" value="<?php echo $rows[3]; ?>"/>
                                <?php
                                echo '<img src="uploads/' . $rows[3] . '" width="80" height="80"/> ';
                                ?>
                            </td>
                            </tr>
  　　　　　<tr>
                                <td align="right" class="td_bg">内容：</td>
                                <td class="td_bg">
                                    <input name="detail" type="text" id="detail" value="<?php echo $rows[4]; ?>" size="100" maxlength="180" />           </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">登録時間：</td>
                                <td class="td_bg">
                                    <label>
                                        <input name="uptime" type="text" id="uptime" value="<?php echo $rows[5]; ?>" size="17" />
                                    </label>          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">タイプ：</td>
                                <td class="td_bg"><label>
                                        <input name="type" type="text" id="type" value="<?php echo $rows[6]; ?>" size="10" maxlength="19" />
                                    </label></td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">在庫数：</td>
                                <td class="td_bg"><input name="total" type="text" id="total" value="<?php echo $rows[7]; ?>" size="5" maxlength="15" />
                                    冊</td>
                            </tr>
                        <tr>
                                <td align="right" class="td_bg">リンク：</td>
                                <td class="td_bg">
                                    <input name="link" type="text" id="link" value="<?php echo $rows[13]; ?>" size="200" maxlength="1000" />           </td>
                            </tr>
                            <tr> 
                                <td colspan="2" align="center" class="td_bg"> 
                                    <input type="hidden" name="action" value="modify">
                                        <input type="submit" name="button" id="button" value="編集する"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </body>
                </html>
