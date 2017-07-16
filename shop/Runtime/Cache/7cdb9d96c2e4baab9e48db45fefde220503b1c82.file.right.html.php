<?php /* Smarty version Smarty-3.1.6, created on 2017-05-29 16:49:59
         compiled from "E:/WWW/itcast/shop/Admin/View\Index\right.html" */ ?>
<?php /*%%SmartyHeaderCode:3927592bd3d7690c04-01326287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cdb9d96c2e4baab9e48db45fefde220503b1c82' => 
    array (
      0 => 'E:/WWW/itcast/shop/Admin/View\\Index\\right.html',
      1 => 1496047793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3927592bd3d7690c04-01326287',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_592bd3d784303',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592bd3d784303')) {function content_592bd3d784303($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo @ADMIN_CSS_URL;?>
admin.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" align=center border=0>
            <tr height=28>
                <td background=<?php echo @ADMIN_IMG_URL;?>
title_bg1.jpg>当前位置: </td>
            </tr>
            <tr>
                <td bgcolor=#b1ceef height=1></td>
            </tr>
            <tr height=20>
                <td background=<?php echo @ADMIN_IMG_URL;?>
shadow_bg.jpg></td>
            </tr>
        </table>
        <table cellspacing=0 cellpadding=0 width="90%" align=center border=0>
            <tr height=100>
                <td align=middle width=100>
                    <img height=100 src="<?php echo @ADMIN_IMG_URL;?>
admin_p.gif" width=90>
                </td>
                <td width=60>&nbsp;</td>
                <td>
                    <table height=100 cellspacing=0 cellpadding=0 width="100%" border=0>
                        <tr>
                            <td>当前时间：2008-12-27 17:03:55</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; font-size: 16px"><?php echo $_SESSION['mg_username'];?>
</td>
                        </tr>
                        <tr>
                            <td>欢迎进入网站管理中心！</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan=3 height=10></td>
            </tr>
        </table>
        <table cellspacing=0 cellpadding=0 width="95%" align=center border=0>
            <tr height=20>
                <td></td>
            </tr>
            <tr height=22>
                <td style="padding-left: 20px; font-weight: bold; color: #ffffff" align=middle background=<?php echo @ADMIN_IMG_URL;?>
title_bg2.jpg>您的相关信息</td>
            </tr>
            <tr bgcolor=#ecf4fc height=12>
                <td></td>
            </tr>
            <tr height=20>
                <td></td>
            </tr>
        </table>
        <table cellspacing=0 cellpadding=2 width="95%" align=center border=0>
            <tr>
                <td align=right width=100>登陆帐号：</td>
                <td style="color: #880000">admin</td>
            </tr>
            <tr>
                <td align=right>真实姓名：</td>
                <td style="color: #880000">admin</td>
            </tr>
            <tr>
                <td align=right>注册时间：</td>
                <td style="color: #880000">2007-7-25 15:02:04</td>
            </tr>
            <tr>
                <td align=right>登陆次数：</td>
                <td style="color: #880000">58</td>
            </tr>
            <tr>
                <td align=right>上线时间：</td>
                <td style="color: #880000">2008-12-27 17:02:54</td>
            </tr>
            <tr>
                <td align=right>ip地址：</td>
                <td style="color: #880000">221.120.156.177</td>
            </tr>
            <tr>
                <td align=right>身份过期：</td>
                <td style="color: #880000">30 分钟</td>
            </tr>
        </table>
    </body>
</html><?php }} ?>