<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ - Casteria</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/validation.js"></script>
</head>
<body>
    <div class="container">
        <h2>お問い合わせ</h2>
        <form id="contactForm" action="/contact/confirm" method="post">
            <input type="hidden" name="csrf_token" value="{$csrf_token|escape:'html'}">
            <div class="form-group">
                <label>氏名:</label>
                <input type="text" name="name" id="name" value="{$name|default:''|escape:'html'}">
                <div id="error-name" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>フリガナ:</label>
                <input type="text" name="kana" id="kana" value="{$kana|default:''|escape:'html'}">
                <div id="error-kana" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <input type="tel" name="tel" id="tel" value="{$tel|default:''|escape:'html'}">
                <div id="error-tel" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <input type="email" name="email" id="email" value="{$email|default:''|escape:'html'}">
                <div id="error-email" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>お問い合わせ内容:</label>
                <textarea name="body" id="body">{$body|default:''|escape:'html'}</textarea>
                <div id="error-body" class="error-message"></div>
            </div>
            <button type="submit" class="btn">送信する</button>
        </form>

        <h2>お問い合わせ参照</h2>
        {if isset($contacts) && $contacts|@count > 0}
        <table class="inquiry-table">
            <thead>
                <tr>
                    <th>氏名</th>
                    <th>フリガナ</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$contacts item=contact}
                <tr>
                    <td>{$contact.name|escape:'html'}</td>
                    <td>{$contact.kana|escape:'html'}</td>
                    <td>{$contact.tel|escape:'html'}</td>
                    <td>{$contact.email|escape:'html'}</td>
                    <td>{$contact.body|escape:'htmlall'|nl2br}</td>
                    <td>
                        <a href="/contact/edit?id={$contact.id|escape:'html'}" class="btn btn-edit">編集</a>
                        <a href="/contact/delete?id={$contact.id|escape:'html'}" class="btn delete-btn" onclick="return confirm('削除しますか?')">削除</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <p>お問い合わせがありません。</p>
        {/if}
    </div>
</body>
</html>
