<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
$row = [];
foreach ($arr as $key => $value) {
    foreach ($arr[$key] as $key2 => $value2) {
        array_push($row,$key2);
    }
}
$row_total = [
    'r1' => array_sum($arr['r1']),
    'r2' => array_sum($arr['r2']),
    'r3' => array_sum($arr['r3']),
];

$column_total = [
    'c1' => array_sum(array_column($arr, 'c1')),
    'c2' => array_sum(array_column($arr, 'c2')),
    'c3' => array_sum(array_column($arr, 'c3')),
];

$all_total = 0;
foreach ($column_total as $total) {
    $all_total += $total;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>テーブル表示</title>
  <style>
  table {
    border: 1px solid #000;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid #000;
  }
  </style>
</head>

<body>
  <!-- ここにテーブル表示 -->
  <table>
    <thead>
      <tr>
        <th></th>
        <?php 
        for ($i=0; $i < 3; $i++) { 
            ?>
        <th><?php echo $row[$i];?></th>
        <?php
        }

        ?>
        <th>横合計</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($arr as $row_key => $row_arr) : ?>
      <tr>
        <td><?php echo $row_key ?></td>

        <?php foreach ($row_arr as $key => $row_value) : ?>
        <td><?php echo $row_value; ?></td>
        <?php endforeach ?>

        <td><?php echo $row_total[$row_key]; ?></td>
      </tr>
      <?php endforeach ?>

      <tr>
        <td>縦合計</td>

        <?php foreach ($column_total as $column_key => $total) : ?>
        <td><?php echo $total; ?></td>
        <?php endforeach ?>

        <td><?php echo $all_total; ?></td>
      </tr>
    </tbody>
  </table>
</body>

</html>