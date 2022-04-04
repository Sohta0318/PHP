<?php
require_once('function.php');
$fun = new Fun();//インスタンス化
//idを受け取る
//不正
$result = $fun -> delete($_GET['id']);

?>
<!DOCTYPE html>
<html lang="jp" >
  <head>
    <meta charset="utf-8">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="contact.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="mail-all">
      <div class="mail-body">
        <div class="confirmation">
          <p>削除しました。</p>
        </div>
        <div class="top-page">
          <a href="4-4.php">トップページに戻る</a>
        </div>
      </div>
    </div>

    <?php include('footer.php'); ?>
  </body>
</html>
