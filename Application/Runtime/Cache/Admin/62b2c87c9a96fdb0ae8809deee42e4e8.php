<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>文件管理-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
    <?php $addCss=""; $addJs=""; $currentNav ='文件管理 > 文件列表'; ?>
    <link rel="stylesheet" type="text/css" href="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Admin/Css/base.css|/yuanzhan/Public/Admin/Css/layout.css|/yuanzhan/Public/Js/asyncbox/skins/default.css<?php echo ($addCss); ?>" />
<script type="text/javascript" src="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Js/jquery-1.9.0.min.js|/yuanzhan/Public/Js/jquery.lazyload.js|/yuanzhan/Public/Js/functions.js|/yuanzhan/Public/Admin/Js/base.js|/yuanzhan/Public/Js/jquery.form.js|/yuanzhan/Public/Js/asyncbox/asyncbox.js<?php echo ($addJs); ?>"></script>
    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" type="text/css" media="screen" href="/yuanzhan/Public/Css/jquery-ui.css">
    <script type="text/javascript" src="/yuanzhan/Public/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/yuanzhan/Public/Js/jquery-ui.min.js"></script>
    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" media="screen" href="/yuanzhan/Public/elfinder/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/yuanzhan/Public/elfinder/css/theme.css">
    <!-- elFinder JS (REQUIRED) -->
    <script type="text/javascript" src="/yuanzhan/Public/elfinder/js/elfinder.min.js"></script>
    <!-- elFinder translation (OPTIONAL) -->
    <script type="text/javascript" src="/yuanzhan/Public/elfinder/js/i18n/elfinder.zh_CN.js"></script>
    <!-- elFinder initialization (REQUIRED) -->
</head>
<body>
<div class="wrap">
    <div id="Top">
    <div class="logo"><a target="_blank" href="<?php echo ($site["WEB_ROOT"]); ?>"><img src="/yuanzhan/Public/Admin/Img/logo.png" /></a></div>
    <div class="help"><a href="http://www.conist.com/bbs" target="_blank">使用帮助</a><span><a href="http://www.conist.com" target="_blank">关于</a></span></div>
    <div class="menu">
        <ul> <?php echo ($menu); ?> </ul>
    </div>
</div>
<div id="Tags">
    <div class="userPhoto"><img src="/yuanzhan/Public/Admin/Img/userPhoto.jpg" /> </div>
    <div class="navArea">
        <div class="userInfo"><div><a href="<?php echo U('Webinfo/index');?>" class="sysSet"><span>&nbsp;</span>系统设置</a> <a href="<?php echo U("Public/loginOut");?>" class="loginOut"><span>&nbsp;</span>退出系统</a></div>欢迎您，<?php echo ($my_info["email"]); ?></div>
        <div class="nav"><font id="today"><?php echo date("Y-m-d H:i:s"); ?></font>您的位置：<?php echo ($currentNav); ?></div>
    </div>
</div>
<div class="clear"></div>
    <div class="mainBody">
        <div id="Left">
    <div id="control" class=""></div>
    <div class="subMenuList">
        <div class="itemTitle"><?php if(CONTROLLER_NAME == 'Index'): ?>常用操作<?php else: ?>子菜单<?php endif; ?> </div>
        <ul>
            <?php if(is_array($sub_menu)): foreach($sub_menu as $key=>$sv): ?><li><a href="<?php echo ($sv["url"]); ?>"><?php echo ($sv["title"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </div>

</div>
        <div id="Right">
            <div class="Item hr">
                <div class="current" style="max-width: 100px; float: left;">文件管理</div>
            </div>
            <div id="elfinder"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<script type="text/javascript">
    $(window).resize(autoSize);
    $(function(){
        autoSize();
        $(".loginOut").click(function(){
            var url=$(this).attr("href");
            popup.confirm('你确定要退出吗？','你确定要退出吗',function(action){
                if(action == 'ok'){ window.location=url; }
            });
            return false;
        });

        var time=self.setInterval(function(){$("#today").html(date("Y-m-d H:i:s"));},1000);


    });

</script>
<script type="text/javascript" charset="utf-8">
    $().ready(function() {
        var elf = $('#elfinder').elfinder({
            url : '/yuanzhan/Public/elfinder/php/connector.php',  // connector URL (REQUIRED)
            lang: 'zh_CN'           // language (OPTIONAL)
        }).elfinder('instance');
    });
</script>
</body>
</html>