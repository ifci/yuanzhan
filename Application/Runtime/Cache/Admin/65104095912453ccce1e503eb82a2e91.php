<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台管理首页-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
        <?php $addCss=""; $addJs=""; $currentNav ='模型管理'; ?>
        <link rel="stylesheet" type="text/css" href="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Admin/Css/base.css|/yuanzhan/Public/Admin/Css/layout.css|/yuanzhan/Public/Js/asyncbox/skins/default.css<?php echo ($addCss); ?>" />
<script type="text/javascript" src="/yuanzhan/Public/Min/?f=/yuanzhan/Public/Js/jquery-1.9.0.min.js|/yuanzhan/Public/Js/jquery.lazyload.js|/yuanzhan/Public/Js/functions.js|/yuanzhan/Public/Admin/Js/base.js|/yuanzhan/Public/Js/jquery.form.js|/yuanzhan/Public/Js/asyncbox/asyncbox.js<?php echo ($addJs); ?>"></script>
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
    <span class="fr">系统现有数据 <b><?php echo ($rows_count); ?></b> 行</span>
    <div class="current"><b><?php echo ($model['name']); ?></b> 数据列表</div>
</div>
<form>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
        <thead>
            <tr>
                <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><td><?php echo ($field['comment']); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr align="center">
                <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><td><?php echo ($row[$field['name']]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                <td>[ <a href="<?php echo U(CONTROLLER_NAME . '/edit', array('id' => $row['id']));?>">编辑</a> ] [ <a href="javascript:void(0);" value="<?php echo U(CONTROLLER_NAME . '/delete', array('id' => $row['id']));?>" name="ID=<?php echo ($row['id']); ?>" class="del">删除</a> ]</td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</form>

<div class="page">
    <?php echo ($page); ?>
</div>

<script type="text/javascript">
$(function(){
    $(".del").click(function(){
        var del_link = $(this).attr("value");
        popup.confirm('您真的打算删除 '+$(this).attr("name")+' 的数据吗?','温馨提示',function(action){
            if(action == 'ok'){
                $.getJSON(del_link, function(json){
                    if (json.status) {
                        popup.success(json.info);
                        setTimeout(function(){
                            popup.close("asyncbox_success");
                        },2000);
                    } else {
                        popup.error(json.info);
                        setTimeout(function(){
                            popup.close("asyncbox_error");
                        },2000);
                    }

                    setTimeout(function(){
                        top.window.location.reload();
                    },1000);
                });
            }
        });

        return false;
    });
});
</script>
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
    </body>
</html>