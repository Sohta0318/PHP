<?php
// 連想配列の要素name, age, genderに
// 田中,25,男
// という値を格納し、

// 田中
// 25歳・男性

// という形で出力してください。

$person = array("name"=>"田中", "age"=>25, "gender"=>"男");
echo $person["name"]."<br>";
echo $person["age"]. "歳・". $person["gender"];
?>