<?php 
 $referer = $_SERVER['HTTP_REFERER'];
 $url = 'confirm.php';
 if(!strstr($referer,$url)){ 
     header('Location: contact.php');
     exit;
 }
 if(isset($_SESSION['name'])){
  header('Location: contact.php');
 }
?>


<?php include './includes/header.php'; ?>

<div id="contact">
  <h1 id="contact_h1">お問い合わせ</h1>
  <div id="table">
    <p>お問い合わせ頂きありがとうございます。</p>
    <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
    <p class="last">なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
    <a href="index.php" class="back_top">トップへ戻る</a>
  </div>
</div>

<?php include './includes/footer.php'; ?>