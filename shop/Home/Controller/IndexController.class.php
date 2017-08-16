<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        echo "study thinkphp";
        echo "<br />";
        echo "后端：".U("Admin/Index/index");
        echo "<br/>";
        echo "前端商品列表页：".U("Goods/showlist");
        echo "<br />";
        echo "用户注册：".U("User/register");
        echo "<br />";
        echo "study thinkphp";
    }

    public function hello()
    {
        echo "nihao";
    }
}