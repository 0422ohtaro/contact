<?php
if (!isset($_SESSION['contact_step']) || $_SESSION['contact_step'] !== 'edit') {
    header('Location: /contact/index');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ編集 - Casteria</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/validation.js"></script>
</head>
<body>
    <div class="container">
        <h2>お問い合わせ編集</h2>
        <form id="editForm" action="/contact/update" method="post">
            <input type="hidden" name="id" value="{$contact.id|escape:'html'}">
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape:'html'}">
            <div class="form-group">
                <label>氏名:</label>
                <input type="text" name="name" id="name" value="{$contact.name|escape:'html'}">
                {if isset($errors.name)}<p class="error-message">{$errors.name}</p>{/if}
            </div>
            <div class="form-group">
                <label>フリガナ:</label>
                <input type="text" name="kana" id="kana" value="{$contact.kana|escape:'html'}">
                {if isset($errors.kana)}<p class="error-message">{$errors.kana}</p>{/if}
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <input type="tel" name="tel" id="tel" value="{$contact.tel|escape:'html'}">
                {if isset($errors.tel)}<p class="error-message">{$errors.tel}</p>{/if}
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <input type="email" name="email" id="email" value="{$contact.email|escape:'html'}">
                {if isset($errors.email)}<p class="error-message">{$errors.email}</p>{/if}
            </div>
            <div class="form-group">
                <label>お問い合わせ内容:</label>
                <textarea name="body" id="body">{$contact.body|escape:'html'}</textarea>
                {if isset($errors.body)}<p class="error-message">{$errors.body}</p>{/if}
            </div>
            <div class="button-group">
                <button type="submit" class="btn">更新する</button>
                <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
</body>
</html>
