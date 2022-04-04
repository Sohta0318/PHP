<?php include './includes/header.php'; ?>
<script>
$(function() {
  $("#form").on("submit", function(e) {
    const error_massege = [];
    if ($("#name").val() == "" || $("#name").val().length > 10) {
      error_massege.push('氏名は必須入力です。10文字以内でご入力ください。');
    }
    if ($("#kana").val() == "" || $("#kana").val().length > 10) {
      error_massege.push('フリナガは必須入力です。10文字以内でご入力ください。');
    }
    if (!$("#tel").val().match(/^[0-9]{10,11}$/) && $('#tel').val() != "") {
      error_massege.push('正しい電話番号をご入力ください。');
    }
    if (!$("#email").val().match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/)) {
      error_massege.push('メールアドレスは正しくご入力ください。');
    }
    if ($("#message").val() == "") {
      error_massege.push('お問い合わせ内容は必須入力です。');
    }
    var error_alert = error_massege.join("\n");
    if (error_massege.length !== 0) {
      alert(error_alert);
      e.preventDefault();
    }

  })

})

<?php 
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM contact WHERE id = $id";
  $result = useQuery($query);

  while($row= mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $username = $row['username'];
    $kana = $row['kana'];
    $tel = $row['tel'];
    $email = $row['email'];
    $body = $row['body'];
  }
}
?>
</script>
<div id="contact">
  <h1 id="contact_h1">お問い合わせ</h1>
  <div id="table">
    <p class="p_gray">下記の項目をご記入の上送信ボタンを押してください</p>
    <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
    <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
    <p><span>*</span>は必須項目となります。</p>
    <div id="contact_form">
      <form action="update_confirm.php?id=<?php echo $id;?>" method="post" id="form">
        <p>氏名<span>*</span></p>
        <input type="text" id="name" name="name" value="<?php echo $username;?>" placeholder="山田太郎">
        <p>フリガナ<span>*</span></p>
        <input type="text" id="kana" name="kana" placeholder="ヤマダタロウ" value="<?php echo $kana;?>">
        <p>電話番号</p>
        <input type="text" id="tel" name="tel" placeholder="09012345678" value="<?php echo $tel;?>">
        <p>メールアドレス<span>*</span></p>
        <input type="email" id="email" name="email" placeholder="test@test.co.jp" value="<?php echo $email;?>">
        <div class="inquiry">
          <p class="p_gray">お問い合わせ内容をご記入ください<span>*</span></p>
        </div>
        <textarea id="message" name="message"><?php echo $body;?></textarea>
        <input type="submit" id="submit" value="送信" name="update">
      </form>
    </div>
  </div>
</div>

<?php include './includes/footer.php'; ?>