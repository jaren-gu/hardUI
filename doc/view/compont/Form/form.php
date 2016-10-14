<div class="pt20" id="form_1">
    <h2>Form 表单</h2>
    <hr class="alt short" />
    <p>通过 $.fn.form.defaults 重写默认的 defaults。</p>
    <p>表单（form）提供多种方法来执行带有表单字段的动作，比如 ajax 提交、加载、清除，等等。当提交表单时，调用 'validate' 方法来检查表单是否有效。</p>
</div>
<div class="bs-docs-section">
    <h3>用法</h3>
    <p>创建一个简单的 HTML 表单。构建表单并给 id、action、method 赋值。</p>
    <pre class="brush:xml">
        <form id="ff" method="post">
            <div>
                <label for="name">Name:</label>
                <input class="as-validatebox" type="text" name="name" data-options="required:true" />
            </div>
            <div>
                <label for="email">Email:</label>
                <input class="as-validatebox" type="text" name="email" data-options="validType:'email'" />
            </div>
            ...
        </form>
    </pre>
    <p>让表单（form）成为 ajax 提交的表单（form）</p>
    <pre class="brush:js">
        $('#ff').form({
            url:...,
            onSubmit: function(){
                // do some check
                // return false to prevent submit;
            },
            success:function(data){
                alert(data)
            }
        });
        // submit the form
        $('#ff').submit();
    </pre>
    <p>通过额外的参数提交</p>
    <pre class="brush:js">
        $('#ff').form('submit', {
            url:...,
            queryParams:{...},
            onSubmit: function(param){
                param.p1 = 'value1';
                param.p2 = 'value2';
            }
        });
    </pre>
    <h4>处理提交响应</h4>
    <p>提交一个 ajax 表单（form）是非常简单的。当提交完成时用户可以获得响应数据。请注意，响应数据是来自服务器的原始数据。对响应数据的解析动作要求获得正确的数据。</p>
    <p>例如，响应数据假设是 JSON 格式，一个典型的响应数据如下所示：</p>
    <pre class="brush:js">
        {
            "success": true,
            "message": "Message sent successfully."
        }
    </pre>
    <p>现在在 'success' 回调函数中处理 JSON 字符串。</p>
    <pre class="brush:js">
        $('#ff').form('submit', {
            success: function(data){
                var data = eval('(' + data + ')'); // 将JSON string 转换为javascript object
                if (data.success){
                    alert(data.message)
                }
            }
        });
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
                    <td>要提交的表单动作 URL。</td>
                    <td>null</td>
                </tr>
                <tr>
                    <td>novalidate</td>
                    <td>boolean</td>
                    <td>为false时，对表单进行校验</td>
                    <td>FALSE</td>
                </tr>
                <tr>
                    <td>ajax</td>
                    <td>boolean</td>
                    <td>为true时，选择ajax提交表单</td>
                    <td>TRUE</td>
                </tr>
                <tr>
                    <td>queryParams</td>
                    <td>obj</td>
                    <td>提交form表单以外的参数</td>
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
            <table class="as-table as-table-striped as-table-hover">
                <thead>
                    <th>名称</th>
                    <th>参数</th>
                    <th>描述</th>
                </thead>
                <tr>
                    <td>onSubmit</td>
                    <td>none</td>
                    <td>提交前触发，返回 false 来阻止提交动作</td>
                </tr>
                <tr>
                    <td>success</td>
                    <td>data</td>
                    <td>当表单提交成功时触发</td>
                </tr>
                <tr>
                    <td>onLoadError</td>
                    <td>none</td>
                    <td>加载表单数据时发生某些错误的时候触发</td>
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
                    <td>submit</td>
                    <td>options&nbsp;</td>
                    <td>
                        做提交动作， options 参数是一个对象，它包含系列特性：<br/>
                        url：动作的 URL<br/>
                        onSubmit：提交之前的回调函数<br/>
                        success：提交成功之后的回调函数<br/>
                        <p>下面的实例演示如何提交一个有效表单，避免重复提交表单。</p>
                        <pre class="brush:js">
                            $('#ff').form('submit', {
                                url: ...,
                                onSubmit: function(){
                                    var isValid = $(this).form('validate');
                                    if (!isValid){
                                        $.messager.progress('close');
                                    }
                                    return isValid;
                                },
                                success: function(){
                                    $.messager.progress('close');
                                }
                            });
                        </pre>
                    </td>
                </tr>
                <tr>
                    <td>load</td>
                    <td>data</td>
                    <td>
                        <p>
                            加载记录来填充表单。<br/>
                            data 参数可以是一个字符串或者对象类型，字符串作为一个远程 URL，否则作为一个本地记录。
                        </p>
                        <p>代码实例：</p>
                        <pre class="brush:js">
                            $('#ff').form('load','get_data.php');	// load from URL
 
                            $('#ff').form('load',{
                                name:'name2',
                                email:'mymail@gmail.com',
                                subject:'subject2',
                                message:'message2',
                                language:5
                            });
                        </pre>
                    </td>
                </tr>
                <tr>
                    <td>clear</td>
                    <td>none</td>
                    <td>
                        <p>清除表单数据</p>
                    </td>
                </tr>
                <tr>
                    <td>validate</td>
                    <td>none</td>
                    <td>
                        <p>进行表单字段验证，当全部字段都有效时返回 true 。这个方法和 validatebox 插件一起使用。</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>