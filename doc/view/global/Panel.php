<div class="bs-docs-section">
    <h2 id="panel1">基本实例</h2>

    <p>通过 <code> .as-panel </code> 、<code> .as-panel-header </code> 、<code> .as-panel-body </code>和<code> .as-panel-footer </code>创建一个最基本的panel容器。之后可以通过<code> .as-panel-title </code>为panel添加一个标题容器；而你也可以通过<code> .as-panel-icon </code>为标题添加icon；也可以通过
        <code>.as-panel-controls</code> 在panel的头部添加操作容器，用于添加操作。</p>
    <p>实例：</p>
    <div class="as-panel">
        <div class="as-panel-header">
            <span class="panel-icon">
                <i class="glyphicon glyphicon-fire"></i>
            </span>
            <span class="as-panel-title">panel title</span>
            <span class="as-panel-controls">
                <a href="#" class="glyphicon glyphicon-remove"></a>
            </span>
        </div>
        <div class="as-panel-body">
            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
        </div>
        <div class="as-panel-footer">
            <div class="text-right">
                <a class="btn btn-default">确认</a>
            </div>
        </div>
    </div>
    <p>实例代码：</p>
    <pre class="brush:xml">
        <div class="as-panel">
            <div class="as-panel-header">
            <span class="as-panel-icon">
                <i class="glyphicon glyphicon-fire"></i>
            </span>
                <span class="as-panel-title">panel title</span>
            <span class="as-panel-controls">
                <a href="#" class="glyphicon glyphicon-remove"></a>
            </span>
            </div>
            <div class="as-panel-body">
                panel body ...
            </div>
            <div class="as-panel-footer">
                panel footer ...
            </div>
        </div>
    </pre>
</div>