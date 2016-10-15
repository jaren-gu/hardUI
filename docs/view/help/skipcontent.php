<h3 id="skipcontent">屏幕阅读器和键盘导航</h3>
<p><code>.sr-only</code>类可以对屏幕阅读器以外的设备隐藏内容。<code>.sr-only</code>和<code>.sr-only-focusable</code>
    联合使用的话可以在元素有焦点的时候再次显示出来（例如，使用键盘导航的用户）。对于遵循 可访问性的最佳实践 很有必要。这个类也可以作为 mixin 使用。
</p>
<div class="well">
    <h4>示例代码：</h4>
    <div class="well mbn">
    <pre class="brush:xml">
        <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
    </pre>
    </div>
</div>
<hr class="alt mt50 mb25">