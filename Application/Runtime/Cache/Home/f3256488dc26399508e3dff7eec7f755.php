<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="author" content="JKD TEAM">
    <title><?php echo ($webtitle); ?>-<?php echo ($site["name"]); ?></title>
    <meta name="keywords" content="<?php echo ($site["keyword"]); ?>,<?php echo ($info['keywords']); ?>">
    <meta name="description" content="<?php echo ($site["description"]); ?>,<?php echo ($info['description']); ?>">
    <link rel="dns-prefetch" href="<?php echo C('WEB_ROOT');?>">
    <link rel="shortcut icon" href="/yuanzhan/favicon.ico">
    <link type="text/css" href="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Home/css/base.css|<?php if(CONTROLLER_NAME == Index): ?>/yuanzhan/Public/Home/css/index.css<?php else: ?>/yuanzhan/Public/Home/css/combo.css<?php endif; ?>|/yuanzhan/Public/Home/layer/skin/layer.css" rel="stylesheet" />
</head>

<body>
    <!--header开始-->
    <div id="header" class="clearfix">
        <div class="center">
            <!--logo开始-->
            <div class="logo">
                <a href="<?php echo C('WEB_ROOT');?>" title="远瞻股权"><img src="/yuanzhan/Public/Home/images/logo.png" alt="" /></a>
            </div>
            <div class="nav">
                <ul>
                    <?php $_m_nav=M("nav");$__list__=$_m_nav->where("lang='zh-cn'  AND type='top' AND parent_id=0")->order('sort DESC')->select();foreach($__list__ as $_k1=>$_v1):$cid=$_v1['id'];$child=$_m_nav->where('parent_id='.$cid)->order('sort DESC')->select();extract($_v1);?><li <?php if($nav_name == $webtitle): ?>class='nav_on'<?php endif; ?>>
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
        <a href="/yuanzhan/news/read/id/38.html" title=""><?php echo ($info['title']); ?></a><?php endif; ?>
    </div>
</div>
    <div class="main_t">
        <div class="main_c">
            <b>NEWS</b>
            <em>新闻动态</em>
        </div>
    </div>
    <div class="news center">
        <div class="news_l">
    <ul class="news_cat">
        <?php $__m_cat=M("category");$__cat_list=$__m_cat->where("lang='zh-cn'  AND type='n' AND pid=1")->limit()->select();foreach($__cat_list as $_ck=>$_cv):$cid=$_cv['cid'];$child=$__m_cat->where('pid='.$cid)->order('cid DESC')->select();extract($_cv); $cv = $_GET['id'] ? $_GET['id'] : 2; ?>
        <li class="<?php if($cv == $cid): ?>news_on<?php endif; ?>">
            <a href="<?php echo U('News/index',array('id'=>$cid));?>" title="">
                <i></i>
                <span><?php echo ($name); ?></span>
                <em>>></em>
            </a>
        </li><?php endforeach; ?>

        <li class="news_rcm">
            <div class="news_rcm_t">
                <i></i>
                <span>推荐新闻</span>
            </div>
            <ul>
                <?php $__m_news=M("news"); $_news_list=$__m_news ->field("id,cid,title,update_time,image_id,status,published,summary,url") ->where("status=1 AND lang='zh-cn'") ->order("click DESC") ->limit(8) ->select(); foreach ($_news_list as $key=>$new):?><li>
                    <a href="<?php echo U('news/read',array('id'=>$new['id']));?>" title="<?php echo $new['title'];?>"><?php echo cutStr($new['title'],24,0);?></a>
                </li><?php endforeach;?>
            </ul>
        </li>
    </ul>
</div>
        <div class="news_r news_con">
            <div class="tit"><?php echo ($info["title"]); ?></div>
            <div class="dcz">
                <div class="date">
                    <i></i>
                    <span><?php echo (date('Y-m-d',$info['published'])); ?></span>
                </div>
                <div class="click">
                    <i></i>
                    <span><?php echo ($info['click']); ?></span>
                </div>
                <div class="zoom">
                    <em>A<sup>-</sup></em>
                    <em>A<sup>+</sup></em>
                </div>
            </div>
            <div class="txt">
                <?php echo ($info['content']); ?>
            </div>
            <div class="news_bs">
                <div class="share">分享到：<div class="bshare-custom" style="display:inline-block;*display:inline;zoom:1;"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=7afd94bb-a7e8-4d65-9936-979b687f14eb&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></div>
                <div class="back">
                    <a href="<?php echo U('News/index');?>" title="返回列表">
                        <i></i>
                        <span>返回列表</span>
                    </a>
                </div>
            </div>
            <div class="news_np">
                <div>
                    <a href="<?php echo $prev == null ? 'javascript:':U('News/read',array('id'=>$prev[id]));?>" title="<?php echo ($prev["title"]); ?>">
                        <i></i>
                        <span>上一篇： <?php echo $prev[title] == null ?'没有了':$prev[title];?></span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo ($next["title"]); ?>" title="">
                        <i></i>
                        <span>下一篇： <?php echo $next[title] == null ?'没有了':$next[title];?></span>
                    </a>
                </div>
            </div>
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
                    全国服务热线：<?php echo ($site["tel"]); ?>
                </div>
                <!--版权信息-->
                <div>
                    COPYRIGHT © 远瞻股权投资管理（上海）有限公司
                </div>
                <!--统计代码-->
                <div><a href="#" target="_blank">站长统计</a></div>
            </div>

            <div class="footer_r">
                <ul>
                    <li>
                        <span><img src="/yuanzhan/Public/Home/images/qrcode.jpg" alt=""/></span>
                        <em>远瞻微信公众号</em>
                    </li>
                    <li>
                        <span><img src="/yuanzhan/Public/Home/images/qrcode.jpg" alt=""/></span>
                        <em>远瞻手机端</em>
                    </li>
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
                layer: '/yuanzhan/Public/Home/js/../layer/layer'
            },
            preload : ['jq','jslide','layer']
        });
        seajs.use('main');
    </script>
</body>
</html>