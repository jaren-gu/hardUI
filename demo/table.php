<!DOCTYPE html>
<html lang="zh-CN">
<head>
<!--        <link href="../css/plugins/datatable.css" rel="stylesheet"/>-->
    <?php include "head.php"?>
    <title>Awesome UI</title>

</head>
<body>
<div class="container">
    <h1>DataTable</h1>
    <div class="as-panel">
        <div class="as-panel-header"></div>
        <div class="as-panel-body pn">
<!--            <div class="as-panel-menu clearfix">-->
<!--                <div class="table_filter">-->
<!--                    <label style="vertical-align: middle">-->
<!--                        productid：-->
<!--                        <input type="search" class="as-form-control as-input-sm">-->
<!--                    </label>-->
<!--                    <label style="vertical-align: middle">-->
<!--                        itemid：-->
<!--                        <input type="search" class="as-form-control as-input-sm">-->
<!--                    </label>-->
<!--                    <button class="btn btn-info btn-sm">搜索</button>-->
<!--                </div>-->
<!--            </div>-->
            <table class="as-table as-table-striped dataTable no-footer DTTT_selectable" id="dataTable">
                <thead>
                    <tr>
                        <th data-options="{field:'ordernumber'}">订单编号</th>
                        <th data-options="{field:'company'}">代理商名称</th>
                        <th data-options="{field:'agencynumber'}">代理商编号</th>
                        <th data-options="{field:'amount'}">金额</th>
                        <th data-options="{field:'key'}">类型</th>
                        <th data-options="{field:'created'}">日期时间</th>
                        <th data-options="{field:'settlement'}">状态</th>
                        <th data-options="{field:'operation'}" class="text-right">操作</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script src="../js/jquery-1.11.2.min.js"></script>
<script src="../js/plugins/parser.js"></script>
<script src="../js/plugins/datatable.js"></script>
<script type="text/javascript">
    $("#dataTable").datatable({
        url:"http://127.0.0.1/TP_DEV/Admin/Test/test",
        pagination:true,
        toolbar:true,
        toolbarSearch:[
            {title:"订单编号",name:"ordernumber"},
            {title:"代理商名称",name:"company"}
        ],
        cloums:[
            {
                field:"operation",
                formatter:function(value,row,index){
                    return "<a class='btn btn-warning btn-sm mr5' href='http://127.0.0.1/TP_DEV/Admin/Test/test' target='_blank'>修改</a>" +
                        "<a class='btn btn-danger btn-sm'>删除</a>";
                }
            },
            {
                field:"settlement",
                formatter:function(value,row,index){
                    if(value == -1){
                        return "未结算";
                    }else{
                        return "已结算";
                    }
                }
            }
        ]
    });
</script>
</body>
</html>