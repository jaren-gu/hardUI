/**
 *  jQuery Awesome 1.0.0
 *
 *  Form.js
 *
 *  @author: cpChen
 */
(function($) {
    $.fn.form = function (obj, opt) {
        //判断执行的操作是：1、初始化组件 还是 2、调用方法
        if (typeof(obj) == "string") {
            //执行方法
            return $.fn.form.methods[obj](this, opt);
        }
        return this.each(function(){
            optCons(this, obj);
            binding(this);
        });
    };
    $.fn.form.methods = {
        submit: function(jq, opt) {
            return jq.each(function(){
                valid(this, opt);
            });
        },
        load: function(jq, data) {
            return jq.each(function(){
                _load(this, data);
            });
        },
        clear: function(jq) {
            return jq.each(function() {
                _clear(this);
            });
        },
        validate: function(jq) {
            //TODO 待定，等肥仔的validatebox
            return  _validate(jq[0]);
        }
    };
    $.fn.form.parseOptions = function (obj) {
        var t = $(obj);
        return $.extend({}, $.parser.parseOptions(obj, [{
            ajax: "boolean"
        }]), {
            url: (t.attr("action") ? t.attr("action") : undefined)
        });
    };
    $.fn.form.defaults = {
        novalidate: false,
        ajax: true,
        url: null,
        queryParams: {},
        onSubmit: function(obj) {
            return $(this).form("validate");
        },
        success: function(obj) {},
        onLoadError: function() {},
        onChange: function(_47) {}
    };
    
    /**
     * 组件属性构造器 —— Options Constructor 
     */
    function optCons(obj, opt) {
        opt = opt || {};
        var _data = $.data(obj, "form");
        if(_data){
            $.extend(_data.options, opt);
        } else {
            $.data(obj, "form", {
                options: $.extend({}, $.fn.form.defaults, $.fn.form.parseOptions(obj), opt)
            });
        }
    }
    
    /**
     * 绑定事件
     */
    function binding(obj) {
        var _options = $.data(obj, "form").options;
        $(obj).unbind(".form");
        if(_options.ajax) {
            $(obj).bind("submit.form", function(){
                setTimeout(function() {
                    
                    valid(obj, _options);
                }, 0);
                return false;
            });
        }
        $(obj).bind("_change.form", function(e, t) {
                _options.onChange.call(this, t);
            }).bind("change.form", function(e) {
                var t = e.target;
                if(!$(t).hasClass("textbox-text")) {
                    _options.onChange.call(this, t);
                }
        });
        //TODO
    }
    
    /**
     * 校验操作
     */
    function valid(obj, opt) {
        var _options = $.data(obj, "form").options; // 获取form 的options
        $.extend(_options, opt || {});
        var _qp = $.extend({}, _options.queryParams);
        
        // 通过onSubmit()进行校验form表单
        if(_options.onSubmit.call(obj, _qp) == false) {
            return;
        }
        $(obj).find(".textbox-text:focus").blur(); // 令form内所有 input 失焦
        
        // 构建一个<iframe></iframe>，
        var frameId = "as_frame_" + (new Date().getTime());
        var _frame = $("<iframe id=" + frameId + " name=" + frameId + "></iframe>").appendTo("body");
        _frame.attr("src", window.ActiveXObject ? "javascript:false": "about:blank");
        _frame.css({
            position: "absolute",
            top: -1000,
            left: -1000
        });
        
        // iframe绑定jquery"load"事件
        _frame.bind("load", _callBak);
        _invoke(_qp);
        
        function _invoke(params) {
            
            var _jq = $(obj); // $(this)
            var _target = _jq.attr("target"); // 存储待用
            
            // 更新url
            if (_options.url) {
                _jq.attr("action", _options.url);
            }

            a = _jq.attr("action"); // 存储待用
            _jq.attr("target", frameId); 
            
            try{
                // 遍历queryParams参数，分别创建name为queryParams的隐藏域，add到jq对象中
                // 判断<iframe>的请求状态，如果redayState为null或未初始化(uninitialized)，则循环执行这一步直到redayState有返回值为止
                for (var n in params) {
                    var _c = $("<input type=\"hidden\" name=\"" + n + "\">").val(params[n]).appendTo(_jq);
                }
                
                _cl();
                
                // $(this)提交，注意：target为<iframe>
                // form里面定义了target的值为iframe的ID，提交该form的时候，返回来的页面就会在iframe中显示了。
                _jq[0].submit();

            } finally {
                _jq.attr("action", a);
                _target ? _jq.attr("target", _target) : _jq.removeAttr("target");
            }
        }
        
        function _cl() {
            var f = $("#" + frameId);
            if (!f.length) {
                return;
            }
            try {
                var s = f.contents()[0].readyState;
                if (s && s.toLowerCase() == "uninitialized") {
                    setTimeout(_d, 100);
                }
            } catch(e) {
                _callBak();
            }
        }
        
        function _callBak() {
            var _f = $("#" +  frameId);
            var i = 10;
            if (!_f.length) return;
            
            _f.unbind();
            var _fVal = "";
            try {
                var _fbody = _f.contents().find("body");
                _fVal = _fbody.html();
                if (_fVal == "") {
                    if (--i) {
                        setTimeout( _callBak, 100);
                        return;
                    }
                }
                var ta = _fbody.find(">textarea");
                if (ta.length) {
                    _fVal = ta.val();
                } else {
                    var pre = _fbody.find(">pre");
                    if (pre.length) {
                        _fVal = pre.html();
                    }
                }
            } catch(e) {
                //TODO
            }
            _options.success(_fVal);
            setTimeout(function(){
                _f.unbind();
                _f.remove();
            }, 100);
        }
    }
    
    /***************************
            事件function
    ***************************/
    /**
     * 加载记录来填充表单
     * @param jq 该表单对象
     * @param data 参数可以是一个字符串或者对象类型，字符串作为一个远程 URL，否则作为一个本地记录。
     */
    function _load(jq, data) {
        var _opt = $.data(_12, "form").options;
        if (typeof _13 == "string") {
            $.ajax({
                url: data,
                dataType: "json",
                success: function(_arr) {
                    _loadData(_arr);
                },
                error: function() {
                    //TODO
                }
            });
        } else {
            _loadData(data);
        }
        
        function _loadData(_data){
            var _jq = $(jq);
            for (var _d in _data) {
                var val = _data[_1a];
                if (!_chk_radio(_d, val)) {
                    _jq.find('input[name="' + _d + '"]').val(val);
                    _jq.find('textarea[name="' + _d + '"]').val(val);
                    _jq.find('select[name="' + _d + '"]').val(val);
                }
            }
        }
        
        function _chk_radio(_n, val) {
            var _obj = $(_n).find('input[name="' + _n + '"][type=radio], input[name="' + _n + '"][type=checkbox]');
            if (_obj.length) {
                _obj._propAttr("checked", false);
                _obj.each(function() {
                    var f = $(this);
                    if (f.val() == String(val) || $.inArray(f.val(), $.isArray(val) ? val: [val] >= 0)) {
                        f._propAttr("checked", true);
                    }
                });
                return true;
            }
            return false;
        }
    }

    /**
     * 清除表单数据 
     */
    function _clear(obj) {
        $("input,select,textarea", obj).each(function(){
            var t = this.type;
            tag = this.tagName.toLowerCase();
            if(t == "text" || t == "hidden" || t == "password" || tag == "textarea") {
                this.value = "";
            } else {
                if (t == "file") {
                    //TODO 对file类型的组件进行处理
                } else {
                    if(t == "checkbox" || t == "radio") {
                        this.checked = false;
                    }else {
                        if(tag == "select") {
                            this.selectedIndex = -1;
                        }
                    }
                }
            }
        });
    }

    /**
     * 进行表单字段验证
     */
    function _validate(obj) {
        if ($.fn.validatebox) {
            var t = $(obj);
            t.find(".as-validatebox:not(disabled)").validatebox("validate"); //调用validatebox.js中的validate方法
            var _invalid = t.find(".has-error").children("input"); //找出未被通过的validatebox
            _invalid.filter(":not(:disabled):first").focus(); //在未被通过的validatebox中，挑选第一个，设为focus
            return _invalid.length == 0;
        }
        return true;
    }
    
})(jQuery);