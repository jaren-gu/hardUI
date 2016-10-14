(function($){
    $.fn.modal = function(opt,data){
        if(typeof opt == "string"){
           return $.fn.modal.methods[opt](this,data);
        }
        opt = opt || {};
        return this.each(function(){
            var _data = $.data(this,"modal");
            if(_data){
                $.extend(_data.options,opt)
            }else{
                $.data(this,"modal",{
                    options: $.extend({}, $.fn.modal.defaults, $.fn.modal.parseOptions(this),opt)
                });
                renderModal(this);
            }
        });
    };
    $.fn.modal.methods = {};
    $.fn.modal.parseOptions = function(obj){
        return $.extend({},
            $.parser.parseOptions(obj)
        );
    };
    $.fn.modal.defaults = {};
    //渲染模态框
    function renderModal(obj){
        var body = $("body");
        var _obj = $(obj);
        var opt = $.data(obj,"modal").options;

        opt.wrap = $("<div class='mfp-wrap animated flipInY' tabindex='-1' style='overflow-x: hidden;overflow-y: auto'></div>").prependTo(body);

        opt.container = $("<div class='mfp-container'></div>").prependTo(opt.wrap);
        opt.content = $("<div class='mfp-content'></div>").prependTo(opt.container);
        opt.basic = $("<div class='popup-basic admin-form mfp-with-anim'></div>").prependTo(opt.content);
        _obj.prependTo(opt.basic).css("display","block");
        opt.close = $("<button class='mfp-close' type='button' title='Close'>×</button>").appendTo(opt.basic);

        body.css("overflow-y","hidden");

        opt.loading = $("<div class='mfp-bg'></div>").prependTo(body);

        opt.close.bind("click",{target:obj,option:opt},removeModal);

        $(obj).bind("click",function(event) {
            if (event && event.stopPropagation) {
                event.stopPropagation();
            } else {
                event.cancelBubble = true;
            }

        });

        opt.wrap.one("click",{target:obj,option:opt},removeModal);
    }
    //隐藏模态框
    function removeModal(e){
        var obj = e.data.target;
        var opt = e.data.option;
        var body = $("body");
        opt.wrap.remove();
        opt.loading.remove();
        $(obj).appendTo(body).css("display","");
        body.css("overflow-y","");
    }


})(jQuery);
