<h3 id="responsive-utilities">responsive-utilities 响应式工具类</h3>
<p>为了加快对移动设备友好的页面开发工作，利用媒体查询功能并使用这些工具类可以方便的针对不同设备展示或隐藏页面内容。另外还包含了针对打印机显示或隐藏内容的工具类。</p>
<p>有针对性的使用这类工具类，从而避免为同一个网站创建完全不同的版本。相反，通过使用这些工具类可以在不同设备上提供不同的展现形式。</p>
<h4>可用的类</h4>
<p>通过单独或联合使用以下列出的类，可以针对不同屏幕尺寸隐藏或显示页面内容。</p>
<div class="as-panel">
    <div class="as-panel-header">
        可用的类
    </div>
    <div class="as-panel-body pn">
        <table class="as-table responsive-utilities">
            <thead>
                <tr>
                    <td></td>
                    <td><b>超小屏幕 <small>(&lt;768px)</small></b></td>
                    <td><b>小屏幕 <small>(≥768px)</small></b></td>
                    <td><b>中等屏幕 <small>(≥992px)</small></b></td>
                    <td><b>大屏幕 <small>(≥1140px)</small></b></td>
                    <td><b>特大屏幕 <small>(≥1400px)</small></b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>.visible-xs-*</code></td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                </tr>
                <tr>
                    <td><code>.visible-sm-*</code></td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                </tr>
                <tr>
                    <td><code>.visible-md-*</code></td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                </tr>
                <tr>
                    <td><code>.visible-lg-*</code></td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                </tr>
                <tr>
                    <td><code>.visible-xl-*</code></td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td><code>.hidden-xs</code></td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                </tr>
                <tr>
                    <td><code>.hidden-sm</code></td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                </tr>
                <tr>
                    <td><code>.hidden-md</code></td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                </tr>
                <tr>
                    <td><code>.hidden-lg</code></td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                    <td class="is-visible">可见</td>
                </tr>
                <tr>
                    <td><code>.hidden-lg</code></td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-visible">可见</td>
                    <td class="is-hidden">隐藏</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<p>形如 <code>.visible-*-*</code> 的类针对每种屏幕大小都有了三种变体，每个针对 CSS 中不同的 <code>display</code> 属性，列表如下：</p>
<div class="as-panel">
    <div class="as-panel-header">
        display属性
    </div>
    <div class="as-panel-body pn">
        <table class="as-table">
            <thead>
                <tr>
                    <td><b>类组</b></td>
                    <td><b>CSS <code>display</code></b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>.visible-*-block</code></td>
                    <td><code>display: block;</code></td>
                </tr>
                <tr>
                    <td><code>.visible-*-inline</code></td>
                    <td><code>display: inline;</code></td>
                </tr>
                <tr>
                    <td><code>.visible-*-inline-block</code></td>
                    <td><code>display: inline-block;</code></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<p>因此，以超小屏幕（<code>xs</code>）为例，可用的 <code>.visible-*-*</code> 类是：<code>.visible-xs-block</code>、<code>.visible-xs-inline</code> 和 <code>.visible-xs-inline-block</code>。</p>
<hr class="alt mt50 mb25">