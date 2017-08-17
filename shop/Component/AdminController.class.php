<?php
namespace Component;

use Think\Controller;

/**
 * Admin模块组件
 * Class AdminController
 * @package Component
 */
class AdminController extends Controller
{
    /**
     * 类初始化构造方法
     * AdminController constructor.
     */
    public function __construct ()
    {
        //先执行父类的构造方法，否则系统要报错
        //因为原先的构造方法默认是被执行的
        parent::__construct();

        // 判断是否登录
        if ( empty(session('mg_id')) ) {
            $this->error('请先登录', U("Manager/login"));
        }
        
        
        //CONTROLLER_NAME ---Goods
        //ACTION_NAME  ----showlist
        //当前请求操作
        $now_ac = CONTROLLER_NAME."-".ACTION_NAME;
        
        //过滤控制器和方法，避免用户非法请求
        //通过角色获得用户可以访问的控制器和方法信息
        $sql = "select role_auth_ac from sw_manager a join sw_role b on a.mg_role_id=b.role_id where a.mg_id=".$_SESSION['mg_id'];
        $auth_ac = D()->query($sql);
        $auth_ac = $auth_ac[0]['role_auth_ac'];
        
        //判断$now_ac是否在$auth_ac字符串里边有出现过
        //strpos函数如果返回false是没有出现，返回0 1 2 3表示有出现
        //管理员不限制
        //默认以下权限没有限制
        //Index/left  Index/right  Index/head  Index/index  Manager/login
        $allow_ac = array('Index-left','Index-right','Index-head','Index-index','Manager-login');
        if ( !in_array($now_ac, $allow_ac) && $_SESSION['mg_id'] !=1 && strpos($auth_ac, $now_ac) === false ) {
            $this->error('没有权限访问', U("Index/right"));
        }
    }
}
