<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>组件</title>
</head>
<body data-spy="scroll" data-target=".navbar-example">

<?php include "nav.php" ?>

<div class="jumbotron jumbotronSty">
    <div class="container">
        <h1>JQuery Awesome 组件</h1>
        <p>Awesome 的每个组件都有属性、方法和事件。</p>
        <p>用户可以很容易地对这些组件进行扩展。</p>
    </div>
</div>
<div class="container">
    <div class="row contentSty">
        <div class="col-md-9" role="main">
            <!--Summary概览-->
            <?php include "view/compont/Summary/summary.php" ?>
            
            <!-- 基础(Base) -->
            <div class="bs-docs-section" id="base">
                <h1>基础(Base)</h1>
            </div>
            <?php include "view/compont/Base/baseParser.php" ?><!--Parser解释器-->
            <?php include "view/compont/Base/basePagination.php" ?><!--Pagination分页-->
            
            <!-- 表单(Form) -->
            <div class="bs-docs-section" id="form">
                <h1>表单(Form)</h1>
            </div>
            <?php include "view/compont/Form/form.php" ?><!--form表单-->
            
            <!--Validatebox验证框-->
            <?php include "view/compont/Form/formValidatebox.php" ?>
            <!--Combobox组合框-->
            <?php include "view/compont/Form/formCombobox.php" ?>
            <!--Datebox日期框-->
            <?php include "view/compont/Form/formCalendar.php" ?>
            
            <!-- 表格(Table) -->
            <div class="bs-docs-section" id="table">
                <h1>表格(Table)</h1>
            </div>
            <?php include "view/compont/Table/datatable.php" ?><!--datatable数据表格-->

        </div>
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top navbar-example" role="complementary">
                <ul class="nav bs-docs-sidenav">
                    <li>
                        <a href="#summary">概览</a>
                        <ul class="nav">
                            <li><a href="#summary_1">属性</a></li>
                            <li><a href="#summary_2">事件</a></li>
                            <li><a href="#summary_3">方法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#base">基础(Base)</a>
                        <ul class="nav">
                            <li><a href="#parser">Parser 解释器</a></li>
                            <li><a href="#pagination">Pagination 分页</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#form">表单(Form)</a>
                        <ul class="nav">
                            <li><a href="#form_1">Form 表单 </a></li>
                            <li><a href="#validatebox">Validatebox 验证框 </a></li>
                            <li><a href="#combobox">Combobox 组合框</a></li>
                            <li><a href="#datebox">Calendar 日期框 </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#table">表格(Table)</a>
                        <ul class="nav">
                            <li><a href="#datatable">DataTable 数据表格 </a></li>
                        </ul>
                    </li>
                </ul>
                <a class="back-to-top" href="javascript:backToTop();">返回顶部</a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
<?php include "foot.php" ?>
<script>
    $('#pp').pagination({
        total:100
    });
    
    $('#validate').validatebox({
        validType:'email',
        missingMessage:'不能为空！请输入有效邮箱'
    });

    $('#cb').combobox({
        url:'date.json'
    });

    $('#calendarBox').calendar();
</script>
</body>
</html>