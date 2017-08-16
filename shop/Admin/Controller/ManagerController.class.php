<?php

//后台管理员控制器
//命名空间
namespace Admin\Controller;
use Think\Controller;

class ManagerController extends Controller
{
    /**
     * 登录操作
     */
    public function login ()
    {
        if ( empty($_POST) ) {
            # 登录页面
            $this->assign('lang',L());

            if ( !empty(C('TMPL_ENGINE_TYPE')) ) {
                $this->display( C('TMPL_ENGINE_TYPE')."_login" );
            } else {
                $this->display();
            }
        } else {
            # 登录验证
            // 验证码校验
            $verify = new \Think\Verify();
            if ( !$verify->check( $_POST['captcha'] ) ) {
                $this->error("验证码错误");
            }
            // 判断用户名和密码，在model模型里边制作一个专门方法进行验证
            $user = new \Model\ManagerModel();
            $rst = $user -> checkNamePwd($_POST['mg_username'], $_POST['mg_password']);
            if ( $rst === false ) {
                $this->error("用户名或密码错误");
            } else {
                // 登录信息持久化$_SESSION
                session('mg_username', $rst['mg_name']);
                session('mg_id', $rst['mg_id']);
//                $this ->redirect($url, $params, $delay, $msg)
//                $this -> redirect('Index/index',array('id'=>100,'name'=>'tom'),2,'用户马上登陆到后台');
//                $this -> redirect('Index/index');
                $this->success('登录成功', U('Index/index'));
            }
        }
    }

    /**
     * 制作专门方法实现验证码生成
     */
    function verifyImg ()
    {
        //以下类Verify在之前并没有include引入
        //走自动加载Think.class.php  autoload()
        $config = array(
            'imageH'    => 24,               // 验证码图片高度
            'imageW'    => 105,
            'fontSize'  => 14,
            'fontttf'   => '4.ttf',              // 验证码字体，不设置随机获取
            'length'    => 4,               // 验证码位数
        );
        $verify = new \Think\Verify($config);
        $verify -> entry();
    }

    /**
     * 退出系统
     */
    public function logout ()
    {
        session(null);
        $this->redirect("Manager/login");
    }

    /**
     *
     */
    public function showlist ()
    {
        $info = D('Manager')->select();
        
        $rinfo = $this ->getRoleInfo();
        
        $this -> assign('rinfo',$rinfo);
        
        $this -> assign('info', $info);
        $this -> display();
    }

    /**
     * @param $mg_id
     */
    function upd ( $mg_id )
    {
        if(!empty($_POST)){
            $manager = D('Manager');
            $manager->create();
            $z = $manager->save();
            if($z){
                $this -> success('修改管理员成功！',U('showlist'));
            }else {
                $this -> error('修改管理员失败！',U('showlist'));
            }
        } else {
            //获得被修改管理员的信息
            $info = D('Manager')->find($mg_id);
            $rinfo = $this -> getRoleInfo();
            $this -> assign('rinfo',$rinfo);

            $this -> assign('info', $info);
            $this -> assign('mg_id', $mg_id);
            $this -> assign('role_id', $info['mg_role_id']);
            $this -> display();
        }
    }

    /**
     *
     * @return array
     */
    function getRoleInfo ()
    {
        //查询全部角色的信息
        $rrinfo = D("Role")->select(); //二维数组信息
        //array(1=>'经理',2=>'主管',3=>'总监')
        $rinfo = array();
        foreach($rrinfo as $k => $v)
        {
            $rinfo[$v['role_id']] = $v['role_name'];//array(1=>'经理',2=>'主管')
        }
        return $rinfo;
    }
}
