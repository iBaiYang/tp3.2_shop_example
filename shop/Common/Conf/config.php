<?php
return array(
	//'配置项'=>'配置值'

    // URL模式设置
//    'URL_MODEL'             =>  0,  // 普通模式 http://localhost/?m=home&c=user&a=login&var=value
//    'URL_MODEL'             =>  1,  // PATHINFO模式 http://localhost/index.php/home/user/login/var/value/
    'URL_MODEL'             =>  2,  // REWRITE模式 http://localhost/home/user/login/var/value
//    'URL_MODEL'             =>  3,  // 兼容模式 http://localhost/?s=/home/user/login/var/value
    
    //让页面显示追踪日志信息
    'SHOW_PAGE_TRACE'       =>  true,
    
    //url地址大小写不敏感设置
    'URL_CASE_INSENSITIVE'  =>  true,
    
    //数据库连接配置
    'DB_TYPE'               =>  'mysqli',     // 数据库类型  php7支持mysqli,而不再支持mysql
    'DB_HOST'               =>  'localhost',  // 服务器地址
    'DB_NAME'               =>  'tp32_shop',  // 数据库名
    'DB_USER'               =>  'root',       // 用户名
    'DB_PWD'                =>  'root',       // 密码
    'DB_PORT'               =>  '3306',       // 端口
    'DB_PREFIX'             =>  'sw_',        // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>  false,        // 是否进行字段类型检查
    //以下字段缓存没有其作用
    //① 如果是调试模式就不起作用
    //② false  也是不起作用
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    //模块配置
//    'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),
//     'DEFAULT_MODULE'        =>  'Home',
    
    //修改模板引擎为smarty
    'TMPL_ENGINE_TYPE'		=>  'Smarty',
    
    //多语言支持
    'LANG_SWITCH_ON'        => true,   // 默认关闭语言包功能
    'LANG_AUTO_DETECT'      => true,   // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'             => 'zh-cn,zh-tw,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'          => 'hl',		// 默认语言切换变量
);
