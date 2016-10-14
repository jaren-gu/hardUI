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