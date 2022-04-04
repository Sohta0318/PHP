<?php include 'includes/header.php'; ?>
<?php 
$referer = $_SERVER['HTTP_REFERER']; 
$url = "contact.php"; 
$url2 = "confirm.php";
if (!strstr($referer, $url) && !strstr($referer, $url2)) {
  header("Location: contact.php");
  exit;
}
?>
<?php 
if(isset($_POST['submit'])){
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
  $kana = htmlspecialchars($_POST['kana'], ENT_QUOTES);
  $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES);
  $tel_type =intval($tel);
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
  $message = nl2br(htmlspecialchars($_POST['message'], ENT_QUOTES));
  $error = false;
  if($name == "" || mb_strlen($_POST['name']) > 10 || $kana == "" || mb_strlen($_POST['kana']) > 10|| gettype($tel_type) != 'integer' || !strpos($email,'@')||$message == ''){
    $error = true;
  }
  $action_to = $error ? '':'complete.php';
  $disable = $error ? 'disabled':'';
}

if(isset($_POST['confirm'])){
  $_SESSION['name'] = $name;
  $_SESSION['kana'] = $kana;
  $_SESSION['tel'] = $tel;
  $_SESSION['email'] = $email;
  $_SESSION['message'] = $message;
}
?>
<div id="contact">
  <h1 id="contact_h1">お問い合わせ</h1>
  <div id="table">
    <p>下記の内容をご確認の上送信ボタンを押してください<br>内容を訂正する場合は戻るを押してください。</p>
    <div id="contact_form">

      <form action="<?php echo $action_to; ?>" method="post">
        <div>
          <p class="btm_line">氏名</p>
          <?php if ($name == "" || mb_strlen($_POST['name']) > 10) {
              echo '<p class="error">氏名は必須入力です。10文字以内でご入力ください。</p>';
            }else{
              echo "<p class='confirm_message'>$name</p>";
            }
            ?>

          <p class="btm_line">フリガナ</p>
          <?php if ($kana == "" || mb_strlen($_POST['kana']) > 10) {
              echo '<p class="error">フリナガは必須入力です。10文字以内でご入力ください。</p>';
            }else{
              echo "<p class='confirm_message'>$kana</p>";
            }
            ?>

          <p class="btm_line">電話番号</p>
          <?php if ( isset($_POST['tel']) && gettype($tel_type) != 'integer' ) {
              echo '<p class="error">正しい電話番号をご入力ください。</p>';
            }else{
              echo "<p class='confirm_message'>$tel</p>";
            }
            ?>

          <p class="btm_line">メールアドレス</p>
          <?php if (!strpos($email,'@')) {
              echo '<p class="error">メールアドレスは正しくご入力ください。</p>';
            }else{
              echo "<p class='confirm_message'>$email</p>";
            }
            ?>

          <p class="btm_line">お問い合わせ内容をご記入ください</p>
          <?php if ($message == "") {
              echo '<p class="error">お問い合わせ内容は必須入力です。</p>';
            }else{
              echo "<p class='confirm_message mess'>$message</p>";
            }
            ?>
          <div class="confirm_btn">
            <button type="submit" <?php echo $disable?> name="confirm">送　信</button>
            <a href="javascript:history.back();">戻　る
            </a>
          </div>
        </div>
        <input type="hidden" id="name" name="name">
        <input type="hidden" id="kana" name="kana">
        <input type="hidden" id="num" name="num">
        <input type="hidden" id="mail" name="mail">
        <input type="hidden" id="message" name="message">

      </form>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>