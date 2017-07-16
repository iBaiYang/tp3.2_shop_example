<?php

namespace Home\Controller;
use Think\Controller;

//Controller父类：ThinkPHP/Library/Think/Controller.class.php

class UserController extends Controller{
    //用户登录
    function login(){
        //调用视图display();
        $this -> display();
    }

    //用户注册
    function register(){
        $user = new \Model\UserModel();
        //判断表单是否提交
        if(!empty($_POST)){
            //只有全部验证通过$z才会为真
            if(!$user -> create()){
                //验证失败,输出错误信息
                //getError()方法返回验证失败的信息
                show_bug($user->getError());
            } else {
                //把爱好由数组变为字符串"1,3,4"
                //使用AR方式处理爱好的字段信息
                //create()方法收集的数据也是把数据变为模型对象的属性
                $user -> user_hobby = implode(',',$_POST['user_hobby']);
                $rst = $user -> add();
                if($rst){
                    $this -> success('注册成功',U('Index/index'));
                } else {
                    $this -> error('注册失败',U('Index/index'));
                }
            }
        } else {
            $this -> display();
        }
    }
    
    function _empty(){
        echo "<img src='".IMG_URL.'404.gif'."' alt='' />";
    }
    
    function number(){
        //模仿从数据库获得数据
        return "目前网站注册会员200万";
    }

}

