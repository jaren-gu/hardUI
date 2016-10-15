<div class="pt20" id="validatebox">
    <h2>Validatebox 验证框</h2>
    <hr class="alt short" />
    <p>通过 $.fn.validatebox.defaults 重写默认的 defaults。</p>
    <p>验证框（validatebox）是为了验证表单输入字段而设计的。如果用户输入无效的值，它将改变背景颜色，显示警告图标和提示消息。</p>
</div>
<div class="bs-docs-section">
    <h3>实例</h3>
    <div class="as-panel">
        <div class="as-panel-body">
            <form>
                <div class="as-form-group">
                    <label class="as-control-label col-md-3">Email：</label>
                    <div class="col-md-9">
                        <input type="text" id="validate" class="as-form-control"/>
                    </div>
                </div>
                <div class="as-form-group">
                    <label class="col-md-3 as-control-label" for="inputError">验证错误样式</label>
                    <div class="col-md-9 has-error">
                        <span class="as-append-icon right">
                            <i class="fa fa-remove"></i>
                        </span>
                        <input type="text" class="as-form-control" id="inputError">
                        <b class="tooltip tip-right">
                            <em>输入信息错误，请重新输入！</em>
                        </b>
                    </div>
                </div>
                <div class="as-form-group">
                    <label class="col-md-3 as-control-label" for="inputSuccess">验证成功样式</label>
                    <div class="col-md-9 has-success">
                        <input type="text" class="as-form-control" id="inputSuccess">
                        <span class="as-append-icon right">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="bs-docs-section">
    <h3>用法</h3>
    <p>通过标记创建验证框（validatebox）。input标记外层必须有div标记。</p>
    <pre class="brush:xml">
        <div>
            <input type="text" class="as-validatebox as-form-control" data-options="validType:'email'"/>
        </div>
    </pre>
    <p>通过javascript创建验证框（validatebox）。input标记外层必须有div标记。</p>
    <pre class="brush:xml">
        <div>
            <input type="text" id="dd" class="as-form-control"/>
        </div>
    </pre>
    <pre class="brush:js">
        $("#dd").validatebox({
            validType:['email','length[0,20]']
        });
    </pre>
</div>
<div class="bs-docs-section">
    <h3>验证规则</h3>
    <p>验证规则通过使用validType和required属性来定义，这里已经实施的规则有：</p>
    <ul>
        <li>email：匹配 email 正则表达式规则</li>
        <li>length[0,100]：允许从 x 到 y 个字符</li>
    </ul>
    <p>要自定义验证规则，重写 $.fn.validatebox.defaults.rules，来定义一个验证函数和无效的信息。</p>
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
                    <td>required</td>
                    <td>boolean</td>
                    <td>定义是否字段应被输入</td>
                    <td>true</td>
                </tr>
                <tr>
                    <td>missingMessage</td>
                    <td>string</td>
                    <td>当文本框是空时出现的提示文字</td>
                    <td>必填！不能为空</td>
                </tr>
                <tr>
                    <td>invalidMessage</td>
                    <td>string</td>
                    <td>当文本框的内容无效时出现的提示文字</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>validType</td>
                    <td>string,array</td>
                    <td>定义字段的验证类型，比如 email、length，等等</td>
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
            <table class="as-table">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>说明</th>
                </thead>
                <tr>
                    <td>isValid</td>
                    <td>none</td>
                    <td>调用 validate 方法并且返回验证结果，true 或者 false</td>
                </tr>
            </table>
        </div>
    </div>
</div>