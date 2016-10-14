<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link href="../css/plugins/animate.css" rel="stylesheet"/>
    <?php include "head.php"?>
    <title>Awesome UI</title>
</head>
<body>
<!-- Begin: Content -->
<div class="container">

    <h1>Animate</h1>
    <hr class="short">
    
    <select class="as-form-control as-form-inline mb10">
        <optgroup label="淡入淡出">
            <option value ="fadeIn">fadeIn</option>
            <option value ="fadeInDown">fadeInDown</option>
            <option value ="fadeInLeft">fadeInLeft</option>
            <option value ="fadeInRight">fadeInRight</option>
            <option value ="fadeInUp">fadeInUp</option>
        </optgroup>
        <optgroup label="翻转">
            <option value ="flip">flip</option>
            <option value ="flipInX">flipInX</option>
            <option value ="flipInY">flipInY</option>
        </optgroup>
        <optgroup label="滑入">
            <option value ="slideInDown">slideInDown</option>
            <option value ="slideInLeft">slideInLeft</option>
            <option value ="slideInRight">slideInRight</option>
            <option value ="slideInUp">slideInUp</option>
        </optgroup>
        <optgroup label="缩放">
            <option value ="zoomIn">zoomIn</option>
            <option value ="zoomInDown">zoomInDown</option>
            <option value ="zoomInLeft">zoomInLeft</option>
            <option value ="zoomInRight">zoomInRight</option>
            <option value ="zoomInUp">zoomInUp</option>
        </optgroup>
    </select>
    
    <div class="as-panel animated fadeIn">
        <div class="as-panel-header">
            <span class="as-panel-title">
                <span class="fa fa-table"></span>
                Animate fadeIn
            </span>
        </div>
        <div class="as-panel-body">
            fadeIn
        </div>
    </div>
    
</div>
<?php include "foot.php"?>
</body>
</html>