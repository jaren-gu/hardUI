<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>业务流程1</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
    p{font-size: 12px;color:#999;}
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
    .lc-process .unit, .lc-process .current, .lc-process .past {width:23.5%;}
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
                        <h5>发布域名</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:25px;">
                <div class="lc-process">
                    <span class="unit current">流程1</span>
                        <span class="arrow-current">
                            <span class="lc-next"></span>
                            <span class="lc-prev"></span>
                        </span>
                    <span class="unit">流程2</span>
                        <span class="arrow">
                            <span class="lc-next"></span>
                            <span class="lc-prev"></span>
                        </span>
                    <span class="unit">流程3</span>
                        <span class="arrow">
                            <span class="lc-next"></span>
                            <span class="lc-prev"></span>
                        </span>
                    <span class="unit ">流程4</span>
                </div>
            </div>
            <!--域名所有者类型表格开始-->
            <div class="col-md-12" >
                <div class="col-md-12" style="min-height:500px;border:1px solid #DDDDDD; margin-top:2%;padding-bottom: 15px;">
                    <div class="col-md-5 col-md-offset-2 mt15">
                        <label style="padding-left:8%;">交易类型 :</label>
                        <div class="radios" style="display: inline-block; padding-left:2%;">
                            <label>
                                <input type="radio" id="radioExample20" name="radioExample">
                                <span><strong>一口价域名</strong></span>
                            </label>
                        </div>
                        <div class="radios" style="display: inline-block;">
                            <label>
                                <input type="radio" id="radioExample20" name="radioExample">
                                <span><strong>带价PUSH</strong></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mt15">
                        <a href="##">那些情况不能发布交易？</a>
                    </div>
                    <div class="col-md-12" style="margin-top:2%;">
                        <div class=" col-md-3" style="margin-top:8%;"><label style="float: right;">即将发布的域名：</label></div>
                        <div class=" col-md-6">
                            <p>请在下框填写要发布的域名,也可以到<a href="##">域名列表</a>中选择域名,在”更多批量操作”中选择发布域名交易添加到此.</p>
                            <textarea rows="13%" cols="85%" style="border:1px solid #DDDDDD; width:100%;"></textarea>
                            <p style="float: right;">你已经填写了<a style="color:red;">0</a>个域名,还可添加<a style="color:red;">50个</a></p>
                        </div>
                        <div class=" col-md-3 mt15">
                                <span>
                                <h5>域名规则：</h5>
                                <p><b>·</b> <span>请在左框中输入要出售的域名，仅支持您会员账户下的域名；</span></p>
                                <p><b>·</b> <span>每行一个，一次最多输入 50 个；</span></p>
                                <p>例如：</p>
                                <p><b>·</b> <span>域名已在原淘域名市场中出售，在此选择发布后，交易类型将随之发生改变。</span></p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flowone_btn"style="float:right;margin-top:15px;"><button class="btn btn-default" style="margin-right:11px">下一步</button></div>
        </div>
    </div>
</div>
    </div>
</div>
<?php include "foot.php"?>
<script>
    $("#invoice-list").addClass("menu-open");
    $("#flowone").addClass("menu-open");
</script>

</body>
</html>