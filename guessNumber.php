<?php
// フラグ関数
$range = false;
$correct = false;

// ランダム出力するための範囲を設定

// $minNumber = intval(fgets(STDIN));
// echo "もう一つの値を入力してください" . "\n";
// $maxNumber = intval(fgets(STDIN));

// 小さい値から大きい値と表示されるように設定
// もし範囲入力で同じ値が設定された時の処理
while(!$range){

    echo "一つずつ値を入力して範囲を設定してください" . "\n";
    $a = intval(fgets(STDIN));
    echo "もう一つの値を入力してください" . "\n";
    $b = intval(fgets(STDIN));

    if($a === $b){
        echo "同じ値は禁止です。範囲を設定してください" . "\n";
    }
    else if($a > $b){
        $minNumber = $b;
        $maxNumber = $a;
        $range = true;
    }
    else{
        $minNumber = $a;
        $maxNumber = $b;
        $range = true;
    }

}

// random_int関数ではなくrand関数を使用
// 理由は暗号的に安全にする必要がなく、rand関数の方が早いから
// ランダムな値を生成
$answer = rand($minNumber, $maxNumber);
// echo var_dump($answer);

echo "$minNumber から $maxNumber の間で値を予測して入力してください" . "\n";

// 正解が出るまでループ
while(!$correct){

    // echo var_dump($answer);
    $enterNumber = intval(fgets(STDIN));

    // 範囲外の場合の警告
    if($enterNumber < $minNumber || $enterNumber > $maxNumber){
        echo "$minNumber から $maxNumber の範囲内で入力してください" . "\n";
    }
    else if($answer === $enterNumber){
        echo "おめでとうございます！正解です" . "\n";
        $correct = true;
        // break;
    }
    else{
        echo "残念...間違っています" . ".\n";
        echo "もう一度入力してください" . "\n";
    }

}