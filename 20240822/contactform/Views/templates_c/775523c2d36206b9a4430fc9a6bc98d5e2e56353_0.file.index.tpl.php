<?php
/* Smarty version 4.5.2, created on 2024-07-24 13:05:01
  from '/Applications/MAMP/htdocs/mvc_app/views/templates/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_66a0fbfd6af842_25659127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '775523c2d36206b9a4430fc9a6bc98d5e2e56353' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/views/templates/contact/index.tpl',
      1 => 1721826256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66a0fbfd6af842_25659127 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="/css/styles.css"> <!-- 外部CSSファイルに分離 -->
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
                    <td><?php echo htmlspecialchars((string)nl2br((string) $_smarty_tpl->tpl_vars['inquiry']->value['body'], (bool) 1), ENT_QUOTES, 'UTF-8', true);?>
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
 src="/js/validateForm.js"><?php echo '</script'; ?>
> <!-- 外部JSファイルに分離 -->
</body>

</html>
<?php }
}
