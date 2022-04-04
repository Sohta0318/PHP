<?php

//クラス
Class Fun{
  //BD接続
  function dbConnect() {
    $user   = 'root';
    $pass   = 'root';
    $dsn    ='mysql: host=localhost; dbname=cafe; charset=utf8';
    try {
    $dbh= new PDO($dsn, $user, $pass,[
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }catch (PDOException $e){
      echo '接続失敗'. $e->getMessage();
      exit();
    };
    return $dbh;
  }

  //idの不正検証
  function getCafe($id) {
    if (empty($id)) {
      exit('IDが不正です。');
    }

    $dbh = $this -> dbConnect();
    $dbh -> beginTransaction();//トランザクション
    //SQL準備
    $stmt = $dbh->prepare('SELECT * FROM contacts Where id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    //結果を取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$result) {
      exit('データがありません。');
    }
    return $result;
  }

  //データの取得：参照
  function getAll() {
    $dbh = $this -> dbConnect();
    //SQLの準備
    $sql = 'SELECT * FROM contacts';
    //SQLの実行
    $stmt = $dbh->query($sql);
    //SQLの結果の受け取り
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
    $dbh=null;
  }

  //データ削除
  function delete($id) {
    if (empty($id)) {
      exit('IDが不正です。');
    }

    $dbh = $this -> dbConnect();
    //SQL準備
    $stmt = $dbh->prepare('DELETE FROM contacts Where id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}



?>
