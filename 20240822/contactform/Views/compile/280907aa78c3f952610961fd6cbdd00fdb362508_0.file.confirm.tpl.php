<?php
/* Smarty version 4.5.2, created on 2024-07-20 01:24:28
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_669b11ccea9892_67165796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '280907aa78c3f952610961fd6cbdd00fdb362508' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirm.tpl',
      1 => 1721271419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669b11ccea9892_67165796 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
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
        .confirm-info {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>確認画面</h1>
        <form action="/contact/complete" method="POST">
            <div class="form-group">
                <label for="name">氏名:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form_data']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label for="kana">フリガナ:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form_data']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label for="tel">電話番号:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form_data']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form_data']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label for="body">お問合せ内容:</label>
                <p><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->tpl_vars['form_data']->value['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</p>
            </div>
            <button type="submit" class="btn">送信</button>
            <button type="button" onclick="history.back();" class="btn">戻る</button>
        </form>
    </div>
</body>
</html><?php }
}
