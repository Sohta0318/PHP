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
    ['suit'=>'heart', 'number'=>12],
    ['suit'=>'joker', 'number'=>0],
    ['suit'=>'spade', 'number'=>1],
    ['suit'=>'diamond', 'number'=>2],
    ['suit'=>'club', 'number'=>13],
];

function judge($cards) {
    // この関数内に処理を記述
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
        <p><?php foreach($cards as $card): ?><?=$card['suit'].$card['number'] ?><?php endforeach; ?></p>
        <p>役は<?=judge($cards) ?>です。</p>
    </section>
</body>
</html>