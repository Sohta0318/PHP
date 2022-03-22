<?php
// 以下をfor文を使用して表示してください。

// 1
// 21
// 321

function pyramid($num){
  for($i = 1; $i <= $num; $i++){
    for($y = $i; $y >= 1; $y--){
    echo $y; // 1-1,2-2 2-1, 3-3 3-2 3-1
  }
  echo "\n";
  }
}

pyramid(3);
?>