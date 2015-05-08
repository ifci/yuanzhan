/**
 * Created by Administrator on 2015/5/6.
 */
"use strict";
define(function (require, exports, module) {
    (function($){
        $.fn.extend({
            // coffee����,�¼�����
            coffee: function (obj) {
                for (var eName in obj)
                    for (var selector in obj[eName])
                        $(this).on(eName, selector, obj[eName][selector]);
            },
            // ���ض���
            bTop: function () {
                this.click(function () {
                    $("html,body").stop(true).animate({scrollTop: 0}, 200);
                });
            },
            layer: function(opts){
                var defaults = {
                    v: '0.0.1',
                    trigger : 'click',
                    type: 'msg'
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
                                html: '<div class="alertTip"><p class="tips">��ʾ��' + module + '</p><a class="sure" href="javascript:;">ȷ��</a><a class="cancel" href="javascript:;">ȡ��</a></div>',
                                id: 'layer'
                            }).appendTo('body');
                            $('#layer,.alertTip').show();
                            $('.cancel,.sure').on('click', function(){
                                $('#layer').remove();
                            })
                            $('.sure').click(callback);
                        }
                    };
                    $(this).on(options.trigger, function(){
                        Func();
                    })
                });
            }
        });
        //������Ч��
        /*window.layer = {
         v: '0.0.1',
         //����ģ��
         msg: function(module, callback){
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
         },
         confirm: function(module, callback){
         $('<div>',{
         html: '<div class="alertTip"><p class="tips">��ʾ��' + module + '</p><a class="sure" href="javascript:;">ȷ��</a><a class="cancel" href="javascript:;">ȡ��</a></div>',
         id: 'layer'
         }).appendTo('body');
         $('#layer,.alertTip').show();
         $('.cancel,.sure').on('click', function(){
         $('#layer').remove();
         })
         $('.sure').click(callback);
         }
         }*/
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

        $(".video_list li").layer({
            type : 'confirm'
        });
    })
});