<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>VIP套餐</title>
</head>
<style>
    body{
        color: #666;
        font-family: "微软雅黑","Open Sans", sans-serif;
        font-size: 14px;
    }
    p{font-size: 12px;}
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
    .combo_word{margin:30px auto;}
    .combo_foot{border:1px solid #DDD;padding:15px; min-height:175px;color:#999;}
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
                        <h5>VIP套餐列表</h5>
                    </div>
                </div>
            </div>
            <!--域名所有者类型表格开始-->
            <div class="col-md-12 mt25">
                <div class="as-panel panel-body-top">
                    <div class="as-panel-body pn">
                        <table class="as-table as-table-striped as-table-hover fchild-checkbox as-selectable">
                            <thead>
                            <tr>
                                <th></th>
                                <th>产品编号</th>
                                <th>产品名称</th>
                                <th>到期日</th>
                                <th>产品绑定域名</th>
                                <th class="text-right">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>2016-05-20</td>
                                <td>消费</td>
                                <td>消费</td>
                                <td>消费</td>
                                <td class="text-right">消费</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>2016-05-20</td>
                                <td>消费</td>
                                <td>消费</td>
                                <td>消费</td>
                                <td class="text-right">消费</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="dt-panelfooter clearfix" style="background: #F5F6FA;">
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
            <div class="col-md-12" style="margin-top:2%;">
                <div class="combo_foot">
                    <h4 style="text-indent: 12px;">常见问题：</h4>
                    <div class="col-md-6 col-xs-6">
                        <span>
                            <p><a>什么是更换域名？</a></p>
                            <p><a>更换域名会有什么影响？</a></p>
                            <p><a>更换域名计数规则</a></p>
                        </span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <span>
                           <p><a>购买完毕后，如何将自己的DNS修改成VIPDNS？</a></p>
                            <p><a>云解析企业版过期，会影响我的解析吗？</a></p>
                            <p><a>购买云解析企业版，DNS切换为VIPDNS，切换过程会影响网站解析吗？</a></p>
                        </span>
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
    $("#combo").addClass("menu-open");
</script>
</body>
</html>