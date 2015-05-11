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
        
        <!-- 课程试听 -->
        <div class="introduction kvideo">
            <div class="main_t center tac">
                <b><?php echo L('T_VIDEO');?></b>
            </div>
            <div class="introduction_h1 center">
                <div class="introduction_list clearfix">
                    <i class="icon fl"></i>
                    <div class="introduction_ty2 fl">
                        <div class="introduction_ty3 mt20">
                            <b>课程视频</b>
                        </div>
                    </div>
                </div>
                <div class="kvideo_ty1 clearfix">
                    <div class="kvideo_ty2 fl">
                        <div class="kvideo_ty3 wimg pr">
                            <img src="<?php echo get_default_img($list[0]['image_id']);?>" alt="" />
                            <div class="kvplayer pa">
                                <a href="<?php echo U('video/read',array('id'=>$list[0]['id']));?>" title="$list[0].title" target="_blank">
                                    <div class="kvplayer_a"><img src="/yuanzhan/Public/Home/images/jkd_40.png" alt="" /></div>
                                    <div class="kvplayer_b kvplayer_d"></div>
                                </a>
                            </div>
                        </div>
                        <div class="kvideo_ty4">
                            <div class="kvideo_ty5">
                                <div class="kvideo_ty6 clearfix">
                                    <div class="kvideo_ty7 fl">
                                        <b>九口袋课程试听</b>
                                    </div>
                                    <div class="kvideo_ty8 tar fr">
                                        <?php echo (date('Y月m日',$list[0]["published"])); ?>
                                    </div>
                                </div>
                                <div class="kvideo_ty9">
                                    <b>域名网址：<?php echo ($list[0]["url"]); ?></b>
                                </div>
                                <div class="kvideo_ty10">
                                    课程介绍：</div>
                                <div class="kvideo_ty10 kvideo_ty11">
                                    <?php echo ($list[0]["content"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kvideo_ty12 fl">
                        <ul>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="pr wimg">
                                <img src="<?php echo get_default_img($vo['image_id']);?>" alt="" />
                                <div class="kvplayer pa">
                                    <a href="<?php echo U('video/read',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>" target="_blank">
                                        <div class="kvplayer_a"><img src="/yuanzhan/Public/Home/images/jkd_40.png" alt="" /></div>
                                    </a>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="introduction_h1 bgf8">
                <div class="center">
                    <div class="introduction_list introduction_list2 clearfix">
                        <i class="icon fl"></i>
                        <div class="introduction_ty2 fl">
                            <div class="introduction_ty3 mt20">
                                <b>课程图集</b>
                            </div>
                        </div>
                    </div>
                    <ul class="kvideo_ty13 clearfix">
                        <?php $__m_news=M("news"); $_news_list=$__m_news ->field("id,cid,title,update_time,image_id,status,published,summary,url") ->where("is_recommend=1 and cid=58 AND status=1 AND lang='zh-cn'") ->order("id DESC") ->limit(8) ->select(); foreach ($_news_list as $key=>$new):?><li class="pr">
                            <div class="kvideo_ty21">
                                <div class="kvideo_ty22 wimg pa">
                                    <a href="<?php echo U('news/read',array('id'=>$new['id']));?>" title="">
                                        <img src="<?php echo get_default_img($new['image_id']);?>" alt="" />
                                    </a>
                                </div>
                                <div class="kvideo_ty23">
                                    <b><?php echo cutStr($new['title'],30,0);?></b>
                                </div>
                            </div>
                        </li><?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="introduction_h2">
                <div class="center">
                    <div class="introduction_list introduction_list3 clearfix">
                        <i class="icon fl"></i>
                        <div class="introduction_ty2 fl">
                            <div class="introduction_ty3 mt20">
                                <b>诊断报告</b>
                            </div>
                        </div>
                    </div>
                    <div class="kvideo_ty14">
                        <div class="kvideo_ty15 tac">
                            <b>每日前10名咨询免费获得网络营销行业诊断报告一份</b>
                        </div>
                        <div class="clearfix">
                            <div class="kvideo_ty16 fl">

                            </div>
                            <div class="kvideo_ty17 fl">
                                <div class="kvideo_ty18">
                                    <b>请准确填写下列信息，我们的客服将在24小时内发给您！</b>
                                </div>

                                <form action="<?php echo U('message/add');?>" method="post">
                                    <div class="kvideo_ty19">
                                        姓&nbsp;&nbsp;&nbsp;&nbsp;名：&nbsp;&nbsp;<input name="name" id="uname" value="" type="text"  />
                                    </div>
                                    <div class="kvideo_ty19">
                                        电&nbsp;&nbsp;&nbsp;&nbsp;话：&nbsp;&nbsp;<input name="tel" id="utel" value="" type="text" />
                                    </div>
                                    <div class="kvideo_ty19">
                                        验&nbsp;证&nbsp;码：
                                        <input class="input" name="verify_code" id="verify_code" type="text" value="" style="width:100px;" />
                                        <img src="<?php echo U('Base/verify_code');?>"  title="看不清？单击此处刷新" onclick="this.src+='?rand='+Math.random();"  style="cursor: pointer; vertical-align: middle;"/>
                                    </div>
                                    <input type="submit" class="kvideo_ty20" value="" onclick="return check()" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="introduction_h6 pr wimg">
                <div class="introduction_ty24 pa">
                    <div class="center">
                        <!-- 我们最近的课程安排是在<span class="css29343">2014</span>年<span class="css29343">12</span>月<span class="css29343">11</span>日， -->
                        九口袋课堂欢迎您
                        <br />心动不如行动，赶快到现场参与我们的活动吧！
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