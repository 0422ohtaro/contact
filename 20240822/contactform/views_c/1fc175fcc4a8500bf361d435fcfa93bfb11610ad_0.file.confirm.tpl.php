<?php
/* Smarty version 4.5.2, created on 2024-09-03 09:46:55
  from '/Users/ohtaro/contact/20240822/contactform/Views/contact/confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66d6db0feb1f12_11183010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fc175fcc4a8500bf361d435fcfa93bfb11610ad' => 
    array (
      0 => '/Users/ohtaro/contact/20240822/contactform/Views/contact/confirm.tpl',
      1 => 1725356810,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d6db0feb1f12_11183010 (Smarty_Internal_Template $_smarty_tpl) {
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
                <p><?php echo nl2br((string) htmlentities(mb_convert_encoding((string)$_smarty_tpl->tpl_vars['contact']->value['body'], 'UTF-8', 'UTF-8'), ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
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
