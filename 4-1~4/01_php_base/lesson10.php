<?php
// 配列に「10,60,90,70,50」を点数として格納し
// それぞれをif文で

// 80点以上なら「優」
// 60点以上なら「良」
// 40点以上なら「可」
// それ以下なら「不可」

// という形で区別し、
// ○○点は「○」です。と出力してください。
$score = array(10,60,90,70,50);

for ($i=0; $i < sizeof($score); $i++) { 
  switch ($score[$i]) {
    case $score[$i] >= 80:
      echo "<p>優</p>";
      break;
    case $score[$i] >= 60:
      echo "<p>良</p>";
      break;
    case $score[$i] >= 40:
      echo "<p>可</p>";
      break;
    
    default:
    echo "<p>不可</p>";
      break;
  }
}

?>