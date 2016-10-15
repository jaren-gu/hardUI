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
        <h1>UI 基础</h1>
        <p>设置全局 CSS 样式。基本的 HTML 元素均可以通过 class 设置样式并得到增强效果。</p>
    </div>
</div>
<div class="container">
    <div class="row contentSty">
        <div class="col-md-9" role="main">
        <!--基础UI-->
        <div class="bs-docs-section" id="ui">
            <h1>基础UI</h1>
        </div>
        <?php include "view/element/alerts.php"?>
        <?php include "view/element/button.php"?>
        <?php include "view/element/panel.php"?>
        <?php include "view/element/progress.php"?>
        <?php include "view/element/tabs.php"?>
        <?php include "view/element/table.php"?>

        <!--响应式-->
        <div class="bs-docs-section" id="responsive">
            <h1>响应式</h1>
        </div>    
        <?php include "view/element/grid.php"?>
        <?php include "view/element/responsive-utilities.php"?>
        
        <!--排版-->
        <div class="bs-docs-section" id="typography">
            <h1>排版</h1>
        </div>
        <?php include "view/typography/headings.php"?>
        <?php include "view/typography/text.php"?>
        <?php include "view/typography/label.php"?>
        <?php include "view/typography/quotes.php" ?>
        <?php include "view/typography/well.php" ?>
        <?php include "view/typography/media.php" ?>

        <!--Form 表单类-->
        <div class="bs-docs-section" id="form">
            <h1>Form 表单类</h1>
        </div>
        <?php include "view/form/input.php"?>
        <?php include "view/form/radio-checkbox.php"?>
        <?php include "view/form/switch.php"?>

        <!--图片-->
        <div class="bs-docs-section" id="images">
            <h1>图片</h1>
        </div>
        <?php include "view/image/imageshape.php"?>
        <?php include "view/image/imgthumbnail.php"?>
        <?php include "view/image/imgwordthum.php"?>


            <!--帮助类-->
        <div class="bs-docs-section" id="help">
            <h1>帮助类</h1>
        </div>
        <?php include "view/help/height.php" ?>
        <?php include "view/help/text.php" ?>
        <?php include "view/help/padding.php" ?>
        <?php include "view/help/margin.php" ?>
        <?php include "view/help/lineHeight.php" ?>
        <?php include "view/help/width.php" ?>
        <?php include "view/help/textscene.php" ?>
        <?php include "view/help/bgscence.php" ?>
        <?php include "view/help/pullfloat.php" ?>
        <?php include "view/help/contentalign.php" ?>
        <?php include "view/help/clearfloat.php" ?>
        <?php include "view/help/displaycontent.php" ?>
        <?php include "view/help/skipcontent.php" ?>
        <?php include "view/help/imagehide.php" ?>

        </div>
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top navbar-example" role="complementary">
                <ul class="nav bs-docs-sidenav">
                    <li>
                        <a href="#ui">基础UI</a>
                        <ul class="nav">
                            <li><a href="#alerts">Alerts 提示</a></li>
                            <!--<li><a href="#animations">Animations 动画库</a></li>-->
                            <li><a href="#button">Button 按钮</a></li>
                            <li><a href="#panel">Panel 容器</a></li>
                            <li><a href="#progress">Progress Bars 进度条</a></li>
                            <li><a href="#tabs">Tabs 页签</a></li>
                            <li><a href="#table">Tables 表格</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#responsive">响应式</a>
                        <ul class="nav">
                            <li><a href="#grid">Grid 栅格系统</a></li>
                            <li><a href="#responsive-utilities">响应式工具类</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#typography">排版</a>
                        <ul class="nav">
                            <li><a href="#headings">Headings 页眉</a></li>
                            <li><a href="#text">Text Emphasis 文字强调</a></li>
                            <li><a href="#badgesLabels">Badges/Labels 徽章/标签</a></li>
                            <li><a href="#quotes">Text Quotes 引用</a></li>
                            <li><a href="#wells">Text Wells 文本框</a></li>
                            <li><a href="#mediaObject">Media Objects 社区对象</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#form">Form 表单类</a>
                        <ul class="nav">
                            <li><a href="#input">Basic Input 基础</a></li>
                            <li><a href="#radioCheckbox">radio/Checkbox 单/多选</a></li>
                            <li><a href="#switch">switches 开关</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#images">图片</a>
                        <ul class="nav">
                            <li><a href="#imageshape">图片形状</a></li>
                            <li><a href="#imgthumbnail">缩略图</a></li>
                            <li><a href="#imgwordthum">自定义内容</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#help">帮助类</a>
                        <ul class="nav">
                            <li><a href="#height">Height 高度</a></li>
                            <li><a href="#texth">Text 文本</a></li>
                            <li><a href="#padding">Padding 内边距</a></li>
                            <li><a href="#margin">Margin 外边距</a></li>
                            <li><a href="#lineheight">LineHeight 行高</a></li>
                            <li><a href="#width">Width 宽度</a></li>
                            <li><a href="#textscence">情境文本颜色</a></li>
                            <li><a href="#bgscence">情境背景色</a></li>
                            <li><a href="#pullfloat">快速浮动</a></li>
                            <li><a href="#contentalign">让内容块居中</a></li>
                            <li><a href="#clearfloat">清除浮动</a></li>
                            <li><a href="#displaycontent">显示或隐藏内容</a></li>
                            <li><a href="#skipcontent">屏幕阅读器和键盘导航</a></li>
                            <li><a href="#imagehide">图片替换</a></li>
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