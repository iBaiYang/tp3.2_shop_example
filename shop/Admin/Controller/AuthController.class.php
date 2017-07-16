<?php

namespace Admin\Controller;
use Component\AdminController;

class AuthController extends AdminController{
    function showlist(){
        $info = $this -> getInfo();
        $this -> assign('info', $info);
        $this -> display();
    }
    function add(){
        if(!empty($_POST)){
            //在AuthModel里边通过一个指定方法实现权限添加
            $auth = new \Model\AuthModel();
            $z = $auth->addAuth($_POST);
            if($z){
                $this -> success('添加权限成功！',U('showlist'));
            }else {
                $this -> error('添加权限失败！',U('showlist'));
            }
        }else{
            //获得父级权限信息
            $info = $this -> getInfo(true);
            //show_bug($info); 
            //从$info里边获得信息。例如：array(1=>'商品管理',2=>'添加商品',3=>'订单打印')
            //以便在smarty模板中使用{html_options}
            $authinfo = array();
            foreach($info as $v){
                $authinfo[$v['auth_id']] = $v['auth_name'];
            }

            $this -> assign('authinfo', $authinfo);
            $this -> display();
        }
    }
    
    function getInfo($flag=false){
        //如果$flag标志为false，查询全部的权限信息
        //如果$flag标志为true,只查询level=0/1的权限信息
        $auth = D('Auth');
        if($flag == true){
        $info = D('Auth')->where('auth_level<2')->order('auth_path asc')->select();
        }else {
        $info = D('Auth')->order('auth_path asc')->select();
        }
        //$info[X][auth_name] = "->"auth_name
        foreach($info as $k => $v){
            $info[$k]['auth_name'] = str_repeat('-->',$v['auth_level']).$info[$k]['auth_name'];
        }
        return $info;
    }
}
