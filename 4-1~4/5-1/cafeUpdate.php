<?php

session_start();
$post = $_SESSION['form'];

?>
<!DOCTYPE html>
<html lang="jp" >
  <head>
    <meta charset="utf-8">
    <title>Lesson Sample Site</title>
    <?php
      //BD接続
      //外部ファイル
      require_once('function.php');
      $fun = new Fun();//インスタンス化

      $dbh = $fun -> dbConnect();
      $dbh -> beginTransaction();//トランザクション
      $created_at = date('Y/m/d H:i:s');
      $sql ='UPDATE contacts SET name=:name, kana=:kana, tel=:tel, email=:email, body=:body WHERE id=:id ';
      try {
        $stmt = $dbh->prepare($sql);
        $stmt -> bindValue(':name', $post['name'], PDO::PARAM_STR);
        $stmt -> bindValue(':kana', $post['kana'], PDO::PARAM_STR);
        $stmt -> bindValue(':tel', $post['number'], PDO::PARAM_INT);
        $stmt -> bindValue(':email', $post['mail'], PDO::PARAM_STR);
        $stmt -> bindValue(':body', $post['content'], PDO::PARAM_STR);
        $stmt -> bindValue(':id', $post['id'], PDO::PARAM_INT);
        $stmt -> execute();
        $dbh -> commit();
        echo '更新しました';
        $dbh= null;
      } catch(PDOException $e){
        $dbh -> rollBack();
        exit($e);
      }



     ?>
    <link rel="stylesheet" href="contact.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="mail-all">
      <div class="mail-tl">
        <p>更新フォーム</p>
      </div>
      <div class="mail-body">
        <div class="confirmation">
          <p>更新しました。</p>
        </div>
        <div class="top-page">
          <a href="4-4.php">トップページに戻る</a>
        </div>
      </div>
    </div>

    <?php include('footer.php'); ?>
  </body>
</html>
