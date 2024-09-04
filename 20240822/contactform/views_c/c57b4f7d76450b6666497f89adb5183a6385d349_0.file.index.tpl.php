<?php
/* Smarty version 4.5.2, created on 2024-08-07 09:15:30
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66b33b327143c3_78642176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1723022025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66b33b327143c3_78642176 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/mvc_app/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ - Casteria</title>
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
        <h2>お問い合わせ</h2>
        <form id="contactForm" action="/contact/confirm" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['csrf_token']->value, ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="form-group">
                <label>氏名:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['name']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <div id="error-name" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>フリガナ:</label>
                <input type="text" name="kana" id="kana" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['kana']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <div id="error-kana" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>電話番号:</label>
                <input type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['tel']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <div id="error-tel" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>メールアドレス:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                <div id="error-email" class="error-message"></div>
            </div>
            <div class="form-group">
                <label>お問い合わせ内容:</label>
                <textarea name="body" id="body"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['body']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                <div id="error-body" class="error-message"></div>
            </div>
            <button type="submit" class="btn">送信する</button>
        </form>

        <h2>お問い合わせ参照</h2>
        <?php if ((isset($_smarty_tpl->tpl_vars['contacts']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['contacts']->value) > 0) {?>
        <table class="inquiry-table">
            <thead>
                <tr>
                    <th>氏名</th>
                    <th>フリガナ</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)nl2br((string) $_smarty_tpl->tpl_vars['contact']->value['body'], (bool) 1), ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td>
                        <a href="/contact/edit?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="btn btn-edit">編集</a>
                        <a href="/contact/delete?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="btn delete-btn" onclick="return confirm('削除しますか?')">削除</a>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        <?php } else { ?>
        <p>お問い合わせがありません。</p>
        <?php }?>
    </div>
</body>
</html>
<?php }
}
