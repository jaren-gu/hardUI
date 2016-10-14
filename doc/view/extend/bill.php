<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <?php include "head.php"?>
    <title>付费表单</title>
</head>
<style>
    th{background: #F5f6FA;}
    .account-title{
        padding: 6px 0px;
        min-height: 45px;
    }
    .account-title-border{
        border-bottom: 1px solid #DDD;
    }
    .account-title-border h5{
        text-indent: 8px;
        border-left: 2px solid #88B7E0;
    }
    .pull-left p{line-height:15px;}
    .alert-border-left{
        border-left: 4px solid #6d7781;
    }
    .flow_right_p{margin-right:60px;text-align: right;}
    .lc-process .unit, .lc-process .current, .lc-process .past{
        width:49%;
    }
    .alert p{
        font-size: 12px;
    }
</style>
<body>
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-title account-title-border">
                        <div class="pull-left">
                            <h5>发票索取</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt25">
                    <div class="as-panel">
                        <div class="as-panel-header">
                            <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                                <li class="active">
                                    <a href="#tab-1" data-toggle="tab" aria-expanded="true">阿里云</a>
                                </li>
                            </ul>
                        </div>
                        <div class="as-panel-body pn" style="border:none;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="col-md-12 mt25 pn">
                                        <div class="lc-process">
                                            <span class="unit current">发布域名</span>
                                            <span class="arrow-current">
                                                <span class="lc-next"></span>
                                                <span class="lc-prev"></span>
                                            </span>
                                            <span class="unit">填写信息</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt10 alert alert-micro mbn" style="background-color: #FCF8E2;border-color: #FBECCB;">
                                        <p class="pull-left" style="color: #f68300;line-height: 30px">温馨提示！ 这是一个随处可用、多用途提示框！</p>
                                        <button class="btn btn-primary btn-sm ml15">立即设置</button>
                                    </div>
                                    <div class="col-md-12 mt10 alert alert-micro mb10" style="background-color: #F9F9F9;border-color: #DDD;color: #555">
                                        <p>温馨提示：</p>
                                        <ul style="list-style: none;padding-left: 60px;font-size: 12px;">
                                            <li>1. 后付费月结算单的可开票金额为当月实际结算金额。</li>
                                            <li>2. 本月产生的后付费业务月结算单在下个月二号以后才可以索取发票。</li>
                                            <li>3. 发票基于订单、月结算单开具（单个订单、月结算单不可拆分开票）。</li>
                                            <li>4. 阿里云单张发票金额限额100万，索取金额超过100万将拆分成多张发票开具。</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 pn">
                                        <div class="as-panel">
                                            <div class="as-panel-header alert-border-left" style="background:#F5f6FA;">
                                                <span class="as-panel-title text-dark-darker">
                                                    可开票订单/月账单列表
                                                </span>
                                            </div>
                                            <div class="as-panel-body ptn pb10">
                                                <div class="as-form-group mbn mt10" style="display: inline-block">
                                                    <label class="as-control-label">订单成功时间:</label>
                                                    <input type="text" class="as-form-control as-input-sm" style="width: 150px;display: inline">
                                                    <label class="as-control-label">至</label>
                                                    <input type="text" class="as-form-control as-input-sm" style="width: 150px;display: inline">
                                                </div>
                                                <div class="as-form-group mbn mt10" style="display: inline-block">
                                                    <label class="as-control-label ml10">可开票金额:</label>
                                                    <input type="text" class="as-form-control as-input-sm" style="width: 80px;display: inline">
                                                    <label class="as-control-label">－</label>
                                                    <input type="text" class="as-form-control as-input-sm" style="width: 80px;display: inline">
                                                </div>
                                                <div class="as-form-group mbn mt10" style="display: inline-block">
                                                    <label class="as-control-label ml10">来源：</label>
                                                    <select class="as-form-control as-input-sm" style="width: 150px;display: inline">
                                                        <option value="1">阿里云</option>
                                                        <option value="2">Select2</option>
                                                    </select>
                                                </div>
                                                <div class="as-form-group mbn mt10" style="display: inline-block">
                                                    <button class="btn btn-sm btn-default ml25">搜索</button>
                                                </div>
                                            </div>
                                            <div class="as-panel-body pv10" style="background-color: #fafafa">
                                                <div class="flowtwo_body_left" style="float: left;position: relative">
                                                    <p>
                                                        <span class="text-dark-darker">已选总金额：</span>
                                                        <span style="color: darkorange">￥0.00</span>
                                                    </p>
                                                    <p>（可开票总金额：￥468.35）</p>
                                                </div>
                                                <div class="flowtwo_body_right" style="float: right;position: relative">

                                                    <div class="flow_right_p pull-right" style="position: relative">
                                                        <div class="pull-right">
                                                            <button class="btn btn-default">索取发票</button>
                                                        </div>
                                                        <div class="pull-right mr20">
                                                            <p>
                                                                <span>待开票金额：</span>
                                                                <span style="color:#70ca63;">￥0.00</span>
                                                            </p>
                                                            <p>（代开票金额=已选金额:￥0.00-欠票金额：￥0.00）</p>
                                                            <p>无法开票原因</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="as-panel-body pb10 pt10">
                                                <div class="flow_left_title pull-left" style="position: relative;">
                                                    <a href="#" class="mr5 text-dark">全部</a>|
                                                    <a href="#" class="mr5 text-dark">订单排序</a>|
                                                    <a href="#" class="text-dark">月结算排序</a>
                                                </div>
                                                <div class="flowtwo_right_btn pull-right">
                                                    <button class="btn btn-default btn-sm"><i class="fa fa-caret-left"></i></button>
                                                    <button class="btn btn-default btn-sm"><i class="fa fa-caret-right"></i>下一页</button>
                                                </div>
                                            </div>
                                            <div class="as-panel-body pn">
                                                <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox">
                                                        </th>
                                                        <th>订单编号</th>
                                                        <th>产品名称</th>
                                                        <th>类型</th>
                                                        <th>订单实付金额</th>
                                                        <th>可开票金额</th>
                                                        <th>订单支付时间</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox">
                                                        </td>
                                                        <td>102607836580183</td>
                                                        <td>云服务器（包年包月）</td>
                                                        <td>订单</td>
                                                        <td>￥438.35</td>
                                                        <td style="color: darkorange">￥438.35</td>
                                                        <td>2016-05-11</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox">
                                                        </td>
                                                        <td>102607836580183</td>
                                                        <td>云服务器（包年包月）</td>
                                                        <td>订单</td>
                                                        <td>￥438.35</td>
                                                        <td style="color: darkorange">￥438.35</td>
                                                        <td>2016-05-11</td>
                                                    </tr>
                                                    <!--                                            <tr>-->
                                                    <!--                                                <td colspan="7" style="background: white;" class="text-center">-->
                                                    <!--                                                    <div class="table_word" >-->
                                                    <!--                                                        <span class="fa-stack fa-lg">-->
                                                    <!--                                                          <i class="fa fa-circle fa-stack-2x"></i>-->
                                                    <!--                                                          <i class="fa fa-flag fa-stack-1x fa-inverse"></i>-->
                                                    <!--                                                        </span>-->
                                                    <!--                                                        <span>没有查询到符合条件的域名,请尝试更换搜索条件</a></span>-->
                                                    <!--                                                    </div>-->
                                                    <!--                                                </td>-->
                                                    <!---->
                                                    <!--                                            </tr>-->
                                                    </tbody>
                                                </table>
                                                <div class="dt-panelfooter clearfix">
                                                    <div class="table_paginate">
                                                        <ul class="table_pagination">
                                                            <li class="table_paginate_button previous disabled">
                                                                <a href="#">上一页</a>
                                                            </li>
                                                            <li class="table_paginate_button">
                                                                <a href="#">1</a>
                                                            </li>
                                                            <li class="table_paginate_button">
                                                                <a href="#">...</a>
                                                            </li>
                                                            <li class="table_paginate_button">
                                                                <a href="#">5</a>
                                                            </li>
                                                            <li class="table_paginate_button">
                                                                <a href="#">6</a>
                                                            </li>
                                                            <li class="table_paginate_button active">
                                                                <a href="#">7</a>
                                                            </li>
                                                            <li class="table_paginate_button next">
                                                                <a href="#">下一页</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "foot.php"?>
<script>
    $("#invoice-list").addClass("menu-open");
    $("#bill").addClass("menu-open");
</script>


</body>
</html>