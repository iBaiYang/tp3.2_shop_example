<?php /* Smarty version Smarty-3.1.6, created on 2017-05-29 16:40:31
         compiled from "E:/WWW/itcast/shop/Admin/View\Index\head.html" */ ?>
<?php /*%%SmartyHeaderCode:30628592bd6dd5d45f0-90190024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40415f2ea28ba705007cfebf3165f03d39945954' => 
    array (
      0 => 'E:/WWW/itcast/shop/Admin/View\\Index\\head.html',
      1 => 1496047222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30628592bd6dd5d45f0-90190024',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_592bd6dd65896',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592bd6dd65896')) {function content_592bd6dd65896($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo @ADMIN_CSS_URL;?>
admin.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" background="<?php echo @ADMIN_IMG_URL;?>
header_bg.jpg" border=0>
            <tr height=56>
                <td width=260>
                    <img height=56 src="<?php echo @ADMIN_IMG_URL;?>
header_left.jpg" width=260>
                </td>
                <td style="font-weight: bold; color: #fff; padding-top: 20px" align=middle>
                    当前用户：<?php echo $_SESSION['mg_username'];?>
 &nbsp;&nbsp;
                    <a style="color: #fff" href="<?php echo @__MODULE__;?>
/Manager/upd" target=right>修改口令</a> &nbsp;&nbsp;
                    <a style="color: #fff" onclick="if (confirm('确定要退出吗？')) return true; else return false;"
                       href="<?php echo @__MODULE__;?>
/Manager/logout" target=_top>退出系统</a>
                </td>
                <td align=right width=268>
                    <img src="<?php echo @ADMIN_IMG_URL;?>
header_right.jpg">
                </td>
            </tr>
        </table>
        <table cellspacing=0 cellpadding=0 width="100%" border=0>
            <tr bgcolor=#1c5db6 height=4>
                <td></td>
            </tr>
        </table>
    </body>
</html><?php }} ?>