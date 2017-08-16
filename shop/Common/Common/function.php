<?php
// 系统共用自定义方法，可以集中写在这

/**
 * 制作一个输出调试函数
 * @param $msg
 */
function show_bug( $msg )
{
    echo "<pre style='color:red'>";
    var_dump($msg);
    echo "</pre>";
}