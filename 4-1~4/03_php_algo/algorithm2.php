<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 150; // 商品金額

function calc($yen, $product) {
    // この関数内に処理を記述
    $currency10 = 0;
    $currency5 = 0;
    $currency1 = 0;
    $currency05 = 0;
    $currency01 = 0;
    $currency005 = 0;
    $currency001 = 0;
    $currency0005 = 0;
    $currency0001 = 0;
    $tea = 150;
    if($yen < $tea ){
        echo abs($yen - $tea). "円足りません。";
        return;
    }
    $sum = $yen - $product;
    while ($sum > 0) {
        if($sum >= 5000){
            $currency5++;
            $sum -= 5000;
        }elseif($sum >= 1000){
            $currency1++;
            $sum -= 1000;
        }
        elseif($sum >= 500){
            $currency05++;
            $sum -= 500;
        }
        elseif($sum >= 100){
            $currency01++;
            $sum -= 100;
        }
        elseif($sum >= 50){
            $currency005++;
            $sum -= 50;
        }
        elseif($sum >= 10){
            $currency001++;
            $sum -= 10;
        }
        elseif($sum >= 5){
            $currency0005++;
            $sum -= 5;
        }
        elseif($sum >= 1){
            $currency0001++;
            $sum -= 1;
        }
    }
    
    echo "10000円札x$currency10 枚、5000円札x$currency5 枚、1000円札x$currency1 枚、500円玉x$currency05 枚、100円玉x$currency01 枚、50円玉x$currency005 枚、10円玉x$currency001 枚、5円玉x$currency0005 枚、1円玉x$currency0001 枚";
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>お釣り</title>
</head>

<body>
  <section>
    <!-- ここに結果表示 -->
    <?php calc(10000,150);?>
  </section>
</body>

</html>