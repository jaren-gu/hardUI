/*
 所有命名都采用驼峰命名法(第二个单词起所有首字母大写)

 方法及参数无特殊标记
 普通变量以 _ 开头				(  例如 : _var  )
 全局常量以 _ 开头 以 _ 结束		(  例如 : _var_ )

 */
(function ($) {

  var Calendar = function (element, options) {

    this.calendar = getCalendar(element, options);

    $(this.calendar).data("element", {input: element});
  };

  Calendar.prototype = {

    constructor: Calendar
  };

  function getCalendar(element, options) {

    var _calendar = $($.fn.calendar.template.base);

    var _type = options.type || "picker";

    if (_type == "date" || _type == "picker") {
      var _datapickerDays = makeDatapickerDays(element);

      _calendar.find("div.datapicker-days").append(_datapickerDays);
    }

    if (_type = "timer" || _type == "picker") {

    }

    $("body").append(_calendar);

    return _calendar;
  }

  function makeDatapickerDays(element) {

    var _datapickerDays = $($.fn.calendar.template.datapickerDays);

    var _date = getDate($(element).val());

    var _body = getBody(_date);

    setCalendar(_datapickerDays, _date, _body);

    return _datapickerDays;

  }

  function setCalendarValue(element, date) {
    element.prev("input").val(date.year + " - " + (date.month + 1) + " - " + date.day);
  }

  //////////////////////////////////////////////////////////////////////////

  function getDate(time) {

    var _date = time || "";
    if (_date) {
      _date = _date.split('-');

      if (_date[2] == "undefined") {
        _date = new Date($.trim(_date[0]), $.trim(_date[1] - 1), 1);
        _date.noSelect = true;
      } else {
        _date = new Date($.trim(_date[0]), $.trim(_date[1] - 1), $.trim(_date[2]));
      }

      if (_date == "Invalid Date") {
        _date = new Date();
      }
    } else {
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

    if (_date.year == _date.thisYear && _date.month == _date.thisMonth) {
      _date.isThisMonth = true;
    }

    //当月第一天
    _date.fistWeek = new Date(_date.year, _date.month, 1).getUTCDay();

    if (_date.fistWeek != 6) {
      //如果当月不是从周日开始,获取上一个月天数
      _date.lastMonthDays = new Date(_date.year, _date.month).getUTCDate();
    }

    return _date;
  }

  function getBody(date) {

    var _weeks = [];
    var _week = [];
    var _body = $('<tbody></tbody>');

    var _date = date;

    if (_date.fistWeek != 6) {

      for (_i = 1; _i < 7 - _date.fistWeek; _i++) {
        var _day = $('<td class="day">' + _i + '</td>');

        if (_i == _date.today && _date.isThisMonth) {
          _day.addClass("today");
        }

        if (_i == _date.day && !_date.noSelect) {
          _day.addClass("active");
        }

        _week.push(_day);
      }

      _weeks.push(_week);
      _week = [];
    }

    for (_i = 6 - _date.fistWeek + 1; _i <= _date.days; _i++) {

      var _day = $('<td class="day">' + _i + '</td>');

      if (_i == _date.today && _date.isThisMonth) {
        _day.addClass("today");
      }

      if (_i == _date.day && !_date.noSelect) {
        _day.addClass("active");
      }

      _week.push(_day);

      if (_week.length == 7) {
        _weeks.push(_week);
        _week = [];
      }

    }

    if (_week.length) {
      _weeks.push(_week);
    }

    //如果当前月一号不是周一
    if (_date.lastMonthDays) {
      for (_j = 0; _j <= _date.fistWeek; _j++) {

        var _day = $('<td class="day prevMonth">' + (_date.lastMonthDays - _j) + '</td>');
        _weeks[0].unshift(_day)
      }
    }

    //如果最后一周天数少于7天
    if (_weeks[_weeks.length - 1].length < 7) {
      var _len = 7 - _weeks[_weeks.length - 1].length;
      for (_i = 1; _i <= _len; _i++) {
        var _day = $('<td class="day nextMonth">' + _i + '</td>');
        _weeks[_weeks.length - 1].push(_day);
      }
    }

    for (var _i = 0; _i < _weeks.length; _i++) {
      _weeks[_i] = $('<tr class="week' + _i + '"></tr>').append(_weeks[_i]);
      _body.append(_weeks[_i]);
    }

    return _body;
  }

  function setCalendar(calendar, date, body) {
    if (calendar.find("tbody")) {
      calendar.find("tbody").remove();
    }

    calendar.find("td.time-text").text(" " + date.year + " - " + (date.month + 1));

    calendar.find("thead").after(body);

    // bindCalendarEvents(calendar);
  }

  //日历选中事件
  function selectDay(element) {

    var _element = $(element.target);

    var _calendar = $(element.target).parents('.as-calendarpicker');


    _calendar.find("td.active").removeClass("active");

    _element.addClass("active");

    var _time = _calendar.find("td.time-text").text().split('-');

    _time[2] = $.trim(_element.text());

    if (_element.hasClass("prevMonth")) _time[1]--;

    if (_element.hasClass("nextMonth")) _time[1]++;

    _time = $.trim(_time[0]) + "-" + $.trim(_time[1]) + "-" + $.trim(_time[2]);

    var _date = getDate(_time);

    var _body = getBody(_date);

    setCalendar(_calendar, _date, _body);

    setCalendarValue(_calendar, _date);

    $(_calendar.data("element").input).val(_date.getFullYear() + "-" + (_date.getMonth() + 1) + "-" + _date.getDate());

    $(_calendar).addClass("hide");

  }

  function setMonth(element, opt) {

    var _calendar = $(element.target).parents(".as-calendarpicker");

    var _time = _calendar.find("td.time-text").text().split('-');

    if (opt == "1") {
      _time = _time[0] + "-" + (++_time[1]) + "-" + _time[2];
    } else {
      _time = _time[0] + "-" + (--_time[1]) + "-" + _time[2];
    }

    var _date = getDate(_time);

    var _body = getBody(_date);

    setCalendar(_calendar, _date, _body);
  }

  function setYear(element, opt) {

    var _calendar = $(element.target).parents(".as-calendarpicker");

    var _time = _calendar.find("td.time-text").text().split('-');

    if (opt == "1") {
      _time = (++_time[0]) + "-" + _time[1] + "-" + _time[2];
    } else {
      _time = (--_time[0]) + "-" + _time[1] + "-" + _time[2];
    }

    var _date = getDate(_time);

    var _body = getBody(_date);

    setCalendar(_calendar, _date, _body);
  }


  function bindCalendarEvents(calendar) {

    $(calendar).unbind(".calendar").bind("click.calendar", function (e) {
      var t = toTarget(e.target);
      if (t.hasClass("day")) {
        selectDay(e);
      } else if (t.hasClass("next")) {
        setMonth(e, 1);
      } else if (t.hasClass("prev")) {
        setMonth(e, -1);
      } else if (t.hasClass("nextY")) {
        setYear(e, 1);
      } else if (t.hasClass("prevY")) {
        setYear(e, -1);
      }
    });

    function toTarget(element) {
      var target = $(element).closest('td');

      if (target.length) {
        return target;
      }
      else {
        return $(target);
      }
    }
  }

//初始化控件
  $.fn.calendar = function (options, params) {

    //如果传入是一个字符串,执行相应函数
    if (typeof options == "string") {
      return $.fn.calendar.methods[options](this, params);
    }

    //保证 options 不为 undefined
    options = options || {};

    return this.each(function () {

      //获取已有属性
      var _data = $.data(this, "options");

      if (_data) {
        $.extend(_data.options, options);
      } else {
        //拼接配置参数
        _data = $.extend({}, $.fn.calendar.defaults, $.fn.calendar.parseOptions(this), typeof options == 'object' && options);
        $.data(this, "options", {options: _data});
        $.data(this, "element", new Calendar(this, _data));
      }

      $.fn.calendar.init(this);
      $.fn.calendar.bindEvents(this);
      bindCalendarEvents($.data(this, "element").calendar);

    })

  };

  function show(element) {

    if ($(this).val() != "") {
      var _calendar = $(this).data("element").calendar;

      var _time = $(this).val();

      var _date = getDate(_time);

      var _body = getBody(_date);

      setCalendar(_calendar, _date, _body);

    }

    var offset = $(this).offset();
    offset.top = offset.top + $(this).outerHeight(true);
    $(this).data("element").calendar.css("top", offset.top);
    $(this).data("element").calendar.css("left", offset.left);

    $(this).data("element").calendar.removeClass("hide");

    $(document).bind('mousedown.calendar', function (e) {
      // 点击日历控件以外的元素 删除日历元素
      if ($(e.target).closest('.as-calendarpicker').length === 0) {
        $(document).unbind(".calendar");

        //隐藏日历控件
        $(".as-calendarpicker").addClass("hide")
      }
    });
  }

//初始化组件
  $.fn.calendar.init = function (element) {

    //$(element).attr("readonly", "true");
  };

  $.fn.calendar.bindEvents = function (element) {

    var options = $.data(element, "options").options;

    $(element).unbind(".calendar");

    //循环绑定事件
    for (var action in options.events) {
      $(element).bind(action + ".calendar", {element: element}, options.events[action]);
    }
  };

//默认参数
  $.fn.calendar.defaults = {
    year: new Date().getFullYear(),
    month: new Date().getMonth() + 1,
    day: new Date().getDate(),
    type: "picker",
    events: {
      click: show
    }
  };

//格式化参数
  $.fn.calendar.parseOptions = function (obj) {

    return $.parser.parseOptions(obj);

  };

//提供调用的方法
  $.fn.calendar.methods = {};

  $.fn.calendar.template = {
    base: '<div class="as-calendarpicker hide">' +
    '<ul>' +
    '<li class="collapse">' +
    '<div class="datapicker-years"></div>' +
    '</li>' +
    '<li class="collapse">' +
    '<div class="datapicker-months"></div>' +
    '</li>' +
    '<li class="collapse in">' +
    '<div class="datapicker-days"></div>' +
    '</li>' +
    '<li class="collapse toolbar">' +
    '</li>' +
    '<li class="collapse">' +
    '<div class="timepicker">' +
    '<div class="timepicker-picker"></div>' +
    '<div class="timepicker-hours"></div>' +
    '<div class="timepicker-minutes"></div>' +
    '</div>' +
    '</li>' +
    '</ul>' +
    '</div>',

    toolbar: '<a href="javascript:void(0)" class="btn">' +
    '<span class="glyphicon glyphicon-time"></span>' +
    '</a>',

    datapickerDays: '<table>' +
    '<thead>' +
    '<tr>' +
    '<td class="prevY"><span class="fa fa-angle-double-left"></span></td>' +
    '<td class="prev"><span class="fa fa-angle-left"></span></td>' +
    '<td class="time-text" colspan="3"></td>' +
    '<td class="next"><span class="fa fa-angle-right"></span></td>' +
    '<td class="nextY"><span class="fa fa-angle-double-right"></span></td>' +
    '</tr>' +
    '<tr>' +
    '<th>日</th>' +
    '<th>一</th>' +
    '<th>二</th>' +
    '<th>三</th>' +
    '<th>四</th>' +
    '<th>五</th>' +
    '<th>六</th>' +
    '</tr>' +
    '</thead>' +
    '<tbody></tbody>' +
    '</table>',

    timepickerPicker: ' <table>' +
    '<tbody>' +
    '<tr>' +
    '<td class="separator"></td>' +
    '<td>' +
    '<a href="javascript:void(0)" class="btn" data-action="">' +
    '<span class="glyphicon glyphicon-menu-up"></span>' +
    '</a>' +
    '</td>' +
    '<td colspan="3"></td>' +
    '<td>' +
    '<a href="javascript:void(0)" class="btn" data-action="">' +
    '<span class="glyphicon glyphicon-menu-up"></span>' +
    '</a>' +
    '</td>' +
    '<td class="separator"></td>' +
    '</tr>' +
    '<tr class="timer">' +
    '<td class="separator"></td>' +
    '<td class="hour">12</td>' +
    '<td class="separator"></td>' +
    '<td>:</td>' +
    '<td class="separator"></td>' +
    '<td class="Minute">20</td>' +
    '<td class="separator"></td>' +
    '</tr>' +
    '<tr>' +
    '<td class="separator"></td>' +
    '<td>' +
    '<a href="javascript:void(0)" class="btn" data-action="">' +
    '<span class="glyphicon glyphicon-menu-down"></span>' +
    '</a>' +
    '</td>' +
    '<td colspan="3"></td>' +
    '<td>' +
    '<a href="javascript:void(0)" class="btn" data-action="">' +
    '<span class="glyphicon glyphicon-menu-down"></span>' +
    '</a>' +
    '</td>' +
    '<td class="separator"></td>' +
    '</tr>' +
    '</tbody>' +
    '</table>'
  };


  $.fn.calendar.version = "0.0.1-dev";

//构造函数
// $.fn.Calendar.constructor = Calendar
//让控件支持链式操作
//$.fn.Calendar.prototype = $.fn.Calendar.prototype.fn


//避免与其它JS框架冲突
  var _old = $.fn.calendar;

  $.fn.calendar.noConflict = function () {
    $.fn.Calendar = _old;
    return this;
  }

})
(jQuery);
