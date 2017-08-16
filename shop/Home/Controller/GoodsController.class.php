<?php
namespace Home\Controller;

use Think\Controller;

/**
 * Class GoodsController
 * @package Home\Controller
 * 商品控制器
 */
class GoodsController extends Controller
{
    /**
     * 商品列表
     */
    function showlist()
    {
        // 获得User控制器的number方法返回的信息
        // 当前UserController会通过自动加载机制引入
        // ThinkPHP/Library/Think/Think.class.php
        // function autoload();
        $user = new UserController();
        
        // 还可以通过快捷函数A实例化控制器对象
        // new一个控制器对象给我们返回
        // A([项目://][模块/]控制器标志);
//        $user = A("User");   // 不推荐使用A方法，使用后IDE不能追溯，不便于全局快速开发
//        echo $user->number();

        // 跨模块调用控制器
//        $goods = A("Admin/Goods");
//        echo $goods->getMoney();
        
        // 跨项目、跨模块调用指定控制器
        // $index = A("book://Home/Index");
        // echo $index->getName();
        
        // 简便操作
        // R("[项目://][模块/]控制器/操作方法")
        // 实例化对象之后再调用其对应的方法
//        echo R("User/number");
//        echo R("Admin/Goods/getMoney");
        // echo R("book://Home/Index/getName");

        if ( !empty(C('TMPL_ENGINE_TYPE')) ) {
            $this->display( C('TMPL_ENGINE_TYPE')."_showlist" );
        } else {
            $this->display();
        }
    }

    /**
     * 商品详细信息
     */
    function detail()
    {
        $this->display();
    }
}

