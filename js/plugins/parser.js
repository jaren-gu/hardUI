/**
 * jQuery Awesome 1.0.0
 *
 * To use it on other terms please contact us at TODO 增加email
 *
 * @author cpChen 2015-09-22
 */

/**
  * 此模块主要是解析页面中Awesome的控件
  */
(function ($) {
    $.parser = {
        
        // 是否自动解释
        auto: true,
        onComplete: function (_1) {},
        
        // 可以被解释的控件
        plugins: ["form", "calendar", "validatebox", "datatable","pagination","combobox"],
        
        // 解释函数——自动解释用
        parse: function (context) {
            for (var i = 0; i < $.parser.plugins.length; i++) {
                var name = $.parser.plugins[i]; // 控件名
                var r = $(".as-" + name, context); // 查找class为as-控件名的jq对象，例如，easyui-layout
                
                if (r.length) {
                    
                    // 如果有这个对象，那么判断它有没有初始化函数，即是否存在此组件构造
                    if(r[name]){
                        
                        // 如果有直接调用
                        r[name]();
                    }else{
                        // TODO 临时用下工发布需删除，提示使用者
                        alert("请检查是否没有引入" + name + "组件*.js？");
                    }
                }
            }
            $.parser.onComplete.call($.parser, context);
        },
        
        // 解释函数——组件用
        parseOptions: function(domObj, opt){
            var t = $(domObj); // 将dom对象转为jq对象
            var _d = {}; // 最终筛选组合的plugin属性
            var s = $.trim(t.attr("data-options")); // 获取data-options
            
            //对获取到的data-options值,如"url:'www.baidu.com',width:250px"，由字符串转为函数对象{url:'www.baidu.com',width:250px}
            if (s) {
                if (s.substring(0,1) != "{") {
                    s = "{" + s + "}"
                }
                _d = (new Function("return " + s ))();
            }
            
            if (opt) {
                var _e = {};
                for (var i = 0; i < opt.length; i++) {
                    var pp = opt[i];
                    if (typeof pp == "string") {
                        _e[pp] = t.attr(pp);
                    } else {
                        for (var _f in pp) {
                            var _10 = pp[_f];
                            if (_10 == "boolean") {
                                _e[_f] = t.attr(_f) ? (t.attr(_f) == "true") : undefined;
                            } else {
                                if (_10 == "number") {
                                    _e[_f] = t.attr(_f) == "0" ? 0 : parseFloat(t.attr(_f)) || undefined;
                                }
                            }
                        }
                    }
                }
                $.extend(_d, _e);
            }
            
            return _d;
        }
    };
    
    /**
      * 自动加载parse()
      */
    $(function(){
        // 每次页面加载完都会执行
        if($.parser.auto) $.parser.parse();
    });
    
    /**
      * 万金油 prop() || attr()
      * 由于浏览器兼容性和jq的版本问题，如 checked, selected 或者 disabled 使用prop()，其他的使用 attr()
      */
    $.fn._propAttr = $.fn.prop || $.fn.attr;
    
})(jQuery);