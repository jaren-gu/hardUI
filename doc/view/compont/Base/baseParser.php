<div class="pt20" id="parser">
    <h2>Parser 解释器</h2>
    <hr class="alt short" />
</div>
<div class="bs-docs-section">
    <h3>用法</h3>
    <pre class="brush:js">
        $.parser.parse(); // 解析整个页面
        $.parser.parse('#cc'); // 解析某个具体节点
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
                    <th>描述</th>
                    <th>默认值</th>
                </thead>
                <tr>
                    <td>$.parser.auto</td>
                    <td>boolean</td>
                    <td>定义是否自动解析 awesome 组件。</td>
                    <td>true</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>事件</h3>
    <div class="as-panel">
        <div class="as-panel-body pn">
            <table class="as-table as-table-striped as-table-hover">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>描述</th>
                </thead>
                <tr>
                    <td>$.parser.onComplete</td>
                    <td>context</td>
                    <td>当解析器完成解析动作的时候触发。</td>
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
                    <td>$.parser.parse</td>
                    <td>context</td>
                    <td>解析 awesome 组件。</td>
                </tr>
            </table>
        </div>
    </div>
</div>