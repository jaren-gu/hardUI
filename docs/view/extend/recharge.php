<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php" ?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>线下汇款</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
   .common_label span{font-size: 14px;}
    p{font-size: 14px;}
    th{background: #fafafa;}
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
                                <h5>充值</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt25">
                        <div class="alert alert-default" style="min-height:500px;background-color:white;">
                            <div><span style="font-size: 16px;">余额:￥0.00</span></div>
                            <div class="as-panel" style="margin-top:15px;">
                                <div class="as-panel-header">
                                    <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                                        <li class="active">
                                            <a href="#tab-1" data-toggle="tab" aria-expanded="true">支付宝充值</a>
                                        </li>
                                        <li>
                                            <a href="#tab-2" data-toggle="tab" aria-expanded="false">网银充值</a>
                                        </li>
                                        <li>
                                            <a href="#tab-2" data-toggle="tab" aria-expanded="false">线下汇款</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-12 mt15">
                                    <div class="as-form-group mb5">
                                        <label class="as-control-label">充值金额:</label>
                                            <input type="text" class="as-form-control as-input-sm ml10" style="display: inline-block; width:150px;">
                                        <span style="display: inline-block; padding-top:10px;">元</span><p style="clear: both;"></p>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-default p10">
                                        <h5>温馨提示： </h5>
                                        <span>1、通过信用卡的快捷支付有500元限制，超过500元时您可以选择其他方式支付。</span><br>
                                        <span class="text-danger">2、如您有欠费账单，充值后会优先补扣欠费账单。</span><br>
                                        <span>3、充值后请及时对支付订单进行结算，以免影响正常服务。 </span>
                                    </div>
                                    <button class="btn btn-default btn-sm">充值</button>
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
    $("#recharge").addClass("menu-open");
</script>
</body>
</html>