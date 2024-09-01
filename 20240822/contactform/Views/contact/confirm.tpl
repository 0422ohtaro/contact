<?php
if (!isset($_SESSION['contact_step']) || $_SESSION['contact_step'] !== 'confirm') {
    header('Location: /contact/index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ確認 - Casteria</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>お問い合わせ確認</h2>
        <form id="confirmForm" action="/contact/complete" method="post">
            <input type="hidden" name="id" value="{$contact.id|escape:'html'}">
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape:'html'}">
            <div class="form-group">
                <label>氏名:</label>
                <p>{$contact.name|escape:'html'}</p>
            </div>
            <div class="form-group">
                <label>フリガナ:</label>
                <p>{$contact.kana|escape:'html'}</p>
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <p>{$contact.tel|escape:'html'}</p>
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <p>{$contact.email|escape:'html'}</p>
            </div>
            <div class="form-group">
                <label>お問い合わせ内容:</label>
                <p>{$contact.body|escape:'htmlall'|nl2br}</p>
            </div>
            <div class="button-group">
                <button type="submit" class="btn">送信する</button>
                <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
</body>
</html>
