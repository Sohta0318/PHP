<?php
// 以下をfor文を使用して表示してください。

// 123
// 456
// 789

function square($num){
  $column = $num/3;
  $row = 1;
for($i = 0; $i <$column; $i++){
for ($y=$row; $y < $row+3; $y++) { 
  echo $y; //1-1,1-2,1-3,2-4,2-5,2-6,3-6,3-7,3-8,3-9
}
echo "\n";
$row = $row+3;
}
}

square(9);