<h3 id="progress">Progress 进度条</h3>
<h4 class="pt10">Progress 颜色</h4>
<div class="as-panel">
    <div class="as-panel-header">
        <span class="as-panel-title">
            <code>.progress-bar .progress-bar-color</code>
        </span>
    </div>
    <div class="as-panel-body">
        <div class="progress mt10">
            <div class="progress-bar" style="width: 60%;">
                <span>Default</span>
            </div>
        </div>

        <div class="progress mt10">
            <div class="progress-bar progress-bar-primary" style="width: 60%;">
                <span>Primary</span>
            </div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-success" style="width: 60%;">Success</div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-info" style="width: 60%;">Info</div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-warning" style="width: 60%;">Warning</div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-danger" style="width: 60%;">Danger</div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-alert" style="width: 60%;">Alert</div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-system" style="width: 60%;">System</div>
        </div>
        <div class="progress mt10">
            <div class="progress-bar progress-bar-dark" style="width: 60%;">Dark</div>
        </div>
    </div>
</div>

<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="progress mt10">
            <div class="progress-bar" style="width: 60%;">Default</div>
        </div>
    </pre>
</div>

<h4 class="pt10">Progress 其他样式</h4>
<div class="row">
    <div class="col-sm-6 col-lg-6">
        <div class="as-panel">
            <div class="as-panel-header">
                <span class="as-panel-title">
                    Horizontal Bars
                </span>
            </div>
            <div class="as-panel-body">
                <p><code>.progress-bar .progress-bar-color</code></p>
                <div class="progress mt10">
                    <div class="progress-bar progress-bar-info" style="width: 60%;">
                        <span class="sr-only">60%</span>
                    </div>
                </div>
                <p><code>在原基础上给定div内容: 60%</code></p>
                <div class="progress mt10">
                    <div class="progress-bar progress-bar-info" style="width: 60%;">
                        60%
                    </div>
                </div>
                <p><code>.progress.right</code></p>
                <div class="progress right mt10">
                    <div class="progress-bar progress-bar-info" style="width: 60%;">
                        60%
                    </div>
                </div>
                <p><code>.progress-bar-striped</code></p>
                <div class="progress mt10">
                    <div class="progress-bar progress-bar-info progress-bar-striped" style="width: 60%;">
                        60%
                    </div>
                </div>
                <p><code>.progress-bar-striped .active</code></p>
                <div class="progress mt10">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6">
        <div class="as-panel">
            <div class="as-panel-header">
                <span class="as-panel-title">
                    Vertical Bars
                    <code>.progress.vertical.bottom .progress-bar-lg</code>
                </span>
            </div>
            <div class="as-panel-body">
                <div class="ib mr15">
                    <div class="progress vertical mt10 mbn">
                        <div class="progress-bar progress-bar-info" style="height: 60%;"></div>
                    </div>
                </div>
                <div class="ib mr15">
                    <div class="progress vertical mt10 mbn">
                        <div class="progress-bar progress-bar-info" style="height: 60%;">60</div>
                    </div>
                </div>

                <div class="ib mr15">
                    <div class="progress vertical bottom mt10 mbn">
                        <div class="progress-bar progress-bar-info progress-bar-striped" style="height: 60%;">60</div>
                    </div>
                </div>
                <div class="ib mr15">
                    <div class="progress vertical mt10 mbn">
                        <div class="progress-bar progress-bar-info progress-bar-striped" style="height: 60%;">60</div>
                    </div>
                </div>
                <div class="ib mr15">
                    <div class="progress vertical mt10 mbn">
                        <div class="progress-bar progress-bar-info progress-bar-striped active" style="height: 60%;">60</div>
                    </div>
                </div>
                <div class="ib mr15">
                    <div class="progress vertical bottom progress-bar-lg mt10 mbn">
                        <div class="progress-bar progress-bar-info progress-bar-striped" style="height: 60%;">60%</div>
                    </div>
                </div>
                <div class="well well-xs mt20 mbn">
                    <p class="pn mn">原理与"Horizontal Bars"水平进度条一样</p>
                </div>
            </div>
        </div>
    </div>
</div>

<h4 class="pt10">Progress 大小</h4>
<div class="as-panel">
    <div class="as-panel-header">
        <span class="as-panel-title">
            Progress Bar Sizes
        </span>
    </div>
    <div class="as-panel-body">
        <table class="table table-bordered table-striped">
            <colgroup>
                <col class="col-xs-2">
                <col class="col-xs-6">
            </colgroup>
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>.progress-bar-xxs</code></td>
                    <td>
                        <div class="progress progress-bar-xxs ml10 mbn mt5">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                                <div class="sr-only">60%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><code>.progress-bar-xs</code></td>
                    <td>
                        <div class="progress progress-bar-xs ml10 mbn mt5">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                                <div class="sr-only">60%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><code>.progress-bar-sm</code></td>
                    <td>
                        <div class="progress progress-bar-sm ml10 mbn mt5">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                                <div class="sr-only">60%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><code>.progress-bar</code></td>
                    <td>
                        <div class="progress ml10 mbn mt5">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                                <div class="sr-only">60%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><code>.progress-bar-lg</code></td>
                    <td>
                        <div class="progress progress-bar-lg ml10 mbn mt5">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                                <div class="sr-only">60%</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><code>.progress-bar-xl</code></td>
                    <td>
                        <div class="progress progress-bar-xl ml10 mbn mt5">
                            <div class="progress-bar progress-bar-info" style="width: 60%;">
                                <div class="sr-only">60%</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h4 class="pt10">Progress 分段式</h4>
<div class="as-panel mt20">
    <div class="as-panel-header">
        <span class="as-panel-title">
            <code>多个 ".progress-bar" 进度条,嵌套在 ".progress" 里</code>
        </span>
    </div>
    <div class="as-panel-body">
        <div class="progress mt10">
            <div class="progress-bar progress-bar-primary progress-bar-striped" style="width: 27%;">
                27%
            </div>
            <div class="progress-bar progress-bar-success progress-bar-striped" style="width: 27%;">
                27%
            </div>
            <div class="progress-bar progress-bar-alert progress-bar-striped" style="width: 27%;">
                27%
            </div>
        </div>
    </div>
</div>

<p>示例代码：</p>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="progress mt10">
            <div class="progress-bar progress-bar-primary progress-bar-striped" style="width: 27%;">
                27%
            </div>
            <div class="progress-bar progress-bar-success progress-bar-striped" style="width: 27%;">
                27%
            </div>
            <div class="progress-bar progress-bar-alert progress-bar-striped" style="width: 27%;">
                27%
            </div>
        </div>
    </pre>
</div>

<hr class="alt mt50 mb25">