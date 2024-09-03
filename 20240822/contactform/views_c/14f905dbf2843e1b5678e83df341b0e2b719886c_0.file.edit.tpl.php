<?php
/* Smarty version 4.5.2, created on 2024-09-03 09:47:16
  from '/Users/ohtaro/contact/20240822/contactform/Views/contact/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66d6db24be1558_13082552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14f905dbf2843e1b5678e83df341b0e2b719886c' => 
    array (
      0 => '/Users/ohtaro/contact/20240822/contactform/Views/contact/edit.tpl',
      1 => 1724406577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d6db24be1558_13082552 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

if (!isset($_SESSION['contact_step']) || $_SESSION['contact_step'] !== 'edit') {
    header('Location: /contact/index');
    exit();
}
<?php echo '?>'; ?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ編集 - Casteria</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/validation.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="container">
        <h2>お問い合わせ編集</h2>
        <form id="editForm" action="/contact/update" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group">
                <label>氏名:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['name']))) {?><p class="error-message"><?php echo $_smarty_tpl->tpl_vars['errors']->value['name'];?>
</p><?php }?>
            </div>
            <div class="form-group">
                <label>フリガナ:</label>
                <input type="text" name="kana" id="kana" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
">
                <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['kana']))) {?><p class="error-message"><?php echo $_smarty_tpl->tpl_vars['errors']->value['kana'];?>
</p><?php }?>
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <input type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
">
                <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['tel']))) {?><p class="error-message"><?php echo $_smarty_tpl->tpl_vars['errors']->value['tel'];?>
</p><?php }?>
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">
                <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['email']))) {?><p class="error-message"><?php echo $_smarty_tpl->tpl_vars['errors']->value['email'];?>
</p><?php }?>
            </div>
            <div class="form-group">
                <label>お問い合わせ内容:</label>
                <textarea name="body" id="body"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['body'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['body']))) {?><p class="error-message"><?php echo $_smarty_tpl->tpl_vars['errors']->value['body'];?>
</p><?php }?>
            </div>
            <div class="button-group">
                <button type="submit" class="btn">更新する</button>
                <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php }
}
