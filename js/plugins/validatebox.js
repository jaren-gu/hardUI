/**
 *  jQuery Awesome 1.0.0
 *
 *  Validatebox.js
 *
 *  @author: 罗成坤（2015-10-14）
 */
(function($) {
    $.fn.validatebox = function (obj, opt) {
        //判断执行的操作是：1、初始化组件 还是 2、调用方法
        if (typeof obj == "string") {
            //执行方法
            return $.fn.validatebox.methods[obj](this, opt);
        }
        //避免obj未定义出现错误
        obj = obj || {};
        return this.each(function () {
            //获取validatebox对象的属性值
            var data =  $.data(this,"validatebox");
            //判断validatebox是否已定义：1.定义：直接合并options获取最新值 2.未定义：初始化options获取最新值
            if (data) {
                $.extend(data.options, obj);
            }else{
                //alert(JSON.stringify(obj))
                $.data(this,"validatebox",{
                    options: $.extend({},$.fn.validatebox.defaults,$.fn.validatebox.parseOptions(this),obj)
                });
            }
            bindEvents(this);
        });
    };
    //定义构造方法
    $.fn.validatebox.methods = {
        isValid: function(obj){
            return obj.each(function(){
                onValidate(this);
            });
        },
        validate: function(obj){
            obj.each(function(){
                onValidate(this);
            });
        }
    };
    $.fn.validatebox.parseOptions = function (obj) {
        var t = $(obj);
        return $.extend(
            {},
            $.parser.parseOptions(obj,["validType","missingMessage","invalidMessage"]),
            { required:(t.attr("required") ? true : undefined) }
        );
    };

    //默认属性
    $.fn.validatebox.defaults ={
        required: true,
        missingMessage: "必填，不可为空！",
        invalidMessage: null,
        validType: null,
        addRule: null, //自定义规则，格式为｛text:validType,rule:自定义验证方法（必须返回验证结果true/false）,message:错误信息｝
        events: {
            blur: _blur,
            mouseenter: _mEnter ,
            mouseleave: _mLeave
        },
        rules: {
            email: {
                validator: function(_3a){
                    return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(_3a);
                },
                message:"请输入正确的邮箱地址!"
            },
            length: {
                validator: function(_3c, _3d){
                    var len = $.trim(_3c).length;
                    return len >= _3d[0] && len <= _3d[1];
                },
                message: "请输入正确的字符长度!"
            },
            mobile:{
                validator:function(e){
                    return /^[0-9]*[1-9][0-9]{10}$/.test(e);
                },
                message:"请输入正确的手机号码!"
            },
            password:{
                validator:function(e){
                    return /^[^\u4e00-\u9fa5\s]{6,12}$/.test(e);
                },
                message:"请输入6-12位非中文非空字符！"
            }
        },
        onBeforeValidate: function() {},
        onValidate: function(_42) {}
    };

    /*
     * 绑定触发事件事件
     * */
    function bindEvents(obj){
        var _opt = $.data(obj,"validatebox").options;
        var _avb = $(obj);
        //移除_avb绑定的事件，避免出现重复绑定出现错误
        _avb.unbind(".validatebox");
        //判断该对象是否可操作的
        if(_avb.is(":disabled")){
            return;
        }
        //为_avb绑定events对象的触发函数
        for(var _a in _opt.events){
            _avb.bind(_a + ".validatebox",{target:obj},_opt.events[_a]);
        }
    }

    /*
     * 触发事件blur
     *
     * */
    function _blur(e){
        //获取当前触发函数的对象
        var _obj = e.data.target;
        var _avb = $(_obj);
        if(_avb.attr("readonly")){
            return;
        }
        //前往验证函数
        _avb.validatebox("isValid");
    }

    /*
     * 触发事件mouseenter
     * */
    function _mEnter(e){
        var _obj = e.data.target;
        var _avb = $(_obj);
        if(_avb.parent().hasClass("has-error")){
            _avb.addClass("gui-input");
        }
    }

    /*
     * 触发事件mouseleave
     * */
    function _mLeave(e){
        var _obj = e.data.target;
        var _avb = $(_obj);
        if(_avb.parent().hasClass("has-error")){
            _avb.removeClass("gui-input");
        }
    }

    /*
     *验证函数
     * */
    function onValidate(obj){
        var _vb = $.data(obj,"validatebox");
        var _opt = _vb.options;
        var _obj = $(obj);

        var result = checkOpt();
        return result;

        function message(msg){
            _vb.message = msg;
        }

        //验证options属性
        function checkOpt(){
            //移除错误样式(移除错误提示信息)
            if($(obj).parent().hasClass("has-error")){
                rmClass(obj);
            }
            //调用删除提示信息函数 TODO
            if(_obj.is(":disabled")){
                return true;
            }
            //对required属性进行判定
            if(_opt.required){
                if(_obj.val() == ""){
                    if($(obj).parent().hasClass("has-success")){
                        rmPassClass(obj);
                    }

                    //设置错误提示
                    message(_opt.missingMessage);
                    //添加错误样式
                    adClass(obj);

                    //调用触发显示提示信息函数 TODO

                    return false;
                }
            }
            if(_opt.addRule && typeof _opt.addRule == "object"){
                if(typeof _opt.addRule.rule != "function"){
                    return true;
                }
                var rules = {};
                var rule = "{validator:" + _opt.addRule.rule + ",message: '" + _opt.addRule.message + "'}";
                var typeText = "{" + _opt.addRule.text + ":" + rule + "}";

                rules = (new Function("return " + typeText ))();
                _opt.rules = $.extend({},_opt.rules,rules);
            }
            if(_opt.validType){
                //判断validType：1.数组 2.其它
                if($.isArray(_opt.validType)){                //validType为数组
                    for(var i=0; i < _opt.validType.length; i++){
                        if(!validating(_opt.validType[i])){
                            return false;
                        }
                    }
                }else{
                    if(typeof _opt.validType == "string"){    //validType为string
                        if(!validating(_opt.validType)){
                            return false;
                        }
                    }else{
                        for(var _a in _opt.validType){
                            var _b = _opt.validType[_a];
                            if(!validating(_a,_b)){
                                return false;
                            }
                        }
                    }
                }
            }
            return true;
        }

        //输入值正则验证
        function validating(_a ,_b){
            //获取当前对象的输入值
            var _vbValue = _obj.val();
            var _2c = /([a-zA-Z_]+)(.*)/.exec(_a);
            //获取验证规则
            var _rules = _opt.rules[_2c[1]];
            //确保_vbValue和_rules存在，避免发生错误
            if(_vbValue && _rules){
                var _2e = _b || eval(_2c[2]);
                if(!_rules["validator"].call(obj,_vbValue,_2e)){

                    //获取验证错误的提示信息
                    var _message = _rules["message"];
                    if (_2e) {
                        for (var i = 0; i < _2e.length; i++) {
                            _message = _message.replace(new RegExp("\\{" + i + "\\}", "g"), _2e[i]);
                        }
                    }
                    //设置提示信息
                    message(_opt.invalidMessage || _message);
                    //移除验证通过样式
                    if($(obj).parent().hasClass("has-success")){
                        rmPassClass(obj);
                    }
                    //添加错误样式
                    adClass(obj);
                    return false;
                }
                //添加验证通过样式
                adPassClass(obj);
            }
            return true;
        }
    }

    /*
     * 添加错误样式
     * */
    function adClass(obj){
        var _obj = $(obj);
        _obj.parent().addClass("has-error");
        if(_obj.parent().children().length < 2){
            _obj.before("<span class='as-append-icon right'> <i class='fa fa-remove'></i> </span>");
            _obj.after("<b class='tooltip tip-right'> <em></em> </b>");
            var _vbMessage = $.data(obj,"validatebox").message;
            _obj.next().children()[0].innerHTML = _vbMessage;
        }
    }

    /*
     * 移除错误样式
     * */
    function rmClass(obj){
        var _obj = $(obj);
        _obj.parent().removeClass("has-error");
        if(_obj.parent().children().length >= 2 && _obj.prev().has("as-append-icon")){
            _obj.prev().remove();
            _obj.next().remove();
        }
    }

    /*
     * 添加验证通过样式
     * */
    function adPassClass(obj){
        var _obj = $(obj);
        _obj.parent().addClass("has-success");
        if(_obj.parent().children().length < 2){
            _obj.before("<span class='as-append-icon right'> <i class='fa fa-check'></i> </span>");
        }
    }

    /*
     * 移除验证通过样式
     * */
    function rmPassClass(obj){
        var _obj = $(obj);
        _obj.parent().removeClass("has-success");
        if(_obj.parent().children().length >= 2 && _obj.prev().has("as-append-icon")){
            _obj.prev().remove();
        }
    }

})(jQuery);
