<?php
// 以下は渡された数字が素数かを判定する関数です。
// 渡された値が数の場合true, 素数ではない場合falseを返します。
// 素数とは、1より大きい自然数で約数が1と自分自身のみである数字です。

// 以下プログラムの [ X ] を答えてください。
// X
// ア $num%$i == 0
// イ $num%$i >= 0
// ウ $num%$i > 0
// エ $num > 0

function primeNumber($num) {
  $flg = $num > 1 ? true : false;
  for($i=2;$i<$num;$i++) {
    if([ X ]) {
      $flg = false;
      break;
    }
  }
  return $flg;
}
?>
