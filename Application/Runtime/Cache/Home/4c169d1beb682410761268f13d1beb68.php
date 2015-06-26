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




<div id="content">
    <!--首页banner-->
    <div id="banner" class="bannerBox">
        <div class="hd">
            <ul></ul>
        </div>
        <div class="bd">
            <ul>
                <?php if(is_array($ad_banner)): $i = 0; $__LIST__ = $ad_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="background:url(/yuanzhan/Uploads/picture/<?php echo ($vo["ad_img"]); ?>) top center no-repeat;">
                    <a href="<?php echo ($vo["ad_link"]); ?>" title="<?php echo ($vo["ad_name"]); ?>"></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--视频专区-->
    <div class="cont_h1">
        <div class="center">
            <div class="cont_t">
                <div class="cont_tl s_01"></div>
                <div class="cont_tr">
                    <a href="<?php echo U('/video');?>" title="查看更多" target="_blank"></a>
                </div>
            </div>
            <div class="video_list">
                <ul>
                    <?php if(is_array($video_list)): $i = 0; $__LIST__ = $video_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-url="<?php echo ($vo["url"]); ?>">
                        <div class="box">
                            <img src="<?php echo get_default_img($vo['image_id']);?>" alt="<?php echo ($vo["title"]); ?>"/>
                        </div>
                        <div class="txt"><?php echo ($vo["title"]); ?></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--首页新闻-->
    <div class="cont_h2">
        <div class="center">
            <div class="bnext"><i></i></div>
            <div class="news_con">
                <!--远瞻新闻-->
                <div class="news_l">
                    <div class="cont_t">
                        <div class="cont_tl s_02"></div>
                        <div class="cont_tr">
                            <a href="<?php echo U('news/2');?>" title="查看更多" target="_blank"></a>
                        </div>
                    </div>
                    <div class="news_list">
                        <ul>
                            <?php $__m_news=M("news"); $_news_list=$__m_news ->field("id,cid,title,update_time,image_id,status,published,summary,url") ->where("cid=2 AND status=1 AND lang='zh-cn'") ->order("published DESC") ->limit(4) ->select(); foreach ($_news_list as $key=>$new):?><li>
                                <div class="news_img">
                                    <a href="<?php echo U('news_r/'.$new['id']);?>" title="<?php echo ($new['title']); ?>"><img src="<?php echo get_default_img($new['image_id']);?>" alt=""/></a>
                                </div>
                                <div class="news_tit">
                                    <span><a href="<?php echo U('news_r/'.$new['id']);?>" title="<?php echo ($new['title']); ?>"><?php echo cutStr($new['title'],24,0);?></a></span>
                                    <i>UPDATED：<?php echo (date('Y-m-d',$new['published'])); ?></i>
                                    <em><a href="<?php echo U('news_r/'.$new['id']);?>" title="<?php echo cutStr($new['summary']);?>"><?php echo cutStr(trim($new['summary']),50,0);?></a></em>
                                </div>
                            </li><?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <!--投资资讯-->
                <div class="news_r">
                    <div class="cont_t">
                        <div class="cont_tl s_03"></div>
                        <div class="cont_tr">
                            <a href="<?php echo U('news/4');?>" title="查看更多" target="_blank"></a>
                        </div>
                    </div>
                    <div class="news_list">
                        <ul>
                            <?php $__m_news=M("news"); $_news_list=$__m_news ->field("id,cid,title,update_time,image_id,status,published,summary,url") ->where("cid=4 AND status=1 AND lang='zh-cn'") ->order("published DESC") ->limit(4) ->select(); foreach ($_news_list as $key=>$new):?><li>
                                    <div class="news_img">
                                        <a href="<?php echo U('news_r/'.$new['id']);?>" title=""><img src="<?php echo get_default_img($new['image_id']);?>" alt=""/></a>
                                    </div>
                                    <div class="news_tit">
                                        <span><a href="<?php echo U('news_r/'.$new['id']);?>" title=""><?php echo cutStr($new['title'],24,0);?></a></span>
                                        <i>UPDATAD：<?php echo (date('Y-m-d',$new['published'])); ?></i>
                                        <em><a href="<?php echo U('news_r/'.$new['id']);?>" title=""><?php echo cutStr(trim($new['summary']),50,0);?></a></em>
                                    </div>
                                </li><?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--已投项目-->
    <div class="cont_h3">
        <div class="center">
            <div class="bnext"><i></i></div>
            <div class="cont_t">
                <div class="cont_tl s_04"></div>
                <div class="cont_tr">
                    <a href="<?php echo U('/product');?>" title="查看更多" target="_blank"></a>
                </div>
            </div>
            <div class="cont_h3_ul">
                <ul id="da-thumbs">
                    <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["description"]); ?>" target="_blank">
                            <img src="<?php echo get_default_img($vo['image_id']);?>" alt="<?php echo ($vo["title"]); ?>"/>
                            <div class="mask hot_info"></div>
                            <div class="box">
                                <span><?php echo ($vo["title"]); ?></span>
                                <em><?php echo ($vo["ename"]); ?></em>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
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