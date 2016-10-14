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
   .content span{font-size: 12px;}
    p{font-size: 12px;}
    th{background: #F5F6FA;}
    dt{color:#039;}
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
    .bnt-right{float: right;}
    .workorder-tree li{
        list-style: none;
        color:#039;
    }
    .workorder-treee-nav>li>a{
        padding: 3px 15px;
        display: block;
    }
    .workorder-treee-nav>li>a:hover{
        background: #DDD;
    }
    .workorder-treee-nav{
        display: none;
    }
</style>
<body>
<?php include "sidebar.php"?>
<div id="content_wrapper">
    <div id="content">
        <div class="account_table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="workorder-title workorder-title-border">
                    <div class="pull-left">
                        <h5>财务类</h5>
                    </div>
                    <div class="bnt-right">
                        <span style="float:left;padding-right:10px;padding-top:7px;">手机看工单，省时又省力</span>
                        <button class="btn btn-primary pull-left btn-sm">创建新的模板信息</button>
                    </div>
                </div>
            </div>
            <!--域名所有者类型表格开始-->
            <div class="col-md-12 mt25">
                <div class="as-panel">
                    <div class="as-panel-header alert-border-left" style="background:#F5f6FA;border-left:4px solid #bababa;">
                        <span class="as-panel-title">
                            <span style="font-size: 14px;"><b>请选择具体问题：</b></span>
                        </span>
                    </div>
                    <div class="as-panel-body">
                        <div class="workorder_body" style="margin-top:15px;">
                            <span style="font-size: 14px;">·系统匹配到<a style="color:red;">10</a>条热门问题</span>
                            <div class="col-md-12" style="margin-top:15px;">
                                <div class="col-md-6">
                                    <p>·<a href="##">充值预付费如何申请发票？</a></p>
                                    <p>·<a href="##">如何变更发票信息</a></p>
                                    <p>·<a href="##">为什么月账单开票金额与消费记录中金额不一致</a></p>
                                    <p>·<a href="##">为什么发票索取不了，按键是灰色的</a></p>
                                    <p>·<a href="##">为什么我无法申请提现？</a></p>
                                </div>
                                <div class="col-md-6">
                                    <p>·<a href="##">发票开具的具体内容是什么？是否可以修改？</a></p>
                                    <p>·<a href="##">代金券如何使用？如何查询代金券适用范围？</a></p>
                                    <p>·<a href="##">如何查询\导出账单明细</a></p>
                                    <p>·<a href="##">支付宝代扣服务目前支持的业务范围及限制有哪些？</a></p>
                                    <p>·<a href="##">如何充值付款？如何查询我的款项是否到账？</a></p>
                                </div>
                            </div>
                            <div class="">
                                <span style="font-size: 14px;">·热门问题中找不到您的问题？请在这里选择</span>
                            </div>
                            <div class="col-md-12" style="margin-top:25px;">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label  class="col-md-2 control-label" style="text-align: right;">请选择具体分类：</label>
                                        <div class="col-md-8">
                                            <div class="workorder">
                                                <div class="clearfix" style="border: 1px solid #ccc; padding: 14px 0 14px 0; ">
                                                    <div class="col-sm-6">
                                                        <div class="workorder-tree" style="height:180px;overflow-y:scroll;">
                                                            <dl class="workorder_tree_dl">
                                                                <dt>
                                                                    <a href="##"  class="workorder_tree_a">
                                                                        <i class="fa fa-caret-right"></i> 发票类问题
                                                                    </a>
                                                                </dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="http://www.baidu.com">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##" class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##" class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##"  class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##" class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##"  class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##"  class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl class="workorder_tree_dl"><dt><a href="##" class="workorder_tree_a"><i class="fa fa-caret-right"></i> 发票类问题</a></dt>
                                                                <dd class="workorder_tree_dd">
                                                                    <ul class="workorder-treee-nav">
                                                                        <li><a href="##">发票申请或退换问题</a></li>
                                                                        <li><a href="##">发票模板或抬头问题</a></li>
                                                                        <li><a href="##">快递邮寄问题</a></li>
                                                                        <li><a href="##">发票金额问题</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>

                                                        </div>
                                                    </div>
                                                    <!-- 左侧边栏结束 -->
                                                    <div class="col-sm-6">
                                                        <div class="workorder-tree-right"style="height:180px;overflow-y:scroll;" >
                                                            <dl>
                                                                <dd>
                                                                    <ul class="nav">
                                                                        <li style="color: #ccc" class=""></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                            <dl>
                                                                <dd>
                                                                    <ul class="nav">

                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--分类col-md-8结束-->

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr class="alt mt10">
                            <div style="margin-left:-15px;"><span style="font-size: 14px;">· 你可以使用一下方法解决</span></div>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-default pn10 mb15">
                                    <p>线下汇款后还需要做什么</p>
                                    <p>线下汇款后还需要做什么购买云解析企业版，DNS切换为VIPDNS，切换过程会影响网站解析吗？</p>
                                    <div class="" style="text-align: right; margin-top:55px;">
                                        <label>该建议是否对你有用：</label>
                                        <button class="btn btn-primary btn-sm">有用</button>
                                        <button class="btn btn-default btn-sm">无用</button>
                                    </div>
                                </div>
                                <div class="pull-left" style="margin-bottom: 21px;">
                                    <p>没有您需要的答案？您也可以</p>
                                </div>
                                <button class="btn btn-default pull-left btn-xs ml15">直接提交工单</button>
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
        $("#workOrder").addClass("menu-open");
    </script>
    <script>
        $(document).ready(function(){
        $(".workorder_tree_dl").bind("click",function(){
        var c=$(this).index();
            alert(c);
            //$(".workorder_tree_dd").hide();
            $(".workorder-treee-nav").eq(c).toggle(function(){
                $(this).next().hide();
                ss=$(".fa.fa-caret-down")
            },function(){

            });
            $(this).children("dt").children("a").children("i").removeClass("fa fa-caret-right");
            $(this).children("dt").children("a").children("i").addClass("fa fa-caret-down");

        });
    });

    </script>
</body>
</html>