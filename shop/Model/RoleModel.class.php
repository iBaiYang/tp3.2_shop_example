<?php

namespace Model;
use Think\Model;

class RoleModel extends Model{
    //权限分配
    //$auth是一维数组信息，给单前角色分配的权限id信息
    function saveAuth($auth,$role_id){
        //把权限id信息有数组变为中间用逗号的分隔的字符串信息
        $auth_ids = implode(',',$auth);
        
        //根据ids权限id信息查询具体操作方法信息
        $info = D('Auth')->select($auth_ids);//二维数组信息
        //拼装控制器和操作方法
        $auth_ac = '';
        foreach($info as $k => $v){
            if(!empty($v['auth_c']) && !empty($v['auth_a'])){
                $auth_ac .= $v['auth_c']."-".$v['auth_a'].",";
            }
        }
        $auth_ac = rtrim($auth_ac,',');//删除最右边的逗号
        
        $dt = array(
            'role_id'=>$role_id,
            'role_auth_ids'=>$auth_ids,
            'role_auth_ac'=>$auth_ac,
        );
        return $this -> save($dt);
    }
}