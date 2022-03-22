<?php
// 以下をそれぞれ表示してください。
// 表示するタイミングによって自動で算出すること
// ・現在日時（yyyy年mm月dd日 H時i分s秒）
// ・現在日時から３日後
// ・現在日時から１２時間前
// ・2020年元旦から現在までの経過日数

// 日時がおかしい場合、PHPのタイムゾーン設定を行ってください
echo date('Y年m月d日 H時i分s秒')."<br>";
$three_day = time() + (3 * 24 * 60 * 60);
echo date('Y年m月d日 H時i分s秒',$three_day)."<br>";
$twelve_hours = time()-(1*12*60*60);
echo date('Y年m月d日 H時i分s秒',$twelve_hours)."<br>";
$new_year = '2020-01-01';
$current = date('y-m-d');

echo ((strtotime($current) - strtotime($new_year)) / 86400).'日';
?>