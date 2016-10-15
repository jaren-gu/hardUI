<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>返利推荐</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
  .common_label span{font-size: 13px;}
    p{font-size: 14px;}
    th{background: #F5F6FA;}
    .table_word{margin:2% auto; width:400px;}
    .tuijian_left{border:1px solid #DDD;padding:15px; min-height:146px;}
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
                                <h5>推荐码</h5>
                            </div>
                            <div class="pull-right">
                                <a><span>返利规则 | 推荐码使用规则</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 mt15">
                            <div class="tuijian_left">
                                <span>
                                    <span style="font-size: 20px;">我的推荐码:&nbsp;&nbsp;</span><span style="color:#09c; font-size:20px;">lv87wz</span>
                                    <label style="background: #5cb85c; color:white;padding:4px;">有效</label>&nbsp;<i class="fa fa-question-circle"></i>
                                </span><br/><br/>
                                <label>分享到&nbsp;
                                    <i class="fa fa-weibo fa-2x" style="color:red;"></i>&nbsp;
                                    <i class="fa fa-wechat fa-2x" style="color:#5cb85c;"></i>&nbsp;
                                    <i class="fa fa-twitter fa-2x"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 mt15">
                            <div class="tuijian_left">
                                <span>
                                    <span style="font-size: 20px;">返利余额:&nbsp;&nbsp;<span style="font-size: 20px;color:#F90;">￥0.00</span><br/>
                                    <span style="color:#999;">累计返利 : ￥0.00&nbsp;&nbsp;&nbsp;<span>已兑换 : ￥0.00</span></span><br/>
                                    <span style="color:#F90;">提醒：亲爱的用户，截止2015年12月底前由您推广产生的返利金额，如在2016年2月29日前仍未兑换，系统会为您自动兑换成一张等额代金券发放至您的账号，请尽快兑换使用。</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!--返余额结束-->
                    <div class="col-md-12 mt25">
                        <div class="as-panel">
                            <div class="as-panel-header">
                                <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab" aria-expanded="true">返利订单</a>
                                    </li>
                                    <li>
                                        <a href="#tab-2" data-toggle="tab" aria-expanded="false">返利记录</a>
                                    </li>
                                    <li>
                                        <a href="#tab-2" data-toggle="tab" aria-expanded="false">兑换记录</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="as-panel-body pn" style="border:none;">
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-12 mt15">
                                                <div class="alert alert-default" style="padding: 8px;">
                                                    <span>提醒：以下订单均为已支付的订单。 </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ml10">
                                                    <div class="as-form-group" style="display: inline-block;">
                                                        <label class="as-control-label">支付时间:</label>
                                                        <input type="text" class="as-form-control as-input-sm"placeholder="开始时间" style="display: inline-block;width:150px;">
                                                        <label class="as-control-label">-</label>
                                                        <input type="text" class="as-form-control as-input-sm"placeholder="结束时间"  style="display: inline-block;width:150px;">
                                                    </div>
                                                    <button class="btn btn-default btn-sm ml10">查询</button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="as-panel panel-body-top">
                                                    <div class="as-panel-body pn">
                                                        <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                                                            <thead>
                                                            <tr>
                                                                <th>使用人</th>
                                                                <th>支付时间</th>
                                                                <th>订单支付金额</th>
                                                                <th>预计可返 <i class="fa fa-question-circle"></i></th>
                                                                <th>
                                                                    <div class="showDown">
                                                                        <form>
                                                                            <select  style="border:none;background:#F5F6FA;">
                                                                                <a value="volvo">Volvo</a>
                                                                                <option value="saab">Saab</option>
                                                                                <option value="fiat" selected="selected">
                                                                                    返利状态(全部) </option>
                                                                                <option value="audi">Audi</option>
                                                                            </select>
                                                                        </form>
                                                                    </div>
                                                                </th>
                                                                <th>预计返利时间</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                            <tr>
                                                                <td>上海龙腾</td>
                                                                <td>lonntec.com</td>
                                                                <td>上海</td>
                                                                <td>中文</td>
                                                                <td>中文</td>
                                                                <td>点击删除</td>
                                                            </tr>
                                                            <tr>
                                                                <td>上海龙腾</td>
                                                                <td>lonntec.com</td>
                                                                <td>上海</td>
                                                                <td>中文</td>
                                                                <td>中文</td>
                                                                <td>点击删除</td>
                                                            </tr>

                                                            </tr>
                                                            </tbody>
                                                        </table>

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
    $("#rebate").addClass("menu-open");
</script>
</body>
</html>