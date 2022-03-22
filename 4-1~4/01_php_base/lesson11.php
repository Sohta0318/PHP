<?php
// 多次元配列で配列の中に連想配列を作り、
// name,age,genderを格納したデータがあります。

// このデータを元に

// 田中25男
// 鈴木20男
// 佐藤23女

// という形でループ構文を使用して出力してください。
// 上記処理後、鈴木の年齢のみを下部に出力してください。
$people = array(
  [$name = "田中","鈴木","佐藤"],
  [$age = 25,20,23],
  [$gender ="男","男","女"]
);
$people_length = sizeof($people);

for ($i=0; $i <$people_length ; $i++) { 
  for ($y=0; $y <$people_length ; $y++) { 
    echo $people[$y][$i];
  }
  echo "<br>";
}
echo $people[1][1];
?>