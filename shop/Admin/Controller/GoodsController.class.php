<?php

//后台商品控制器
namespace Admin\Controller;
use Component\AdminController;

class GoodsController extends AdminController {
    //商品列表展示
    function showlist1(){
        //使用数据model模型
        //实例化model对象
        //$goods = new \Model\GoodsModel();  //object(Model\GoodsModel)
        
        //$goods = D("Goods");  //object(Think\Model)
        //$goods = D();  //object(Think\Model)
        
        $goods = M('User');//实例化Model对象，实际操作Goods数据表
        //$goods = M();  //object(Think\Model)
        
        show_bug($goods);
        
        
        $this -> display();
    }
    
    function showlist2(){
        $goods = D('Goods');
        
        //$info = $goods ->table("sw_user")-> select();
        //show_bug($info);
        
        $info = $goods -> select();//获得数据信息
        //把数据assign到模板
        //价格大于1000元的商品
        //where(内部$this,return $this)
        //$('div').css('color','red').css('font-size','30px')
        $info = $goods -> where("goods_price > 1000 and goods_name like '索%'")->select();
        //查询指定的字段
        $info = $goods->field("goods_id,goods_name")->select();
        //限制条数
        $info = $goods->limit(10,5)->select();
        //分组查询group by
        //查询当前商品一共的分组信息
        //通过分组设置可以查询每个分组的商品信息
        //例如：每个分组下边有多少商品信息  
        //      select category_id,count(*) from table group by category_id
        //      每个分组下边商品的价格算术和是多少
        //      select category_id,sum(price) from table group by category_id
        //$info = $goods->field('goods_category_id')->select(); //有重复的
        $info = $goods ->field('goods_category_id')-> group('goods_category_id')->select();
        //show_bug($info);
        //排序显示结果order by goods_price desc
        $info = $goods ->order('goods_price asc')-> select();
        
        $this -> assign('info', $info);
        
        $this -> display();
    }
    
    function showlist(){
        
        $goods = D("Goods");
        
        //1. 获得当前记录总条数
        $total = $goods -> count();
        $per = 7;
        //2. 实例化分页类对象
        $page = new \Component\Page($total, $per); //autoload
        //3. 拼装sql语句获得每页信息
        $sql = "select * from sw_goods ".$page->limit;
        $info = $goods -> query($sql);
        //4. 获得页码列表
        $pagelist = $page -> fpage();
        
        $this -> assign('info', $info);
        $this -> assign('pagelist', $pagelist);
        $this -> display();
    }
    
    //添加商品
    function add1(){
        //利用数组方式实现数据添加
        $goods = D("Goods");
        $ar = array(
            'goods_name'=>'iphone5s',
            'goods_price'=>4999,
            'goods_number'=>53,
        );
        $rst = $goods -> add($ar);
        
        //利用AR实现数据添加
        $goods = D("Goods");
        $goods -> goods_name = "htc_one";
        $goods -> goods_price = 3000;
        $rst = $goods -> add();
        
        if($rst > 0){
            echo "success";
        } else {
            echo "failure";
        }
        
        $this -> display();
    }
    
    function add(){
        $goods = D("Goods");
        if(!empty($_POST)){
            //判断附件是否有上传
            //如果有则实例化Upload，把附件上传到服务器指定位置
            //然后把附件的路径名获得到，存入$_POST
            if(!empty($_FILES)){
                $config = array(
                    'rootPath'      =>     './public/',  //根目录
                    'savePath'      =>     'upload/', //保存路径
                );
                //附件被上传到路径：根目录/保存目录路径/创建日期目录
                $upload = new \Think\Upload($config);
                //uploadOne会返回已经上传的附件信息
                $z = $upload -> uploadOne($_FILES['goods_img']);
                if(!$z){
                    show_bug($upload->getError()); //获得上传附件产生的错误信息
                }else {
                    //拼装图片的路径名
                    $bigimg = $z['savepath'].$z['savename'];
                    $_POST['goods_big_img'] = $bigimg;
                    
                    //把已经上传好的图片制作缩略图Image.class.php
                    $image = new \Think\Image();
                    //open();打开图像资源，通过路径名找到图像
                    $srcimg = $upload->rootPath.$bigimg;
                    $image -> open($srcimg);
                    $image -> thumb(150,150);  //按照比例缩小
                    $smallimg = $z['savepath']."small_".$z['savename'];
                    $image -> save($upload->rootPath.$smallimg);
                    $_POST['goods_small_img'] = $smallimg;
                }
            }
            
            $goods -> create(); //收集post表单数据
            $z = $goods -> add();
            if($z){
                //$this ->success('添加商品成功', U('Goods/showlist'));
                echo "success";
            } else {
                //$this ->error('添加商品失败', U('Goods/showlist'));
                echo "error";
            }
        }else {
        }
        $this -> display();
    }
    //修改商品
    function upd1(){
        
        $goods = D("Goods");
        $ar = array(
            'goods_name'=>'黑莓手机',
            'goods_price'=>2300
        );
        $rst = $goods ->where('goods_id>60')-> save($ar);
        
        $this -> display();
    }
    
    function upd($goods_id){
        //查询被修改商品的信息并传递给模板展示
        $goods = D("Goods");
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            $goods -> create();
            $rst = $goods -> save();
            if($rst){
                echo "success";
            } else {
                echo "failure";
            }
        } else {
            $info = $goods->find($goods_id); //一维数组
            $this -> assign('info', $info);
            $this -> display();
        }
    }
    
    //删除方法
    function del(){
        $goods = D("Goods");
        //以下三种方式都可以删除数据
        $rst = $goods -> delete(63);
        $rst = $goods -> delete('61,62,59');
        $rst = $goods -> where('goods_id>56')->delete();
        
        show_bug($rst);
    }
    
    function getMoney(){
        return "1000元钱";
    }
    
    //设置缓存
    function s1(){
        S('name','tom',10);
        S('age',25);
        S('addr','北京');
        S('hobby',array('篮球','排球','棒球'));
        echo "success";
    }
    
    //读取缓存数据
    function s2(){
        echo S('name'),"<br />";
        echo S('age'),"<br />";
        echo S('addr'),"<br />";
        print_r(S('hobby'));echo "<br />";
    }
    
    function s3(){
        //S('age',null);
        echo "delete";
    }
    
    function y1(){
        //外部用户访问的方法
        show_bug($this -> y2());
    }
    function y2(){
        //被其他方法调用的方法，获得指定信息
        //第一次从数据库获得，后续在有效期从缓存里边获得
        $info = S('goods_info');
        if($info){
            return $info;
        } else {
            //没有缓存信息，就从数据库获得数据，再把数据缓存起来
            //连接数据库
            $dt = "apple5s".time();
            S('goods_info',$dt,10);
            return $dt;
        }
    }
}

