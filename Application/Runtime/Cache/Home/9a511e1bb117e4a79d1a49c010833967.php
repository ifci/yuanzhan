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
    <link href='http://www.youziku.com/webfont/NameCSS/29523' rel='stylesheet' type='text/css'/>
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
        <a href="/yuanzhan/Connect/index.html" title=""><?php echo ($info['title']); ?></a><?php endif; ?>
    </div>
</div>
    <div class="main_t">
        <div class="main_c">
            <b>CONTACT US</b>
            <em>联系我们</em>
        </div>
    </div>
    <div class="news center connect">
        <div class="connect_l">
            <div><b>投资项目商业计划以及建议</b></div>
            <br/>
            <div>请发邮件至：</div>
            <div><?php echo ($site["service"]); ?></div><br />
            <div>公司地址：</div>
            <div>地址：<?php echo ($site["address"]); ?></div><br />
            <div class="tel">
                电话热线：<b><?php echo ($site["tel"]); ?></b>
            </div>
        </div>
        <div class="connect_r">
            <style type="text/css">
                .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
                .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
            </style>
            <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
            <div style="width:880px;height:456px;border:#f1f1f1 solid 1px;" id="dituContent"></div>
            <script type="text/javascript">
                //创建和初始化地图函数：
                function initMap(){
                    createMap();//创建地图
                    setMapEvent();//设置地图事件
                    addMapControl();//向地图添加控件
                    addMarker();//向地图中添加marker
                }

                //创建地图函数：
                function createMap(){
                    var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                    var point = new BMap.Point(121.477939,31.207642);//定义一个中心点坐标
                    map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
                    window.map = map;//将map变量存储在全局
                }

                //地图事件设置函数：
                function setMapEvent(){
                    map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                    map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                    map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                    map.enableKeyboard();//启用键盘上下左右键移动地图
                }

                //地图控件添加函数：
                function addMapControl(){
                    //向地图中添加缩放控件
                    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
                    map.addControl(ctrl_nav);
                    //向地图中添加缩略图控件
                    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:0});
                    map.addControl(ctrl_ove);
                    //向地图中添加比例尺控件
                    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
                    map.addControl(ctrl_sca);
                }

                //标注点数组
                var markerArr = [{title:"远瞻股权投资管理（上海）有限公司",content:"上海市斜土路768号致远大厦18楼F座",point:"121.477908|31.207526",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
                ];
                //创建marker
                function addMarker(){
                    for(var i=0;i<markerArr.length;i++){
                        var json = markerArr[i];
                        var p0 = json.point.split("|")[0];
                        var p1 = json.point.split("|")[1];
                        var point = new BMap.Point(p0,p1);
                        var iconImg = createIcon(json.icon);
                        var marker = new BMap.Marker(point,{icon:iconImg});
                        var iw = createInfoWindow(i);
                        var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
                        marker.setLabel(label);
                        map.addOverlay(marker);
                        label.setStyle({
                            borderColor:"#808080",
                            color:"#333",
                            cursor:"pointer"
                        });

                        (function(){
                            var index = i;
                            var _iw = createInfoWindow(i);
                            var _marker = marker;
                            _marker.addEventListener("click",function(){
                                this.openInfoWindow(_iw);
                            });
                            _iw.addEventListener("open",function(){
                                _marker.getLabel().hide();
                            })
                            _iw.addEventListener("close",function(){
                                _marker.getLabel().show();
                            })
                            label.addEventListener("click",function(){
                                _marker.openInfoWindow(_iw);
                            })
                            if(!!json.isOpen){
                                label.hide();
                                _marker.openInfoWindow(_iw);
                            }
                        })()
                    }
                }
                //创建InfoWindow
                function createInfoWindow(i){
                    var json = markerArr[i];
                    var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
                    return iw;
                }
                //创建一个Icon
                function createIcon(json){
                    var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
                    return icon;
                }

                initMap();//创建和初始化地图
            </script>
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
                    全国服务热线：<?php echo ($site["tel"]); ?>
                </div>
                <!--版权信息-->
                <div>
                    COPYRIGHT © 远瞻股权投资管理（上海）有限公司
                </div>
                <!--友情链接-->

                <div class="flink"><span>友情链接：</span><?php $__m_link=M("link");$__link_list=$__m_link->where('display=1')->order('sort DESC')->limit()->select();foreach($__link_list as $_lk=>$_lv):extract($_lv);?><a href="<?php echo ($link); ?>" <?php if($target == 2): ?>target='_blank'<?php endif; ?> title="<?php echo ($title); ?>"><?php echo ($title); ?></a><span>|</span><?php endforeach; ?><a href="#" target="_blank">九口袋网络</a></div>
                <!--统计代码-->
                <div><?php echo ($site["tongji"]); ?></div>
            </div>

            <div class="footer_r">
                <ul>
                    <?php if(is_array($ad_info)): $i = 0; $__LIST__ = $ad_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <span><img src="/yuanzhan/Uploads/picture/<?php echo ($vo["ad_img"]); ?>" alt="<?php echo ($vo["ad_name"]); ?>"/></span>
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
                layer: '/yuanzhan/Public/Home/js/../layer/layer'
            },
            preload : ['jq','jslide','layer']
        });
        seajs.use('main');
    </script>
</body>
</html>