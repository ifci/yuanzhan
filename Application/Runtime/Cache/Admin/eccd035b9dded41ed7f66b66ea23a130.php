<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>安全设置-系统设置-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
    <?php $addCss=""; ?>
    <?php $addJs=""; ?>
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
                    <div class="current">安全设置</div>
                </div>
                <form action="" method="post">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                        <tr>
                            <th width="120">后台登陆标示：</th>
                            <td><input name="admin_marked" type="text" class="input" size="40" value="<?php echo ($site["TOKEN"]["admin_marked"]); ?>" /> 后台登陆COOKIE标示，在COOKIE里已MD5加密该值存储登陆信息</td>
                        </tr>
                        <tr>
                            <th>后台登陆有效期：</th>
                            <td><input class="input" name="admin_timeout" type="text" size="40" value="<?php echo ($site["TOKEN"]["admin_timeout"]); ?>" /> 登陆后如未操作时间超过该设定值时就自动退出系统，单位为秒，最小值为100</td>
                        </tr>
                        <tr>
                            <th>前台登陆标示：</th>
                            <td><input class="input" name="member_marked" type="text" size="40" value="<?php echo ($site["TOKEN"]["member_marked"]); ?>" /> </td>
                        </tr>
                        <tr>
                            <th>前台登陆有效期：</th>
                            <td><input class="input" name="member_timeout" type="text" size="40" value="<?php echo ($site["TOKEN"]["member_timeout"]); ?>" /></td>
                        </tr>
                        <tr>
                            <th>留言板功能：</th>
                            <td><label style="margin-right: 10px;"><input type="radio" name="mess_on" <?php if($site['TOKEN']['mess_on'] == 1): ?>checked<?php endif; ?> value="1">开启</label><label><input type="radio"  <?php if($site['TOKEN']['mess_on'] == 0): ?>checked<?php endif; ?>  name="mess_on" value="0">关闭</label></td>
                        </tr>
                        <tr>
                            <th>伪静态：</th>
                            <td><label style="margin-right: 10px;"><input type="radio" name="false_static" <?php if($site['TOKEN']['false_static'] == 2): ?>checked<?php endif; ?> value="2">开启</label><label><input type="radio"  <?php if($site['TOKEN']['false_static'] == 1): ?>checked<?php endif; ?>  name="false_static" value="1">关闭</label>
                                <a href="<?php echo U('Webinfo/gethtaccess');?>" target="_blank" style="margin-left: 15px;">生成.htaccess</a>
                            </td>
                        </tr>
                        <tr>
                            <th>伪静态后缀：</th>
                            <td><input class="input" name="URL_HTML_SUFFIX" type="text" size="30" value="<?php echo ($site["TOKEN"]["URL_HTML_SUFFIX"]); ?>" /> 如：html|shtml|xml</td>
                        </tr>
                        <tr>
                            <th>禁止访问后缀：</th>
                            <td><input class="input" name="URL_DENY_SUFFIX" type="text" size="30" value="<?php echo ($site["TOKEN"]["URL_DENY_SUFFIX"]); ?>" /> 如：pdf|ico|png|gif|jpg</td>
                        </tr>
                    </table>
                </form>
                <div class="commonBtnArea" >
                    <button class="btn submit">提交</button>
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
</script>
</body>
</html>