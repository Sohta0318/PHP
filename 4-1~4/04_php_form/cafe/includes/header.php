<?php session_start();?>

<?php $uri = $_SERVER['REQUEST_URI'];
      $id_name = strpos($uri,'co') ? '':'covid';
      ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Document</title>
  <script src="js/index.js" defer></script>

</head>

<body>
  <main>
    <header id="header">
      <div id="<?php echo $id_name?>"><a href="">新型コロナウイルスに対する取り組みの最新情報をご案内</a></div>
      <div id="header_fixed">
        <div id="logoimg"><a href="index.php"><img src="img\logo.png"></a></div>
        <div id="nav">
          <ul>
            <li><a href="#city">はじめに</a></li>
            <li><a href="#mcafe">体験</a></li>
            <li><a href="contact.php">お問い合わせ</a></li>
          </ul>
        </div>
        <a id="modal-open">サインイン</a>
        <!-- <div><p id="modal-open">サインイン</p></div> -->
      </div>
      <!-- <div class="overlay"></div> -->
      <div id="modal" class="modal"></div>
      <div class="modal-body">
        <h2>ログイン</h2>
        <div class="logins">
          <form action="" method="POST">
            <input class="login_text" type="text" name="email" placeholder="メールアドレス">
            <p></p>
            <input class="login_text" type="text" name="password" placeholder="パスワード">
            <p></p>
            <input class="login_text" type="submit" value="送信" id="sousin">
          </form>
        </div>
        <div>
          <div class="logins">
            <div class="icon">
              <img src="img\twitter.png">
            </div>
            <div class="icon">
              <img src="img\fb.png">
            </div>
            <div class="icon">
              <img src="img\google.png">
            </div>
            <div class="icon">
              <img src="img\apple.png">
            </div>
          </div>
        </div>
      </div>

    </header>