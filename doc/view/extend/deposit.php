<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>申请提现</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
    .depositer span{font-size: 12px;color:#999;}
    p{font-size: 14px;}
    th{background: #fafafa;}
    .alert-border-left{
        border-left: 4px solid #6d7781;
    }
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
        <div class="depositer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="workorder-title workorder-title-border">
                            <div class="pull-left">
                                <h5>申请提现</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt25">
                        <div class="as-panel">
                            <div class="as-panel-header">
                                <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab" aria-expanded="true">申请提现</a>
                                    </li>
                                    <li>
                                        <a href="#tab-2" data-toggle="tab" aria-expanded="false">提现记录</a>
                                    </li>
                                </ul>
                            </div>
                        <div class="row">
                            <div class="col-md-12 mt15">
                                <div class="alert alert-default p10">
                                    <span>注意：可线上提现金额可通过 “线上提现” 方式提取，所提款项可以实时充入您的支付宝账户，其他金额需通过 “线下提现” 方式提取。 </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="as-panel">
                                    <div class="as-panel-header alert-border-left" style="background:#F5f6FA;">
                                            <span class="as-panel-title">
                                                    <span>可提现账户余额: <span class="text-warning" style="font-size: 18px;">￥0.00</span></span>
                                            </span>
                                    </div>
                                    <div class="as-panel-body pn">
                                        <div class="deposit_body" style="margin:1% 15%;">
                                                <span style="font-size: 14px;">
                                                    可线上提现金额&nbsp<i class="fa fa-question-circle"></i>:&nbsp&nbsp&nbsp&nbsp￥0.00
                                                </span>
                                                <button class="btn btn-default btn-sm"style="margin-left:30px;">线上提现</button>
                                        </div>
                                    </div>
                                    <div class="as-panel-footer" style="background: white;">
                                        <div class="deposit_body" style="margin:5px 15%;">
                                                <span style="font-size: 14px;padding-left:5px;">
                                                    线下提现余额&nbsp<i class="fa fa-question-circle"></i>:&nbsp&nbsp&nbsp&nbsp￥0.00
                                                </span>
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
    $("#deposit").addClass("menu-open");
</script>
</body>
</html>