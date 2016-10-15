<h3 id="grid">Grid 栅格系统</h3>
<p>类似 <code>.row</code> 和 <code>.col-xs-4</code> 这种预定义的类，可以用来快速创建栅格布局。栅格系统中的列是通过指定<code>1</code>到<code>12</code>的值来表示其跨越的范围。例如，三个等宽的列可以使用三个 <code>.col-xs-4</code> 来创建。如果一“行（row）”中包含了的“列（column）”大于 <code>12</code>，多余的“列（column）”所在的元素将被作为一个整体另起一行排列。</p>
<p>栅格类适用于与屏幕宽度大于或等于分界点大小的设备 ， 并且针对小屏幕设备覆盖栅格类。 因此，在元素上应用任何 <code>.col-md-*</code> 栅格类适用于与屏幕宽度大于或等于分界点大小的设备 ， 并且针对小屏幕设备覆盖栅格类。 因此，在元素上应用任何 <code>.col-lg-*</code> 不存在， 也影响大屏幕设备。</p>

<h4>删格参数</h4>
<p>通过下表可以详细查看 Awesome 的栅格系统是如何在多种屏幕设备上工作的。</p>

<div class="as-panel">
    <div class="as-panel-header">
        删格参数
    </div>
    <div class="as-panel-body pn">
        <table class="as-table">
            <thead>
                <tr>
                    <td></td>
                    <td><b>超小屏幕 手机 (&lt;768px)</b></td>
                    <td><b>小屏幕 平板 (≥768px)</b></td>
                    <td><b>中等屏幕(≥992px)</b></td>
                    <td><b>大屏幕(≥1140px)</b></td>
                    <td><b>特大屏幕(≥1400px)</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>栅格系统行为</b></td>
                    <td>总是水平排列</td>
                    <td colspan="3">开始是堆叠在一起的，当大于这些阈值时将变为水平排列C</td>
                </tr>
                <tr>
                    <td><b><code>.container</code> 最大宽度</b></td>
                    <td>None （自动）</td>
                    <td>750px</td>
                    <td>970px</td>
                    <td>1114px</td>
                    <td>1370px</td>
                </tr>
                <tr>
                    <td><b>类前缀</b></td>
                    <td><code>.col-xs-</code></td>
                    <td><code>.col-sm-</code></td>
                    <td><code>.col-md-</code></td>
                    <td><code>.col-lg-</code></td>
                    <td><code>.col-xl-</code></td>
                </tr>
                <tr>
                    <td><b>列（column）数</b></td>
                    <td colspan="5">12</td>
                </tr>
                <tr>
                    <td><b>最大列（column）宽</b></td>
                    <td>自动</td>
                    <td>~62px</td>
                    <td>~81px</td>
                    <td>~97px</td>
                    <td>~110px</td>
                </tr>
                <tr>
                    <td><b>槽（gutter）宽</b></td>
                    <td colspan="5">30px （每列左右均有 15px）</td>
                </tr>
                <tr>
                    <td><b>可嵌套</b></td>
                    <td colspan="5">是</td>
                </tr>
                <tr>
                    <td><b>偏移（Offsets）</b></td>
                    <td colspan="5">是</td>
                </tr>
                <tr>
                    <td><b>列排序</b></td>
                    <td colspan="5">是</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h4>实例：</h4>
<p>使用单一的一组 <code>.col-md-*</code> 栅格类，就可以创建一个基本的栅格系统，在手机和平板设备上一开始是堆叠在一起的（超小屏幕到小屏幕这一范围），在桌面（中等）屏幕设备上变为水平排列。所有“列（column）必须放在 ” <code>.row</code> 内。</p>
<div class="row show-grid">
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
  <div class="col-md-1">.col-md-1</div>
</div>
<div class="row show-grid">
  <div class="col-md-8">.col-md-8</div>
  <div class="col-md-4">.col-md-4</div>
</div>
<div class="row show-grid">
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
</div>
<div class="row show-grid">
  <div class="col-md-6">.col-md-6</div>
  <div class="col-md-6">.col-md-6</div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="row">
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
            <div class="col-md-1">.col-md-1</div>
        </div>
        <div class="row">
            <div class="col-md-8">.col-md-8</div>
            <div class="col-md-4">.col-md-4</div>
        </div>
        <div class="row">
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4">.col-md-4</div>
        </div>
        <div class="row">
            <div class="col-md-6">.col-md-6</div>
            <div class="col-md-6">.col-md-6</div>
        </div>
    </pre>
</div>
<h4>实例：流式布局容器</h4>
<p>将最外面的布局元素 <code>.container</code> 修改为 <code>.container-fluid</code>，就可以将固定宽度的栅格布局转换为 100% 宽度的布局。</p>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="container-fluid">
            <div class="row">
                ...
            </div>
        </div>
    </pre>
</div>
<h4>响应式列重置</h4>
<p>即便有上面给出的四组栅格class，你也难免会碰到一些问题，例如，在某些阈值时，某些列可能会出现比别的列高的情况。为了克服这一问题，建议联合使用 <code>.clearfix</code> 和 响应式工具类。</p>
<div class="row show-grid">
    <div class="row">
        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3<br>Resize your viewport or check it out on your phone for an example.</div>
        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>

        <!-- Add the extra clearfix for only the required viewport -->
        <div class="clearfix visible-xs-block"></div>

        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
        <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
    </div>
</div>
<h4>列偏移</h4>
<p>使用 <code>.col-md-offset-*</code> 类可以将列向右侧偏移。这些类实际是通过使用 <code>*</code> 选择器为当前元素增加了左侧的边距（margin）。例如，<code>.col-md-offset-4</code> 类将 <code>.col-md-4</code> 元素向右侧偏移了4个列（column）的宽度。</p>
<div class="row show-grid">
    <div class="row">
        <div class="col-md-4">.col-md-4</div>
        <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
        <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
    </div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="row">
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
            <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
        </div>
    </pre>
</div>
<h3>列排序</h3>
<p>通过使用 <code>.col-md-push-*</code> 和 <code>.col-md-pull-*</code> 类就可以很容易的改变列（column）的顺序。</p>
<div class="row show-grid">
    <div class="row">
        <div class="col-md-9 col-md-push-3">.col-md-9 .col-md-push-3</div>
        <div class="col-md-3 col-md-pull-9">.col-md-3 .col-md-pull-9</div>
    </div>
</div>
<p class="mt15"><b>示例代码：</b></p>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="row">
            <div class="col-md-9 col-md-push-3">.col-md-9 .col-md-push-3</div>
            <div class="col-md-3 col-md-pull-9">.col-md-3 .col-md-pull-9</div>
        </div>
    </pre>
</div>

<hr class="alt mt50 mb25">