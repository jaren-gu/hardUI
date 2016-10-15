<div class="pt20" id="combobox">
    <h2>Combobox 组合框</h2>
    <hr class="alt short" />
    <p>
        给 input 添加上 <code>as-combobox</code> 类,可以生成一个具有自动匹配的 combobox。
    </p>
</div>
<div class="bs-docs-section">
    <h3>实例</h3>
    <div class="as-panel">
        <div class="as-panel-body">
            <input type="text"  id="cb">
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>用法</h3>
    
    <p>
        通过标记 <code>as-combobox</code> 类创建 (combobox)。
    </p>
    <pre class="brush:xml">
        <input class="as-combobox" data-options="url:'date.json'">
    </pre>

    <p>
        通过 javascript 类创建 (combobox)。
    </p>
    <pre class="brush:xml">
        <input id="dd">
    </pre>

    <pre class="brush:js">
        $("#dd").combobox({
            url:'date.json'
        });
    </pre>

</div>
<div class="bs-docs-section">
    <h3>属性</h3>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover">
                <thead>
                    <th>名称</th>
                    <th>类型</th>
                    <th>说明</th>
                    <th>默认值</th>
                </thead>
                <tr>
                    <td>url</td>
                    <td>string</td>
                    <td>combobox 数据读入地址</td>
                    <td>null</td>
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
                    <th>类型</th>
                    <th>说明</th>
                    <th>默认值</th>
                </thead>
                <tr>
                    <td>reload</td>
                    <td>string</td>
                    <td>combobox 数据读入地址</td>
                    <td>null</td>
                </tr>
            </table>
        </div>
    </div>
</div>