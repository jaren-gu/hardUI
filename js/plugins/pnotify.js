/**
 * Created by lonntec on 2016/2/22.
 */
(function($){
    $.fn.pnotify = function(obj,opt){
        if (typeof obj == "string") {
            //执行方法
            return $.fn.pnotify.methods[obj](this, opt);
        }
        obj = obj || {};
        return this.each(function(){
            var _data = $.data(this,"pnotify");
            if(_data){
                $.extend(_data.options,obj);
            }else{
                $.data(this,"pnotify",{
                    options: $.extend({}, $.fn.pnotify.defaults, $.fn.pnotify.parseOptions(this),obj)
                });
                bindEvent(this);
            }
        });
    };
    $.fn.pnotify.methods = {};
    $.fn.pnotify.parseOptions = function(obj){
        var t = $(obj);
        return $.extend({},
            $.parser.parseOptions(obj)
        );
    };
    $.fn.pnotify.defaults = {
        title: null,
        text: null,
        width: '100%',
        min_height: '70px',
        stack: 'top',
        type: null,
        isOpen:true,
        addClass: {
            elem:{
                "display": "none",
                "height": "auto",
                "opacity": "1",
                "overflow": "visible"
            },
            bottom:{
                "top": "auto",
                "bottom":"0px",
                "right": "auto",
                "left":"0px",
                "margin-bottom": "15px"
            },
            top:{
                "top": "0px",
                "bottom":"auto",
                "right": "auto",
                "left":"0px"
            }
        },
        styling:{
            container: "alert",
            notice: "alert-default",
            error: "alert-danger",
            primary: "alert-primary",
            info: "alert-info",
            success: "alert-success",
            warning: "alert-warning",
            danger: "alert-danger",
            alert: "alert-alert",
            system: "alert-system",
            dark: "alert-dark"
        }
    };

    function bindEvent(obj){
        var ptf = $(obj);
        if(ptf.is(':disabled')){
            return;
        }
        ptf.unbind('.pnotify').bind('click.pnotify',{target:obj},init);
    }

    function init(e){
        var obj = e.data.target;
        var opt = $.data(obj,'pnotify').options;

        opt.elem = $("<div />",{
            "class":  "ui-pnotify ",
            "css": $.extend({},opt.addClass.elem,(opt.stack === "bottom" ? opt.addClass.bottom : opt.addClass.top))
        });
        opt.container = $("<div />",{
            "class":
                opt.styling.container +" ui-pnotify-container "+
                (opt.type === "error" ? opt.styling.error :
                (opt.type === "primary" ? opt.styling.primary :
                (opt.type === "info" ? opt.styling.info :
                (opt.type === "success" ? opt.styling.success :
                (opt.type === "warning" ? opt.styling.warning :
                (opt.type === "danger" ? opt.styling.danger :
                (opt.type === "alert" ? opt.styling.alert :
                (opt.type === "system" ? opt.styling.system :
                (opt.type === "dark" ? opt.styling.dark : opt.styling.notice)))))))))
        }).appendTo(opt.elem);

        opt.title_container = $("<h4 />", {
            "class": "ui-pnotify-title"
        }).appendTo(opt.container);
        if(opt.title == false){
            opt.title_container.hide();
        }else{
            opt.title_container.text(opt.title);
        }
        opt.text_container = $("<div />", {
            "class": "ui-pnotify-text"
        }).appendTo(opt.container);
        if(opt.text){
            opt.text_container.text(opt.text);
        }else{
            return;
        }
        if (typeof opt.width === "string")
            opt.elem.css("width", opt.width);
        if (typeof opt.min_height === "string")
            opt.container.css("min-height", opt.min_height);

        opt.elem.appendTo($("body"));
        var b = opt.elem.fadeIn(600);
        setTimeout(removeElem,3000);

        function removeElem(){
            var a = opt.elem.fadeOut(200);
            a.remove();
            b.remove();
        }
    }

})(jQuery);