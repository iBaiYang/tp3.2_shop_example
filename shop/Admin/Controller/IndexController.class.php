<?php
//后台首页控制器
//商品控制器
namespace Admin\Controller;

use Component\AdminController;

/**
 * 后台管理首页控制器
 * Class IndexController
 * @package Admin\Controller
 */
class IndexController extends AdminController
{
    /**
     * 首页frameset html框架集成方法
     */
    public function index ()
    {
        if ( !empty(C('TMPL_ENGINE_TYPE')) ) {
            $this->display( C('TMPL_ENGINE_TYPE')."_index" );
        } else {
            $this->display();
        }
    }

    /**
     * 展现后台头部页面
     */
    public function head ()
    {
        //获得当前系统都给我们提供了什么常量可供使用（系统和自定义的）
        //get_defined_constants([true])
        //true参数会把常量进行自动分组显示
//        var_dump(get_defined_constants(true));

        if ( !empty(C('TMPL_ENGINE_TYPE')) ) {
            $this->display( C('TMPL_ENGINE_TYPE')."_head" );
        } else {
            $this->display();
        }
    }

    /**
     * 左边页面
     */
    public function left ()
    {
        // 根据session用户id信息查询角色id信息
        $sql = "select * from sw_manager where mg_id=".$_SESSION['mg_id'];
        $minfo = D()->query($sql);
        $role_id = $minfo[0]['mg_role_id'];
        // 根据角色信息获得权限ids的信息
        $sql = "select * from sw_role where role_id=".$role_id;
        $rinfo = D()->query($sql);
        $auth_ids = $rinfo[0]['role_auth_ids'];
        // 根据$auth_ids查询全部拥有的权限信息
        // ① 获得顶级权限
        $sql = "select * from sw_auth where auth_level = 0 ";
        // 如果是admin管理员要现实全部权限
        if ( $_SESSION['mg_id'] != 1 ) {
            $sql .= " and auth_id in ($auth_ids)";
        }
        $p_info = D()->query($sql);
        // ② 获得次顶级权限
        $sql = "select * from sw_auth where auth_level = 1";
        // 如果是admin管理员要现实全部权限
        if ( $_SESSION['mg_id'] != 1 ) {
            $sql .= " and auth_id in ($auth_ids)";
        }
        $s_info = D()->query($sql);
        
        $this -> assign('pauth_info',$p_info);
        $this -> assign('sauth_info',$s_info);

        if ( !empty(C('TMPL_ENGINE_TYPE')) ) {
            $this->display( C('TMPL_ENGINE_TYPE')."_left" );
        } else {
            $this->display();
        }
    }

    /**
     * 右边页面
     */
    public function right ()
    {
        if ( !empty(C('TMPL_ENGINE_TYPE')) ) {
            $this->display( C('TMPL_ENGINE_TYPE')."_right" );
        } else {
            $this->display();
        }
    }
    
}
