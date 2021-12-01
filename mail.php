<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <?php
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
$to = '@qq.com';
$title = '123';
$message = '予約';
$header = 'From: @gmail.com';
      if(mb_send_mail($to, $title, $message,$header,'-f' . '@gmail.com')){
        echo "メールを送信しました";
      } else {
        echo "メールの送信に失敗しました";
      };
    ?>
  </body>
</html>