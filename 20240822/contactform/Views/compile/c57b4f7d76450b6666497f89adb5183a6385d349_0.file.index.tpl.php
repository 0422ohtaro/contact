<?php
/* Smarty version 4.5.2, created on 2024-07-20 01:13:26
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_669b0f360be6f1_59549629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1721270977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669b0f360be6f1_59549629 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
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
        <h1>お問合せ</h1>
        <form action="/contact/create" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">氏名:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['form_data']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <span class="error-message" id="nameError"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['errors']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
            </div>
            <div class="form-group">
                <label for="kana">かな:</label>
                <input type="text" id="kana" name="kana" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['form_data']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <span class="error-message" id="kanaError"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['errors']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
            </div>
            <div class="form-group">
                <label for="tel">電話番号:</label>
                <input type="tel" id="tel" name="tel" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['form_data']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <span class="error-message" id="telError"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['errors']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['form_data']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <span class="error-message" id="emailError"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['errors']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
            </div>
            <div class="form-group">
                <label for="body">お問合せ内容:</label>
                <textarea id="body" name="body" rows="5"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['form_data']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                <span class="error-message" id="bodyError"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['errors']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</span>
            </div>
            <button type="submit" class="btn">送信</button>
        </form>
        
        <h2>お問合せ一覧</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>かな</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>お問合せ内容</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inquiries']->value, 'inquiry');
$_smarty_tpl->tpl_vars['inquiry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inquiry']->value) {
$_smarty_tpl->tpl_vars['inquiry']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</td>
                    <td class="actions">
                    <a href="/contact/edit?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="edit-btn">編集</a>
                    <a href="/contact/delete?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['inquiry']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="delete-btn" onclick="return confirm('本当に削除しますか?')">削除</a>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
    
    <?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

</body>

</html><?php }
}
