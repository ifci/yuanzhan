<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加、编辑单页-后台管理-<?php echo ($site["SITE_INFO"]["name"]); ?></title>
    <?php $addCss=""; $addJs=""; $currentNav ='单页管理 > 添加编辑单页'; ?>
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
                <div class="current">添加编辑单页</div>
            </div>
            <form>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">

                    <?php if($site['SITE_INFO']['LANG_SWITCH_ON']=='1'){ ?>
                    <tr>
                        <th>语言选择：</th>
                        <td>
                            <select name="info[lang]">
                                <option value="zh-cn" <?php if($info['lang'] == 'zh-cn'): ?>selected<?php endif; ?> >简体中文</option>
                                <option value="en-us" <?php if($info['lang'] == 'en-us'): ?>selected<?php endif; ?> >English</option>
                                </volist>
                            </select></td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <th width="100">单页标题：</th>
                        <td><input id="title" type="text" class="input" size="60" name="info[page_name]" value="<?php echo ($info["page_name"]); ?>"/> <a href="javascript:void(0)" id="checkPageTitle">检测是否重复</a></td>
                    </tr>
                    <!-- <tr>
                        <th width="100">别名(字母)：</th>
                        <td><input id="unique_id" type="text" class="input" size="60" name="info[unique_id]" value="<?php echo ($info["unique_id"]); ?>"/> <a href="javascript:void(0)" id="checkPageUnique">检测是否重复</a></td>
                    </tr> -->

                    <tr>
                        <th width="100">归属标签：</th>
                        <td><select name="info[unique_id]" id="">
                            <option value="kcjs" <?php echo $info['unique_id'] == 'kcjs'?'selected':'';?>>课程介绍</option>
                            <option value="fwjs" <?php echo $info['unique_id'] == 'fwjs'?'selected':'';?>>服务介绍</option>
                            <option value="jkdjs" <?php echo $info['unique_id'] == 'jkdjs'?'selected':'';?>>九口袋介绍</option>
                        </select></td>
                    </tr>

                    <tr>
                        <th width="100">单页状态：</th>
                        <td><label><input type="radio" name="info[display]" value="1" <?php if($info["display"] == 1): ?>checked="checked"<?php endif; ?> />显示状态</label>
                            &nbsp;<label><input type="radio" name="info[display]" value="0" <?php if($info["display"] == 0): ?>checked="checked"<?php endif; ?> /> 隐藏状态</label>
                        </td>
                    </tr>
                    <tr>
                        <th>单页级别：</th>
                        <td>
                            <select name="info[parent_id]">
                                <option value="0">顶级</option>
                                <!-- <?php if(is_array($pagelist)): $i = 0; $__LIST__ = $pagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[id] == $info[parent_id]): ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["fullname"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["fullname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?> -->
                            </select></td>
                    </tr>
                    <!-- <tr>
                        <th>关键词：</th>
                        <td><input type="text" class="input" size="60" name="info[keywords]" value="<?php echo ($info["keywords"]); ?>"/> 多关键词间用半角逗号（,）分开，可用于做文章关联阅读条件</td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td><textarea class="input" style="height: 60px; width: 600px;" name="info[description]"><?php echo ($info["description"]); ?></textarea> 用于SEO的description</td>
                    </tr> -->
                    <tr>
                        <th>内容：</th>
                        <td><textarea id="content" class="" style="height: 300px; width: 80%;" name="info[content]"><?php echo ($info['content']); ?></textarea></td>
                    </tr>
                </table>
                <input type="hidden" name="info[id]" value="<?php echo ($info["id"]); ?>" />
            </form>
            <div class="commonBtnArea" >
                <button class="btn submit">提交</button>
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
<script type="text/javascript" src="/yuanzhan/Public/kindeditor/kindeditor.js"></script><script type="text/javascript" src="/yuanzhan/Public/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
    $(function(){

        var  content ;
        KindEditor.ready(function(K) {
            content = K.create('#content',{
                allowFileManager : true,
                uploadJson:'/yuanzhan/Public/kindeditor/php/upload_json.php?dirname=page'
            });
        });

        $("#checkPageTitle").click(function(){
            if($('#title').val()==''){
                popup.error('标题不能为空！');
                return false;
            }
            $.getJSON("/yuanzhan/jkd/Siteinfo/checkPageTitle", { title:$("#title").val(),id:"<?php echo ($info["id"]); ?>"}, function(json){
                $("#checkPageTitle").css("color",json.status==1?"#0f0":"#f00").html(json.info);
            });
        });
        $("#checkPageUnique").click(function(){
            if($('#unique_id').val()==''){
                popup.error('别名不能为空！');
                return false;
            }
            $.getJSON("/yuanzhan/jkd/Siteinfo/checkPageUnique", { title:$("#unique_id").val(),id:"<?php echo ($info["id"]); ?>"}, function(json){
                $("#checkPageUnique").css("color",json.status==1?"#0f0":"#f00").html(json.info);
            });
        });
        $(".submit").click(function(){
            content.sync();
            commonAjaxSubmit();
            return false;
        });
    });
</script>
</body>
</html>