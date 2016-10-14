/**
 * jQuery Awesome 1.0.0
 */

/*===============================================
  parser
  此模块主要是解析页面中Awesome的控件
  @auther cpChen
=================================================*/
(function ($) {
    $.parser = {
        
        // 是否自动解释
        auto: true,
        onComplete: function (_1) {},
        
        // 可以被解释的控件
        plugins: ["form", "calendar", "validatebox","datatable","pagination","combobox","pnotify","tagmanager","tab"],
        
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

/*===============================================
  日历
  @auther jaren
=================================================*/
/*
所有命名都采用驼峰命名法(第二个单词起所有首字母大写)

方法及参数无特殊标记
普通变量以 _ 开头              (  例如 : _var  )
全局常量以 _ 开头 以 _ 结束       (  例如 : _var_ )

*/
(function($){

    var Calendar = function(element,options){

        this.calendar = this.getCalendar(element,options);
        
        $(this.calendar).data("element",{input : element});
    }

    Calendar.prototype = {

        constructor : Calendar,


        getCalendar : function(element, options) {

            var _calendar = $($.fn.calendar.template.base);

            var _type = options.type || "picker";

            if(_type == "date" || _type == "picker"){
                var _datapickerDays = this.makeDatapickerDays(element);

                _calendar.find("div.datapicker-days").append(_datapickerDays);  
            }

            if (_type = "timer"  || _type == "picker"){

            }

            $("body").append(_calendar);

            return _calendar;
        },

        makeDatapickerDays : function(element) {

            var _datapickerDays = $($.fn.calendar.template.datapickerDays);

            var _date = this.getDate($(element).val());

            var _body = this.getBody(_date);

            this.setCalendar(_datapickerDays, _date, _body);

            return _datapickerDays;

        },

        setCalendarValue : function(element, date){
            element.prev("input").val(date.year + " - " + (date.month + 1) + " - " + date.day);
        },

        //////////////////////////////////////////////////////////////////////////
        
        getDate : function (time){

            var _date = time || "";
            if (_date){
                _date = _date.split('-');

                if(_date[2] == "undefined"){
                    _date = new Date($.trim(_date[0]),$.trim(_date[1] -1), 1);
                    _date.noSelect = true;  
                }else{
                    _date = new Date($.trim(_date[0]), $.trim(_date[1] -1), $.trim(_date[2]));
                }

                if (_date == "Invalid Date"){
                    _date = new Date();
                }
            }else{
                _date = new Date();
            }

            //年份
            _date.year = _date.getFullYear();
            //月份
            _date.month = _date.getMonth();
            //当月天数
            _date.days = new Date(_date.year, _date.month + 1).getUTCDate();
            //当天
            _date.day = _date.getDate();
            //今天
            _date.today = new Date().getDate();
            //本月
            _date.thisMonth = new Date().getMonth();
            //本年
            _date.thisYear = new Date().getFullYear();

            if(_date.year == _date.thisYear && _date.month == _date.thisMonth){
                _date.isThisMonth = true;
            }

            //当月第一天
            _date.fistWeek = new Date(_date.year, _date.month, 1).getUTCDay();

            if (_date.fistWeek != 6){
                //如果当月不是从周日开始,获取上一个月天数
                _date.lastMonthDays = new Date(_date.year, _date.month).getUTCDate();
            }

            return _date;
        },

        getBody : function (date){

            var _weeks = [];
            var _week = [];
            var _body = $('<tbody></tbody>');

            var _date = date;

            if (_date.fistWeek != 6){
                
                for (_i = 1; _i < 7-_date.fistWeek; _i++){
                    var _day = $('<td class="day">' + _i + '</td>')

                    if(_i == _date.today && _date.isThisMonth){
                        _day.addClass("today");
                    }

                    if(_i == _date.day && !_date.noSelect){
                        _day.addClass("active");
                    }

                    _week.push(_day);
                }

                _weeks.push(_week);
                _week = [];
            }

            for (_i = 6 - _date.fistWeek + 1; _i <= _date.days; _i++){
                
                var _day = $('<td class="day">' + _i + '</td>')
                
                if(_i == _date.today && _date.isThisMonth){
                    _day.addClass("today");
                }

                if(_i == _date.day && !_date.noSelect){
                    _day.addClass("active");
                }

                _week.push(_day);

                if (_week.length == 7){
                    _weeks.push(_week);
                    _week = [];
                }

            }

            if (_week.length){
                _weeks.push(_week);
            }

            //如果当前月一号不是周一
            if (_date.lastMonthDays){
                for (_j = 0; _j <= _date.fistWeek ; _j++){

                    var _day = $('<td class="day prevMonth">' + (_date.lastMonthDays - _j) + '</td>')
                    _weeks[0].unshift(_day)
                }
            }

            //如果最后一周天数少于7天
            if(_weeks[_weeks.length-1].length < 7){
                var _len = 7-_weeks[_weeks.length-1].length
                for (_i = 1;_i <= _len;_i++){
                    var _day = $('<td class="day nextMonth">' + _i + '</td>')
                    _weeks[_weeks.length-1].push(_day);
                }
            }

            for (var _i = 0; _i < _weeks.length; _i++) {
                _weeks[_i] = $('<tr class="week' + _i + '"></tr>').append(_weeks[_i]);
                _body.append(_weeks[_i]);
            };
            
            return _body;
        },

        setCalendar : function (calendar, date, body){
            if (calendar.find("tbody")){
                calendar.find("tbody").remove();
            }

            calendar.find("td.time-text").text(" " + date.year + " - " + (date.month + 1));

            calendar.find("thead").after(body);

            // bindCalendarEvents(calendar);
        },

        //日历选中事件
        selectDay : function (element){

            var _element = $(element.target);

            var _calendar = $(element.target).parents('.as-calendarpicker');;

            _calendar.find("td.active").removeClass("active");

            _element.addClass("active");

            var _time = _calendar.find("td.time-text").text().split('-');

            _time[2] = $.trim(_element.text());

            if (_element.hasClass("prevMonth")) _time[1]--;

            if (_element.hasClass("nextMonth")) _time[1]++;

            _time =  $.trim(_time[0]) + "-" + $.trim(_time[1]) + "-" + $.trim(_time[2]);

            var _date = Calendar.prototype.getDate(_time);

            var _body = Calendar.prototype.getBody(_date);

            Calendar.prototype.setCalendar(_calendar,_date,_body);

            Calendar.prototype.setCalendarValue(_calendar, _date);

            $(_calendar.data("element").input).val(_date.getFullYear() + "-" + (_date.getMonth() + 1) + "-" + _date.getDate());

            $(_calendar).addClass("hide");

        },

        setMonth : function (element,opt){

            var _calendar = $(element.target).parents(".as-calendarpicker");

            var _time = _calendar.find("td.time-text").text().split('-');

            if (opt == "1"){
                _time = _time[0] + "-" + (++_time[1]) + "-" + _time[2];
            }else{
                _time = _time[0] + "-" + (--_time[1]) + "-" + _time[2];
            }       

            var _date = Calendar.prototype.getDate(_time);

            var _body = Calendar.prototype.getBody(_date);

            Calendar.prototype.setCalendar(_calendar,_date,_body);
        },
    }


    function bindCalendarEvents(calendar){

        var _selectDay = Calendar.prototype.selectDay;
        var _setMonth = Calendar.prototype.setMonth;

        $(calendar).unbind(".calendar").bind("click.calendar", function(e){
            var t = toTarget(e.target);
            if (t.hasClass("day")){
                _selectDay(e);
            }else if (t.hasClass("next")){
                _setMonth(e,1);
            }else if (t.hasClass("prev")){
                _setMonth(e,-1);
            }
        })

        function toTarget(element){
            var target = $(element).closest('td');

            if (target.length){
                return target;
            }
            else{
                return $(target);
            }
        }
    }

    //初始化控件
    $.fn.calendar = function(options,params){

        //如果传入是一个字符串,执行相应函数
        if (typeof options == "string"){
            return $.fn.calendar.methods[options](this, params);
        }

        //保证 options 不为 undefined
        options = options || {};
        
        return this.each(function(){
            
            //获取已有属性
            var _data = $.data(this,"options");

            if (_data){
                $.extend(_data.options, options);
            }else{
                //拼接配置参数
                _data = $.extend({},$.fn.calendar.defaults,$.fn.calendar.parseOptions(this),typeof options == 'object' && options);
                $.data(this,"options",{options : _data});
                $.data(this,"element",new Calendar(this, _data));
            }

            $.fn.calendar.init(this);
            $.fn.calendar.bindEvents(this);
            bindCalendarEvents($.data(this,"element").calendar);

        })

    }

    function show(element){
        var offset = $(this).offset();
        offset.top = offset.top + $(this).outerHeight(true);
        $(this).data("element").calendar.css("top",offset.top);
        $(this).data("element").calendar.css("left",offset.left);

        $(this).data("element").calendar.removeClass("hide");

        $(document).bind('mousedown.calendar', function (e) {
            // 点击日历控件以外的元素 删除日历元素
            if ($(e.target).closest('.as-calendarpicker').length === 0) {
                $(document).unbind(".calendar");

                //隐藏日历控件
                $(".as-calendarpicker").addClass("hide")
            }
        });
        
        return false;
    }

    //初始化组件
    $.fn.calendar.init = function(element) {
        $(element).addClass("as-calendar");
        $(element).attr("readonly","true");
    }

    $.fn.calendar.bindEvents = function(element){
        
        var options = $.data(element,"options").options;

        $(element).unbind(".calendar");

        //循环绑定事件
        for (var action in options.events) {
            $(element).bind(action + ".calendar", {element: element}, options.events[action]);
        }
    }

    //默认参数
    $.fn.calendar.defaults = {
        year: new Date().getFullYear(),
        month: new Date().getMonth() + 1,
        day: new Date().getDate(),
        type:"picker",
        events:{
            click : show,
        }
    }

    //格式化参数
    $.fn.calendar.parseOptions= function(obj){

        return $.parser.parseOptions(obj);

    }

    //提供调用的方法
    $.fn.calendar.methods = {

    }

    $.fn.calendar.template = {
        base            :   '<div class="as-calendarpicker hide">'+
                                '<ul>'+
                                    '<li class="collapse in">'+
                                        '<div class="datapicker">'+
                                            '<div class="datapicker-days"></div>'+
                                            '<div class="datapicker-months"></div>'+
                                            '<div class="datapicker-years"></div>'+
                                        '</div>'+
                                    '</li>'+
                                    '<li class="collapse toolbar">'+
                                    '</li>'+
                                    '<li class="collapse">'+
                                        '<div class="timepicker">'+
                                            '<div class="timepicker-picker"></div>'+
                                            '<div class="timepicker-hours"></div>'+
                                            '<div class="timepicker-minutes"></div>'+
                                        '</div>'+
                                    '</li>'+
                                '</ul>'+
                            '</div>',

        toolbar         :   '<a href="javascript:void(0)" class="btn">'+
                                '<span class="glyphicon glyphicon-time"></span>'+
                            '</a>',

        datapickerDays  :   '<table>'+
                                '<thead>'+
                                '<tr>'+
                                    '<td class="prev"><span class="fa fa-angle-left"></span></td>'+
                                    '<td class="time-text" colspan="5"></td>'+
                                    '<td class="next"><span class="fa fa-angle-right"></span></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<th>日</th>'+
                                    '<th>一</th>'+
                                    '<th>二</th>'+
                                    '<th>三</th>'+
                                    '<th>四</th>'+
                                    '<th>五</th>'+
                                    '<th>六</th>'+
                                '</tr>'+
                                '</thead>'+
                                '<tbody></tbody>'+
                            '</table>',

        timepickerPicker:   ' <table>'+
                                '<tbody>'+
                                    '<tr>'+
                                      '<td class="separator"></td>'+
                                      '<td>'+
                                        '<a href="javascript:void(0)" class="btn" data-action="">'+
                                          '<span class="glyphicon glyphicon-menu-up"></span>'+
                                        '</a>'+
                                      '</td>'+
                                      '<td colspan="3"></td>'+
                                      '<td>'+
                                        '<a href="javascript:void(0)" class="btn" data-action="">'+
                                          '<span class="glyphicon glyphicon-menu-up"></span>'+
                                        '</a>'+
                                      '</td>'+
                                      '<td class="separator"></td>'+
                                    '</tr>'+
                                    '<tr class="timer">'+
                                      '<td class="separator"></td>'+
                                      '<td class="hour">12</td>'+
                                      '<td class="separator"></td>'+
                                      '<td>:</td>'+
                                      '<td class="separator"></td>'+
                                      '<td class="Minute">20</td>'+
                                      '<td class="separator"></td>'+
                                    '</tr>'+
                                    '<tr>'+
                                      '<td class="separator"></td>'+
                                      '<td>'+
                                        '<a href="javascript:void(0)" class="btn" data-action="">'+
                                          '<span class="glyphicon glyphicon-menu-down"></span>'+
                                        '</a>'+
                                      '</td>'+
                                      '<td colspan="3"></td>'+
                                      '<td>'+
                                        '<a href="javascript:void(0)" class="btn" data-action="">'+
                                          '<span class="glyphicon glyphicon-menu-down"></span>'+
                                        '</a>'+
                                      '</td>'+
                                      '<td class="separator"></td>'+
                                    '</tr>'+
                                '</tbody>'+
                            '</table>'
    }




    $.fn.calendar.version = "0.0.1-dev";

    //构造函数
    // $.fn.Calendar.constructor = Calendar
    //让控件支持链式操作
    //$.fn.Calendar.prototype = $.fn.Calendar.prototype.fn


    //避免与其它JS框架冲突
    var _old = $.fn.calendar;

    $.fn.calendar.noConflict = function(){
        $.fn.Calendar = _old;
        return this;
    }

})(jQuery);

/*===============================================
  combobox
  @auther jaren
=================================================*/
(function ($) {

    $.fn.combobox = function (options, params) {

        if (typeof options === "string") {
            return $.fn.combobox.methods[options](this, params);
        }

        options = options || {};

        return this.each(function () {

            var _data = $.data(this, "combobox");

            if (_data) {
                $.extend(_data.options, options);
            }
            else {
                _data = $.extend({}, $.fn.combobox.defaults, $.fn.combobox.parseOptions(this), options);
                $.data(this, "combobox", {options: _data});
                $.data(this, "element", new Combobox(this, _data));
            }

            constructor(this);
        });
    };

    var Combobox = function (element, options) {
        this.input = element;
        this.combobox = getCombobox(element, options);
    };

    function constructor(element) {
        $(element).addClass("as-combobox");
        var combobox = $(element).data("element").combobox;
        $(element).addClass("hide");
        $(element).after(combobox);
    }

    function getCombobox(element, options) {
        var comboboxpicker = $($.fn.combobox.template.combobox);
        comboboxpicker.data("method", options.method);
        comboboxpicker.data("url", options.url);
        comboboxpicker.data("queryParams", options.queryParams);
        comboboxpicker.data("input", element);

        bindEvents(comboboxpicker);

        return comboboxpicker;
    }

    function getData(element) {
        if ($(element).data("url") != "") {
            var _selected = $($(element).data("input")).val();
            var result = {};

            $.ajax({
                async: false,
                cache: false,
                dataType: 'json',
                type: $(element).data("method"),
                url: $(element).data("url"),
                data: $(element).data("queryParams"),
                success: function (data) {
                    if (data == "") {
                        alert("无数据");
                    }
                    else {
                        var lists = $("<ul></ul>");
                        for (var i in data) {
                            var _li = $('<li value="' + data[i].value + '">' + data[i].text + '</li>');
                            if (data[i].value == _selected) {
                                _li.addClass("selected");
                            }
                            lists.append(_li);
                        }
                        result = {"list": lists, "data": data};
                        $(element).data("dataJson",data);
                    }
                },
                error: function () {
                    alert("读取数据失败");
                }
            });

            return result;
        } else {
            alert("请求地址为空");
        }
    }

    function bindEvents(element) {

        $(element).unbind(".combobox").bind("click.combobox", function (e) {
            var _element = e.target;

            if ($(_element).closest(".combobox-selection").length) {
                var selection = $(_element).closest(".combobox-selection");
                if (selection.hasClass("open")) {
                    hide(_element);
                }
                else {
                    show(_element);
                }
            }
            else if ($(_element).closest("li").length) {
                selectData(_element);
            }
        });
    }

    function show(element) {
        var comboboxpicker = $(element).parents(".as-comboboxpicker");
        var _data = getData(comboboxpicker);

        comboboxpicker.find(".combobox-selection").addClass("open");
        comboboxpicker.find(".combobox-selection").after($($.fn.combobox.template.options));
        comboboxpicker.find(".select-picker").append(_data.list);
        comboboxpicker.find("input").bind("focus", search);

        $(document).unbind(".combobox").bind('mousedown.combobox', function (e) {
            if ($(e.target).closest('.combobox-option').length === 0) {
                if ($(e.target).closest(".combobox-selection").length != 0) {
                    return;
                }
                $(".combobox-selection").removeClass("open");
                $(".combobox-option").remove();
            }
        });
        
        return false;
    }

    function hide(element) {
        var comboboxpicker = $(element).parents(".as-comboboxpicker");
        comboboxpicker.data("search", false);
        comboboxpicker.find(".combobox-selection").removeClass("open");
        comboboxpicker.find(".combobox-option").remove();
        $(document).unbind(".combobox");
    }

    function selectData(element) {
        var comboboxpicker = $(element).parents(".as-comboboxpicker");
        var input = $(comboboxpicker).data("input");
        var _text = $(element).addClass("selected").text();
        var _value = $(element).attr("value");
        var list = $(element).closest("ul");

        list.children().each(function (e) {
            $(this).removeClass("selected");
        });

        $(comboboxpicker.data("input")).val(_value);
        comboboxpicker.find(".selection-text").text(_text);

        hide(element);

        $(input).data("combobox").options.onSelected();
    }

    function search(e) {
        setTimeout("function(){update(e)}", 200);
        var _options = {key: ""};
        $(e.target).parents(".as-comboboxpicker").data("search", true);
        (function () {
            if ($(e.target).parents(".as-comboboxpicker").data("search")) {
                if (_options.key != $.trim($(e.target).val())) {
                    _options.key = $.trim($(e.target).val());
                    if (_options.timer) {
                        clearTimeout(_options.timer);
                    }
                    _options.timer = setTimeout(update, 200);
                }
                setTimeout(arguments.callee, 200);
            }
        })();

        function update() {
            //获取关键字
            var key = $(e.target).val().split("");
            //制作正则对象
            var regStr = "";
            for (var i = 0; i < key.length; i++) {
                regStr += ( ".*" + key[i] );
            }
            var reg = new RegExp(regStr + ".*", "i");
            //获取combobox引用
            var comboboxpicker = $(e.target).parents(".as-comboboxpicker");
            //获取已选中选项引用
            var _selected = $(comboboxpicker.data("input")).val();
            //清空选项
            comboboxpicker.find(".select-picker").html("");
            //获取数据
            var _data = comboboxpicker.data("dataJson");
            var _lists = $("<ul></ul>");
            for (var i = 0; i < _data.length; i++) {
                if (reg.test(_data[i].text)) {
                    var _li = $('<li value="' + _data[i].value + '">' + _data[i].text + '</li>');
                    if (_data[i].value == _selected) {
                        _li.addClass("selected");
                    }
                    _lists.append(_li);
                }
            }
            comboboxpicker.find(".select-picker").append(_lists);
        }

    }


    //格式化参数
    $.fn.combobox.parseOptions = function (obj) {
        return $.parser.parseOptions(obj);
    };

    $.fn.combobox.methods = {
        reload: function (element, url) {
            if (url) {
                element.data("element").combobox.data("url", url);
            }
        }
    };

    $.fn.combobox.defaults = {
        url: "",
        queryParams: {},
        method: "GET",
        onSelected: function () {
        }
    };

    $.fn.combobox.template = {
        combobox: '<div class="as-comboboxpicker">' +
        '<span class="combobox-selection">' +
        '<span class="selection-text"></span>' +
        '<b></b>' +
        '</span>' +
        '</div>',

        options: '<span class="combobox-option">' +
        '<span class="input-picker">' +
        '<input type="text">' +
        '</span>' +
        '<span class="select-picker"></span>' +
        '</span>'
    };

    $.fn.combobox.version = "0.0.1-dev";

})(jQuery);

/*===============================================
  form 
  @auther cpChen
=================================================*/
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


/*===============================================
  pagination
  @auther LCK
=================================================*/
(function($){

    $.fn.pagination = function (opt,data){
        //判断执行的操作：1.调用方法 2.初始化组件
        if(typeof opt == "string"){
            //执行方法
            return $.fn.pagination.methods[opt](this,data);
        }
        //避免opt未定义出现错误
        opt = opt || {};
        return this.each(function(){
            //获取pagination对象的属性
            var _page = $.data(this,"pagination");
            //根据_page判定操作：1._page存在，合并设置最新值 2._page不存在，初始化设置最新值
            if(_page){
                //_page存在，合并设置最新值
                $.extend(_page.options,opt);
            }else{
                //_page不存在，初始化设置最新值
                $.data(this,"pagination",{
                    options: $.extend({}, $.fn.pagination.defaults, $.fn.pagination.parseOptions(this),opt)
                });
            }
            pageNumber(this);
        });
    };
    $.fn.pagination.methods = {
        options: function(jq){
            return $.data(jq[0],"pagination").options;
        },
        selected: function(jq,page){
            return jq.each(function (){
                ajaxBind(this,page);
            });
        }
    };
    $.fn.pagination.parseOptions = function (obj){
        var _obj = $(obj);
        return $.extend({}, $.parser.parseOptions(obj,[{
            total: "number",
            pageSize: "number",
            pageNumber: "number",
            url: "string"
        }]));
    };
    $.fn.pagination.defaults = {
        total: 1,
        pageSize: 10,
        pageNumber: 1,
        layout: ["prev","next"],
        url: null,
        ajax: false,
        queryParams: {},
        onSelectPage: function(){},
        onChangePage:function(){},
        nav: {
            prev: {
                iconCls:"&laquo;",
                handler: function(){
                    var _opt = $(this).pagination("options");
                    if(_opt.pageNumber > 1){
                        $(this).pagination("selected",_opt.pageNumber - 1);
                    }
                }
            },
            next: {
                iconCls:"&raquo;",
                handler: function(){
                    var _opt = $(this).pagination("options");
                    var _count = Math.ceil(_opt.total / _opt.pageSize);
                    if(_opt.pageNumber < _count){
                        $(this).pagination("selected",_opt.pageNumber + 1);
                    }
                }
            }
        }
    };
    //渲染向前向后页码操作
    function render(obj){
        //获取pagination对象的属性
        var _page = $.data(obj,"pagination");
        //获取pagination对象中的options属性
        var _opt = _page.options;
        var _nav = $(obj).html("<nav><ul class='as-page'></ul></nav>");
        var _ul = $(obj).find("ul.as-page");
        //获取options属性中的layout
        var _layout = $.extend([],_opt.layout);
        for(var i=0; i < _layout.length; i++){
            switch (_layout[i]){
                case "prev":
                    addNp("prev");
                    break;
                case "next":
                    addNp("next");
                    break;
            }
        }
        //渲染页码按钮
        function addNp(nv){
            var adClass = "class=\""+ nv + "\"";
            var _url = pageUrl(obj,nv);
            var nav = _opt.nav[nv];
            var _pn = $('<li '+ adClass +'><a href="'+ _url +'" aria-label="Previous"><span aria-hidden="true">'+ nav.iconCls +'</span></a></li>').appendTo(_ul);
            if(_opt.ajax){
                _pn.unbind(".pagination").bind("click.pagination",function (e) {
                    nav.handler.call(obj);
                });
            }

        }
    }

    //渲染数字页码操作
    function pageNumber(obj,num){
        var _page = $.data(obj,"pagination");
        var _opt = _page.options;
        //若num不为空合并_opt和num获取最新数据
        $.extend(_opt,num || {});
        _opt.total = Number(_opt.total);
        _opt.pageNumber = Number(_opt.pageNumber);
        var _count = Math.ceil(_opt.total / _opt.pageSize) || 1;
        if(_opt.pageNumber < 1){
            _opt.pageNumber = 1;
        }
        if(_opt.pageNumber > _count){
            _opt.pageNumber = _count;
        }
        if(_opt.total == 0){
            _opt.pageNumber = 0;
            _count = 0;
        }
        //渲染上下页码
        render(obj);
        //获取下一页按钮jq对象
        var _next = $(obj).find("li.next");
        //获取上一页按钮jq对象
        var _prev = $(obj).find("li.prev");
        if(_next.length){
            if(_count == 0){
                prevDis();
                nextDis();
                var _number = _next.before('<li ><a href="javascript:void(0)">'+ 1 +'</a></li>');
                pageBind(0,_number.prev());
            }
            if(_count < 7){
                prevDis();
                nextDis();
                for(var i=1; i <= _count; i++){
                    var _url = pageUrl(obj,i);
                    var _number = _next.before('<li ><a href="'+ _url +'">'+ i +'</a></li>');
                    if(_opt.ajax){
                        _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: i}, function (e) {
                            ajaxBind(obj, e.data.pageNumber);
                        });
                    }
                    pageBind(i,_number.prev());
                }
            }
            if(_opt.pageNumber < 5 && _count >= 7){
                prevDis();
                for(var i=1; i <= 7; i++){
                    switch (i){
                        case 6:
                            var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                            _dis.prev().addClass("disabled");
                            break;
                        case 7:
                            var _url = pageUrl(obj,_count);
                            var _number = _next.before('<li ><a href="'+ _url +'">'+ _count +'</a></li>');
                            if(_opt.ajax){
                                _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: _count}, function (e) {
                                    ajaxBind(obj, e.data.pageNumber);
                                });
                            }
                            pageBind(i,_number.prev());
                            break;
                        default :
                            var _url = pageUrl(obj,i);
                            var _number = _next.before('<li ><a href="'+ _url +'">'+ i +'</a></li>');
                            if(_opt.ajax){
                                _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: i}, function (e) {
                                    ajaxBind(obj, e.data.pageNumber);
                                });
                            }
                            pageBind(i,_number.prev());
                            break;
                    }
                }
            }
            if(_opt.pageNumber >= 5 && _count >= 7){
                if(_opt.pageNumber >= _count-2){
                    nextDis();
                    for(var i=1; i<=3; i++){
                        switch (i){
                            case 1:
                                var _url = pageUrl(obj,i);
                                var _number = _next.before('<li ><a href="'+ _url +'">1</a></li>');
                                if(_opt.ajax){
                                    _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: 1}, function (e) {
                                        ajaxBind(obj, e.data.pageNumber);
                                    });
                                }
                                pageBind(i,_number.prev());
                                break;
                            case 2:
                                var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                                _dis.prev().addClass("disabled");
                                break;
                            case 3:
                                for(var j=_count-4; j<=_count; j++){
                                    var _url = pageUrl(obj,j);
                                    var _number = _next.before('<li ><a href="'+ _url +'">'+ j +'</a></li>');
                                    if(_opt.ajax){
                                        _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: j}, function (e) {
                                            ajaxBind(obj, e.data.pageNumber);
                                        });
                                    }
                                    pageBind(j,_number.prev());
                                }
                                break;
                        }
                    }
                }else{
                    for(var i=-5; i <= -1; i++){
                        switch (i){
                            case -1:
                                var _url = pageUrl(obj,_count);
                                var _number = _next.before('<li ><a href="'+ _url +'">'+ _count +'</a></li>');
                                if(_opt.ajax){
                                    _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: _count}, function (e) {
                                        ajaxBind(obj, e.data.pageNumber);
                                    });
                                }
                                pageBind(i,_number.prev());
                                break;
                            case -3:
                                for(var j=-2; j<=2; j++) {
                                    var _cou = _opt.pageNumber + j;
                                    var _url = pageUrl(obj,_cou);
                                    var _number = _next.before('<li ><a href="'+ _url +'">' + _cou + '</a></li>');
                                    if(_opt.ajax){
                                        _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: _cou}, function (e) {
                                            ajaxBind(obj, e.data.pageNumber);
                                        });
                                    }
                                    pageBind(_cou, _number.prev());
                                }
                                break;
                            case -5:
                                var _url = pageUrl(obj,1);
                                var _number = _next.before('<li ><a href="'+ _url +'">1</a></li>');
                                if(_opt.ajax){
                                    _number.prev().unbind(".pagination").bind("click.pagination",{pageNumber: 1}, function (e) {
                                        ajaxBind(obj, e.data.pageNumber);
                                    });
                                }
                                pageBind(i,_number.prev());
                                break;
                            default :
                                var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                                _dis.prev().addClass("disabled");
                                break;
                        }
                    }
                }
            }
        }
        //当前页码为1时，上一页按钮置为disabled
        function prevDis(){
            switch (_opt.pageNumber){
                case 0:
                    _prev.addClass("disabled");
                    _prev.children().first().attr("href","javascript:void(0)");
                    break;
                case 1:
                    _prev.addClass("disabled");
                    _prev.children().first().attr("href","javascript:void(0)");
                    break;
                default :
                    _prev.removeClass("disabled");
            }
        }
        //当前页码为尾页时，下一页按钮disabled
        function nextDis(){
            switch (_opt.pageNumber){
                case _count:
                    _next.addClass("disabled");
                    _next.children().first().attr("href","javascript:void(0)");
                    break;
                default :
                    _next.removeClass("disabled");
            }
        }
        //设置当前页面页码样式
        function pageBind(i,nber){
            if(i == _opt.pageNumber){
                nber.addClass("active");
            }
        }
    }
    //拼接翻页跳转url
    function pageUrl(obj,nv){
        var _opt = $.data(obj,"pagination").options;
        var _count = Math.ceil(_opt.total / _opt.pageSize) || 1;
        if(typeof nv == "string"){
            if(nv == "prev"){
                if(_opt.pageNumber == 1){
                    var _page = _opt.pageNumber
                }else{
                    var _page = _opt.pageNumber - 1;
                }
            }else{
                if(_opt.pageNumber == _count){
                    var _page = _opt.pageNumber
                }else{
                    var _page = _opt.pageNumber + 1;
                }
            }
        }else{
            if(typeof nv == "number"){
                var _page = nv;
            }
        }
        if(_opt.ajax){
            var url = "javascript:void(0)";
        }else{
            var url = _opt.url + "?page=" + _page;
            if(_opt.queryParams){
                for(var a in _opt.queryParams){
                    url = url + "&" + a + "=" + _opt.queryParams[a];
                }
            }
        }
        return url;
    }
    //设置ajax获取的数据并重新加载翻页
    function ajaxBind(obj, num) {
        var _opt = $.data(obj, "pagination").options;
        var _data = getPageData(num, _opt.pageSize,_opt.queryParams,_opt.url);
        $.data(obj,"pagination").pageData = _data;
        pageNumber(obj, {pageNumber: num});
        _opt.onSelectPage.call(obj, _opt.pageNumber, _opt.pageSize);
        _opt.onChangePage.call(obj);
    };
    //ajax获取数据
    function getPageData(pageNumber,pageSize,queryParams,url){
        var pageData;
        $.ajax({
            type: 'post',
            async: false,
            url: url,
            data: $.extend({},{pageNumber:pageNumber,pageSize:pageSize},queryParams),
            dataType: 'json',
            success: function (data){
                pageData = data;
            },
            error:function (){
                alert("数据加载失败！");
            }
        });
        return pageData;
    }
})(jQuery);

/*===============================================
  Validatebox
  @auther LCK
=================================================*/
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

/*===============================================
             Table
             @auther LK
 =================================================*/
(function($) {
    $.fn.datatable = function (opt, data) {
        if (typeof opt == "string"){
            return $.fn.datatable.methods[opt](this,data);
        }
        opt = opt || {};
        return this.each(function(){
            var _data = $.data(this,"table");
            if(_data){
                $.extend(_data.options,opt);
            }else{
                var opts = $.extend({}, $.fn.datatable.defaults, $.fn.datatable.parseOptions(this),opt);
                $.data(this,"table",{
                    options: opts
                });
                renderTF(this);

                if (opts.rowData) {
                    $(this).datatable("loadData", opts.rowData);
                } else {
                    var data = $.fn.datatable.parseData(this);
                    if (data.total > 0) {
                        $(this).datatable("loadData", data);
                    }
                }
                //渲染table数据
                getData(this);

            }
        });
    };
    $.fn.datatable.methods = {
        //获取table表头字段
        getColumnFields: function(jq, param) {
            return getColumn(jq[0],param);
        },
        reload: function(jq, _1c9) {
            return jq.each(function() {
                var opts = $(this).datatable("options");
                if (typeof _1c9 == "string") {
                    opts.url = _1c9;
                    _1c9 = null;
                }
                _b1(this, _1c9);//TODO
            });
        },
        //获取table数据
        getData: function(jq) {
            return $.data(jq[0], "table").data;
        },
        //获取table所有的行数据
        getRows: function(jq) {
            return $.data(jq[0], "table").data.rows;
        },
        getRowIndex: function(jq, id) {
            return _107(jq[0], id); //TODO
        },
        getChecked: function(jq) {
            return _10d(jq[0]); //TODO
        },
        selectAll: function(jq) {
            return jq.each(function() {
                _123(this); //TODO
            });
        },
        //加载table数据
        loadData: function(jq, data) {
            return jq.each(function() {
                renderData(this, data);
                //_17a(this);
            });
        },
        //加载table分页
        loadPage:function(jq){
            return jq.each(function(){
                renderPage(this);
            });
        },
        //返回options
        options: function(jq){
            return $.data(jq[0],"table").options;
        },
        //翻页触发获取新数据
        pageSelected: function(jq,page){
            return jq.each(function (){
                getData(this,page);
            });
        }

    };
    $.fn.datatable.parseOptions = function (obj) {
        var t = $(obj);
        return $.extend({},$.parser.parseOptions(obj));
    };
    //获取当前页面table数据
    $.fn.datatable.parseData = function (obj) {
        var _obj = $(obj);
        var data = {
            total: 0,
            rows: []
        };
        var column = _obj.datatable("getColumnFields",true);
        _obj.find("tbody tr").each(function(){
            data.total++;
            var row = {};
            for(var i=0;i<column.length;i++){
                row[column[i]] = $(this).find("td:eq(" + i + ")").html();
            }
            data.rows.push(row);
        });
        return data;
    };
    //渲染table数据
    var renderView = {
        render: function(obj) {
            var opt = $.data(obj,"table").options;
            var rows = $(obj).datatable("getRows");
            $(obj).find("tbody").remove();
            $(this.renderTable(obj,rows)).appendTo( $(obj));
            if(opt.checkbox){
                var tr = $(obj).find("tbody tr");
                for(var i=0;i<tr.length;i++){
                    $(tr[i]).find("td:eq(0)").bind("click.table",{target:$(tr[i])}, function (e) {
                        if(e.data.target.hasClass('active')){
                            e.data.target.removeClass("active");
                        }else{
                            e.data.target.addClass("active");
                        }
                    });
                }
            }
            if(opt.pagination){
                $(obj).datatable("loadPage");
            }

        },
        renderTable:function(obj,rows){
            var table = $.data(obj,"table");
            var opt = table.options;

            var column = $(obj).datatable("getColumnFields", true);

            var tbody = ["<tbody>"];
            for(var i=0;i<rows.length;i++){
                var row = rows[i];
                tbody.push("<tr>");
                tbody.push(this.renderRow.call(this, obj,column, row));
                tbody.push("</tr>");
            }
            tbody.push("</tbody>");
            return tbody.join("");
        },
        renderRow: function(obj,column, row){

            var opt = $.data(obj, "table").options;
            var cc = [];
            for(var i=0;i<column.length;i++){
                var col = column[i];
                cc.push("<td>");
                cc.push(row[col]);
                cc.push("</td>");
            }
            return cc.join("");
        }
    };

    $.fn.datatable.defaults = {
        columns: undefined,
        method: "post",
        idField: null,
        url: null,
        rowData: null,
        toolbar: null,
        checkbox:false,
        singleSelect: false,
        selectOnCheck: true,
        checkOnSelect: true,
        pagination: false,
        queryParams: {},
        pageNumber: 1,
        pageSize: 10,
        layout: ["prev","next"],
        nav: {
            prev: {
                iconCls:"&laquo;",
                handler: function(){
                    var _opt = $(this).datatable("options");
                    if(_opt.pageNumber > 1){
                        $(this).datatable("pageSelected",_opt.pageNumber - 1);
                    }
                }
            },
            next: {
                iconCls:"&raquo;",
                handler: function(){
                    var _opt = $(this).datatable("options");
                    var _data = $(this).datatable("getData");
                    var _count = Math.ceil(_data.total / _opt.pageSize);
                    if(_opt.pageNumber < _count){
                        $(this).datatable("pageSelected",_opt.pageNumber + 1);
                    }
                }
            }
        },
        //editors: _1a9, //TODO
        rowStyler: function(_23d, _23e) {}, //TODO
        onLoadError: function() {},
        onClickRow: function(_24a, _24b) {}, //TODO
        onDblClickRow: function(_24c, _24d) {}, //TODO
        onCheck: function(_262, _263) {},
        loader: function(params, _240, _241) {
            var opts = $.data(this,"table").options;
            if (!opts.url) {
                return false;
            }
            $.ajax({
                type: opts.method,
                url: opts.url,
                async:false,
                data: params,
                dataType: "json",
                success: function(data) {
                    _240(data);
                },
                error: function() {
                    _241.apply(this, arguments);
                }
            });
        },
        view: renderView
    };
    //渲染分页等样式
    function renderTF(obj){
        var table = $.data(obj,"table");
        var opt = table.options;
        var _obj = $(obj);
        if(opt.pagination){
            var footerContainer = $("<div class='dt-panelfooter clearfix'></div>");
            _obj.after(footerContainer);
            $("<div class='dataTables_paginate'></div>").appendTo(footerContainer);
        }
        if(opt.checkbox){
            _obj.addClass("fchild-checkbox");
            _obj.find("thead tr").prepend($("<th class='sorting_disabled'></th>"));
        }
    }
    //获取table表头字段
    function getColumn(obj,params){
        var _obj = $(obj);
        var column = [];
        _obj.find("thead tr th").each(function(){
            var name = {};
            var _d = $.trim($(this).attr("data-options"));
            if(!_d){
                column.push("");
            }else{
                name = (new Function("return" + _d))();
                column.push(name.field);
            }

        });
        return column;
    }
    //获取table数据
    function getData(obj,num){
        var opt = $.data(obj,"table").options;
        if(opt.pagination){
            var queryParams = $.extend({},opt.queryParams,{
                page: opt.pageNumber || 1,
                size: opt.pageSize
            });
            if(num){
                queryParams.page = num;
                opt.pageNumber = num;

                var loading = $("<tr class='loading'></tr>");
                var textbox = $("<p><i class='icon-spinner icon-spin'></i>loading...</p>");
                loading.prepend(textbox);
                $(obj).find("tbody").prepend(loading);
            }
        }
        if(num){
            setTimeout(loaderData,1000);
        }else{
            var result = loaderData();
        }

        if (result == false) {
            $(obj).datatable("loaded");
        }

        function loaderData(){
            var ret = opt.loader.call(obj, queryParams,
                function(data) {
                    $(obj).datatable("loadData", data);
                },
                function() {
                    opt.onLoadError.apply(obj, arguments);
                });
            return ret;
        }
    }
    //渲染tabel数据
    function renderData(obj,data){
        var table = $.data(obj, "table");
        var opt = table.options;
        table.data = data;
        opt.view.render.call(opt.view,obj);
    }
    //渲染翻页
    function renderPage(obj){
        var table = $.data(obj,"table");
        var opt = table.options;
        var data = table.data;
        var pageContainer = $(obj).next().find(".dataTables_paginate");
        pageNumber(obj,pageContainer[0]);
    }
    //渲染上下页码
    function render(obj,jq){
        var table = $.data(obj,"table");
        var _opt = table.options;
        var _nav = $(jq).html("<nav><ul class='as-page'></ul></nav>");
        var _ul = $(jq).find("ul.as-page");
        var _layout = $.extend([],_opt.layout);
        for(var i=0; i < _layout.length; i++){
            switch (_layout[i]){
                case "prev":
                    addNp("prev");
                    break;
                case "next":
                    addNp("next");
                    break;
            }
        }
        //渲染页码按钮
        function addNp(nv){
            var adClass = "class=\""+ nv + "\"";
            var _url = "javascript:void(0)";
            var nav = _opt.nav[nv];
            var _pn = $('<li '+ adClass +'><a href="'+ _url +'" aria-label="Previous"><span aria-hidden="true">'+ nav.iconCls +'</span></a></li>').appendTo(_ul);
            _pn.unbind(".table").bind("click.table",function (e) {
                nav.handler.call(obj);
            });
        }
    }
    //渲染翻页页码
    function pageNumber(obj,jq,num){
        var table = $.data(obj,"table");
        var _opt = table.options;
        var _data = table.data;
        $.extend(_opt,num || {});
        var _count = Math.ceil(_data.total / _opt.pageSize) || 1;
        if(_opt.pageNumber < 1){
            _opt.pageNumber = 1;
        }
        if(_opt.pageNumber > _count){
            _opt.pageNumber = _count;
        }
        if(_data.total == 0){
            _opt.pageNumber = 0;
            _count = 0;
        }
        render(obj,jq);
        var _next = $(jq).find("li.next");
        var _prev = $(jq).find("li.prev");
        if(_next.length){
            if(_count == 0){
                prevDis();
                nextDis();
                var _number = _next.before('<li ><a href="javascript:void(0)">'+ 1 +'</a></li>');
                pageBind(0,_number.prev());
            }
            if(_count < 7){
                prevDis();
                nextDis();
                for(var i=1; i <= _count; i++){
                    var _number = _next.before('<li ><a href="javascript:void(0)">'+ i +'</a></li>');
                    _number.prev().unbind(".table").bind("click.table",{pageNumber: i}, function (e) {
                        getData(obj, e.data.pageNumber);
                    });
                    pageBind(i,_number.prev());
                }
            }
            if(_opt.pageNumber < 5 && _count >= 7){
                prevDis();
                for(var i=1; i <= 7; i++){
                    switch (i){
                        case 6:
                            var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                            _dis.prev().addClass("disabled");
                            break;
                        case 7:
                            var _number = _next.before('<li ><a href="javascript:void(0)">'+ _count +'</a></li>');
                            _number.prev().unbind(".table").bind("click.table",{pageNumber: _count}, function (e) {
                                getData(obj, e.data.pageNumber);
                            });
                            pageBind(i,_number.prev());
                            break;
                        default :
                            var _number = _next.before('<li ><a href="javascript:void(0)">'+ i +'</a></li>');
                            _number.prev().unbind(".table").bind("click.table",{pageNumber: i}, function (e) {
                                getData(obj, e.data.pageNumber);
                            });
                            pageBind(i,_number.prev());
                            break;
                    }
                }
            }
            if(_opt.pageNumber >= 5 && _count >= 7){
                if(_opt.pageNumber >= _count-2){
                    nextDis();
                    for(var i=1; i<=3; i++){
                        switch (i){
                            case 1:
                                var _number = _next.before('<li ><a href="javascript:void(0)">1</a></li>');
                                _number.prev().unbind(".table").bind("click.table",{pageNumber: 1}, function (e) {
                                    getData(obj, e.data.pageNumber);
                                });
                                pageBind(i,_number.prev());
                                break;
                            case 2:
                                var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                                _dis.prev().addClass("disabled");
                                break;
                            case 3:
                                for(var j=_count-4; j<=_count; j++){
                                    var _number = _next.before('<li ><a href="javascript:void(0)">'+ j +'</a></li>');
                                    _number.prev().unbind(".table").bind("click.table",{pageNumber: j}, function (e) {
                                        getData(obj, e.data.pageNumber);
                                    });
                                    pageBind(j,_number.prev());
                                }
                                break;
                        }
                    }
                }else{
                    for(var i=-5; i <= -1; i++){
                        switch (i){
                            case -1:
                                var _number = _next.before('<li ><a href="javascript:void(0)">'+ _count +'</a></li>');
                                _number.prev().unbind(".table").bind("click.table",{pageNumber: _count}, function (e) {
                                    getData(obj, e.data.pageNumber);
                                });
                                pageBind(i,_number.prev());
                                break;
                            case -3:
                                for(var j=-2; j<=2; j++) {
                                    var _cou = _opt.pageNumber + j;
                                    var _number = _next.before('<li ><a href="javascript:void(0)">' + _cou + '</a></li>');
                                    _number.prev().unbind(".table").bind("click.table",{pageNumber: _cou}, function (e) {
                                        getData(obj, e.data.pageNumber);
                                    });
                                    pageBind(_cou, _number.prev());
                                }
                                break;
                            case -5:
                                var _number = _next.before('<li ><a href="javascript:void(0)">1</a></li>');
                                _number.prev().unbind(".table").bind("click.table",{pageNumber: 1}, function (e) {
                                    getData(obj, e.data.pageNumber);
                                });
                                pageBind(i,_number.prev());
                                break;
                            default :
                                var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                                _dis.prev().addClass("disabled");
                                break;
                        }
                    }
                }
            }
        }
        //当前页码为1时，上一页按钮置为disabled
        function prevDis(){
            switch (_opt.pageNumber){
                case 0:
                    _prev.addClass("disabled");
                    _prev.children().first().attr("href","javascript:void(0)");
                    break;
                case 1:
                    _prev.addClass("disabled");
                    _prev.children().first().attr("href","javascript:void(0)");
                    break;
                default :
                    _prev.removeClass("disabled");
            }
        }
        //当前页码为尾页时，下一页按钮disabled
        function nextDis(){
            switch (_opt.pageNumber){
                case _count:
                    _next.addClass("disabled");
                    _next.children().first().attr("href","javascript:void(0)");
                    break;
                default :
                    _next.removeClass("disabled");
            }
        }
        //设置当前页面页码样式
        function pageBind(i,nber){
            if(i == _opt.pageNumber){
                nber.addClass("active");
            }
        }
    }


})(jQuery);



/*===============================================
 listbox
 @auther LK
 =================================================*/
(function($){
    $.fn.listbox = function(opt,data){
        if(typeof opt == "string"){
            return $.fn.listbox.methods[opt](this, data);
        }
        opt = opt || {};
        return this.each(function(){
            var _data = $.data(this,"listbox");
            if(_data){
                $.extend(_data.options,opt);
            }else{
                $.data(this,"listbox",{
                    options: $.extend({}, $.fn.listbox.defaults, $.fn.listbox.parseOptions(this),opt)
                });
                renderList(this);
            }
        });
    };
    $.fn.listbox.methods = {};
    $.fn.listbox.parseOptions = function(obj){
        var t = $(obj);
        return $.extend({},
            $.parser.parseOptions(obj)
        );
    };
    $.fn.listbox.defaults = {
        url: null,
        moveTitle: null,
        showTitle: null,
        queryParams:{}
    };
    //渲染整个listbox结构
    function renderList(obj){
        var _obj = $(obj);
        var _opt = $.data(obj,"listbox").options;
        _opt.name = _obj.attr("id");
        if(_opt.url){
            _opt.listData = getData(_opt);
        }else{return;}
        _opt.data = new Array(); //原始数据
        _opt.selectData = new Array(); //选中数据
        _opt.inValue = new Array(); //搜索到数据
        _opt.outValue = new Array();//未搜索到的数据

        for(var x in _opt.listData){
            var a = new Array();
            a['text'] = _opt.listData[x]['text'];
            a['value'] = _opt.listData[x]['value'];
            _opt.data.push(a);
        }

        _opt.list_container = $("<div class='bootstrap-duallistbox-container row moveonselect'></div>").appendTo(_obj);

        _opt.move_select = $("<div class='col-md-6'></div>").appendTo(_opt.list_container);
        if(_opt.moveTitle){
            _opt.move_title = $("<span class='info-container'></span>").appendTo(_opt.move_select);
            $("<span class='info'></span>").appendTo(_opt.move_title).text(_opt.moveTitle);
        }
        _opt.move_input = $("<input class='filter as-form-control' type='text'/>").appendTo(_opt.move_select);
        _opt.move_input.bind("keyup",{target:_opt.move_input,option:_opt},searchOpt);

        _opt.move_btn_container = $("<div class='btn-group buttons'></div>").appendTo(_opt.move_select);
        _opt.move_btn = $("<button type='button' class='btn moveall btn-default'></button>").appendTo(_opt.move_btn_container).text('>>');
        _opt.move_btn.bind("click",{target:_opt.move_btn,option:_opt},btnEvent);

        _opt.select = $("<select class='as-form-control before-select' multiple='multiple'></select>").appendTo(_opt.move_select);
        if(_opt.listData){
            for(var i in _opt.listData){
                _opt.select_option = $("<option></option>").appendTo(_opt.select).val(_opt.listData[i]['value']).text(_opt.listData[i]['text']);
                _opt.select_option.bind("click",{target:_opt.select_option,option:_opt},moveEvent)
            }
        }

        _opt.have_select = $("<div class='col-md-6'></div>").appendTo(_opt.list_container);
        if(_opt.showTitle){
            _opt.show_title = $("<span class='info-container'></span>").appendTo(_opt.have_select);
            $("<span class='info'></span>").appendTo(_opt.show_title).text(_opt.showTitle);
        }
        _opt.have_input = $("<input class='filter as-form-control' type='text'/>").appendTo(_opt.have_select);
        _opt.have_input.bind("keyup",{target:_opt.have_input,option:_opt},searchOpt);
        _opt.have_btn_container = $("<div class='btn-group buttons'></div>").appendTo(_opt.have_select);
        _opt.have_btn = $("<button type='button' class='btn moveall btn-default'></button>").appendTo(_opt.have_btn_container).text('<<');
        _opt.have_btn.bind("click",{target:_opt.have_btn,option:_opt},btnEvent);

        _opt.selected = $("<select class='as-form-control after-select' multiple='multiple'></select>").appendTo(_opt.have_select);

        $("<input type='text' hidden='hidden'/>").appendTo(_opt.list_container).attr("name",_opt.name);


    }
    //ajax获取选项数据
    function getData(opt){
        var listJson;
        $.ajax({
            type: 'post',
            async: false,
            url: opt.url,
            data: opt.queryParams,
            dataType: 'json',
            success: function(data){
                listJson = data;
            },
            error:function(){
                alert('数据加载失败！');
            }
        });
        return listJson;
    }

    //单个选中事件
    function moveEvent(e){
        var select_option = e.data.target;
        var opt = e.data.option;
        var b = new Array();
        b['value'] = select_option.attr("value");
        b['text'] = select_option.text();
        var list = select_option.parent().parent();

        switch (list.next(".col-md-6").length){
            case 0 :
                opt.select_option = $("<option></option>").appendTo(list.prev(".col-md-6").children("select")).val(b['value']).text(b['text']);
                opt.data.push(b);
                opt.selectData = $.grep(opt.selectData,function(n,i){
                    return n['value'] != b['value'];
                });
                break;
            case 1 :
                opt.select_option = $("<option></option>").appendTo(list.next(".col-md-6").children("select")).val(b['value']).text(b['text']);
                opt.data = $.grep(opt.data,function(n,i){
                    return n['value'] != b['value'];
                });
                opt.selectData.push(b);
                break;
        }

        inputValue(list,opt.selectData);
        opt.select_option.bind("click",{target:opt.select_option,option:opt},moveEvent);
        select_option.remove();
    }

    //全部选中事件
    function btnEvent(e){
        var btn = e.data.target;
        var opt = e.data.option;
        var list = btn.parent().parent();
        var options = btn.parent().next("select").children("option");
        if(options.length == 0){return;}

        switch (list.next(".col-md-6").length){
            case 0 :
                var select1 = list.prev(".col-md-6").children("select");
                select1.children("option").remove();
                if(opt.inValue.length > 0){
                    opt.selectData = opt.outValue;
                    for(var a=0;a<opt.inValue.length;a++){
                        opt.data.push(opt.inValue[a]);
                    }
                }else{
                    for(var b=0;b<opt.selectData.length;b++){
                        opt.data.push(opt.selectData[b]);
                    }
                    opt.selectData = [];
                }
                for(var i=0;i<opt.data.length;i++){
                    opt.select_option = $("<option></option>").appendTo(select1).val(opt.data[i]['value']).text(opt.data[i]['text']);
                    opt.select_option.bind("click",{target:opt.select_option,option:opt},moveEvent);
                }
                break;
            case 1 :
                var select2 = list.next(".col-md-6").children("select");
                select2.children("option").remove();
                if(opt.inValue.length > 0){
                    opt.data = opt.outValue;
                    for(var a=0;a<opt.inValue.length;a++){
                        opt.selectData.push(opt.inValue[a]);
                    }
                }else{
                    for(var b=0;b<opt.data.length;b++){
                        opt.selectData.push(opt.data[b]);
                    }
                    opt.data = [];
                }
                for(var i=0;i<opt.selectData.length;i++){
                    opt.select_option = $("<option></option>").appendTo(select2).val(opt.selectData[i]['value']).text(opt.selectData[i]['text']);
                    opt.select_option.bind("click",{target:opt.select_option,option:opt},moveEvent);
                }
                break;
        }

        inputValue(list,opt.selectData);
        options.remove();
    }

    //
    function inputValue(list,data){
        var c = new Array();
        for(var i in data){
            c.push(data[i]['value']);
        }
        list.siblings("input").val(c.join());
    }

    //搜索选项事件
    function searchOpt(e){
        var input = e.data.target;
        var opt = e.data.option;
        var selectC = input.parent().next(".col-md-6");
        var value = $.trim(input.val());
        opt.inValue = [];
        opt.outValue = [];
        var options = input.siblings("select").children("option");
        switch (input.parent().next(".col-md-6").length){
            case 0 :
                var data = opt.selectData;
                break;
            case 1 :
                var data = opt.data;
                break;
        }
        if(value){
            for(var i=0;i<data.length;i++){
                var a = data[i]['text'];
                var result = a.toLowerCase().lastIndexOf(value.toLowerCase());
                if(result > -1){
                    opt.inValue.push(data[i]);
                }else{
                    opt.outValue.push(data[i]);
                }
            }
            options.remove();
            for(var j=0;j<opt.inValue.length;j++){
                if(selectC.length == 0){
                    opt.select_option = $("<option></option>").appendTo(input.siblings("select")).val(opt.inValue[j]['value']).text(opt.inValue[j]['text']);
                }else{
                    opt.select_option = $("<option></option>").appendTo(input.siblings("select")).val(opt.inValue[j]['value']).text(opt.inValue[j]['text']);
                }
                opt.select_option.bind("click",{target:opt.select_option,option:opt},moveEvent);
            }
        }else {
            if(data.length != options.length){
                options.remove();
                for(var a=0;a<data.length;a++){
                    if(selectC.length == 0){
                        opt.select_option = $("<option></option>").appendTo(input.siblings("select")).val(data[a]['value']).text(data[a]['text']);
                    }else{
                        opt.select_option = $("<option></option>").appendTo(input.siblings("select")).val(data[a]['value']).text(data[a]['text']);
                    }
                    opt.select_option.bind("click",{target:opt.select_option,option:opt},moveEvent);
                }
            }
        }
    }
})(jQuery);


/*===============================================
 datatable
 @auther LK
 =================================================*/
(function($) {
    $.fn.datatable = function (opt, data) {
        if (typeof opt == "string"){
            return $.fn.datatable.methods[opt](this,data);
        }
        opt = opt || {};
        return this.each(function(){
            var _data = $.data(this,"table");
            if(_data){
                $.extend(_data.options,opt);
            }else{
                var opts = $.extend({}, $.fn.datatable.defaults, $.fn.datatable.parseOptions(this),opt);
                $.data(this,"table",{
                    options: opts
                });
                renderTF(this);

                if (opts.rowData) {
                    $(this).datatable("loadData", opts.rowData);
                } else {
                    var data = $.fn.datatable.parseData(this);
                    if (data.total > 0) {
                        $(this).datatable("loadData", data);
                    }
                }
                //渲染table数据
                getData(this);

            }
        });
    };
    $.fn.datatable.methods = {
        //获取table表头字段
        getColumnFields: function(jq, param) {
            return getColumn(jq[0],param);
        },
        reload: function(jq, _1c9) {
            return jq.each(function() {
                var opts = $(this).datatable("options");
                if (typeof _1c9 == "string") {
                    opts.url = _1c9;
                    _1c9 = null;
                }
                _b1(this, _1c9);//TODO
            });
        },
        //获取table数据
        getData: function(jq) {
            return $.data(jq[0], "table").data;
        },
        //获取table所有的行数据
        getRows: function(jq) {
            return $.data(jq[0], "table").data.rows;
        },
        getRowIndex: function(jq, id) {
            return _107(jq[0], id); //TODO
        },
        getChecked: function(jq) {
            return _10d(jq[0]); //TODO
        },
        selectAll: function(jq) {
            return jq.each(function() {
                _123(this); //TODO
            });
        },
        //加载table数据
        loadData: function(jq, data) {
            return jq.each(function() {
                renderData(this, data);
                //_17a(this);
            });
        },
        //加载table分页
        loadPage:function(jq){
            return jq.each(function(){
                renderPage(this);
            });
        },
        //返回options
        options: function(jq){
            return $.data(jq[0],"table").options;
        },
        //翻页触发获取新数据
        pageSelected: function(jq,page){
            return jq.each(function (){
                getData(this,page);
            });
        }

    };
    $.fn.datatable.parseOptions = function (obj) {
        var t = $(obj);
        return $.extend({},$.parser.parseOptions(obj));
    };
    //获取当前页面table数据
    $.fn.datatable.parseData = function (obj) {
        var _obj = $(obj);
        var data = {
            total: 0,
            rows: []
        };
        var column = _obj.datatable("getColumnFields",true);
        _obj.find("tbody tr").each(function(){
            data.total++;
            var row = {};
            for(var i=0;i<column.length;i++){
                row[column[i]] = $(this).find("td:eq(" + i + ")").html();
            }
            data.rows.push(row);
        });
        return data;
    };
    //渲染table数据
    var renderView = {
        render: function(obj) {
            var opt = $.data(obj,"table").options;
            var rows = $(obj).datatable("getRows");
            $(obj).find("tbody").remove();
            $(this.renderTable(obj,rows)).appendTo( $(obj));
            if(opt.checkbox){
                var tr = $(obj).find("tbody tr");
                for(var i=0;i<tr.length;i++){
                    $(tr[i]).find("td:eq(0)").bind("click.table",{target:$(tr[i])}, function (e) {
                        if(e.data.target.hasClass('active')){
                            e.data.target.removeClass("active");
                        }else{
                            e.data.target.addClass("active");
                        }
                    });
                }
            }
            if(opt.pagination){
                $(obj).datatable("loadPage");
            }

        },
        renderTable:function(obj,rows){
            var table = $.data(obj,"table");
            var opt = table.options;

            var column = $(obj).datatable("getColumnFields", true);

            var tbody = ["<tbody>"];
            if(rows.length){
                for(var i=0;i<rows.length;i++){
                    var row = rows[i];
                    tbody.push("<tr>");
                    tbody.push(this.renderRow.call(this, obj,column, row,i));
                    tbody.push("</tr>");
                }
            }else{
                tbody.push("<tr><td colspan='"+ column.length +"' style='background: white;text-align: center;' class='pv40'>");
                tbody.push("<div class='table_word'><span class='fa-stack fa-lg'><i class='fa fa-circle fa-stack-2x'></i><i class='fa fa-flag fa-stack-1x fa-inverse'></i></span><span>没有符合的数据,请尝试添加数据更换搜索条件</span></div>");
                tbody.push("</td></tr>");
            }

            tbody.push("</tbody>");
            return tbody.join("");
        },
        renderRow: function(obj,column, row,index){

            var opt = $.data(obj, "table").options;
            var cc = [];
            for(var i=0;i<column.length;i++){
                var col = column[i];
                if(i == column.length-1){
                    cc.push("<td class='text-right'>");
                }else{
                    cc.push("<td>");
                }
                if(opt.cloums.length){
                    for(var x=0;x<opt.cloums.length;x++){
                        if(col == opt.cloums[x].field){
                            row[col] = opt.cloums[x].formatter(row[col],row,index);
                        }
                    }
                }
                cc.push(row[col]);
                cc.push("</td>");
            }
            return cc.join("");
        }
    };
    $.fn.datatable.defaults = {
        columns: undefined,//列单元格操作，格式：[{field:单元格字段名，formatter:function(value,row,index){return ...}},...],value:单元格值，row:单元格所在行数据集合，index:单元格所在行数据在总数据集合的下标
        method: "post",
        idField: null,
        url: null,
        rowData: null,
        toolbar: false, //是否渲染头部操作区域，默认false
        toolbarSearch:null, //头部操作区域的搜索区域搜索字段设置，格式：[{title:搜索名称，name:搜索框input的name},...]
        checkbox:false,
        singleSelect: false,
        selectOnCheck: true,
        checkOnSelect: true,
        pagination: false,//是否开启分页，默认false
        queryParams: {},
        pageNumber: 1,
        pageSize: 10,
        layout: ["prev","next"],
        nav: {
            prev: {
                iconCls:"&laquo;",
                handler: function(){
                    var _opt = $(this).datatable("options");
                    if(_opt.pageNumber > 1){
                        $(this).datatable("pageSelected",_opt.pageNumber - 1);
                    }
                }
            },
            next: {
                iconCls:"&raquo;",
                handler: function(){
                    var _opt = $(this).datatable("options");
                    var _data = $(this).datatable("getData");
                    var _count = Math.ceil(_data.total / _opt.pageSize);
                    if(_opt.pageNumber < _count){
                        $(this).datatable("pageSelected",_opt.pageNumber + 1);
                    }
                }
            }
        },
        //editors: _1a9, //TODO
        rowStyler: function(_23d, _23e) {}, //TODO
        onLoadError: function() {},
        onClickRow: function(_24a, _24b) {}, //TODO
        onDblClickRow: function(_24c, _24d) {}, //TODO
        onCheck: function(_262, _263) {},
        loader: function(params, _240, _241) {
            var opts = $.data(this,"table").options;
            if (!opts.url) {
                return false;
            }
            $.ajax({
                type: opts.method,
                url: opts.url,
                async:false,
                data: params,
                dataType: "json",
                success: function(data) {
                    _240(data);
                },
                error: function() {
                    _241.apply(this, arguments);
                }
            });
        },
        view: renderView
    };
    //渲染分页等样式
    function renderTF(obj){
        var table = $.data(obj,"table");
        var opt = table.options;
        var _obj = $(obj);
        if(opt.pagination){
            var footerContainer = $("<div class='dt-panelfooter clearfix'></div>");
            _obj.after(footerContainer);
            $("<div class='dataTables_paginate'></div>").appendTo(footerContainer);
        }
        if(opt.checkbox){
            _obj.addClass("fchild-checkbox");
            _obj.find("thead tr").prepend($("<th class='sorting_disabled'></th>"));
        }
        if(opt.toolbar){
            var toobarContainer = $("<div class='as-panel-menu clearfix'></div>");
            _obj.before(toobarContainer);
            if(opt.toolbarSearch){
                var searchContainer = $("<div class='table_filter'></div>").appendTo(toobarContainer);
                for(var x in opt.toolbarSearch){
                    var group = $("<div class='as-form-group mbn mt10 mr5' style='display: inline-block;vertical-align: middle'></div>").appendTo(searchContainer);
                    $("<label class='as-control-label' style='display: inline'></label>").text(opt.toolbarSearch[x]['title']+"：").appendTo(group);
                    $("<input type='search' class='as-form-control as-input-sm' style='width: 180px;display: inline'/>").attr("name",opt.toolbarSearch[x]['name']).appendTo(group);
                }
                var btnGroup = $("<div class='as-form-group mbn mt10 mr5' style='display: inline-block;vertical-align: middle'></div>").appendTo(searchContainer);
                var button = $("<button class='btn btn-info btn-sm'>搜索</button>").appendTo(btnGroup);
                button.bind("click",{target:searchContainer,obj:obj},btnSearch);
            }
        }
    }
    //获取table表头字段
    function getColumn(obj,params){
        var _obj = $(obj);
        var column = [];
        _obj.find("thead tr th").each(function(){
            var name = {};
            var _d = $.trim($(this).attr("data-options"));
            if(!_d){
                column.push("");
            }else{
                name = (new Function("return" + _d))();
                column.push(name.field);
            }

        });
        return column;
    }
    //获取table数据
    function getData(obj,num){
        var opt = $.data(obj,"table").options;

        if(opt.pagination){
            opt.queryParams = $.extend({},opt.queryParams,{
                page: opt.pageNumber || 1,
                size: opt.pageSize
            });
            if(num){
                opt.queryParams.page = num;
                opt.pageNumber = num;

                var loading = $("<tr class='loading'></tr>");
                var textbox = $("<p><i class='icon-spinner icon-spin'></i>loading...</p>");
                loading.prepend(textbox);
                $(obj).find("tbody").prepend(loading);
            }
        }
        if(num){
            setTimeout(loaderData,1000);
        }else{
            var result = loaderData();
        }

        if (result == false) {
            $(obj).datatable("loaded");
        }

        function loaderData(){
            var ret = opt.loader.call(obj, opt.queryParams,
                function(data) {
                    $(obj).datatable("loadData", data);
                },
                function() {
                    opt.onLoadError.apply(obj, arguments);
                });
            return ret;
        }
    }
    //渲染tabel数据
    function renderData(obj,data){
        var table = $.data(obj, "table");
        var opt = table.options;
        table.data = data;
        opt.view.render.call(opt.view,obj);
    }
    //table搜索事件
    function btnSearch(e){
        var searchContainer = e.data.target;
        var obj = e.data.obj;
        var opt = $.data(obj,"table").options;
        var inputs = searchContainer.find("input");
        var params = {};
        for(var x=0;x<inputs.length;x++){
            var name = $(inputs[x]).attr("name");
            var value = $(inputs[x]).val();
            params[name] = value;
        }
        opt.queryParams = $.extend({},opt.queryParams,params);


        var loading = $("<tr class='loading'></tr>");
        var textbox = $("<p><i class='icon-spinner icon-spin'></i>loading...</p>");
        loading.prepend(textbox);
        $(obj).find("tbody").prepend(loading);


        setTimeout(loaderData,1000);
        function loaderData(){
            var ret = opt.loader.call(obj, params,
                function(data) {
                    $(obj).datatable("loadData", data);
                },
                function() {
                    opt.onLoadError.apply(obj, arguments);
                });
            return ret;
        }

    }
    //渲染翻页
    function renderPage(obj){
        var table = $.data(obj,"table");
        var opt = table.options;
        var data = table.data;
        var pageContainer = $(obj).next().find(".dataTables_paginate");
        pageNumber(obj,pageContainer[0]);
    }
    //渲染上下页码
    function render(obj,jq){
        var table = $.data(obj,"table");
        var _opt = table.options;
        var _nav = $(jq).html("<nav><ul class='as-page'></ul></nav>");
        var _ul = $(jq).find("ul.as-page");
        var _layout = $.extend([],_opt.layout);
        for(var i=0; i < _layout.length; i++){
            switch (_layout[i]){
                case "prev":
                    addNp("prev");
                    break;
                case "next":
                    addNp("next");
                    break;
            }
        }
        //渲染页码按钮
        function addNp(nv){
            var adClass = "class=\""+ nv + "\"";
            var _url = "javascript:void(0)";
            var nav = _opt.nav[nv];
            var _pn = $('<li '+ adClass +'><a href="'+ _url +'" aria-label="Previous"><span aria-hidden="true">'+ nav.iconCls +'</span></a></li>').appendTo(_ul);
            _pn.unbind(".table").bind("click.table",function (e) {
                nav.handler.call(obj);
            });
        }
    }
    //渲染翻页页码
    function pageNumber(obj,jq,num){
        var table = $.data(obj,"table");
        var _opt = table.options;
        var _data = table.data;
        $.extend(_opt,num || {});
        var _count = Math.ceil(_data.total / _opt.pageSize) || 1;
        if(_opt.pageNumber < 1){
            _opt.pageNumber = 1;
        }
        if(_opt.pageNumber > _count){
            _opt.pageNumber = _count;
        }
        if(_data.total == 0){
            _opt.pageNumber = 0;
            _count = 0;
        }
        render(obj,jq);
        var _next = $(jq).find("li.next");
        var _prev = $(jq).find("li.prev");
        if(_next.length){
            if(_count == 0){
                prevDis();
                nextDis();
                var _number = _next.before('<li ><a href="javascript:void(0)">'+ 1 +'</a></li>');
                pageBind(0,_number.prev());
            }
            if(_count < 7){
                prevDis();
                nextDis();
                for(var i=1; i <= _count; i++){
                    var _number = _next.before('<li ><a href="javascript:void(0)">'+ i +'</a></li>');
                    _number.prev().unbind(".table").bind("click.table",{pageNumber: i}, function (e) {
                        getData(obj, e.data.pageNumber);
                    });
                    pageBind(i,_number.prev());
                }
            }
            if(_opt.pageNumber < 5 && _count >= 7){
                prevDis();
                for(var i=1; i <= 7; i++){
                    switch (i){
                        case 6:
                            var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                            _dis.prev().addClass("disabled");
                            break;
                        case 7:
                            var _number = _next.before('<li ><a href="javascript:void(0)">'+ _count +'</a></li>');
                            _number.prev().unbind(".table").bind("click.table",{pageNumber: _count}, function (e) {
                                getData(obj, e.data.pageNumber);
                            });
                            pageBind(i,_number.prev());
                            break;
                        default :
                            var _number = _next.before('<li ><a href="javascript:void(0)">'+ i +'</a></li>');
                            _number.prev().unbind(".table").bind("click.table",{pageNumber: i}, function (e) {
                                getData(obj, e.data.pageNumber);
                            });
                            pageBind(i,_number.prev());
                            break;
                    }
                }
            }
            if(_opt.pageNumber >= 5 && _count >= 7){
                if(_opt.pageNumber >= _count-2){
                    nextDis();
                    for(var i=1; i<=3; i++){
                        switch (i){
                            case 1:
                                var _number = _next.before('<li ><a href="javascript:void(0)">1</a></li>');
                                _number.prev().unbind(".table").bind("click.table",{pageNumber: 1}, function (e) {
                                    getData(obj, e.data.pageNumber);
                                });
                                pageBind(i,_number.prev());
                                break;
                            case 2:
                                var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                                _dis.prev().addClass("disabled");
                                break;
                            case 3:
                                for(var j=_count-4; j<=_count; j++){
                                    var _number = _next.before('<li ><a href="javascript:void(0)">'+ j +'</a></li>');
                                    _number.prev().unbind(".table").bind("click.table",{pageNumber: j}, function (e) {
                                        getData(obj, e.data.pageNumber);
                                    });
                                    pageBind(j,_number.prev());
                                }
                                break;
                        }
                    }
                }else{
                    for(var i=-5; i <= -1; i++){
                        switch (i){
                            case -1:
                                var _number = _next.before('<li ><a href="javascript:void(0)">'+ _count +'</a></li>');
                                _number.prev().unbind(".table").bind("click.table",{pageNumber: _count}, function (e) {
                                    getData(obj, e.data.pageNumber);
                                });
                                pageBind(i,_number.prev());
                                break;
                            case -3:
                                for(var j=-2; j<=2; j++) {
                                    var _cou = _opt.pageNumber + j;
                                    var _number = _next.before('<li ><a href="javascript:void(0)">' + _cou + '</a></li>');
                                    _number.prev().unbind(".table").bind("click.table",{pageNumber: _cou}, function (e) {
                                        getData(obj, e.data.pageNumber);
                                    });
                                    pageBind(_cou, _number.prev());
                                }
                                break;
                            case -5:
                                var _number = _next.before('<li ><a href="javascript:void(0)">1</a></li>');
                                _number.prev().unbind(".table").bind("click.table",{pageNumber: 1}, function (e) {
                                    getData(obj, e.data.pageNumber);
                                });
                                pageBind(i,_number.prev());
                                break;
                            default :
                                var _dis = _next.before('<li ><a href="javascript:void(0)">...</a></li>');
                                _dis.prev().addClass("disabled");
                                break;
                        }
                    }
                }
            }
        }
        //当前页码为1时，上一页按钮置为disabled
        function prevDis(){
            switch (_opt.pageNumber){
                case 0:
                    _prev.addClass("disabled");
                    _prev.children().first().attr("href","javascript:void(0)");
                    break;
                case 1:
                    _prev.addClass("disabled");
                    _prev.children().first().attr("href","javascript:void(0)");
                    break;
                default :
                    _prev.removeClass("disabled");
            }
        }
        //当前页码为尾页时，下一页按钮disabled
        function nextDis(){
            switch (_opt.pageNumber){
                case _count:
                    _next.addClass("disabled");
                    _next.children().first().attr("href","javascript:void(0)");
                    break;
                default :
                    _next.removeClass("disabled");
            }
        }
        //设置当前页面页码样式
        function pageBind(i,nber){
            if(i == _opt.pageNumber){
                nber.addClass("active");
            }
        }
    }
})(jQuery);


/*
    tab
 */
+(function($){
    'use strict';

    function create(target){

        $(target).children('li').bind('click',function(){

            $(this).parents('ul').children('li.active').removeClass('active').each(function(){
                var href = $(this).children().attr("href");
                $(href).hide();
            });

            $(this).addClass('active');

            var href = $(this).children().attr("href");

            $(href).fadeIn();

        });


    }

    $.fn.tab = function(options, param){

        if (typeof options == 'string'){
            var method = $.fn.tab.methods[options];
            return method(this, param);
        }

        return this.each(function(){
            create(this);
        });

    };

    $.fn.tab.methods = {

    };

    $.fn.tab.defaults = {
    }

})(jQuery);

