<?php
// 定数の定義
define('ROOT_PATH', str_replace('public', '', $_SERVER['DOCUMENT_ROOT']));

// 必要なファイルの読み込み
require_once(ROOT_PATH . 'libs/Smarty.class.php');
require_once(ROOT_PATH . 'libs/route.php');

// セッションの開始
session_start();

// リクエストURIが空の場合の処理
if (empty($_SERVER['REQUEST_URI'])) {
    exit();
}

// URIの解析
$parse = parse_url($_SERVER['REQUEST_URI']);
$method = strtolower($_SERVER['REQUEST_METHOD']);

// URLのパスを取得
if (mb_substr($parse['path'], -1) === '/') {
    // URLが単なる '/' の場合は、ホームページを表示するように設定
    $path = 'home/index';
} else {
    $path = mb_substr($parse['path'], 1);
}

// ルーティング処理
route($path, $method);
