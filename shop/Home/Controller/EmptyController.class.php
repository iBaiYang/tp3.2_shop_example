<?php

namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller{
    //空操作方法
    function _empty(){
        echo "<img src='".IMG_URL."404.gif"."' alt=''>";
    }
}
