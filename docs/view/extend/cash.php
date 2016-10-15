<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>现金支付</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
    p{font-size: 12px;}
    th{background: #F5f6FA;}
    td{}
    .table_word{margin:2% auto; width:400px;}
    .biao{width:100%;height:60px;}
    .biao_1{width:33.3%;height:60px;border:1px solid #e2e2e2;float: left;text-align: center;padding:10px 5px;}
    .zhinan1{margin:0 auto;}
    .workorder-title{
        padding: 6px 0px;
        min-height: 45px;
    }
    .workorder-title-border{
        border-bottom: 1px solid #DDD;
    }
    .workorder-title-border h5{
        text-indent: 8px;
        border-left: 2px solid #88B7E0;
    }
</style>
<body>
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="common_label">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="workorder-title workorder-title-border">
                    <div class="pull-left">
                        <h5>收支明细</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt25">
                <div class="as-panel">
                    <div class="as-panel-header">
                        <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab" aria-expanded="true">现金</a>
                            </li>
                            <li>
                                <a href="#tab-2" data-toggle="tab" aria-expanded="false">代金券</a>
                            </li>
                        </ul>
                    </div>
                    <div class="as-panel-body pn" style="border:none;">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="as-form-group mbn mt25 ml10 " style="display: inline-block;">
                                                <label>起止时间:</label>
                                                    <input type="text" class="as-form-control as-input-sm"placeholder="开始时间" style="display: inline-block;width:150px;">
                                                    <span>至</span>
                                                    <input type="text" class="as-form-control as-input-sm"placeholder="结束时间" style="display: inline-block;width:150px;">
                                            </div>
                                            <div class="as-form-group mt25 ml10" style="display:inline-block;">
                                                <label>交易类型:</label>
                                                    <select class="as-form-control as-input-sm" style="display: inline-block;width:150px;">
                                                        <option value="1">消费</option>
                                                        <option value="2">Select2</option>
                                                    </select>
                                                     <button class="btn btn-default btn-sm">查询</button>
                                            </div>
                                        <p style="padding-top:-15px; margin-left: 10px;">注：如果没有选择时间范围，默认查询1年以内的记录。</p>
                                    </div>

                                    <div class="col-md-12" style="margin-top:10px;">
                                        <div class="as-panel panel-body-top">
                                            <div class="as-panel-body pn">
                                                <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                                                    <thead>
                                                    <tr>
                                                        <th>流水号</th>
                                                        <th>日期</th>
                                                        <th>备注</th>
                                                        <th class="text-right">收入	</th>
                                                        <th class="text-right">支出</th>
                                                        <th class="text-right">余额</th>
                                                        <th class="text-right">操作</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>56465456456454</td>
                                                        <td>2016-05-20</td>
                                                        <td>消费</td>
                                                        <td class="text-right">-</td>
                                                        <td class="text-right" style="color:rgba(223, 86, 64, 0.72);">￥468.35</td>
                                                        <td class="text-right">￥0.00</td>
                                                        <td class="text-right text-primary">详情</td>

                                                    </tr>
                                                    <tr>
                                                        <td>84656564566588</td>
                                                        <td>2016-05-21</td>
                                                        <td>消费</td>
                                                        <td class="text-right">-</td>
                                                        <td class="text-right" style="color:rgba(223, 86, 64, 0.72);">￥468.35</td>
                                                        <td class="text-right">￥0.00</td>
                                                        <td class="text-right text-primary">详情</td>
                                                    </tr>
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
                            <!--第一表格结束-->
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
            </div>

        </div>
    </div>
</div>
    </div>
</div>
<?php include "foot.php"?>
<script>
    $("#invoice-list").addClass("menu-open");
    $("#cash").addClass("menu-open");
</script>
</body>
</html>