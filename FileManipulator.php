<?php

$path = 'input.txt';
// input.txtの内容を初期化
file_put_contents($path, "Hello World!");

// input.txtの中身を取得
// コマンドから受け取った引数を使用するため$argv[2]で取得
$inputString = file_get_contents($argv[2]);      // input.txt

// 引数が正しいかチェック
if($argc < 3 || $argv[1] !== "reverse" && $argv[1] !== "copy" && $argv[1] !== "duplicate-contents" && $argv[1] !== "replace-string") {
    echo "引数を正しく設定してください";
}
// 引数がreverseの時
else if($argv[1] === "reverse") {
    // 取得した文字列を逆にする
    $reverseString = strrev($inputString);
    // 逆にした文字列をコマンドで取得したファイルに保存する
    file_put_contents($argv[3], $reverseString);        // output.txt
}
// 引数がcopyの時
else if($argv[1] === "copy") {
    // 与えられた引数にてコピー作成
    copy($argv[2], $argv[3]);
}
// 引数がduplicate-contentsの時
else if($argv[1] === "duplicate-contents") {
    for($i = 0; $i < $argv[3]; $i++) {
        file_put_contents($argv[2], "\n$inputString", FILE_APPEND);
    }
}
// 引数がreplace-stringの時
else if($argv[1] === "replace-string") {
    // str_replace($argv[3], $argv[4], $argv[2]);
    $replaceString = str_replace($argv[3], $argv[4], $inputString);
    file_put_contents($argv[2], $replaceString);
}