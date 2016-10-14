<!DOCTYPE html>
<html lang="zh-cn">
<head>
   <?php include "head.php"?>
    <link rel="stylesheet" href="_SOURCE_/css/theme.css">
    <title>表单提示</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
   .account_table span{font-size: 12px;}
    p{font-size: 14px;}
    th{background: #F5F6FA;}
    .account-title{
        padding:6px 0px;
        min-height: 45px;
    }
    .account-title-border{
        border-bottom: 1px solid #DDD;
    }
    .account-title-border h5{
        text-indent: 8px;
        border-left: 2px solid #88B7E0;
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
                <div class="account-title account-title-border">
                    <div class="pull-left">
                        <h5>域名信息模板管理</h5>
                    </div>
                    <button class="btn btn-primary pull-right btn-sm">创建新的模板信息</button>
                </div>
                <div class="alert alert-warning mt15 p10 mb10" style="background-color: #FCF8E2;border-color: #FBECCB; color:#f68300;">
                    提示：域名信息模板可用于域名注册、域名所有者变更（过户）、域名交易等，请填写真实、准确、完整的域名所有者信息！
                </div>
                <div class="console-table-wapper"><div class="pull-left margin-top-1"></div>
                    <div class="as-form-group mb15 ml10">
                        <label class=" as-control-label" style="text-align: left;float: left;">域名所有者类型：</label>
                        <div style="width:120px;float: left;margin-top:5px;">
                            <select class="as-form-control as-input-sm">
                                <option value="1">全部</option>
                                <option value="2">Select2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--域名所有者类型表格开始-->
            <div class="col-md-12">
                <div class="as-panel panel-body-top">
                    <div class="as-panel-body pn">
                        <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                            <thead>
                            <tr>
                                <th>域名所有者名称（中文）</th>
                                <th>域名所有者名称（英文）</th>
                                <th>域名所有者类型</th>
                                <th>备注	</th>
                                <th class="text-right">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>上海龙腾</td>
                                <td>lonntec.com</td>
                                <td>上海</td>
                                <td>中文</td>
                                <td class="text-right">点击删除</td>
                            </tr>
                            <tr>
                                <td>上海龙腾</td>
                                <td>lonntec.com</td>
                                <td>上海</td>
                                <td>中文</td>
                                <td class="text-right">点击删除</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:1%;">
                <div class="alert alert-warning" style="color: #8a6d3b;background-color: #fcf8e3;border-color: #faebcc;">
                    <span style="font-size: 16px;"><b>温馨提示：</b></span><br/>
                    <span><b>•</b> 域名信息模版必须填写完整，才可在域名注册、域名所有者变更（过户）、域名交易等功能中使用，因历史数据导致的信息不完整的，请及时补填信息；</span><br>
                    <span><b>•</b> 模版区分为个人、企业两种类型，均为通用模版，即无论是国内域名还是国际域名，进行域名注册、域名所有者变更（过户）、域名交易等均可使用。</span><br>
                    <span><b>•</b> 为了便于您快速注册域名等，您可设置并维护相关模版信息，每个账户ID下最多可维护20个信息模版，个人/企业类型的分别可选择一个默认注册模版。</span>
                </div>
            </div>

        </div>
    </div>
</div>
        <?php include "foot.php"?>
        <script>
            $("#invoice-list").addClass("menu-open");
            $("#reminder").addClass("menu-open");
        </script>
</body>
</html>