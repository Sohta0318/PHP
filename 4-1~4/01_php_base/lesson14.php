<?php
// ランダムで生成された0〜99の数値10個を配列に格納してください。
// また格納された配列の中身をループ構文を使用せず表示確認してください。

$num_array = array();
for ($i=0; $i <10 ; $i++) { 
  $random = rand(0,99);
  array_push($num_array,$random);
}

print_r($num_array);

?>