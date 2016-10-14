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