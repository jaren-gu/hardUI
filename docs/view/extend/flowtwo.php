<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>业务流程2</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 12px;
    }
    p{font-size: 14px;color:#999;}
    .as-table > thead > tr > th{vertical-align:middle;}
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
    .flow_btn{float: right;}
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
                    <span class="unit past">发布域名</span>
                        <span class="arrow-complete">
                            <span class="lc-next"></span>
                            <span class="lc-prev"></span>
                        </span>
                    <span class="unit current">填写信息</span>
                        <span class="arrow-current">
                            <span class="lc-next"></span>
                            <span class="lc-prev"></span>
                        </span>
                    <span class="unit">身份验证</span>
                        <span class="arrow">
                            <span class="lc-next"></span>
                            <span class="lc-prev"></span>
                        </span>
                    <span class="unit ">完成</span>
                </div>
            </div>
            <!--域名所有者类型表格开始-->
            <div class="col-md-12" class="flowtwo_tab" style="margin-top:25px;">
                <div class="as-panel panel-body-top">
                    <div class="as-panel-body pn">
                        <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                            <thead>
                            <tr>
                                <th></th>
                                <th style="padding-top:-20px;">可发布的域名</th>
                                <th>价格(元)</th>
                                <th>到期时间</th>
                                <th style="margin-left:30%;">
                                    <p  class="mbn" style="padding-left:24.5%;">简介(最多可输入50个汉字)</p>
                                    <p class="mbn" style="padding-left:24.5%;">禁止填写与域名本身无关内容或频繁上下架,否则域名可能被下架或冻结账号。</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody style="">
                            <tr>
                                <td></td>
                                <td>批量修改域名信息</td>
                                <td>
                                   <input type="text" class="as-form-control as-input-sm mt25" style="width:160px;"></div>
                                    <div class="pt5">大写人民币:</div>
                                </td>
                                <td>
                                    <select class="as-form-control as-input-sm" style="width:160px;">
                                        <option value="1">长期</option>
                                        <option value="2">Select2</option>
                                    </select>
                                </td>
                                <td> <input type="text" style="margin-left:25%;width:160px;"class="as-form-control as-input-sm"></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p style="text-align: center; color:red;">无可发布域名</p></td>
                            </tr>
                            <tr style="background: #F5F6FA;">
                                <td colspan="7"><p>不可发布域名及原因<a style="color:red;">1</a>个</p></td>
                            </tr>
                            <tr>
                                <td colspan="7"><p>labelclound.cn<a style="color:red;">域名不存在或是不在万网上面</a></p></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--域名表单结束-->
                <div class="flow_btn">
                    <button class="btn btn-primary btn-sm">上一步</button>
                    <button class="btn btn-default btn-sm">下一步</button>
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
    $("#flowtwo").addClass("menu-open");
</script>
</body>
</html>