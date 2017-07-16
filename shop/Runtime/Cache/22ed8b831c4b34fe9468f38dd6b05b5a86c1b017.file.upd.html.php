<?php /* Smarty version Smarty-3.1.6, created on 2014-01-22 17:06:47
         compiled from "D:/web/1116/shop/Admin/View\Manager\upd.html" */ ?>
<?php /*%%SmartyHeaderCode:3174852df87dd22ff55-95630139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22ed8b831c4b34fe9468f38dd6b05b5a86c1b017' => 
    array (
      0 => 'D:/web/1116/shop/Admin/View\\Manager\\upd.html',
      1 => 1390381600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3174852df87dd22ff55-95630139',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_52df87dd37cd9',
  'variables' => 
  array (
    'mg_id' => 0,
    'info' => 0,
    'rinfo' => 0,
    'role_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52df87dd37cd9')) {function content_52df87dd37cd9($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\web\\1116\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\function.html_options.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改管理员信息</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：管理员管理-》修改管理员信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo @__MODULE__;?>
/Goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo @__SELF__;?>
" method="post" enctype="multipart/form-data">
            <input type='hidden' name='mg_id' value='<?php echo $_smarty_tpl->tpl_vars['mg_id']->value;?>
' />
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>管理员名称</td>
                    <td><input type="text" name="mg_name" value='<?php echo $_smarty_tpl->tpl_vars['info']->value['mg_name'];?>
'/></td>
                </tr>
                <tr>
                    <td>角色</td>
                    <td>
                        <select name='mg_role_id'>
                            <option value='0'>请选择</option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['rinfo']->value,'selected'=>$_smarty_tpl->tpl_vars['role_id']->value),$_smarty_tpl);?>

                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>
<?php }} ?>