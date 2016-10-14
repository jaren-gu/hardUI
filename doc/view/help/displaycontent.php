<h3 id="displaycontent">显示或隐藏内容</h3>
<p><code>.show</code>和<code>.hidden</code>类可以强制任意元素显示或隐藏(对于屏幕阅读器也能起效)。这些类通过<code>!important</code>来避免 CSS 样式优先级问题，就像 quick floats 一样的做法。注意，这些类只对块级元素起作用，另外，还可以作为 mixin 使用。</p>
<div class="well">
    <h4>示例代码：</h4>
    <div class="well mbn">
    <pre class="brush:xml">
        <div class="show">...</div>
        <div class="hidden">...</div>
    </pre>
    </div>
</div>
<hr class="alt mt50 mb25">