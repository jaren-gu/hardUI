<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <?php include "head.php"?>
    <title>全局样式</title>
</head>
<body data-spy="scroll" data-target=".navbar-example">

<?php include "nav.php" ?>

<div class="jumbotron jumbotronSty">
    <div class="container">
        <h1>全局样式</h1>
        <p>设置全局 CSS 样式。基本的 HTML 元素均可以通过 class 设置样式并得到增强效果。</p>
    </div>
</div>
<div class="container">
    <div class="row contentSty">
        <div class="col-md-9" role="main">
        <!--panel面板-->
        <div class="bs-docs-section" id="panel">
            <h1>Panel 面板</h1>
        </div>
        <?php include "view/global/panel.php"?>

        <!--tab标签页-->
        <div class="bs-docs-section" id="tab">
            <h1>Tab 标签页</h1>
        </div>
        <?php include "view/global/tab.php"?>

        </div>
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top navbar-example" role="complementary">
                <ul class="nav bs-docs-sidenav">
                    <li>
                        <a href="#panel">Panel 面板</a>
                        <ul class="nav">
                            <li><a href="#panel1">基本实例</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#tab">Tabs 标签页</a>
                        <ul class="nav">
                            <li><a href="#tab1">基本实例</a></li>
                            <li><a href="#tab2">头部位于侧边的Tab</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="back-to-top" href="javascript:backToTop();">返回顶部</a>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>
<?php include "foot.php"?>
</body>
</html>