/**
 *  jQuery Awesome 1.0.0
 *
 *  pagination.js
 *
 *  @author:
 */
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