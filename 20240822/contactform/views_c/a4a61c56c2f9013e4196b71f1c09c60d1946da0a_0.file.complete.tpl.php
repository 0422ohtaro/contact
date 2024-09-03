<?php
/* Smarty version 4.5.2, created on 2024-09-03 05:52:04
  from '/Users/ohtaro/contact/20240822/contactform/Views/contact/complete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66d6a4049be7a7_69862669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4a61c56c2f9013e4196b71f1c09c60d1946da0a' => 
    array (
      0 => '/Users/ohtaro/contact/20240822/contactform/Views/contact/complete.tpl',
      1 => 1724406577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d6a4049be7a7_69862669 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

if (!isset($_SESSION['contact_step']) || $_SESSION['contact_step'] !== 'complete') {
    header('Location: /contact/index');
    exit();
}
<?php echo '?>'; ?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>送信完了 - Casteria</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <div class="confirmation-container">
        <h2>お問い合わせが完了しました</h2>
        <p>お問い合わせいただき、ありがとうございました。<br> ご記入いただいた内容で手続きが完了しました。</p>
        <a href="/" class="btn btn-primary">ホームに戻る</a>
    </div>
</body>
</html>
<?php }
}
