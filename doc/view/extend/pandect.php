<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <?php include "head.php"?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>账户总览</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
   .account_table span{font-size: 14px;}
    p{font-size: 14px;}
    th{background: #F5F6FA;}
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
    .text-explode {
        color: #CCC !important;
        font-weight: normal !important;
        margin: 0px 4px !important;
    }
    .account_title{border:1px solid #ccd6e0;padding:15px; height:165px; border-bottom:none; }
    .account-home-left-title{
        font-size:10px;
        float: left;
    }
    .item-title1{margin-top:8px;}
    .item1{
        height:80px;
        border: solid 1px #ccd6e0;
        padding: 20px 20px;
    }
    .item2{
        border: solid 1px #ccd6e0;
        height:80px;
        padding: 20px 20px;

    }
    .account_foot{border:1px solid #ccd6e0;padding:15px; min-height:185px;color:#999;}
    .account_foot p{text-indent: 10px;font-size: 12px;}
</style>
<body>
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="account_table">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="account-title account-title-border"><h5 class="ng-binding">账户总览</h5></div>
                    </div>
                    <div class="col-md-12 mt25">
                        <div class="account_title">
                            <div class="col-md-12">
                                <span>
                                    <span style="font-size: 20px;">现金余额&nbsp;<i class="fa fa-question-circle"></i></span><span style="font-size:18px;">: ￥0.00</span>
                                     <button type="button" class="btn btn-info btn-sm" style="margin-left:20px;">充值</button>&nbsp;
                                </span>
                                <span style="margin-left:15px;">
                                    <a href="##" class="account_1">提现</a><span class="text-explode">|</span>
                                    <a href="##" class="account_2">提现记录</a><span class="text-explode">|</span>
                                    <a href="##" class="account_3">退款</a><span class="text-explode">|</span>
                                    <a href="##" class="account_4">申请网商贷 </a><span class="text-explode">|</span>
                                    <a href="##" class="account_5">申请支付宝收付款工具</a>
                                </span>
                                <hr class="alt mt20">
                                <div class="account-home-left-title "><p style="padding-bottom:10px;">现金余额预警：</p></div>
                                <div class="as-switch switch-info switch-inline switch-xs" style="">
                                    <input id="exampleCheckboxSwitch1" type="checkbox" checked="">
                                    <label for="exampleCheckboxSwitch1"></label>
                                </div>
                                <hr class="alt mt20">
                            </div>
                        </div>
                        <div class="col-md-3 item1" style="border-right:none;">
                            <div class="item-title">1&nbsp;&nbsp;<span class="sub">张</span></div>
                            <div class="item-title1">
                                可用代金券<a href="##" style="padding-left:20px;">代金券管理</a>
                            </div>
                        </div>
                        <div class="col-md-3 item1" style="border-right:none;">
                            <div class="item-title">1&nbsp;&nbsp;<span class="sub">张</span></div>
                            <div class="item-title1">
                                可用代金券<a href="##" style="padding-left:20px;">代金券管理</a>
                            </div>
                        </div>
                        <div class="col-md-3 item1" style="border-right:none;">
                            <div class="item-title">1&nbsp;&nbsp;<span class="sub">张</span></div>
                            <div class="item-title1">
                                可用代金券<a href="##" style="padding-left:20px;">代金券管理</a>
                            </div>
                        </div>
                        <div class="col-md-3 item2" style=" ">
                            <div class="item-title">1&nbsp;&nbsp;<span class="sub">张</span></div>
                            <div class="item-title1">
                                可用代金券<a href="##" style="padding-left:20px;">代金券管理</a>
                            </div>
                        </div>
                    </div>
                    <!--支付宝代扣开始-->
                    <div class="col-md-12" style="margin-top:2%;">
                        <div class="account_foot">
                            <span>
                                <i class="fa fa-question-circle" style="margin-left:-5px;"></i><h4 style="display: inline-block;">支付宝代扣</h4><br/>
                                <h5 style="text-indent:10px;display: inline-block;">您还没有签约支付宝代扣服务</h5><a href="##" style="display: inline-block;text-indent: 15px;">签约</a>
                                <p>您可绑定支付宝代扣服务，系统将从签约的支付宝账号自动扣除产品消费费用，保证您的资源永不释放。</p>
                                <p>适用范围：仅支持按量付费产品产生的账单，支付宝代扣服务暂不支持企业支付宝账号签约及绑定企业银行卡代扣。</p>
                                <p>限额：<a style="color:red;">日限额5000元，月限额50000元</a></p>
                            </span>
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
    $("#pandect").addClass("menu-open");
</script>
</body>
</html>