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
</script>
<div id="contact">
  <h1 id="contact_h1">お問い合わせ</h1>
  <div id="table">
    <p class="p_gray">下記の項目をご記入の上送信ボタンを押してください</p>
    <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
    <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
    <p><span>*</span>は必須項目となります。</p>
    <div id="contact_form">
      <form action="confirm.php" method="post" id="form">
        <p>氏名<span>*</span></p>
        <input type="text" id="name" name="name" value="" placeholder="山田太郎">
        <p>フリガナ<span>*</span></p>
        <input type="text" id="kana" name="kana" placeholder="ヤマダタロウ">
        <p>電話番号</p>
        <input type="text" id="tel" name="tel" placeholder="09012345678">
        <p>メールアドレス<span>*</span></p>
        <input type="email" id="email" name="email" placeholder="test@test.co.jp">
        <div class="inquiry">
          <p class="p_gray">お問い合わせ内容をご記入ください<span>*</span></p>
        </div>
        <textarea id="message" name="message"></textarea>
        <input type="submit" id="submit" value="送信" name="submit">
      </form>
    </div>
  </div>
</div>

<?php 
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM contact WHERE id = $id";
  useQuery($query);
  header('Location: contact.php');
}
?>

<div style="margin-left:auto; margin-right:auto; width:100%; ">

  <form name="secondForm" action="contact.php" method="post">

    <table
      style="margin-left:auto; margin-right:auto; text-align: middle; border-collapse: collapse; width:80%; border-spacing: 0 15px; margin-bottom:20px;">
      <tr style="  text-align: center; ">
        <th style="border: 1px solid black;">id</th>
        <th style="border: 1px solid black; ">name</th>
        <th style="border: 1px solid black;">kana</th>
        <th style="border: 1px solid black;">tel</th>
        <th style="border: 1px solid black;">email</th>
        <th style="border: 1px solid black;">body</th>
        <th style="border: 1px solid black;">created_at</th>
        <th style="border: 1px solid black;">編集</th>
        <th style="border: 1px solid black;">削除</th>


      </tr>


      <?php 
                        $query = "SELECT * FROM contact";
                        $result = useQuery($query);
                        while($row = mysqli_fetch_assoc($result)){
                          ?>
      <tr>

      </tr>
      <tr style='background-color:lightgrey'>
        <td> <?php echo $row['id'] ?></td>
        <td> <?php echo $row['username'] ?></td>
        <td> <?php echo $row['kana'] ?></td>
        <td> <?php echo $row['tel'] ?></td>
        <td> <?php echo $row['email'] ?></td>
        <td> <?php echo $row['body'] ?></td>
        <td> <?php echo $row['create_at'] ?></td>
        <td style="text-align: center;"><a href='edit.php?id=<?php echo $row['id'] ?>'>編集</a></td>

        <td style="text-align: center;"><a onclick="confirm('Are you sure')"
            href='contact.php?id=<?php echo $row['id']?>'>削除</a></td>

      </tr>
      <?php
      }
      ?>
    </table>
  </form>
</div>
<?php include './includes/footer.php'; ?>