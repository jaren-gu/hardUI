/**
 * Created by lonntec on 2016/3/1.
 */
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