<?php

namespace Admin\Controller;
use Component\AdminController;

//角色控制器
class RoleController extends AdminController{
    //显示角色列表
    function showlist(){
        $info = D()->table('sw_role')->select();
        //$info = D('sw_role')->select();
        $this -> assign('info',$info);
        $this -> display();
    }
    
    //进行权限分配
    function distribute($role_id){
        if(!empty($_POST)){
            //利用RoleModel模型里边的一个专门方法实现权限分配
            $role = new \Model\RoleModel();
            //saveAuth接收到一维数组信息
            $z = $role -> saveAuth($_POST['authname'], $role_id);
            if($z){
                $this -> success('分配权限成功！',U('showlist'));
            } else {
                $this -> error('分配权限失败！',U('showlist'));
            }
        } else {
            //根据$role_id查询对应的角色名字
            $rinfo = D("Role")->getByRole_id($role_id);
            $this -> assign('role_name', $rinfo['role_name']);

            //查询全部的权限信息，放入模板显示并进行权限分配
            $pauth_info = D('Auth')->where('auth_level=0')->select(); //父级权限
            $sauth_info = D('Auth')->where('auth_level=1')->select(); //次父级权限
            $tauth_info = D('Auth')->where('auth_level=2')->select(); //次次父级权限

            //把当前角色对应的权限信息给查询出来
            $authinfo = D("Role")->getByRole_id($role_id);
            $auth_ids_arr = explode(',',$authinfo['role_auth_ids']); //数组auth_id 信息
            
            
            $this -> assign('auth_ids_arr', $auth_ids_arr);
            $this -> assign('pauth_info',$pauth_info);
            $this -> assign('sauth_info',$sauth_info);
            $this -> assign('tauth_info',$tauth_info);

            $this -> display();
        }
    }
}
