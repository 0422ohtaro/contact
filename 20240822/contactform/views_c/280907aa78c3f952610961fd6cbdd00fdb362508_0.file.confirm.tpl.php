<?php
/* Smarty version 4.5.2, created on 2024-08-07 22:42:03
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66b3f83b75c197_37108337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '280907aa78c3f952610961fd6cbdd00fdb362508' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirm.tpl',
      1 => 1723070472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66b3f83b75c197_37108337 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

if (!isset($_SESSION['contact_step']) || $_SESSION['contact_step'] !== 'confirm') {
    header('Location: /contact/index');
    exit();
}
<?php echo '?>'; ?>


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
            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group">
                <label>氏名:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label>フリガナ:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="form-group">
                <label>お問い合わせ内容:</label>
                <p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['body'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
            <div class="button-group">
                <button type="submit" class="btn">送信する</button>
                <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php }
}
