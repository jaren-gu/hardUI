<div class="pt20" id="pagination">
    <h2>Pagination 分页</h2>
    <hr class="alt short" />
    <p>通过 $.fn.pagination.defaults 重写默认的 defaults。</p>
    <p>分页（pagination）允许用户通过翻页导航数据。</p>
</div>
<div class="bs-docs-section">
    <h3>实例</h3>
    <div class="as-panel">
        <div class="as-panel-body">
            <div id="pp"></div>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>用法</h3>
    <p>通过标记创建分页。</p>
    <pre class="brush:xml">
        <div class="as-pagination" data-options="total:100"></div>
    </pre>
    <p>通过javascript创建分页。</p>
    <pre class="brush:xml">
        <div id="tt"></div>
    </pre>
    <pre class="brush:js">
        $('#tt').pagination({
            total:20
        });
    </pre>
</div>
<div class="bs-docs-section">
    <h3>属性</h3>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table">
                <thead>
                <th>名称</th>
                <th>类型</th>
                <th>说明</th>
                <th>默认值</th>
                </thead>
                <tr>
                    <td>total</td>
                    <td>number</td>
                    <td>记录总数，应该在创建分页（pagination）时设置</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>pageSize</td>
                    <td>number</td>
                    <td>页面尺寸（注：每页显示的最大记录数）</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>pageNumber</td>
                    <td>number</td>
                    <td>创建分页（pagination）时显示的页码</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>url</td>
                    <td>string</td>
                    <td>触发翻页操作获取翻页数据url</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>queryParams</td>
                    <td>object</td>
                    <td>翻页操作额外提交的参数</td>
                    <td>{}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>事件</h3>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>说明</th>
                </thead>
                <tr>
                    <td>onSelectPage</td>
                    <td>pageNumber, pageSize</td>
                    <td>
                        当用户选择新的页码时触发。回调函数包含两个参数：<br />
                        pageNumber：新的页码<br />
                        pageSize：新的页码尺寸<br /><br />
                        代码实例：
                        <pre class="brush:js">
                            $("#tt").pagination({
                                onSelectPage:function(pageNumber,pageSize){
                                    $(this).pagination("loading");
                                    alert("pageNumber:"+pageNumber+",pageSize:"+pageSize);
                                    $(this).pagination("loaded");
                                }
                            });
                        </pre>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>