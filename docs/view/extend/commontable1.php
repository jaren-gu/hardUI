<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>标签打印</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
    th{background: #F5F6FA;}
    .table_word{margin:2% auto; width:400px;}
    .workorder-title{
        padding: 6px 0px;
        min-height: 45px;
        margin-bottom: 15px;
    }
    .workorder-title-border{
        border-bottom: 1px solid #DDD;
    }
    .workorder-title-border h5{
        text-indent: 8px;
        border-left: 2px solid #88B7E0;
    }
    .bnt-right{float: right;}
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
                                <h5>发起的push</h5>
                            </div>
                            <div class="bnt-right">
                                <button class="btn btn-primary pull-left btn-sm">我要发布</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="as-form-group mbn mt5 ml10" style="display: inline-block;">
                                <label class="as-control-label">域名:</label>
                                    <input type="text" class="as-form-control as-input-sm"  style="width:100px; display: inline-block;">
                            </div>
                            <div class="as-form-group ml10"  style="display: inline-block;">
                                <label class="as-control-label">发起时间:</label>
                                <input type="text" class="as-form-control as-input-sm" placeholder="开始时间" style="width:150px; display: inline-block;">
                                <label>-</label>
                                <input type="text" class="as-form-control as-input-sm"placeholder="结束时间" style="width:150px; display: inline-block;">
                            </div>
                            <div class="as-form-group ml10"  style="display: inline-block;">
                                <label class="as-control-label">交易时间:</label>
                                <input type="text" class="as-form-control as-input-sm"placeholder="开始时间" style="width:150px; display: inline-block;">
                                <label>-</label>
                                <input type="text" class="as-form-control as-input-sm"placeholder="结束时间" style="width:150px; display: inline-block;">
                            </div>
                            <button class="btn btn-primary btn-sm ml10">检索</button>
                    </div>
                    <div class="col-md-12">
                        <div class="as-panel panel-body-top">
                            <div class="as-panel-body pn">
                                <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                                    <thead>
                                    <tr>
                                        <th>域名</th>
                                        <th>接收账户</th>
                                        <th>发起时间 <i class="fa fa-unsorted"></i></th>
                                        <th>交易时间 <i class="fa fa-unsorted"></i></th>
                                        <th>金额 <i class="fa fa-unsorted"></i></th>
                                        <th>全部状态(全部状态) <i class="fa fa-sort-down"></i></th>
                                        <th style="text-align: right;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>54654sdf</td>
                                        <td>sdfasdf</td>
                                        <td>消费</td>
                                        <td>2016-05-20</td>
                                        <td>消费</td>
                                        <td>消费</td>
                                        <td class="text-right">消费</td>
                                    </tr>
                                    <tr>
                                        <td>fsdsdf</td>
                                        <td>sdfasdf</td>
                                        <td>消费</td>
                                        <td>2016-05-20</td>
                                        <td>消费</td>
                                        <td>消费</td>
                                        <td class="text-right">消费</td>
                                    </tr>
                                    </tbody>
                                </table>

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
    $("#commontable1").addClass("menu-open");
</script>
</body>
</html>