<?php
session_start();
$post = $_SESSION['form'];
require_once('function.php');
$fun = new Fun();//インスタンス化
//idを受け取る
//不正
$result = $fun -> getCafe($_GET['id']);
$id = $result['id'];
if(!empty($result['name'])) {
   $name = $result['name'];
}
if(!empty($result['kana'])) {
   $kana = $result['kana'];
}
if(!empty($result['tel'])) {
   $tel = $result['tel'];
}
if(!empty($result['email'])) {
   $email = $result['email'];
}
if(!empty($result['body'])) {
   $body = $result['body'];
}
$created_at = date('Y/m/d H:i:s');

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
    header("Location: cafeUpdate.php");
    exit;
  }


};
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
    });
    </script>
    </head>

    </head>
  <body>
    <div class="mail-all">
      <div class="mail-tl">
        <p>編集フォーム</p>
      </div>
      <div class="mail-body">
        <form class="mail" action="" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <div class="mail-ditail m-d-top">
            <p>氏名<span class="red">*</span></p>
            <?php if($error['name']==="bk") :?>
              <p class="error">氏名は必須入力です。10文字以内でご入力ください。</p>
            <?php endif; ?>
            <input type="text" class="mail-box" id="name" name="name" value="<?php if( !empty($name)){ echo htmlspecialchars($name,ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="mail-ditail">
            <p>フリガナ<span class="red">*</span></p>
            <?php if($error['kana']==="bk") :?>
              <p class="error">フリガナは必須入力です。10文字以内でご入力ください。</p>
            <?php endif; ?>
            <input type="text" class="mail-box" id="kana" name="kana" value="<?php if( !empty($kana) ){ echo htmlspecialchars($kana,ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="mail-ditail">
            <p>電話番号</p>
            <?php if($error['tl-number']==="num") :?>
              <p class="error">電話番号は0-9の数字でのご入力ください。</p>
            <?php endif; ?>
            <input type="text" class="mail-box" name="number" id="number" value="<?php if( !empty($tel) ){ echo htmlspecialchars($tel,ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="mail-ditail m-d-bottom">
            <p>メールアドレス<span class="red">*</span></p>
            <?php if($error['mail']==="bk" || $error['mail']==='email') :?>
              <p class="error">メールアドレスは正しくご入力ください。</p>
            <?php endif; ?>
            <input type="text" class="mail-box" name="mail" id="mail" value="<?php if( !empty($email) ){ echo htmlspecialchars($email,ENT_QUOTES, "UTF-8"); } ?>">
          </div>
          <div class="pre-tl">
            <p>お問い合わせ内容をご記入ください<span class="red">*</span></p>
          </div>
          <?php if($error['content']==="bk") :?>
            <p class="error">お問い合わせ内容は必須入力です。</p>
          <?php endif; ?>
          <textarea class="mail-box2" name="content" id="content"><?php if( !empty($body) ){ echo htmlspecialchars($body,ENT_QUOTES, "UTF-8"); } ?></textarea>
          <input type="submit" class="btn" value="送信" name="btn">
        </form>
      </div>

    </div>
  </body>
</html>
