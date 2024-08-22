<?php
session_start();
if (!isset($_SESSION['from_index']) || !$_SESSION['from_index']) {
    header('Location: /contact/index.php');
    exit();
}
$_SESSION['from_edit'] = true;
unset($_SESSION['from_index']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Edit</title>
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
        <h1>お問合せ編集</h1>
        <form action="/contact/confirmEdit" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?= htmlspecialchars($inquiry['id'], ENT_QUOTES, 'UTF-8') ?>">
            <div class="form-group">
                <label for="name">氏名:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($inquiry['name'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="error-message" id="nameError"><?= htmlspecialchars($errors['name'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <div class="form-group">
                <label for="kana">かな:</label>
                <input type="text" id="kana" name="kana" value="<?= htmlspecialchars($inquiry['kana'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="error-message" id="kanaError"><?= htmlspecialchars($errors['kana'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <div class="form-group">
                <label for="tel">電話番号:</label>
                <input type="tel" id="tel" name="tel" value="<?= htmlspecialchars($inquiry['tel'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="error-message" id="telError"><?= htmlspecialchars($errors['tel'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($inquiry['email'], ENT_QUOTES, 'UTF-8') ?>">
                <span class="error-message" id="emailError"><?= htmlspecialchars($errors['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <div class="form-group">
                <label for="body">お問合せ内容:</label>
                <textarea id="body" name="body" rows="5"><?= htmlspecialchars($inquiry['body'], ENT_QUOTES, 'UTF-8') ?></textarea>
                <span class="error-message" id="bodyError"><?= htmlspecialchars($errors['body'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <button type="submit" class="btn">確認</button>
        </form>
    </div>

    <script>
        function validateForm() {
            let name = document.getElementById('name').value.trim();
            let kana = document.getElementById('kana').value.trim();
            let tel = document.getElementById('tel').value.trim();
            let email = document.getElementById('email').value.trim();
            let body = document.getElementById('body').value.trim();

            let nameError = document.getElementById('nameError');
            let kanaError = document.getElementById('kanaError');
            let telError = document.getElementById('telError');
            let emailError = document.getElementById('emailError');
            let bodyError = document.getElementById('bodyError');

            nameError.textContent = '';
            kanaError.textContent = '';
            telError.textContent = '';
            emailError.textContent = '';
            bodyError.textContent = '';

            let valid = true;

            if (name === '') {
                nameError.textContent = '氏名を入力してください';
                valid = false;
            } else if (name.length > 10) {
                nameError.textContent = '氏名は10文字以内で入力してください';
                valid = false;
            }

            if (kana === '') {
                kanaError.textContent = 'フリガナを入力してください';
                valid = false;
            } else if (kana.length > 10) {
                kanaError.textContent = 'フリガナは10文字以内で入力してください';
                valid = false;
            }

            if (tel === '' || !/^\d{1,11}$/.test(tel)) {
                telError.textContent = '電話番号は数字のみで11文字以内で入力してください';
                valid = false;
            }

            if (email === '') {
                emailError.textContent = 'メールアドレスを入力してください';
                valid = false;
            } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                emailError.textContent = 'メールアドレスには「@」を含む形式で入力してください';
                valid = false;
            }

            if (body === '') {
                bodyError.textContent = 'お問合せ内容を入力してください';
                valid = false;
            }

            return valid;
        }
    </script>
</body>

</html>
