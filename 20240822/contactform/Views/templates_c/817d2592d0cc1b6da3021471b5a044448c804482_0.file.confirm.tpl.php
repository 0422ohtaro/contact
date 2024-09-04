<?php
/* Smarty version 4.5.2, created on 2024-07-24 00:55:38
  from '/Applications/MAMP/htdocs/mvc_app/views/templates/contact/confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66a0510a3a2505_61346976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '817d2592d0cc1b6da3021471b5a044448c804482' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/views/templates/contact/confirm.tpl',
      1 => 1721780870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66a0510a3a2505_61346976 (Smarty_Internal_Template $_smarty_tpl) {
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
        <h1>お問い合わせ確認</h1>
        <form action="/contact/complete" method="post">
            <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form_data']->value['name'];?>
">
            <input type="hidden" name="kana" value="<?php echo $_smarty_tpl->tpl_vars['form_data']->value['kana'];?>
">
            <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['form_data']->value['tel'];?>
">
            <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form_data']->value['email'];?>
">
            <input type="hidden" name="body" value="<?php echo $_smarty_tpl->tpl_vars['form_data']->value['body'];?>
">
            <p>氏名: <?php echo $_smarty_tpl->tpl_vars['form_data']->value['name'];?>
</p>
            <p>フリガナ: <?php echo $_smarty_tpl->tpl_vars['form_data']->value['kana'];?>
</p>
            <p>電話番号: <?php echo $_smarty_tpl->tpl_vars['form_data']->value['tel'];?>
</p>
            <p>メールアドレス: <?php echo $_smarty_tpl->tpl_vars['form_data']->value['email'];?>
</p>
            <p>お問い合わせ内容: <?php echo $_smarty_tpl->tpl_vars['form_data']->value['body'];?>
</p>
            <button type="submit" class="btn">送信</button>
            <button type="button" onclick="history.back();" class="btn">戻る</button>
    </form>
    </div>
</body>
</html><?php }
}
