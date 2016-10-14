<h3 id="input">Basic Input 基础</h3>
<p>单独的表单控件会被自动赋予一些全局样式。所有设置了 <code>.as-form-control</code> 类的元素都将被默认设置宽度属性为 <code>width: 100%</code>;。</p>
<p>联合使用预置的栅格类，可以将 <code>label</code>  标签和控件组水平并排布局。这样做将改变 <code>.as-form-group</code> 的行为，使其表现为栅格系统中的行（row）。</p>
<h4 class="pt10">Input 基础</h4>
<div class="as-panel">
	<div class="as-panel-header">
		<span class="as-panel-title">
			<code>.as-control-label .as-form-control</code>
		</span>
	</div>
	<div class="as-panel-body">
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">Input</label>
            <div class="col-md-9">
                <input type="text" class="as-form-control">
            </div>
        </div>
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">Select List</label>
            <div class="col-md-9">
                <select class="as-form-control">
                    <option value="1">Select1</option>
                    <option value="2">Select2</option>
                </select>
            </div>
        </div>
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">Disabled</label>
            <div class="col-md-9">
                <input type="text" class="as-form-control" disabled>
            </div>
        </div>
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">Text Area</label>
            <div class="col-md-9">
                <textarea rows="3" class="as-form-control"></textarea>
            </div>
        </div>
    </div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">Input</label>
            <div class="col-md-9">
                <input type="text" class="as-form-control">
            </div>
        </div>
    </pre>
</div>
<h4 class="pt10">Input 验证状态颜色</h4>
<p>使用以下颜色类可以生成不同颜色的input框。</p>
<div class="well">
    <p>颜色：<code>.has-primary .has-success .has-info .has-system .has-warning .has-error .has-alert .as-append-icon .right</code></p>
    <div class="as-form-group has-primary">
        <label class="col-md-3 as-control-label">Primary Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-gear"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
    <div class="as-form-group has-success">
        <label class="col-md-3 as-control-label">Success Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-check"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
    <div class="as-form-group has-info">
        <label class="col-md-3 as-control-label">Info Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-exclamation-circle"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
    <div class="as-form-group has-system">
        <label class="col-md-3 as-control-label">System Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-bell"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
    <div class="as-form-group has-warning">
        <label class="col-md-3 as-control-label">Warning Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-exclamation-triangle"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
    <div class="as-form-group has-error">
        <label class="col-md-3 as-control-label">Error Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-remove"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
    <div class="as-form-group has-alert">
        <label class="col-md-3 as-control-label">Alert Filed</label>
        <div class="col-md-9">
            <span class="as-append-icon right">
                <i class="fa fa-flag"></i>
            </span>
            <input type="text" class="as-form-control">
        </div>
    </div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="as-form-group has-info">
            <label class="col-md-3 as-control-label">Input</label>
            <div class="col-md-9">
            	<span class="as-append-icon right">
	                <i class="fa fa-exclamation-circle"></i>
	            </span>
                <input type="text" class="as-form-control">
            </div>
        </div>
    </pre>
</div>
<h4 class="pt10">spinner微调Input框（样式）</h4>
<p>微调按钮基本样式为 <code>.as-icon-button</code>。其中<code>.as-icon-up .as-icon-down</code>分别为上下按钮样式类。</p>
<div class="as-panel">
    <div class="as-panel-header">
		<span class="as-panel-title">
			<code>.as-icon-button .as-icon-up .as-icon-down</code>
		</span>
    </div>
    <div class="as-panel-body">
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">微调Input</label>
            <div class="col-md-9">
                <input type="text" class="as-form-control">
                <a href="javascript:volid(0);" class="as-icon-button as-icon-up"><i class="fa fa-sort-asc"></i></a>
                <a href="javascript:volid(0);" class="as-icon-button as-icon-down"><i class="fa fa-sort-down"></i></a>
            </div>
        </div>
    </div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">微调Input</label>
            <div class="col-md-9">
                <input type="text" class="as-form-control">
                <a href="javascript:volid(0);" class="as-icon-button as-icon-up"><i class="fa fa-sort-asc"></i></a>
                <a href="javascript:volid(0);" class="as-icon-button as-icon-down"><i class="fa fa-sort-down"></i></a>
            </div>
        </div>
    </pre>
</div>
<h4 class="pt10">Input 带图标（左边图标）</h4>
<div class="as-panel">
	<div class="as-panel-header">
		<span class="as-panel-title">
			<code>.as-input-group .as-input-icon</code>
		</span>
	</div>
	<div class="as-panel-body">
		<div class="as-form-group">
			<label class="col-md-3 as-control-label">Icon Input</label>
            <div class="col-md-9 as-input-group">
	            <span class="as-input-icon">
				    <i class="fa fa-envelope-o"></i>
				</span>
                <input type="text" class="as-form-control">
            </div>
		</div>
		<div class="as-form-group">
			<label class="col-md-3 as-control-label">Icon Input</label>
            <div class="col-md-9 as-input-group">
	            <span class="as-input-icon">
				    <i class="fa fa-key"></i>
				</span>
                <input type="text" class="as-form-control">
            </div>
		</div>
	</div>
</div>
<h4>示例代码：</h4>
<div class="well mbn">
    <pre class="brush:xml">
        <div class="as-form-group">
            <label class="col-md-3 as-control-label">Icon Input</label>
            <div class="col-md-9 as-input-group">
	            <span class="as-input-icon">
				    <i class="fa fa-envelope-o"></i>
				</span>
                <input type="text" class="as-form-control">
            </div>
        </div>
    </pre>
</div>

<hr class="alt mt50 mb25">
