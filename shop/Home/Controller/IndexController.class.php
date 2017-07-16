<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller
{
    public function index ()
    {
        echo U("Admin/Index/index");
        echo "<br />";
        echo "study thinkphp";
    }

    public function hello(){
        echo "nihao";
    }
}