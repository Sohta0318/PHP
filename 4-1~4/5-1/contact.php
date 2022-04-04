<?php
session_start();
//バリデーション
$error['name']='';
$error['kana']='';
$error['content']='';
$error['mail']='';
$error['tl-number']='';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  if ($post['name'] ==='') {
    $error['name'] = 'bk';
  }elseif( 10 < mb_strlen($post['name']) ) {
	$error['name'] = 'bk';
  }
  if ($post['kana'] ==='') {
    $error['kana'] = 'bk';
  }elseif( 10 < mb_strlen($post['kana']) ) {
	$error['kana'] = 'bk';
  }
  if ($post['mail'] ==='') {
    $error['mail'] = 'bk';
  }elseif ( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $post['mail']) ){
    $error['mail'] = 'email';
  }
  if ($post['content'] ==='') {
    $error['content'] = 'bk';
  }
  if (!preg_match('/^[0-9]+$/',$post['number'])) {
    $error['number']='num';
  }

  if (empty($error['name']) && empty($error['kana']) && empty($error['mail']) && empty($error['content']) ){
    $_SESSION['form'] = $post;
    header("Location: confirm.php");
    exit;
  }
};

//外部ファイル
require_once('function.php');
$fun = new Fun();//インスタンス化
//データ取得・参照
$cafeData = $fun -> getAll();
?>

<!DOCTYPE html>
<html lang="jp" >
  <head>
    <meta charset="utf-8">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="contact.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript'>

    $(function() {
      $('.btn').click(function() {
        var error;
        var error_result = [];
        if( $('#name').val() === '' || $('#name').val().length >= 10) {
            var error = 1;
            error_result.push('氏名は必須入力です。10文字以内でご入力ください。');
        }
        if( $('#kana').val() === '' || $('#kana').val().length >= 10) {
            var error = 1;
            error_result.push ('フリガナは必須入力です。10文字以内でご入力ください。');
        }
        if( $('#number').val() === '') {
            var error;
        }else if (!$('#number').val().match(/^[0-9]+$/)) {
          var error = 1;
          error_result.push ('電話番号は0-9の数字でのご入力ください。');
        }
        if( $('#mail').val() === '' || !$('#mail').val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
            var error = 1;
            error_result.push ('メールアドレスは正しくご入力ください。');
        }
        if( $('#content').val() === '') {
            var error = 1;
            error_result.push('お問い合わせ内容は必須入力です。');
        }
        if( error ) {
            var error_result = error_result.join('\n');
            alert(error_result);
        }
    });

    //モーダルウィンドウ
    $(function () {
      $('.delete').click(function () {
        $('.delete2, .m-delete').css('display','block');
      });
      $('.m-delete, .cansell ').click(function () {
        $('.delete2, .m-delete').css('display','none');
      });
    });
});
    </script>
    </head>

    </head>
  <body>
    <?php include('header.php'); ?>
    <div class="mail-all">
      <div class="mail-tl">
        <p>お問い合わせ</p>
      </div>
      <div class="mail-body">
        <div class="mail-precautions">
          <div class="pre-tl">
            <p>下記の項目をご記入の上送信ボタンを押してください</p>
          </div>
          <div class="pre-main">
            <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
              なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br>
              <span class="red">*</span>は必須項目となります。</p>
          </div>
        </div>
        <form class="mail" action="" method="post">
          <div class="mail-ditail m-d-top">
            <p>氏名<span class="red">*</span></p>
            <?php if($error['name']==="bk") :?>
              <p class="error">氏名は必須入力です。10文字以内でご入力ください。</p>
            <?php endif; ?>
            <input type="text" placeholder="山田太郎" class="mail-box" id="name" name="name" value="<?php if( !empty($post['name']) ){ echo htmlspecialchars($post['name'],ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="mail-ditail">
            <p>フリガナ<span class="red">*</span></p>
            <?php if($error['kana']==="bk") :?>
              <p class="error">フリガナは必須入力です。10文字以内でご入力ください。</p>
            <?php endif; ?>
            <input type="text" placeholder="ヤマダタロウ" class="mail-box" id="kana" name="kana" value="<?php if( !empty($post['kana']) ){ echo htmlspecialchars($post['kana'],ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="mail-ditail">
            <p>電話番号</p>
            <?php if($error['tl-number']==="num") :?>
              <p class="error">電話番号は0-9の数字でのご入力ください。</p>
            <?php endif; ?>
            <input type="text" placeholder="09012345678" class="mail-box" name="number" id="number" value="<?php if( !empty($post['number']) ){ echo htmlspecialchars($post['number'],ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="mail-ditail m-d-bottom">
            <p>メールアドレス<span class="red">*</span></p>
            <?php if($error['mail']==="bk" || $error['mail']==='email') :?>
              <p class="error">メールアドレスは正しくご入力ください。</p>
            <?php endif; ?>
            <input type="text" placeholder="test@test.co.jp" class="mail-box" name="mail" id="mail" value="<?php if( !empty($post['mail']) ){ echo htmlspecialchars($post['mail'],ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="pre-tl">
            <p>お問い合わせ内容をご記入ください<span class="red">*</span></p>
          </div>
          <?php if($error['content']==="bk") :?>
            <p class="error">お問い合わせ内容は必須入力です。</p>
          <?php endif; ?>
          <textarea class="mail-box2" name="content" id="content"><?php if( !empty($post['content']) ){ echo htmlspecialchars($post['content'],ENT_QUOTES, "UTF-8"); } ?></textarea>
          <input type="submit" class="btn" value="送信" name="btn">
        </form>
      </div>

    </div>
    <table cellspacing = "0"  cellpadding ="5"  border ="5">
      <tr><th>id</th><th>name</th><th>kana</th><th>tel</th><th>email</th><th>body</th><th>created_at</th></tr>
      <?php foreach ($cafeData as $record): ?>
        <tr>
          <td><?php echo $record['id'] ?></td>
          <td><?php echo $record['name'] ?></td>
          <td><?php echo $record['kana'] ?></td>
          <td><?php echo $record['tel'] ?></td>
          <td><?php echo $record['email'] ?></td>
          <td><?php echo $record['body'] ?></td>
          <td><?php echo $record['created_at'] ?></td>
          <td><a href="/update.php?id=<?php echo $record['id'] ?>">編集</a></td><!--idを送る-->
          <td><button type="button" name="delete" class="delete">削除</button></td><!--idを送る-->
        </tr>
      <?php endforeach; ?>
    </table>
    <div class="delete2">
      <div class="dele">
        <div class="">
          <a href="/delete.php?id=<?php echo $record['id'] ?>">削除</a>
        </div>
        <div class="">
          <button type="button" class="cansell">キャンセル</button>
        </div>
      </div>

    </div>
    <div class="m-delete">

    </div>
    <?php include('footer.php'); ?>
  </body>
</html>
