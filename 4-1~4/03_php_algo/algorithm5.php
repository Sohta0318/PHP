<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 「algorithm5」で作成したポーカープログラムにジョーカーを追加してください。
// ジョーカー１枚のみ、suitをjoker、numberを0と表す。
// 上記以外は不正として処理してください。

// 追加された役
// 「フォーカード」＋ジョーカーは「ファイブカード」

// 判定は強い役を優先してください。組み合わせの強さ順は以下とする。
// ロイヤルストレートフラッシュ > ストレートフラッシュ > ファイブカード > フォーカード > フルハウス > フラッシュ > ストレート > スリーカード > ツーペア > ワンペア
// ジョーカーが出た時点で最低でも「ワンペア」となること


// 手札
$cards = [
    ['suit'=>'heart', 'number'=>2],
    ['suit'=>'joker', 'number'=>0],
    ['suit'=>'spade', 'number'=>6],
    ['suit'=>'diamond', 'number'=>2],
    ['suit'=>'club', 'number'=>13],
];

function judge($cards){
    // この関数内に処理を記述
    $count = array_unique($cards,SORT_REGULAR);
  $unique = count($count);

    // カードの不正チェック
    foreach($cards as $card){
        if($card["suit"] != "heart" && $card["suit"] != "spade" && $card["suit"] != "diamond" && $card["suit"] != "club" && $card["suit"] != "joker"){
            return '手札は不正';
        }elseif($card["number"] > 13 || $card["number"] < 0){
            return '手札は不正';
        } elseif ($unique < 5) {
            return '手札は不正';
        } elseif ($card["suit"]=="joker" && $card["number"]!= 0) {
            return '手札は不正';
        } elseif ($card["suit"]!="joker" && $card["number"]== 0) {
            return '手札は不正';
        }
    };

    // カードの並び替え
    sort($cards);

    // 役判定
    $number = array_column($cards,"number");
    sort($number);
    $count_number = array_count_values($number);
    sort($count_number);

    $suit = array_column($cards,"suit");
    $value_count = array_count_values($suit);
    sort($value_count);

    // 結果を返す
    if($number[0] != 0){
        if($number == [1,10,11,12,13] && $value_count == [5]){
            return '役はロイヤルストレートフラッシュ';
        }elseif($number == [$number[0],$number[0]+1,$number[0]+2,$number[0]+3,$number[0]+4] && $number[0] < 10 && $value_count == [5]){
            return '役はストレートフラッシュ';
        }elseif($count_number == [1,4]){
            return '役はフォーカード';
        }elseif($count_number == [2,3]){
            return '役はフルハウス';
        }elseif($value_count == [5]){
            return '役はフラッシュ';
        }elseif($number == [$number[0],$number[0]+1,$number[0]+2,$number[0]+3,$number[0]+4] && $number[0] < 10){
            return '役はストレート';
        }elseif($count_number == [1,1,3]){
            return '役はスリーカード';
        }elseif($count_number == [1,2,2]){
            return '役はツーペア';
        }elseif($count_number == [1,1,1,2]){
            return '役はワンペア';
        }elseif($count_number == [1,1,1,1,1]){
            return '役はなし';
        }
    // ジョーカーあり
    }elseif($number[0] == 0){
        $j = $number;
        if($j == [0,1,10,11,12] && $value_count == [1,4]){
            return '役はロイヤルストレートフラッシュ';
        }elseif($j == [0,1,11,12,13] && $value_count == [1,4]){
            return '役はロイヤルストレートフラッシュ';
        }elseif($j == [0,1,10,12,13] && $value_count == [1,4]){
            return '役はロイヤルストレートフラッシュ';
        }elseif($j == [0,10,11,12,13] && $value_count == [1,4]){
            return '役はロイヤルストレートフラッシュ';
        }elseif($j == [0,1,10,11,13] && $value_count == [1,4]){
            return '役はロイヤルストレートフラッシュ';
        }

        if($value_count == [1,4]){
            if($j[2] == $j[1]+1 && $j[3] == $j[1]+2 && $j[4] == $j[1]+3){
                return '役はストレートフラッシュ';
            }elseif($j[2] == $j[1]+2 && $j[3] == $j[1]+3 && $j[4] == $j[1]+4){
                return '役はストレートフラッシュ';
            }elseif($j[2] == $j[1]+1 && $j[3] == $j[1]+3 && $j[4] == $j[1]+4){
                return '役はストレートフラッシュ';
            }elseif($j[2] == $j[1]+1 && $j[3] == $j[1]+2 && $j[4] == $j[1]+4){
                return '役はストレートフラッシュ';
            }
        }

        if($count_number == [1,4]){
            return '役はファイブカード';
        }
        if($count_number == [1,1,3]){
            return '役はフォーカード';
        }
        if($count_number == [1,2,2]){
            return '役はフルハウス';
        }
        if($value_count == [1,4]){
            return '役はフラッシュ';
        }

        if($j[2] == $j[1]+1 && $j[3] == $j[1]+2 && $j[4] == $j[1]+3){
            return '役はストレート';
        }elseif($j[2] == $j[1]+2 && $j[3] == $j[1]+3 && $j[4] == $j[1]+4){
            return '役はストレート';
        }elseif($j[2] == $j[1]+1 && $j[3] == $j[1]+3 && $j[4] == $j[1]+4){
            return '役はストレート';
        }elseif($j[2] == $j[1]+1 && $j[3] == $j[1]+2 && $j[4] == $j[1]+4){
            return '役はストレート';
        }
        if($count_number == [1,1,1,2]){
            return '役はスリーカード';
        }
        if($count_number == [1,1,1,1,1]){
            return '役はワンペア';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>ポーカー役判定（ジョーカーあり）</title>
</head>

<body>
  <section>
    <p>手札は</p>
    <p><?php foreach($cards as $card): ?><?=$card['suit'].$card['number'] ?> <?php endforeach; ?></p>
    <p><?=judge($cards) ?>です。</p>
  </section>
</body>

</html>