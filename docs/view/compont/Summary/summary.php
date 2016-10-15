<div class="bs-docs-section" id="summary">
    <h1>概览</h1>
</div>
<div class="bs-docs-section" id="summary_1">
    <h3>属性</h3>
    <p>属性是定义在 <code>jQuery.fn.{plugin}.defaults</code>。比如，dialog 的属性是定义在 <code>jQuery.fn.dialog.defaults</code>。</p>
</div>
<div class="bs-docs-section"id="summary_2">
    <h3>事件</h3>
    <p>事件（回调函数）也是定义在 <code>jQuery.fn.{plugin}.defaults</code></p>
</div>
<div class="bs-docs-section"id="summary_3">
    <h3>方法</h3>
    <p>调用方法的语法：<code>$('selector').plugin('method', parameter);</code></p>
    <ul>
        <li>selector 是 jquery 对象选择器。</li>
        <li>plugin 是插件名称。</li>
        <li>method 是与插件相匹配的已存在方法。</li>
        <li>parameter 是参数对象，可以是对象、字符串。</li>
    </ul>
    <p>方法是定义在 jQuery.fn.{plugin}.methods。每个方法有两个参数：jq 和 param。第一个参数 'jq' 是必需的，引用 jQuery 对象。第二个参数 'param' 引用方法传递的实际参数。比如，要扩展 dialog 组件的方法名为 'mymove' 的方法，代码如下：</p>
    <pre class="brush:js">
        $.extend($.fn.dialog.methods, {
            mymove: function(jq, newposition){
                return jq.each(function(){
                    $(this).dialog('move', newposition);
                });
            }
        });
    </pre>
    <p>现在您可以调用 'mymove' 方法来移动对话框（dialog）到指定的位置：</p>
    <pre class="brush:js">
        $('#dd').dialog('mymove', {
            left: 200,
            top: 100
        });
    </pre>
    <p>一旦您引用了 Awesome 必要的资源文件，您就可以通过标记<code>.as-*</code>或者使用 JavaScript 来定义一个 Awesome 组件。比如，要顶一个验证框，您需要编写如下 HTML 代码：</p>
    <pre class="brush:xml">
        <input type="text" class="as-validatebox" data-options="validType:'email'"/>
    </pre>
</div>