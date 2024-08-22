<?php
session_start();
if (!isset($_SESSION['from_edit_confirm']) || !$_SESSION['from_edit_confirm']) {
    header('Location: /contact/index.php');
    exit();
}
unset($_SESSION['from_edit_confirm']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>完了画面</title>
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

        p {
            text-align: center;
        }

        .btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>編集完了</h1>
        <p>お問い合わせいただきありがとうございます。</p>
        <a href="/contact/index" class="btn">お問い合わせに戻る</a>
    </div>
</body>

</html>
