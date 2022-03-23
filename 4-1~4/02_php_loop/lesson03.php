<?php
// 以下をfor文を使用して表示してください。

// 112
// 212
// 312

function repeat($num){
$set = '12';
for ($i=1; $i <=$num ; $i++) { 
  echo $i.$set. "\n";
}
}

repeat(3);
?>