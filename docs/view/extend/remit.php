<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>线下汇款</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
    }
   .tab-content span{font-size: 12px;}
    p{font-size: 12px;}
    th{background: #fafafa;}
    .table_word{margin:2% auto; width:400px;}
    .biao{width:100%;height:60px;}
    .biao_1{width:33.3%;height:60px;border:1px solid #e2e2e2;float: left;text-align: center;padding:10px 5px;}
    .zhinan1{margin:0 auto;}
    .workorder-title{
        padding: 16px 0px;
        min-height: 60px;
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
    .text-danger{color:red;}
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
                        <h5>线下汇款</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt10">
                <div class="as-panel">
                    <div class="as-panel-header">
                        <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab" aria-expanded="true">汇款底单信息提交</a>
                            </li>
                            <li>
                                <a href="#tab-2" data-toggle="tab" aria-expanded="false">汇款底单信息查询</a>
                            </li>
                            <li>
                                <a href="#tab-2" data-toggle="tab" aria-expanded="false">无人认领款项</a>
                            </li>
                        </ul>
                    </div>
                    <div class="as-panel-body pn" style="border:none;">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-12 mt20">
                                        <div class="alert alert-default p10">
                                            <span>1、线下汇款现在升级为专属账号方式，直接向阿里的专属账户汇款，系统会将汇款直接匹配到您的阿里云账户，<span style="color: red;">无需</span>再提交汇款底单信息。<a target="_blank" href="##">更多详情</a> </span><br>
                                            <span>2、如还未完成线下汇款：</span><a href="##">查看如何线下汇款</a><br><span>3、如果您通过非招行专属账号方式汇款，在完成银行汇款后，请您尽快进行汇款底单信息提交；底单提交后，您的资金将录入到云账号：</span> <span class="text-danger ng-binding" style="color:red;">zsddong888</span>
                                            <span>如您要变更充值的云账号请在备注中说明。</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert alert-default" style="height:500px;background-color:white;">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="col-md-2 control-label" style="text-align: right;">
                                                        <span class="text-danger">*</span> <span>选择提交方式：</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <div class="radios" style="float: left;">
                                                            <label>
                                                                <input type="radio" id="radioExample20" name="radioExample">
                                                                <span>填写汇款底单信息</span>
                                                            </label>
                                                        </div>
                                                        <div class="radios" style="display: inline-block;">
                                                            <label>
                                                                <input type="radio" id="radioExample20" name="radioExample">
                                                                <span>填写汇款底单信息</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 control-label" style="text-align: right; margin-top:15px;">
                                                        <span class="text-danger">*</span><span>汇款底单扫描：</span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="file" id="picPath" name="doc" onchange="" style="margin-top:15px;" value="上传图片"/>
                                                        <div id="Preview">
                                                            <span style="font-size: 12px;">仅支持JPG, GIF, PNG图片文件，且需小于2M</span>
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 control-label" style="text-align: right; margin-top:15px;">
                                                        <span class="text-danger">* </span><span>联系人手机：</span>
                                                    </label>
                                                    <div class="col-md-3" style="margin-top:15px;">
                                                        <input type="text" class="as-form-control as-input-sm">
                                                    </div>
                                                </div>
                                                <div class="col-md-12"style="margin-top:15px;" >
                                                    <label class="col-md-2 control-label" style="text-align: right; margin-top:15px;">
                                                        <span class="text-danger">* </span><span>备注：</span>
                                                    </label>
                                                    <div class="col-md-8">
                                                            <textarea name="remark" class="form-control " cols="70" rows="5"  style="resize: none;width:65%;border: 1px solid #dddddd;">
                                                            </textarea><br/>
                                                            <span>默认充值到登录的云账号，需要给其他云账号充值，请写明需要充值的云账号和金额，<br>
                                                            比如：3456dipdip@aliyun.com 500.00元</span><br/>
                                                        <button class="btn btn-default btn-sm" style="margin-top:10px;">提交</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--第一tab结束-->
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
    $("#remit").addClass("menu-open");
</script>
</body>
</html>