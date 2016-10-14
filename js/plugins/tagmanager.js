/**
 * Created by lonntec on 2016/2/29.
 */
(function ($) {
    $.fn.tagmanager = function(opt,data){
        if (typeof(opt) == "string") {
            //执行方法
            return $.fn.pnotify.methods[opt](this, data);
        }
        opt = opt || {};
        return this.each(function(){
            var _data = $.data(this,"tagmanager");
            if(_data){
                $.extend(_data.options,opt);
            }else{
                $.data(this,"tagmanager",{
                    options: $.extend({}, $.fn.tagmanager.defaults, $.fn.tagmanager.parseOptions(this),opt)
                });
                bindEvent(this);
            }
        });
    };
    $.fn.tagmanager.methods = {};
    $.fn.tagmanager.parseOptions = function(obj){
        var t = $(obj);
        return $.extend({},
            $.parser.parseOptions(obj)
        );
    };
    $.fn.tagmanager.defaults ={
        name: null,
        color: null,
        styles: {
            info: 'tm-tag-info',
            primary: 'tm-tag-primary',
            success: 'tm-tag-success',
            warning: 'tm-tag-warning',
            danger: 'tm-tag-danger',
            alert: 'tm-tag-alert',
            system: 'tm-tag-system'
        }
    };
    //绑定enter触发事件
    function bindEvent(obj){
        var _obj = $(obj);
        var _opt = $.data(obj,"tagmanager").options;
        _obj.on("keydown",function(e){
            if(e.which == 13){
                _opt.name = _obj.attr('id');
                _opt.value = $.trim(_obj.val());
                if(_opt.value.length == 0){
                    _obj.val('');
                    return;
                }
                if(_obj.parent().children().length < 3){ renderInput(_obj,_opt);}
                if(_obj.parent().children('input').length > 2){return;}
                changeValue(_obj,_opt);
            }
        });
    }
    //渲染input隐藏框和tag区域
    function renderInput(obj,opt){
         opt.input = $("<input />",{
            type: "hidden",
            name: opt.name
        }).appendTo(obj.parent());
        opt.elem = $("<div />",{
            class: "tag-container tags"
        }).appendTo(obj.parent());
    }
    //渲染tag及绑定移除事件
    function renderTag(obj,opt){
        opt.container = $("<span />",{
            class: "tm-tag " +
            (opt.color === "info" ? opt.styles.info :
            (opt.color === "primary" ? opt.styles.primary :
            (opt.color === "success" ? opt.styles.success :
            (opt.color === "danger" ? opt.styles.danger :
            (opt.color === "warning" ? opt.styles.warning :
            (opt.color === "alert" ? opt.styles.alert :
            (opt.color === "system" ? opt.styles.system : opt.styles.info)))))))
        }).appendTo(obj.parent().children("div"));
        opt.tag_name = $("<span />").appendTo(opt.container).text(opt.value);
        opt.tag_delete = $("<a />",{
            href: "javascript:void(0)",
            class: "tm-tag-remove"
        }).appendTo(opt.container).text('x');
        opt.tag_delete.bind("click",{target:opt.tag_delete},deleteTag);
    }
    //添加tag操作
    function changeValue(obj,opt){
        opt.input_value = obj.next('input').val();
        if(opt.input_value){
            var values = opt.input_value.split(',');
            for(var i=0;i<values.length;i++){
                if(values[i] == opt.value){
                    obj.val('');
                    return;
                }
            }
            obj.next('input').val(opt.input_value + ',' + opt.value);
        }else{
            obj.next('input').val(opt.value);
        }
        renderTag(obj,opt);
        obj.val('');
    }
    //删除tag操作
    function deleteTag(e){
        var tag_a = e.data.target;
        var tag_value = tag_a.prev().text();
        var input_value = tag_a.parent().parent().prev('input').val();
        var values = input_value.split(',');
        for(var i=0;i<values.length;i++){
            if(values[i] == tag_value){
                values = $.grep(values,function(n,i){
                    return n != tag_value;
                });
                break;
            }
        }
        if(values.length > 1){
            tag_a.parent().parent().prev('input').val(values.join(','));
        }else{
            tag_a.parent().parent().prev('input').val(values[0]);
        }
        tag_a.parent().remove();
    }

})(jQuery);