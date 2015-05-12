/**
 * Created by Administrator on 2015/5/6.
 */
"use strict";
define(function (require, exports, module) {
    (function($){
        $.fn.extend({
            // coffee方法,事件管理
            coffee: function (obj) {
                for (var eName in obj)
                    for (var selector in obj[eName])
                        $(this).on(eName, selector, obj[eName][selector]);
            },
            // 返回顶部
            bTop: function () {
                this.click(function () {
                    $("html,body").stop(true).animate({scrollTop: 0}, 1000);
                });
            },
            bNext: function(){
                this.click(function(){
                    var top = $(this).offset().top;
                    $("html,body").stop(true).animate({scrollTop: top}, 800, 'easeOutCubic');
                })
            }
            /*layer: function(opts){
                var defaults = {
                    v: '0.0.1',
                    trigger : 'click',
                    type: 'msg',
                    shade: [0.3, '#000'],  //弹出遮罩层，默认#000，透明度0.3，关闭为false
                    scrollbar: true
                }, options = $.extend(defaults, opts);
                return this.each(function(){
                    var Func;
                    if(options.type === 'msg'){
                        Func = function(module, callback){
                            if($('#layer').length < 1){
                                $('<div id="layer"><span>' + module + '</span></div>').appendTo('body');
                                var law = $("#layer span").width()/2;
                                var lah = $("#layer span").height()/2;
                                $("#layer span").css({'margin-left':-law,'margin-top':-lah});
                                var set = setInterval(function(){
                                    clearInterval(set);
                                    $("#layer").remove();
                                },3000)
                            }
                            $('#layer').on('click',function(){
                                $(this).remove();
                            })
                        }
                    }else if(options.type === 'confirm'){
                        Func = function(module, callback){
                            $('<div>',{
                                html: '<div class="alertTip"><p class="tips">提示：' + module + '</p><a class="sure" href="javascript:;">确定</a><a class="cancel" href="javascript:;">取消</a></div>',
                                id: 'layer'
                            }).appendTo('body');
                            $('#layer,.alertTip').show();
                            $('.cancel,.sure').on('click', function(){
                                $('#layer').remove();
                            })
                            $('.sure').click(callback);
                        }
                    }else if(options.type === 'page'){
                        Func = function(module, callback) {

                        }
                    }

                    //弹出层效果
                    var shade = options.shade ? $('<div class="layer-shade" id="layer-shade" style="opacity:'+ (options.shade[0]||options.shade) +'; filter:alpha(opacity='+ (options.shade[0]*100||options.shade*100) +');background-color:'+ (options.shade[1]||'#000') +';"></div>') : '';

                    //浏览器滚动条
                    options.scrollbar ? $('body').css('overflow', 'hidden') : '';

                    $(this).on(options.trigger, function(){
                        shade.appendTo('body');
                        Func();
                    })
                });
            }*/
        });
    })(jQuery);
    $(function(){
        $('#banner').slide({
            mainCell:".bd ul",
            autoPlay:true,
            delayTime:1000,
            autoPage:true,
            titCell:".hd ul",
            effect: "fold"
        });

        $(".video_list li,.vlist li").click(function(){
            var index = layer.load(1, {shade: ['.5','#000'], scrollbar: false});
            var url = $(this).data('url');
            setTimeout(function(){
                layer.close(index);
                layer.open({
                    type: 2,
                    title: false,
                    area: ['630px', '360px'],
                    shade: 0.5,
                    closeBtn: 1,
                    shadeClose: true,
                    content: url
                });
            }, 1000);
        });

        /*新闻详情页*/
        $(".zoom em").on('click', function(){
            var $index = $(this).index();
            var txt = $('.news_con .txt');
            var fz = parseInt(txt.css('font-size'));
            if($index === 0 && fz > 12){
                txt.css('font-size', fz - 2);
            }else if($index === 1 && fz < 20){
                txt.css('font-size', parseInt(fz) + 2);
            }
        });
        $(".bnext").bNext();
    })
});