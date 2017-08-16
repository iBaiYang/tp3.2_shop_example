--用户表
CREATE TABLE `sw_manager` (
  `mg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mg_name` varchar(32) NOT NULL,
  `mg_pwd` varchar(32) NOT NULL,
  `mg_time` int(10) unsigned NOT NULL COMMENT '时间',
  `mg_role_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8


--权限表
CREATE TABLE `sw_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL COMMENT '名称',
  `auth_pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  controller控制器 Goods
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  action  方法 showlist
  `auth_path` varchar(32) NOT NULL COMMENT '全路径',
  全路径：用户信息排序使用
  ① : 如果是顶级权限，全路径等于本记录主键值
  ② ：如果不是顶级权限，全路径等于 "父级全路径-(中恒线)本记录主键值"
  `auth_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别',
  基本：0顶级权限  1次顶级权限  2次次顶级
  权限呈现缩进关系使用
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

权限数据模拟：
insert into sw_auth values (1,'商品管理',0,'','',1,0);
insert into sw_auth values (2,'订单管理',0,'','',2,0);
insert into sw_auth values (3,'广告管理',0,'','',3,0);
insert into sw_auth values (4,'商品列表',1,'Goods','showlist',"1-4",1);
insert into sw_auth values (5,'添加商品',1,'Goods','add',"1-5",1);
insert into sw_auth values (6,'商品分类',1,'Goods','cate',"1-6",1);
insert into sw_auth values (7,'用户评论',1,'User','comment',"1-7",1);
insert into sw_auth values (8,'订单列表',2,'Order','showlist',"2-8",1);
insert into sw_auth values (9,'订单打印',2,'Order','print',"2-9",1);
insert into sw_auth values (10,'添加订单',2,'Order','add',"2-10",1);
insert into sw_auth values (11,'广告列表',3,'Advert','showlist',"3-11",1);
insert into sw_auth values (12,'广告位置',3,'Advert','position',"3-12",1);



--角色表
CREATE TABLE `sw_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '权限ids,1,2,5',
  "4,5,6" 关联权限的主键值用逗号连接的信息(如果有上级权限，也把上级权限的id进行关联)
  `role_auth_ac` text COMMENT '模块-操作',
  关联权限的控制器、方法连接的信息
  "Goods-showlist,Goods-add,Goods-cate"
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

角色数据模拟：
insert into sw_role values (1, '经理', "1,4,5,6","Goods-showlist,Goods-add,Goods-cate");
insert into sw_role values (2, '主管', "2,3,8,11","Order-showlist,Advert-showlist");


角色：
    董事长
    总监
    高级经理
    经理
    项目经理
    业务主管
    客服
    技术支持
    美工
    员工
    
    
    
