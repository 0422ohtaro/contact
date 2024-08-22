<?php
if (!isset($_SESSION['contact_step']) || $_SESSION['contact_step'] !== 'complete') {
    header('Location: /contact/index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>送信完了 - Casteria</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <div class="confirmation-container">
        <h2>お問い合わせが完了しました</h2>
        <p>お問い合わせいただき、ありがとうございました。<br> ご記入いただいた内容で手続きが完了しました。</p>
        <a href="/" class="btn btn-primary">ホームに戻る</a>
    </div>
</body>
</html>
