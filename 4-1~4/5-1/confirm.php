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
      $url = "contact.php"; //運営が指定しているアクセス元ページ
      if(!strstr($referer,$url)){
       header("Location: contact.php");
       exit;



    }?>

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
            <p>下記の内容をご確認の上送信ボタンを押してください<br>
              内容を訂正する場合は戻るを押してください。</p>
          </div>
          <form class="mail" action="complete.php" method="post">
            <div class="mail-ditail-fi m-d-top">
              <div class="m-d-fi">
                <p>氏名</p>
              </div>
              <p class="ditail"><?php echo htmlspecialchars($post['name'],ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class="mail-ditail-fi">
              <div class="m-d-fi">
                <p>フリガナ</p>
              </div>
              <p class="ditail"><?php echo htmlspecialchars($post['kana'],ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class="mail-ditail-fi">
              <div class="m-d-fi">
                <p>電話番号</p>
              </div>
              <p class="ditail"><?php echo htmlspecialchars($post['number'],ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class="mail-ditail-fi">
              <div class="m-d-fi">
                <p>メールアドレス</p>
              </div>
              <p class="ditail"><?php echo htmlspecialchars($post['mail'],ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <div class="m-d-fi">
              <p>お問い合わせ内容をご記入ください</p>
            </div>
            <p class="ditail2"><?php echo nl2br(htmlspecialchars($post['content'],ENT_QUOTES, "UTF-8")); ?></p>
            <div class="btn-pre">
              <input type="submit" class="btn-send">
              <input type="button" onclick="history.back()" class="btn-back" value="戻る">
            </div>
            <input type="hidden" class="mail-box" name="name" value="<?php if( !empty($post['name']) ){ echo htmlspecialchars($post['name'],ENT_QUOTES, "UTF-8"); } ?>">
            <input type="hidden" class="mail-box" name="kana" value="<?php if( !empty($post['kana']) ){ echo htmlspecialchars($post['kana'],ENT_QUOTES, "UTF-8"); } ?>">
            <input type="hidden" class="mail-box" name="number" value="<?php if( !empty($post['number']) ){ echo htmlspecialchars($post['number'],ENT_QUOTES, "UTF-8"); } ?>">
            <input type="hidden" class="mail-box" name="mail" value="<?php if( !empty($post['mail']) ){ echo htmlspecialchars($post['mail'],ENT_QUOTES, "UTF-8"); } ?>">
            <input type="hidden" class="mail-box" name="content" value="<?php if( !empty($post['content']) ){ echo htmlspecialchars(nl2br($post['content']),ENT_QUOTES, "UTF-8"); } ?>">
          </form>
        </div>
      </div>

    <?php include('footer.php'); ?>
  </body>
</html>
