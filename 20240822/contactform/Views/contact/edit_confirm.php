<?php
session_start();
if (!isset($_SESSION['from_edit']) || !$_SESSION['from_edit']) {
    header('Location: /contact/index.php');
    exit();
}
$_SESSION['from_edit_confirm'] = true;
unset($_SESSION['from_edit']);
?>

<?php

if (!isset($inquiry)) {
    $inquiry = [];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Confirm Edit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-top: 5px;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            justify-content: space-around;
        }

        .edit-btn, .delete-btn {
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-btn {
            background-color: #FF5733;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn:hover {
            background-color: #c12e12;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>編集内容確認</h1>
        <form action="/contact/completeEdit" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?= htmlspecialchars($inquiry['id'], ENT_QUOTES, 'UTF-8') ?>">
            <div class="form-group">
                <label>氏名:</label>
                <p><?= htmlspecialchars($inquiry['name'], ENT_QUOTES, 'UTF-8') ?></p>
                <input type="hidden" name="name" value="<?= htmlspecialchars($inquiry['name'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label>かな:</label>
                <p><?= htmlspecialchars($inquiry['kana'], ENT_QUOTES, 'UTF-8') ?></p>
                <input type="hidden" name="kana" value="<?= htmlspecialchars($inquiry['kana'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <p><?= htmlspecialchars($inquiry['tel'], ENT_QUOTES, 'UTF-8') ?></p>
                <input type="hidden" name="tel" value="<?= htmlspecialchars($inquiry['tel'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <p><?= htmlspecialchars($inquiry['email'], ENT_QUOTES, 'UTF-8') ?></p>
                <input type="hidden" name="email" value="<?= htmlspecialchars($inquiry['email'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <div class="form-group">
                <label>お問合せ内容:</label>
                <p><?= htmlspecialchars($inquiry['body'], ENT_QUOTES, 'UTF-8') ?></p>
                <input type="hidden" name="body" value="<?= htmlspecialchars($inquiry['body'], ENT_QUOTES, 'UTF-8') ?>">
            </div>
            <button type="submit" class="btn">送信</button>
            <button type="button" class="btn" onclick="window.history.back();">戻る</button>
        </form>
    </div>
</body>

</html>
