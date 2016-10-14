<div class="bs-docs-section">
    <h2 id="tab1">基本实例</h2>
    <p>通过在Tab头部的ul元素中添加类 <code>.panel-tabs-left</code> 可以改变Tab头部的位置，使其位于左边（默认位于右边）。</p>
    <p>实例：</p>
    <div class="as-panel">
        <div class="as-panel-header">
            <ul class="panel-tabs-border panel-tabs">
                <li class="active">
                    <a href="#tab-1" data-toggle="tab" aria-expanded="true">Action</a>
                </li>
                <li>
                    <a href="#tab-2" data-toggle="tab" aria-expanded="false">Message</a>
                </li>
                <li>
                    <a href="#tab-3" data-toggle="tab" aria-expanded="false">Message</a>
                </li>
            </ul>
        </div>
        <div class="as-panel-body">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-12">
                            <p>123</p>
                        </div>

                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <p>456</p>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <p>789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>实例代码：</p>
    <pre class="brush:xml">
        <div class="as-panel">
            <div class="as-panel-header">
                <ul class="panel-tabs-border panel-tabs">
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab" aria-expanded="true">Action</a>
                    </li>
                    <li>
                        <a href="#tab-2" data-toggle="tab" aria-expanded="false">Message</a>
                    </li>
                    <li>
                        <a href="#tab-3" data-toggle="tab" aria-expanded="false">Message</a>
                    </li>
                </ul>
            </div>
            <div class="as-panel-body">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                <p>123</p>
                            </div>

                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="row">
                            <div class="col-md-12">
                                <p>456</p>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="row">
                            <div class="col-md-12">
                                <p>789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </pre>
    <h2 id="tab2">头部位于侧边Tab</h2>
    <p>通过 <code>.tabs-left</code> 和 <code>.tabs-right</code> 可以改变Tab头部的位置，使其位于左边或者右边。</p>
    <p>实例：</p>
    <div class="tab-block">
        <ul class="tabs-left tabs-border">
            <li class="active">
                <a href="#tab14_1" data-toggle="tab" aria-expanded="true">Tab One</a>
            </li>
            <li>
                <a href="#tab14_2" data-toggle="tab" aria-expanded="false">Tab Two</a>
            </li>
            <li>
                <a href="#tab14_3" data-toggle="tab" aria-expanded="false">Tab Three</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="tab14_1" class="tab-pane active">
                <p><b>TAB ONE - </b> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
            </div>
            <div id="tab14_2" class="tab-pane">
                <p><b>TAB TWO - </b> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
            </div>
            <div id="tab14_3" class="tab-pane">
                <p><b>TAB THREE - </b>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
            </div>
        </div>
    </div>
    <p>实例代码：</p>
    <pre class="brush:xml">
        <div class="tab-block">
            <ul class="tabs-left tabs-border">
                <li class="active">
                    <a href="#tab14_1" data-toggle="tab" aria-expanded="true">Tab One</a>
                </li>
                <li>
                    <a href="#tab14_2" data-toggle="tab" aria-expanded="false">Tab Two</a>
                </li>
                <li>
                    <a href="#tab14_3" data-toggle="tab" aria-expanded="false">Tab Three</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab14_1" class="tab-pane active">
                    <p><b>TAB TWO - </b> Anim pariatur cliche reprehenderit.</p>
                </div>
                <div id="tab14_2" class="tab-pane">
                    <p><b>TAB TWO - </b> Anim pariatur cliche reprehenderit.</p>
                </div>
                <div id="tab14_3" class="tab-pane">
                    <p><b>TAB THREE - </b>Anim pariatur cliche reprehenderit.</p>
                </div>
            </div>
        </div>
    </pre>
</div>
