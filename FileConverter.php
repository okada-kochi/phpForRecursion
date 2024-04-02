<?php

// Composerのオートローダーを読み込む
require 'vendor/autoload.php';

// ファイルの内容を変数に入れるための処理
$markdownFilePath = $argv[2];
// $markdownFilePath = 'test.md';
$markdownFile = fopen($markdownFilePath, "r");
$markdownContent = fread($markdownFile, filesize($markdownFilePath));

fclose($markdownFile);

if($argv[1] === "markdown") {

// Parsedownクラスのインスタンスを作成
$parsedown = new Parsedown();

// マークダウンをHTMLに変換
$htmlContent = $parsedown->text($markdownContent);

file_put_contents($argv[3], $htmlContent);
// echo $htmlContent;
}
// エラー処理
else if($argv[1] !== "markdown" || $argc !== 4) {
    echo "正しくコマンドを入力してください";
}

// echo $argc;