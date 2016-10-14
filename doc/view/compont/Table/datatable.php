<div class="pt20" id="datatable">
    <h2>Datatable</h2>
    <hr class="alt short" />
    <p>通过 $.fn.table.defaults 重写默认的 defaults。该组件扩展自panel</p>
    <p>数据表格（datatable）以表格格式显示数据，并为选择、排序、分组和编辑数据提供了丰富的支持。数据表格（datatable）的设计目的是为了减少开发时间，且不要求开发人员具备指定的知识。它是轻量级的，但是功能丰富。</p>
</div>
<div class="bs-docs-section">
    <!-- Begin: Content -->
    <section id="content" class="animated fadeIn">
        <div class="as-panel">
            <div class="as-panel-header">
                <span class="as-panel-icon">
                    <i class="fa fa-database"></i>
                </span>
                <span class="as-panel-title">DataTable</span>
                <span class="as-panel-controls">
                    <a href="#" id="ico-search" class="fa fa-search "></a>
                    <a href="#" class="fa fa-file-o"></a>
                    <a href="#" class="fa fa-times" title="关闭"></a>   
                </span>
            </div>
            <div class="panel-editbox" id="input-search">
                <input type="text" class="form-control" />
            </div>
            <div class="as-panel-body pn">
                <!-- Start toolBar -->
                <div class="as-panel-menu clearfix">
                    <div class="DTTT btn-group">
                        <a class="btn btn-default light btn-sm"><span>新建</span></a>
                        <a class="btn btn-default light btn-sm"><span>修改</span></a>
                        <a class="btn btn-default light btn-sm"><span>删除</span></a>
                    </div>
                    <div class="table_filter">
                        <label>
                            搜索：
                            <input type="search" class="as-form-control as-input-sm" />
                        </label>
                    </div>
                </div>
                <!-- End toolBar -->
                <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable" id="datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>名称</th>
                            <th>地址</th>
                            <th>办公室</th>
                            <th>年龄</th>
                            <th>工作时间</th>
                            <th>工资</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                            <td></td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Sonya Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>2008/12/13</td>
                            <td>$103,600</td>
                        </tr>
                    </tbody>
                </table>
                <div class="dt-panelfooter clearfix">
                    <div class="table_paginate">
                        <ul class="table_pagination">
                            <li class="table_paginate_button previous disabled">
                                <a href="#">上一页</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">1</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">...</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">5</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">6</a>
                            </li>
                            <li class="table_paginate_button active">
                                <a href="#">7</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">8</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">9</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">...</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">100</a>
                            </li>
                            <li class="table_paginate_button next">
                                <a href="#">下一页</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Content -->
</div>
<div class="bs-docs-section">
    <h3>用法</h3>
    <p>从已有的表格元素创建数据网格（datatable），在 html 中定义列、行及数据。</p>
    <pre class="brush:xml">
        <div class="as-panel">
            <div class="as-panel-header">
                <span class="as-panel-icon">
                    <i class="fa fa-database"></i>
                </span>
                <span class="as-panel-title">DataTable</span>
                <span class="as-panel-controls">
                    <a href="#" id="ico-search" class="fa fa-search "></a>
                    <a href="#" class="fa fa-file-o"></a>
                    <a href="#" class="fa fa-times" title="关闭"></a>   
                </span>
            </div>
            <div class="panel-editbox" id="input-search">
                <input type="text" class="form-control" />
            </div>
            <div class="as-panel-body pn">
                <!-- Start toolBar -->
                <div class="as-panel-menu clearfix">
                    <div class="DTTT btn-group">
                        <a class="btn btn-default light btn-sm"><span>新建</span></a>
                        <a class="btn btn-default light btn-sm"><span>修改</span></a>
                        <a class="btn btn-default light btn-sm"><span>删除</span></a>
                    </div>
                    <div class="table_filter">
                        <label>
                            搜索：
                            <input type="search" class="form-control as-input-sm" />
                        </label>
                    </div>
                </div>
                <!-- End toolBar -->
                <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>名称</th>
                            <th>地址</th>
                            <th>办公室</th>
                            <th>年龄</th>
                            <th>工作时间</th>
                            <th>工资</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                            <td></td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                        </tr>
                    </tbody>
                </table>
                <div class="dt-panelfooter clearfix">
                    <div class="table_paginate">
                        <ul class="table_pagination">
                            <li class="table_paginate_button previous disabled">
                                <a href="#">上一页</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">1</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">...</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">5</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">6</a>
                            </li>
                            <li class="table_paginate_button active">
                                <a href="#">7</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">8</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">9</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">...</a>
                            </li>
                            <li class="table_paginate_button">
                                <a href="#">100</a>
                            </li>
                            <li class="table_paginate_button next">
                                <a href="#">下一页</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </pre>
    <p>通过 <code>&lt;table&gt;</code> 标记创建数据网格（datatable）。嵌套的 <code>&lt;th&gt;</code> 标签定义表格中的列。</p>
    <pre class="brush:xml">
        <table class="as-table" id="dg" data-options="url:'',fitColumns:true,singleSelect:true">
            <thead>
                <tr>
                    <th data-options="field:'code',width:100">Code</th>
                    <th data-options="field:'name',width:100">Name</th>
                    <th data-options="field:'price',width:100,align:'right'">Price</th>
                </tr>
            </thead>
        </table>
    </pre>
    <p>也可以使用 javascript 创建数据网格（datatable）。</p>
    <pre class="brush:js">
        $('#dg').table({
            url:'table_data.json',
            columns:[[
                {field:'code',title:'Code',width:100},
                {field:'name',title:'Name',width:100},
                {field:'price',title:'Price',width:100,align:'right'}
            ]]
        });
    </pre>
    <h4>通过一些参数查询数据。</h4>
    <p>提交一个 ajax 表单（form）是非常简单的。当提交完成时用户可以获得响应数据。请注意，响应数据是来自服务器的原始数据。对响应数据的解析动作要求获得正确的数据。</p>
    <p>例如，响应数据假设是 JSON 格式，一个典型的响应数据如下所示：</p>
    <pre class="brush:js">
        $('#dg').table('load', {
            name: 'awesome',
            address: 'ho'
        });
    </pre>
    <p>在向服务器改变数据之后，更新前台数据。</p>
    <pre class="brush:js">
        $('#dg').table('reload');
    </pre>
</div>
<div class="bs-docs-section">
    <h3>属性</h3>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover as-table as-table-striped as-table-hover-striped">
                <thead>
                    <th>名称</th>
                    <th>类型</th>
                    <th>描述</th>
                    <th>默认值</th>
                </thead>
                <tr>
                    <td>url</td>
                    <td>string</td>
                    <td>提交form表单以外从远程站点请求数据的 URL。的参数</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>columns</td>
                    <td>array</td>
                    <td>据网格（datatable）的列（column）的配置对象，更多细节请参见列（column）属性。</td>
                    <td>undefined</td>
                </tr>
                <tr>
                    <td>method</td>
                    <td>string</td>
                    <td>请求远程数据的方法（method）类型。</td>
                    <td>post</td>
                </tr>
                <tr>
                    <td>idField</td>
                    <td>string</td>
                    <td>指示哪个字段是标识字段。</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>rowData</td>
                    <td>array,object</td>
                    <td>
                        要加载的数据。<br/>
                        代码实例：
                        <pre class="brush:js">
                            $('#dg').table({
                                rowData: [
                                    {f1:'value11', f2:'value12'},
                                    {f1:'value21', f2:'value22'}
                                ]
                            });
                        </pre>
                    </td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>pagination</td>
                    <td>boolean</td>
                    <td>设置为 true，则在数据网格（datatable）底部显示分页工具栏。</td>
                    <td>FALSE</td>
                </tr>
                <tr>
                    <td>queryParams</td>
                    <td>object</td>
                    <td>
                        当请求远程数据时，发送的额外参数。<br/>
                        代码实例：
                        <pre class="brush:js">
                            $('#dg').table({
                                queryParams: {
                                    name: 'awesome',
                                    subject: 'datatable'
                                }
                            });
                        </pre>
                    </td>
                    <td>{}</td>
                </tr>
                <tr>
                    <td>loader</td>
                    <td>function</td>
                    <td>
                        定义如何从远程服务器加载数据。返回 false 则取消该动作。该函数有下列参数：<br>
                        param：要传递到远程服务器的参数对象。<br>
                        success(data)：当检索数据成功时调用的回调函数。<br>
                        error()：当检索数据失败时调用的回调函数。
                    </td>
                    <td>json loader</td>
                </tr>
                <tr>
                    <td>editors</td>
                    <td>object</td>
                    <td>定义编辑行时的编辑器。</td>
                    <td>predefined editors</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>列(Column)属性</h3>
    <p>数据表格（datatable） 的列（Column）是一个数组对象，它的每个元素也是一个数组。元素数组的元素是一个配置对象，它定义了每个列的字段。</p>
    <p>代码实例</p>
    <pre class="brush:js">
        columns:[[
            {field:'itemid',title:'Item ID',rowspan:2,width:80,sortable:true},
            {field:'productid',title:'Product ID',rowspan:2,width:80,sortable:true},
            {title:'Item Details',colspan:4}
        ],[
            {field:'listprice',title:'List Price',width:80,align:'right',sortable:true},
            {field:'unitcost',title:'Unit Cost',width:80,align:'right',sortable:true},
            {field:'attr1',title:'Attribute',width:100},
            {field:'status',title:'Status',width:60}
        ]]
    </pre>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover as-table as-table-striped as-table-hover-striped">
                <thead>
                    <th>名称</th>
                    <th>类型</th>
                    <th>描述</th>
                    <th>默认值</th>
                </thead>
                <tr>
                    <td>checkbox</td>
                    <td>boolean</td>
                    <td>设置为 true，则显示复选框。复选框有固定宽度。</td>
                    <td>undefined</td>
                </tr>
                <tr>
                    <td>formatter</td>
                    <td>function</td>
                    <td>
                        单元格的格式化函数，需要三个参数：<br/>
                        value：字段的值<br/>
                        rowData：行的记录数据。<br/>
                        rowIndex：行的索引。<br/>
                        代码实例：
                        <pre class="brush:js">
                            $('#dg').table({
                                columns:[[
                                    {field:'userId',title:'User', width:80,
                                        formatter: function(value,row,index){
                                            if (row.user){
                                                return row.user.name;
                                            } else {
                                                return value;
                                            }
                                        }
                                    }
                                ]]
                            });
                        </pre>
                    </td>
                    <td>undefined</td>
                </tr>
                <tr>
                    <td>align</td>
                    <td>string</td>
                    <td>指示如何对齐该列的数据，可以用 'left'、'right'、'center'。</td>
                    <td>undefined</td>
                </tr>
                <tr>
                    <td>hidden</td>
                    <td>boolean</td>
                    <td>设置为 true，则隐藏该列。</td>
                    <td>undefined</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>编辑器（Editor）</h3>
    <p>通过 $.fn.table.defaults.editors 重写默认的 defaults。</p>
    <p>每个编辑器有下列行为：</p>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover as-table as-table-striped as-table-hover-striped">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>描述</th>
                </thead>
                <tr>
                    <td>init</td>
                    <td>container,options</td>
                    <td>初始化编辑器并且返回目标对象。</td>
                </tr>
                <tr>
                    <td>getValue</td>
                    <td>target</td>
                    <td>从编辑器的文本获取值。</td>
                </tr>
                <tr>
                    <td>setValue</td>
                    <td>target,value</td>
                    <td>给编辑器设置值。</td>
                </tr>
            </table>
        </div>
    </div>
    <p>例如，文本编辑器（text editor）定义如下：</p>
    <pre class="brush:js">
        $.extend($.fn.table.defaults.editors, {
            text: {
                init: function(container, options){
                    var input = $('<input type="text" class="table-editable-input">').appendTo(container);
                    return input;
                },
                destroy: function(target){
                    $(target).remove();
                },
                getValue: function(target){
                    return $(target).val();
                },
                setValue: function(target, value){
                    $(target).val(value);
                },
                resize: function(target, width){
                    $(target)._outerWidth(width);
                }
            }
        });
    </pre>
</div>
<div class="bs-docs-section">
    <h3>事件</h3>
    <p>下面是为数据网格（datatable）添加的事件。</p>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>描述</th>
                </thead>
                <tr>
                    <td>onLoadError</td>
                    <td>none</td>
                    <td>加载远程数据发生某些错误时触发。</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>方法</h3>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>描述</th>
                </thead>
                <tr>
                    <td>reload</td>
                    <td>param&nbsp;</td>
                    <td>重新加载行，就像 load 方法一样，但是保持在当前页。</td>
                </tr>
                <tr>
                    <td>loadData</td>
                    <td>data&nbsp;</td>
                    <td>加载本地数据，旧的行会被移除。</td>
                </tr>
                <tr>
                    <td>getData</td>
                    <td>none</td>
                    <td>返回加载的数据。</td>
                </tr>
                <tr>
                    <td>getRows</td>
                    <td>none</td>
                    <td>返回当前页的行。</td>
                </tr>
                <tr>
                    <td>getChecked</td>
                    <td>none</td>
                    <td>返回复选框选中的所有行</td>
                </tr>
                <tr>
                    <td>clearChecked</td>
                    <td>none</td>
                    <td>清除所有勾选的行。</td>
                </tr>
            </table>
        </div>
    </div>
</div>