<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>通用表单2</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
   .common_label span{font-size: 16px;}
    p{font-size: 12px;}
    th{background: #F5F6FA;}
    .table_word{margin:5% auto; width:400px;}
    .biao{width:100%;height:54px;}
    .biao_1{width:33.3%;height:60px;border:1px solid #e2e2e2;float: left;text-align: center;padding:20px 5px;}
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
                                <h5>域名列表</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt25">
                        <div class="as-panel">
                            <div class="as-panel-header">
                                <ul class="panel-tabs-border panel-tabs panel-tabs-left">
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab" aria-expanded="true">全部域名</a>
                                    </li>
                                    <li>
                                        <a href="#tab-2" data-toggle="tab" aria-expanded="false">急需续费域名</a>
                                    </li>
                                    <li>
                                        <a href="#tab-3" data-toggle="tab" aria-expanded="false">急需赎回域名</a>
                                    </li>
                                    <li>
                                        <a href="#tab-4" data-toggle="tab" aria-expanded="true">未实名认证域名</a>
                                    </li>
                                    <li>
                                        <a href="#tab-5" data-toggle="tab" aria-expanded="false">转入域名</a>
                                    </li>
                                    <li>
                                        <a href="#tab-6" data-toggle="tab" aria-expanded="false">预登记域名</a>
                                    </li>
                                    <a style="float: right;padding-right:30px;">导出列表</a>
                                </ul>
                            </div>
                            <div class="as-panel-body pn" style="border:none;">
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert mt25 mbn" style="background-color: #f9fafc;"><a class=" mpn fs12">6月15日云栖大会厦门峰会，国际生态合作伙伴及重磅行业客户现场分享计算的“聚”与“变”，立即报名！</a></div>
                                                <div class="as-form-group mbn mt10 ml10" style="display: inline-block;">
                                                    <label class="as-control-label">域名类型:</label>
                                                        <select class="as-form-control as-input-sm" style="width:150px; display: inline-block">
                                                            <option value="1">国际域名</option>
                                                            <option value="2">Select2</option>
                                                        </select>
                                                </div>
                                                    <div class="as-form-group ml10" style="display:inline-block;">
                                                        <label class="as-control-label">自定义分组:</label>
                                                        <select class="as-form-control as-input-sm" style="width:150px; display: inline-block">
                                                            <option value="1">选择分组</option>
                                                            <option value="2">Select2</option>
                                                        </select>
                                                    </div>
                                                    <div class="as-form-group ml10" style="display: inline-block;">
                                                        <label class="as-control-label">域名到期时间:</label>
                                                        <input type="text" class="as-form-control as-input-sm"placeholder="开始时间" style="width:150px; display: inline-block">
                                                        <label>至</label>
                                                        <input type="text" class="as-form-control as-input-sm"placeholder="结束时间" style="width:150px; display: inline-block">
                                                    </div>
                                                    <div class="as-form-group ml10" style="display: inline-block;">
                                                        <label class="as-control-label">域名:</label>
                                                        <input type="text" class="as-form-control as-input-sm"placeholder="输入域名进行搜索" style="width:150px; display: inline-block">
                                                    </div>
                                                    <button class="btn btn-default btn-sm">检索</button>
                                                </div>
                                            <div class="col-md-12">
                                                <div class="as-panel panel-body-top">
                                                    <div class="as-panel-body pn">
                                                        <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:77px;">
                                                                     <input type="checkbox">
                                                                <th>
                                                                    域名
                                                                </th>
                                                                <th>域名类型</th>
                                                                <th>域名状态</th>
                                                                <th>到期日期</th>
                                                                <th style="text-align: right;">操作</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>www.baidu.com</td>
                                                                <td>域名</td>
                                                                <td>12233</td>
                                                                <td>20150604</td>
                                                                <td class="text-right">fsdf</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>www.baidu.com</td>
                                                                <td>域名</td>
                                                                <td>12233</td>
                                                                <td>20150604</td>
                                                                <td class="text-right">fsdf</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="dt-panelfooter clearfix" style="background:#F5F6FA;">
                                                            <div class="table_paginate">
                                                                <ul class="table_pagination">
                                                                    <li class="table_paginate_button previous disabled">
                                                                        <a href="#">上一页</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">1</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">...</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">5</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">6</a>
                                                                    </li>
                                                                    <li class="table_paginate_button active">
                                                                        <a href="#">7</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">8</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">9</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">...</a>
                                                                    </li>
                                                                    <li class="table_paginate_button">
                                                                        <a href="#">100</a>
                                                                    </li>
                                                                    <li class="table_paginate_button next">
                                                                        <a href="#">下一页</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--第一表格结束-->
                                            <div class="col-md-12">
                                                <div class="biao">
                                                    <div class="biao_1">
                                                       <a href="##"><i class="fa fa-calendar" style="color:#06C;"></i></a>
                                                        <a>域名注册</a>
                                                    </div>
                                                    <div class="biao_1">
                                                        <a href="##"><i class="fa fa-pencil" style="color:#06C;"></i></a>
                                                        <a>域名转入</a>
                                                    </div>
                                                    <div class="biao_1">
                                                        <a href="##"><i class="fa fa-dollar" style="color:#06C;"></i></a>
                                                        <a>购买二手域名</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top:2%;">
                                                <blockquote class="blockquote-warning" style="background: #fcf8e2;">
                                                    <div><b style="color:#9d7437;">温馨提示：</b>
                                                        <p>• 如果在此账号下没有找到您的域名信息，您可以尝试
                                                            <a href="" target="_blank">通过域名查询登陆帐号</a></p>
                                                        <p>• 域名解析生效问题，您可以通过域名访问检测工具
                                                            <a href="" target="_blank">来进行自助排查与解决</a></p>
                                                        <p>• 如何从域名到建站？您可以<a href="" target="_blank">点此查看</a></p>
                                                    </div>
                                                </blockquote>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-12 hidden-sm visible-lg-*" style="border:1px solid #e2e2e2;padding:15px 10px;min-height:130px;">
                                                    <p style="text-indent: 15px;">新手必读：域名使用指南</p>
                                                    <div class="col-md-3 col-sm-3">
                                                        <div class="zhinan1">
                                                                    <div style="width:30px; height:30px;border-radius: 30px;border:1px solid #999999; display: inline-block;">
                                                                        <div style="text-align: center; padding:5px 0px;"><a style="color:#999999;">1</a></div>
                                                                    </div>
                                                                <div class="media-body ml10 mt5" style="display: inline-block;">
                                                                    <p class="media-heading">域名所有者实名认证</p>
                                                                    <p><a href="##">.cn等国内域名怎样进行实名认证？</a></p>
                                                                    <p><a href="##">.com等国际域名是否必须实名认证？</a></p>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="zhinan1">
                                                            <i  class="fa fa-long-arrow-right fa-2x "style="padding:10px 1px;color:#E5E5E5; "></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="zhinan1">
                                                                    <div style="width:30px; height:30px;border-radius: 30px;border:1px solid #999999; display: inline-block;">
                                                                        <div style="text-align: center; padding:5px 0px;"><a style="color:#999999;">2</a></div>
                                                                    </div>
                                                                <div class="media-body ml10 mt5" style="display: inline-block;">
                                                                    <p>实名认证成功</p>
                                                                    <p>二个工作日内审核完成</p>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="zhinan1">
                                                            <i  class="fa fa-long-arrow-right fa-2x "style="padding:10px 1px;color:#E5E5E5; "></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="zhinan1">
                                                                    <div style="width:30px; height:30px;border-radius: 30px;border:1px solid #999999; display: inline-block;">
                                                                        <div style="text-align: center; padding:5px 0px;"><a style="color:#999999;">3</a></div>
                                                                    </div>
                                                                <div class="media-body ml10 mt5" style="display: inline-block;">
                                                                    <p class="media-heading">域名解析</p>
                                                                    <p><a href="##">如何设置网站解析？</a></p>
                                                                    <p><a href="##">如何设置邮箱解析？</a></p>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    $("#commontable2").addClass("menu-open");
</script>
</body>
</html>