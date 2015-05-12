<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>邮箱配置-系统设置-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
    <link rel="stylesheet" type="text/css" href="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Admin/Css/base.css|/yuanzhan/Public/Admin/Css/layout.css|/yuanzhan/Public/Js/asyncbox/skins/default.css<?php echo ($addCss); ?>" />
<script type="text/javascript" src="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Js/jquery-1.9.0.min.js|/yuanzhan/Public/Js/jquery.lazyload.js|/yuanzhan/Public/Js/functions.js|/yuanzhan/Public/Admin/Js/base.js|/yuanzhan/Public/Js/jquery.form.js|/yuanzhan/Public/Js/asyncbox/asyncbox.js<?php echo ($addJs); ?>"></script>
</head>
<body>
    <div class="wrap"> <div id="Top">
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
        <div class="mainBody"> <div id="Left">
    <div id="control" class=""></div>
    <div class="subMenuList">
        <div class="itemTitle"><?php if(CONTROLLER_NAME == 'Index'): ?>常用操作<?php else: ?>子菜单<?php endif; ?> </div>
        <ul>
            <?php if(is_array($sub_menu)): foreach($sub_menu as $key=>$sv): ?><li><a href="<?php echo ($sv["url"]); ?>"><?php echo ($sv["title"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </div>

</div>
            <div id="Right">
                <div class="contentArea">
                    <div class="Item hr">
                        <div class="current">邮箱配置</div>
                    </div>
                    <form action="" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                            <tr>
                                <th width="120">邮件服务器：</th>
                                <td><input name="smtp_host" type="text" class="input" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["smtp_host"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>邮件发送端口：</th>
                                <td><input class="input" name="smtp_port" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["smtp_port"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>发件人地址：</th>
                                <td><input class="input" name="from_email" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["from_email"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>发件人名称：</th>
                                <td><input class="input" name="from_name" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["from_name"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>验证用户名：</th>
                                <td><input class="input" name="smtp_user" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["smtp_user"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>验证密码：</th>
                                <td><input class="input" name="smtp_pass" type="password" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["smtp_pass"]); ?>" /></td>
                            </tr>
                            <tr>
                                <th>回复EMAIL：</th>
                                <td><input class="input" name="reply_email" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["reply_email"]); ?>" /> （留空则为发件人EMAIL）</td>
                            </tr>
                            <tr>
                                <th>回复名称：</th>
                                <td><input class="input" name="reply_name" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["reply_name"]); ?>" /> （留空则为发件人名称）</td>
                            </tr>
                            <tr>
                                <th>接收测试邮件地址：</th>
                                <td><input class="input" name="test_email" type="text" size="40" value="<?php echo ($site["SYSTEM_EMAIL"]["test_email"]); ?>" /> （只有填写了接收测试邮件地址方可测试邮件配置是否成功）</td>
                            </tr>
                        </table>
                    </form>
                    <div class="commonBtnArea" >
                        <button class="btn submit">提交</button>
                        <button class="btn test">测试配置是否成功</button>
                    </div>
                </div>
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
<script type="text/javascript">
    $(".submit").click(function(){
        commonAjaxSubmit();
    });
    $(".test").click(function(){
        if($.trim($("input[name='test_email']").val())==''){
            popup.alert("没有填写接收测试邮件地址，无法发送测试邮件");
            return;
        }
        commonAjaxSubmit('<?php echo U("Webinfo/testEmailConfig");?>');
    });
</script>
</body>
</html>