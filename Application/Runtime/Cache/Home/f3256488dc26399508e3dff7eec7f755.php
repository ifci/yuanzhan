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
        
        <!-- 案例 -->
        <div class="introduction" style="margin-top:20px;">
            <div class="casede center clearfix">
                <div class="categoryLeft">
                    <div class="fatherNav">
                        热门资讯<a href="<?php echo U('/News/');?>" title="点击查看更多新闻">查看更多>></a>
                    </div>
                    <div class="leftNav">
                        <ul>
                            <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('News/read',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="leftContact">
                        <span>九口袋在线咨询</span>
                        <div class="tencent">
                            <ul>
                                <li>建站顾问：&nbsp;&nbsp;
                                    <a href="tencent://message/?uin=<?php echo ($site["qq"]); ?>">
                                        <img title="点击这里给我发消息" border="0" alt="点击这里给我发消息" src="http://pub.idqqimg.com/qconn/wpa/button/button_11.gif">
                                    </a>
                                </li>
                                <li>技术支持：&nbsp;&nbsp;
                                    <a href="tencent://message/?uin=<?php echo ($site["qq"]); ?>">
                                        <img title="点击这里给我发消息" border="0" alt="点击这里给我发消息" src="http://pub.idqqimg.com/qconn/wpa/button/button_11.gif">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="leftTel">
                            咨询电话：<?php echo ($site["tel"]); ?>
                        </span>
                    </div>
                    <div class="leftBottom"></div>
                </div>




<div style="float:left;width:730px;border:1px solid #c7c7c7;margin-bottom: 20px;">
                <div class="casede_t tac">
                        <b><?php echo ($info["title"]); ?></b>
                    </div>
                <p class="bottom">

                </p>
                    <div class="casede_c">
                        <?php echo ($info['content']); ?>
                    </div>

                <div class="casede_b clearfix">
                    <div class="casede_bl fl">
                        <a href="<?php echo $prev == null ? 'javascript:':U('News/read',array('id'=>$prev[id]));?>" title="<?php echo ($prev["title"]); ?>">上一篇： <?php echo $prev[title] == null ?'没有了':$prev[title];?></a>

                    </div>
                    <div class="casede_br fr">
                        <a href="<?php echo $next == null ? 'javascript:':U('News/read',array('id'=>$next[id]));?>" title="<?php echo ($next["title"]); ?>">下一篇： <?php echo $next[title] == null ?'没有了':$next[title];?></a>
                    </div>
                </div>
                <div class="weibo">
                    <script type="text/javascript">
                        (function(){
                        var url = "http://widget.weibo.com/distribution/comments.php?width=680&url=http%3A%2F%2F9koudai.net&color=cccccc,ffffff,4c4c4c,5093d5,cccccc,33fe54&colordiy=1&dpc=1";
                        document.write('<iframe id="WBCommentFrame" src="' + url + '" scrolling="no" frameborder="0" style="width:680px"></iframe>');
                        })();
                        </script>
                        <script src="http://tjs.sjs.sinajs.cn/open/widget/js/widget/comment.js" type="text/javascript" charset="utf-8"></script>
                        <script type="text/javascript">
                        window.WBComment.init({
                            "id": "WBCommentFrame"
                        });
                    </script>
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