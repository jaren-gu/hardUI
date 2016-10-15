<h3 id="panel">Panel 容器面板</h3>
<h4 class="pt10">Panel 颜色</h4>
<p>若不需要 <code>panel</code> 的头部，则需要在 <code>.as-panel-body</code>类后引入 <code>.panel-body-top</code>类才能保持边框的完整。</p>
<div class="well mbn">
    <p><code>.panel-primary .panel-success .panel-info .panel-warning .panel-danger .panel-alert .panel-system .panel-dark</code></p>
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-dark">
                <div class="as-panel-header">
                    Dark Header
                </div>
                <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
                <div class="as-panel-footer">
                    <button type="button" class="btn btn-sm btn-dark">确定</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-primary">
                <div class="as-panel-header">
                    Primary Header
                    <div class="widget-menu pull-right">
                        <code class="mr10 bg-primary dark p3 ph5">.panel-primary</code>
                    </div>
                </div>
                <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
                <div class="as-panel-footer">
                    <button type="button" class="btn btn-sm btn-primary">确定</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-success">
                <div class="as-panel-header">
                    Primary Header
                    <div class="widget-menu pull-right">
                        <code class="mr10 bg-success dark p3 ph5">.panel-success</code>
                    </div>
                </div>
                <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
                <div class="as-panel-footer">
                    <button type="button" class="btn btn-sm btn-success">确定</button>
                </div>
            </div>
        </div>
    </div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="as-panel">
            <div class="as-panel-header">
                <span class="as-panel-title">Border Top</span>
            </div>
            <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu</div>
            <div class="as-panel-footer">
                <button type="button" class="btn btn-default">OK</button>
            </div>
        </div>
    </pre>
</div>
<h4 class="pt10">Panel 其他样式</h4>
<div class="well mbn">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-info panel-border top">
                <div class="as-panel-header">
                    <span class="as-panel-title">Border Top</span>
                    <div class="widget-menu pull-right">
                        <code class="mr10 dark p3 ph5">.as-panel .panel-border.top</code>
                    </div>
                </div>
                <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-alert">
                <div class="as-panel-header">
                    Default
                    <div class="widget-menu pull-right">
                        <code class="mr10 bg-alert dark p3 ph5">.as-panel .panel-alert</code>
                    </div>
                </div>
                <div class="as-panel-body">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-warning">
                <div class="as-panel-header">
                    Body Border
                    <div class="widget-menu pull-right">
                        <code class="mr10 bg-warning dark p3 ph5">.panel-body .border</code>
                    </div>
                </div>
                <div class="as-panel-body border">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-system">
                <div class="as-panel-header">
                    Body Fill
                    <div class="widget-menu pull-right">
                        <code class="mr10 bg-system dark p3 ph5">.panel-body .fill</code>
                    </div>
                </div>
                <div class="as-panel-body fill">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="as-panel panel-danger">
                <div class="as-panel-header">
                    Fill + Border
                    <div class="widget-menu pull-right">
                        <code class="mr10 bg-danger dark p3 ph5">.panel-body .border .fill</code>
                    </div>
                </div>
                <div class="as-panel-body fill border">Praesent non nibh nisi. Proin eu massa faucibus, volutpat tellus eu, dapibus velit. Sed feugiat risus at velit lobortis porta.</div>
            </div>
        </div>
    </div>
</div>
<hr class="alt mt50 mb25">