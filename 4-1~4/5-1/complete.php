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
      $referer = $_SERVER['HTTP_REFERER']; //アクセス元ページ（ユーザー側）
      $url = "confirm.php"; //運営が指定しているアクセス元ページ
      if(!strstr($referer,$url)){
       header("Location: contact.php");
       exit;
      };

      //BD接続
      //外部ファイル
      require_once('function.php');
      $fun = new Fun();//インスタンス化

      //データ挿入
      $dbh = $fun -> dbConnect();
      $dbh -> beginTransaction();//トランザクション
      $created_at = date('Y/m/d H:i:s');
      $sql ='INSERT INTO contacts (name,kana,tel,email,body) VALUES (:name, :kana, :tel, :email, :body)';
      try {
        $stmt = $dbh->prepare($sql);
        $stmt -> bindValue(':name', $post['name'], PDO::PARAM_STR);
        $stmt -> bindValue(':kana', $post['kana'], PDO::PARAM_STR);
        $stmt -> bindValue(':tel', $post['number'], PDO::PARAM_INT);
        $stmt -> bindValue(':email', $post['mail'], PDO::PARAM_STR);
        $stmt -> bindValue(':body', $post['content'], PDO::PARAM_STR);
        $stmt -> execute();
        $dbh -> commit();
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
        <p>お問い合わせ</p>
      </div>
      <div class="mail-body">
        <div class="confirmation">
          <p>お問い合わせ頂きありがとうございます。<br>
            送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
            なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
        </div>
        <div class="top-page">
          <a href="4-4.php">トップページに戻る</a>
        </div>
      </div>
    </div>

    <?php include('footer.php'); ?>
  </body>
</html>
