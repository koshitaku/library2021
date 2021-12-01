<?php
include("../config.php");
require_once('ly_check.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

                    return (true);
                }

//--></script>
</head>
                <?php
                if (isset($_POST['button'])) {

                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $images = $_FILES['images']['name'];
                    $product_image_tmp = $_FILES['images']['tmp_name'];
                    move_uploaded_file($product_image_tmp, "uploads/" . $images);
                    $detail = $_POST['detail'];
                    $uploadtime = $_POST['uptime'];
                    $type = $_POST['type'];
                    $total = $_POST['total'];
                    $borrow = $_POST['borrow'];
                    $leave_number = $_POST['total'];
                    $writer = $_POST['writer'];
                    $publisher = $_POST['publisher'];
                    $ISBN = $_POST['ISBN'];
                    $link = $_POST['link'];

                    $sql = "insert into yx_books (name,price,images,detail,uploadtime,type,total,borrow,leave_number,writer,publisher,ISBN,link) values('$name','$price','$images','$detail','$uploadtime','$type','$total','$borrow','$total','$writer','$publisher','$ISBN','$link')";
                    $arr = $conn->exec($sql) or die('cannot insert');
                    if ($arr) {
                        echo "<script language=javascript>alert('登録しました！');window.location='add.php'</script>";
                    } else {
                        echo "<script>alert('失敗しました');history.go(-1);</script>";
                    }
                }
                ?>
                <body>
                    <form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript" enctype="multipart/form-data">
                        <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
                            <tr>
                                <td colspan="2" align="left" class="bg_tr">&nbsp;admin&nbsp;&gt;&gt;&nbsp;新しい本登録</td>
                            </tr>
                            <tr>
                                <td width="31%" align="right" class="td_bg">タイトル：</td>
                                <td width="69%" class="td_bg">
                                    <input name="name" type="text" id="name" size="32" maxlength="255" />          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">著者：</td>
                                <td class="td_bg">
                                    <input name="writer" type="text" id="writer" size="32" maxlength="255" />          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">出版者：</td>
                                <td class="td_bg">
                                    <input name="publisher" type="text" id="publisher" size="32" maxlength="255" />          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">ISBN：</td>
                                <td class="td_bg">
                                    <input name="ISBN" type="text" id="ISBN" size="32" maxlength="255" />          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">価格：</td>
                                <td class="td_bg">
                                    <input name="price" type="text" id="price" size="5" maxlength="15" />         </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">写真</td>
                                <td class="td_bg"><input type="file"  name="images" /></td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">内容：</td>
                                <td class="td_bg">
                                    <input name="detail" type="text" id="detail" size="100" maxlength="180" />           </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">登録時間：</td>
                                <td class="td_bg">
                                    <input name="uptime" type="text" id="uptime" value="<?php echo date("Y-m-d h:i:s"); ?>" />          </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">リンク：</td>
                                <td class="td_bg">
                                    <input name="link" type="text" id="link" size="200" maxlength="1000" />           </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">タイプ：</td>
                                <td class="td_bg">
                                    <input checked="checked"  type="radio" name="type" value="語学" />語学<br />
                                    <input  type="radio" name="type" value="商学" />商学<br />
                                    <input  type="radio" name="type" value="プログラミング" />プログラミング<br />
                                    <input  type="radio" name="type" value="技術" />技術<br/>
                                    <input  type="radio" name="type" value="経済" />経済
                                </td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">在庫数：</td>
                                <td class="td_bg"><input name="total" type="text" id="total" size="5" maxlength="15" />
                                    本</td>
                            </tr>
                            <tr>
                                <td align="right" class="td_bg">

                                    <input type="submit" name="button" id="button" value="登録する" />          </td>
                                <td class="td_bg">　　
                                    <input type="reset" name="button2" id="button2" value="リセット" />       </td>
                            </tr>
                        </table>
                    </form>
                </body>
                </html>