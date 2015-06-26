<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script>
        if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){
            window.location.href = "http://yz.lighthousecapital.cn/wap";
        }
    </script>
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=7|chrome=1" />
    <meta name="author" content="JKD TEAM">
    <title><?php echo ($webtitle); ?>-<?php echo ($site["name"]); ?></title>
    <meta name="keywords" content="<?php echo ($info['keywords'] ? $info['keywords'] : $site["keyword"]); ?>">
    <meta name="description" content="<?php echo ($info['description'] ? $info['description'] : $site["description"]); ?>">
    <link rel="dns-prefetch" href="<?php echo C('WEB_ROOT');?>">
    <link rel="shortcut icon" href="/yuanzhan/favicon.ico">
    <link type="text/css" href="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Home/css/base.css|<?php if(CONTROLLER_NAME == Index): ?>/yuanzhan/Public/Home/css/index.css<?php else: ?>/yuanzhan/Public/Home/css/combo.css<?php endif; ?>" rel="stylesheet" />
    <!--[if !IE]> --><link href='http://www.youziku.com/webfont/NameCSS/29523' rel='stylesheet' type='text/css'/><!-- <![endif]-->
</head>

<body>
    <!--header开始-->
    <div id="header" class="clearfix">
        <div class="center">
            <!--logo开始-->
            <div class="logo">
                <a href="<?php echo C('WEB_ROOT');?>" title="远瞻投权"><img src="/yuanzhan/Public/Home/images/logo.png" alt="" /></a>
            </div>
            <div class="nav">
                <ul>
                    <?php $_m_nav=M("nav");$__list__=$_m_nav->where("lang='zh-cn'  AND type='top' AND parent_id=0")->order('sort DESC')->select();foreach($__list__ as $_k1=>$_v1):$cid=$_v1['id'];$child=$_m_nav->where('parent_id='.$cid)->order('sort DESC')->select();extract($_v1);?><li <?php if($webtitle == $nav_name): ?>class='nav_on'<?php endif; ?>>
                        <a href="<?php if($action == null): echo ($link); else: echo U($action); endif; ?>" title="<?php echo ($nav_name); ?>">
                            <span>
                                <?php echo strtoupper($nav_rename);?>
                            </span>
                            <em>
                                <?php echo ($nav_name); ?>
                            </em>
                        </a>
                    </li><?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--logo结束-->
    </div>
    <!--header结束-->




<!--content开始-->
<div id="content">
    <div class="bread">
    <div class="bread_t">
        <i></i>
        <span>当前位置：</span>
        <a href="/yuanzhan/" title="首页">首页</a>
        |
        <a href="<?php echo U($b_url);?>" title="<?php echo ($webtitle); ?>"><?php echo ($webtitle); ?></a>
        <?php if($details == 1): ?>|
        <a href="/yuanzhan/Team/index.html" title="<?php echo ($info['title']); ?>"><?php echo ($info['title']); ?></a><?php endif; ?>
    </div>
</div>
    <div class="main_t">
        <div class="main_c">
            <b>TEAM</b>
            <em>投资团队</em>
        </div>
    </div>
    <div class="news center">
        <div class="news_l">
    <ul class="news_cat team_bar">
        <?php $cv = $_GET['id'] ? $_GET['id'] : $Tbar[0]['id']; ?>
        <?php if(is_array($Tbar)): $k = 0; $__LIST__ = $Tbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li>
        <a href="javascript:" title="<?php echo ($vo["title"]); ?>">
            <i></i>
            <span><?php echo ($vo["title"]); ?></span>
        </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
        <div class="news_r team" style="margin-top:60px">

            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="team_t">
                <div class="team_c">
                    <img src="<?php echo get_default_img($vo['image_id']);?>" alt=""/>
                </div>
            </div>
            <div class="team_b">
                <h3><?php echo ($vo["etit"]); ?></h3>
                <div class="team_txt"><?php echo ($vo["etxt"]); ?></div>
                <h3><?php echo ($vo["tit"]); ?></h3>
                <div class="team_txt"><?php echo ($vo["txt"]); ?></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
<!--content结束-->


<!--footer开始-->
    <div id="footer" class="footer">
        <div class="center">
            <div class="footer_l">
                <!--底部导航-->
                <div class="footer_nav">
                    <ul>
                        <?php $_m_nav=M("nav");$__list__=$_m_nav->where("lang='zh-cn'  AND type='bottom' AND parent_id=0")->order('sort ASC')->select();foreach($__list__ as $_k1=>$_v1):$cid=$_v1['id'];$child=$_m_nav->where('parent_id='.$cid)->order('sort DESC')->select();extract($_v1);?><li>
                            <a href="<?php if($action == null): echo ($link); else: echo U($action); endif; ?>" title="<?php echo ($nav_name); ?>"><?php echo ($nav_name); ?></a>
                        </li><?php endforeach; ?>
                    </ul>
                </div>
                <!--服务热线-->
                <div class="footer_tel">
                    咨询热线：<?php echo ($site["tel"]); ?>
                </div>
                <!--版权信息-->
                <div>
                    COPYRIGHT © 远瞻股权投资管理（上海）有限公司
                </div>
                <!--友情链接-->

                <!-- <div class="flink"><span>友情链接：</span><?php $__m_link=M("link");$__link_list=$__m_link->where('display=1')->order('sort DESC')->limit()->select();foreach($__link_list as $_lk=>$_lv):extract($_lv);?><a href="<?php echo ($link); ?>" <?php if($target == 2): ?>target='_blank'<?php endif; ?> title="<?php echo ($title); ?>"><?php echo ($title); ?></a><span>|</span><?php endforeach; ?></div> -->
                <div>
                    <?php echo ($site["icp"]); ?>
                </div>
                <!--统计代码-->
                <div><?php echo ($site["tongji"]); ?></div>
            </div>

            <div class="footer_r">
                <ul>
                    <?php if(is_array($ad_info)): $i = 0; $__LIST__ = $ad_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <span><img src="/yuanzhan/Uploads/picture/<?php echo ($vo["ad_img"]); ?>" alt="<?php echo ($vo["ad_name"]); ?>" width="146" height="146" /></span>
                        <em><?php echo ($vo["ad_name"]); ?></em>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--footer结束-->
    <script src="/yuanzhan/Public/Home/js/sea.js"></script>
    <script type="text/javascript">
        seajs.config({
            alias : {
                jq : 'jquery-1.11.1.min',
                jslide : 'jquery.SuperSlide.2.1.1',
                main : 'main',
                home: 'home.min'
            },
            preload : ['jq','jslide'<?php if(CONTROLLER_NAME == Index): ?>,'home'<?php endif; ?>]
        });
        seajs.use('main');
    </script>
</body>
</html>