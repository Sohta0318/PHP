<?php
// 以下は渡された数字の7が何個含まれるかを返すプログラムです。
// 例えば、7777が出力された場合、数字の7は4個含まれているため4と返します。

// 以下プログラムの [ X ], [ Y ] を答えてください。
// X
// ア 7
// イ strval($num)
// ウ strlen($num)
// エ count($num)

// Y
// ア substr($length,$i,1)
// イ substr($length,$i,$num)
// ウ substr($num,$i,$i+1)
// エ substr($num,$i,1)

function countNumbers($num) {
  $length = [ count($num) ];
  $count = 0;
  for($i=0;$i<$length;$i++) {
    $str = [ substr($num,$i,$i+1) ];
    if($str === '7') {
      $count++;
    }
  }

  return $count;
}


?>